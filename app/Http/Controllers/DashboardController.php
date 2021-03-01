<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    

    public function index()
    {
        // $now = date('Y');
        // $nows = $now+1;
        // $tahun = $now.'/'.$nows;
        // $totallunas = DB::table('tbl_pembayaran')->where('tahun_bayar',$tahun)->where('ket','lunas')->count();
        $totalsiswa = DB::table('tbl_siswa')->count();
        $totalpetugas = DB::table('tbl_petugas')->count();
        $petugas = DB::table('tbl_petugas')->where('level','petugas')->get();
        $admin = DB::table('tbl_petugas')->where('level','admin')->get();
        return view('admin/dashboard.index',['totalsiswa'=>$totalsiswa,'totalpetugas'=>$totalpetugas,'petugas'=>$petugas,'admin'=>$admin]);
    }
}
