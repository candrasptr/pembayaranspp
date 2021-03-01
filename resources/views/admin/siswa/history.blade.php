@extends('admin/layout.master')

@section('title','Siswa')
@section('title2','index')
@section('siswa','active')
@section('konten')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mb-3">
            <h3>HISTORY PEMBAYARAN</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        @foreach ($data as $item)      
        <div class="col-md-8 mb-2">
            <div class="card" id="card-cart">
                <div class="card-body">
                    <h5 class="text-success">{{ $item->nama }} | lunas</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <span>Pembayaran spp</span><br>
                            <span>Tahun : {{ $item->tahun }}</span>
                        </div>
                        <div class="col-md-6 text-right">
                            <span class="text-danger">Rp.{{ $item->nominal }}</span><br>
                            <span>{{ $item->tanggal_bayar }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

