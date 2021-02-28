@extends('admin/layout.master')

@section('title','Laporan')
@section('title2','index')
@section('laporan','active')
@section('konten')

<div class="section-body">
  <div class="row">
    <div class="col-md-12 mb-5">
      <h1 id="bo">Rekap laporan</h1>
    </div>
    <div class="col-md-6 offset-md-3 mt-3">
      <div class="card">
        <div class="card-body">
          <form action="cetak" class="row" method="GET">
            <div class="form-group col-md-6">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                @if( request('dari') !='' )
                <input type="date" data-toggle="tooltip" data-placement="top" title="Dari Tanggal" name="dari" class="form-control datepicker" placeholder="Start date" tooltip="Dari Tanggal" required value="{{request('dari')}}">
                @else
                <input type="date" data-toggle="tooltip" data-placement="top" title="Dari Tanggal" name="dari" class="form-control datepicker" placeholder="Start date" tooltip="Dari Tanggal" value="<?php echo date('Y-m-d')?>" id="aktif" required>
                @endif
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                @if( request('ke') !='' )
                <input type="date" name="ke" data-toggle="tooltip" data-placement="top" title="Ke Tanggal" class="form-control datepicker" placeholder="Start date" tooltip="ke Tanggal" required value="{{request('ke')}}">
                @else
                <input type="date" name="ke" data-toggle="tooltip" data-placement="top" title="Ke Tanggal" class="form-control datepicker" placeholder="Start date" tooltip="ke Tanggal" value="<?php echo date('Y-m-d')?>" id="aktif" required>
                @endif              
              </div>
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-danger btn-sm btn-block">Rekap</button>
            </div> 
          </form>
        </div>
      </div>
    </div>
  </div>    
</div>

@endsection

