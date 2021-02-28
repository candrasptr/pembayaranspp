<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = DB::table('tbl_kosong')->get();
        return view('admin/transaksi.index',['data'=>$data]);
    }

    public function cari(Request $request)
    {
        $data = DB::table('tbl_siswa')->where('nisn','like',"%{$request->keyword}%")
        ->join('tbl_pembayaran', function($join){
            $join->on('tbl_siswa.nisn','=','tbl_pembayaran.nisn_siswa');
        })->join('tbl_spp', function($join){
            $join->on('tbl_pembayaran.spp_id','=','tbl_spp.id_spp');
        })->join('tbl_petugas', function($join){
            $join->on('tbl_pembayaran.petugas_id','=','tbl_petugas.id_petugas');
        })->get();

        $data_siswa = DB::table('tbl_siswa')->where('nisn',$request->keyword)
        ->join('tbl_kelas', function($join){
            $join->on('tbl_siswa.kelas_id','=','tbl_kelas.id_kelas');
        })
        ->first();
        return view('admin/transaksi.index',['data'=>$data,'data_siswa'=>$data_siswa]);
    }
}
