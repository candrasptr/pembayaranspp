<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        })->orderBy('kelas_id','asc')->orderBy('nama','asc')->paginate(5);
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
            'status'=>'belum_dibayar'
        ]);
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
        return redirect()->back()->with('message','data berhasil dihapus');
    }
}
