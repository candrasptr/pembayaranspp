<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SppController extends Controller
{
    private function _validation(Request $request){
	    $validation = $request->validate([
	        'tahun' => 'required|max:10',
            'nominal' => 'required|max:10'
	    ],
	    [
	        'tahun.required' => 'Harus diisi',
	        'tahun.max' => 'Jangan lebih dari 5 huruf',
	        'nominal.required' => 'Harus diisi',
			'nominal.max' => 'Jangan lebih dari 10 huruf'
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
        $data = DB::table('tbl_spp')->where('id_spp','like',"%{$request->keyword}%")->paginate(5);
        return view('admin/spp.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/spp.create');
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
        DB::table('tbl_spp')->insert([
            'tahun'=>$request->tahun,
            'nominal'=>$request->nominal
        ]);
        return redirect('spp')->with('message','Data berhasil disimpan');
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
        $data = DB::table('tbl_spp')->where('id_spp',$id)->first();
        return view('admin/spp.edit',['data'=>$data]);
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
        DB::table('tbl_spp')->where('id_spp',$id)->update([
            'tahun'=>$request->tahun,
            'nominal'=>$request->nominal
        ]);
        return redirect('spp')->with('message','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tbl_spp')->where('id_spp',$id)->delete();
        return redirect()->back()->with('message','Data berhasil dihapus');
    }
}
