<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $data = DB::table('tbl_petugas')->get();
        return view('admin/laporan.index',['data'=>$data]);
    }

    public function cetakguru()
    {
        $data = DB::table('tbl_petugas')->get();
        $pdf = PDF::loadview('admin/laporan.pdfguru',['data'=>$data]);
    	return $pdf->stream('struk-pdf');
    }

    public function datasiswa()
    {
        $data = DB::table('tbl_siswa')
        ->join('tbl_kelas',function($join){
            $join->on('tbl_siswa.kelas_id','=','tbl_kelas.id_kelas');
        })->get();
        return view('admin/laporan.datasiswa',['data'=>$data]);
    }

    public function datasiswacetak()
    {
        $data = DB::table('tbl_siswa')
        ->join('tbl_kelas',function($join){
            $join->on('tbl_siswa.kelas_id','=','tbl_kelas.id_kelas');
        })->get();
        $pdf = PDF::loadview('admin/laporan.pdfsiswa',['data'=>$data]);
    	return $pdf->stream('struk-pdf');
    }

    public function cetak(Request $request)
    {
        $dari = $request->dari;
        $ke = $request->ke; 

        $data = DB::table('tbl_siswa')
        ->join('tbl_pembayaran', function($join){
            $join->on('tbl_siswa.nisn','=','tbl_pembayaran.nisn_siswa');
        })->join('tbl_spp', function($join){
            $join->on('tbl_pembayaran.spp_id','=','tbl_spp.id_spp');
        })->join('tbl_petugas', function($join){
            $join->on('tbl_pembayaran.petugas_id','=','tbl_petugas.id_petugas');
        })->join('tbl_kelas', function($join){
            $join->on('tbl_siswa.kelas_id','=','tbl_kelas.id_kelas');
        })->when($request->dari,function ($query) use ($request) {
            $dari = $request->dari;
            $ke = $request->ke;   
                $query
                ->whereBetween('tanggal_bayar',[$dari,$ke]);
            })->where('ket','lunas')->paginate($request->limit ?  $request->limit : 10);
            $data->appends($request->only('dari','ke'));

        $pdf = PDF::loadview('admin/laporan.pdf',['data'=>$data, 'dari'=>$dari, 'ke'=>$ke]);
    	return $pdf->stream('struk-pdf');
    }
}
