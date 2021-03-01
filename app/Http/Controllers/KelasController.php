<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{

    private function _validation(Request $request){
	    $validation = $request->validate([
	        'nama' => 'required|max:100',
            'kompetensi' => 'required|max:100'
	    ],
	    [
	        'nama.required' => 'Harus diisi',
	        'nama.max' => 'Jangan lebih dari 100 huruf',
	        'kompetensi.required' => 'Harus diisi',
			'kompetensi.max' => 'Jangan lebih dari 50 huruf'
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
        $data = DB::table('tbl_kelas')
        ->where('nama_kelas','like',"%{$request->keyword}%")
        ->orWhere('kompetensi_keahlian','like',"%{$request->keyword}%")->paginate(5);

        return view('admin/kelas.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/kelas.create');
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
        DB::table('tbl_kelas')->insert([
            'nama_kelas'=>$request->nama,
            'kompetensi_keahlian'=>$request->kompetensi
        ]);
        return redirect('kelas')->with('message','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('tbl_kelas')->where('id_kelas',$id)->first();
        return view('admin/kelas.edit',['data'=>$data]);
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
        DB::table('tbl_kelas')->where('id_kelas',$id)->update([
            'nama_kelas'=>$request->nama,
            'kompetensi_keahlian'=>$request->kompetensi
        ]);
        return redirect('kelas')->with('message','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tbl_kelas')->where('id_kelas',$id)->delete();
        return redirect()->back()->with('message','Data berhasil dihapus');
    }
}
