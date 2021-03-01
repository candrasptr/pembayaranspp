<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;

class SiswaController extends Controller
{
    private function _validation(Request $request){
	    $validation = $request->validate([
	        'nama' => 'required|max:100',
            'nisn' => 'required|max:100',
            'nis' => 'required|max:100',
            'alamat' => 'required',
	    ],
	    [
	        'nama.required' => 'Harus diisi',
	        'nama.max' => 'Jangan lebih dari 100 huruf',
	        'nisn.required' => 'Harus diisi',
			'nisn.max' => 'Jangan lebih dari 50 huruf',
			'nis.required' => 'Harus diisi',
            'alamat.required' => 'Harus diisi'
	    ]
	);
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::table('tbl_siswa')
        ->where('nama','like',"%{$request->keyword}%")
        ->join('tbl_kelas', function($join){
            $join->on('tbl_siswa.kelas_id','=','tbl_kelas.id_kelas');
        })->orWhere('nama_kelas','like',"%{$request->keyword}%")->orderBy('kelas_id','asc')->orderBy('nama','asc')->paginate(5);
        return view('admin/siswa.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('tbl_kelas')->get();
        return view('admin/siswa.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_validation($request);
        DB::table('tbl_siswa')->insert([
            'nisn'=>$request->nisn,
            'nis'=>$request->nis,
            'nama'=>$request->nama,
            'kelas_id'=>$request->kelas,
            'alamat'=>$request->alamat,
            'no_telp'=>$request->notelp,
            'password'=>bcrypt('password')
        ]);

        $now = date('Y-m-d');
        $data = DB::table('tbl_spp')->get();
        $bulan = Carbon::now('m');
        $bulans = $bulan->isoFormat('M');
        foreach ($data as $key) {
            DB::table('tbl_pembayaran')->insert([
                'petugas_id'=>Auth::guard('admin')->user()->id_petugas,
                'nisn_siswa'=>$request->nisn,
                'tahun_bayar'=>$key->tahun,
                'spp_id'=>$key->id_spp,
                'jumlah_bayar'=>$key->nominal,
                'ket'=>'belum'
            ]);
        }
        

        return redirect('siswa')->with('message','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('tbl_siswa')->where('nisn',$id)->first();
        $data_kelas = DB::table('tbl_kelas')->get();
        return view('admin/siswa.edit',['data'=>$data,'kelas'=>$data_kelas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->_validation($request);
        DB::table('tbl_siswa')->where('nisn',$id)->update([
            'nisn'=>$request->nisn,
            'nis'=>$request->nis,
            'nama'=>$request->nama,
            'kelas_id'=>$request->kelas,
            'alamat'=>$request->alamat,
            'no_telp'=>$request->notelp
        ]);

        DB::table('tbl_pembayaran')->where('nisn_siswa',$id)->update([
            'nisn_siswa'=>$request->nisn
        ]);

        return redirect('siswa')->with('message','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tbl_siswa')->where('nisn',$id)->delete();
        DB::table('tbl_pembayaran')->where('nisn_siswa',$id)->delete();
        return redirect()->back()->with('message','data berhasil dihapus');
    }

    public function history($id)
    {
        $data = DB::table('tbl_siswa')->where('nisn',$id)
        ->join('tbl_kelas', function($join){
            $join->on('tbl_siswa.kelas_id','=','tbl_kelas.id_kelas');
        })->join('tbl_pembayaran', function($join){
            $join->on('tbl_siswa.nisn','=','tbl_pembayaran.nisn_siswa');
        })->join('tbl_spp', function($join){
            $join->on('tbl_pembayaran.spp_id','=','tbl_spp.id_spp');
        })->where('ket','lunas')
        ->get();
        if (Auth::guard('admin')->check()) {
            return view('admin/siswa.history',['data'=>$data]);
        } else {
            return view('siswa.history',['data'=>$data]);
        }
   
    }
    public function login(Request $request)
    {
        if (Auth::guard('siswa')->attempt(['nisn' => $request->nisn, 'password' => $request->password])) {
            // if successful, then redirect to their intended location
          return redirect()->intended('/siswa_depan');
        } else {
          return redirect('/')->with('message','username atau password salah');
        }
    }

    public function depan()
    {
        return view('siswa.index');
    }
}
