<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;

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

    public function bayar($id)
    {
        $now = date('Y-m-d');
        $bulan = Carbon::now('m');
        $bulans = $bulan->isoFormat('M');
        DB::table('tbl_pembayaran')->where('id_pembayaran',$id)->update([
            'tanggal_bayar'=>$now,
            'bulan_bayar'=>$bulans,
            'ket'=>'lunas'
        ]);
        return redirect()->back()->with('message','Berhasil dibayar');
    }

    public function batal($id)
    {
        DB::table('tbl_pembayaran')->where('id_pembayaran',$id)->update([
            'tanggal_bayar'=>NULL,
            'bulan_bayar'=>NULL,
            'ket'=>'belum'
        ]);
        return redirect()->back()->with('message','Pembayaran dibatalkan');
    }

    public function pdf($id)
    {
        $data = DB::table('tbl_siswa')->where('id_pembayaran',$id)
        ->join('tbl_pembayaran', function($join){
            $join->on('tbl_siswa.nisn','=','tbl_pembayaran.nisn_siswa');
        })->join('tbl_spp', function($join){
            $join->on('tbl_pembayaran.spp_id','=','tbl_spp.id_spp');
        })->join('tbl_petugas', function($join){
            $join->on('tbl_pembayaran.petugas_id','=','tbl_petugas.id_petugas');
        })->join('tbl_kelas', function($join){
            $join->on('tbl_siswa.kelas_id','=','tbl_kelas.id_kelas');
        })
        ->first();
        $pdf = PDF::loadview('admin/transaksi.pdf',['data'=>$data]);
    	return $pdf->stream('struk-pdf');
    }
}
