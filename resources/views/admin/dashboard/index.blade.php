@extends('admin/layout.master')

@section('title','Dashboard')
@section('title2','index')
@section('dashboard','active')

@section('konten')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="fas fa-box-open"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>total siswa</h4>
              </div>
              <div class="card-body">
                  {{ $totalsiswa }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>total petugas</h4>
              </div>
              <div class="card-body">
                  {{ $totalpetugas }}
              </div>
            </div>
          </div>
        </div>
      </div>
      
        <h2 class="section-title">Petugas</h2>
        <p class="section-lead">
          Daftar Petugas
        </p>
      
        <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4 class="d-inline">Admin</h4>
                <div class="card-header-action">
                  <a href="/petugas" class="btn btn-success">View All</a>
                </div>
              </div>
              <div class="card-body">
                <ul class="list-unstyled list-unstyled-border">
                  <li class="media">
                    <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-2.png" alt="avatar">
                    <div class="media-body">
                      <h6 class="media-title"><a href="#"></a></h6>
                      <div class="text-small text-muted"><div class="bullet"></div> <span class="text-primary"></span></div>
                    </div>
                  </li>       
                </ul>
              </div>
              <div class="card-header">
                <h4 class="d-inline">Petugas</h4>
                <div class="card-header-action">
                  <a href="/petugas" class="btn btn-success">View All</a>
                </div>
              </div>
              <div class="card-body">
                <ul class="list-unstyled list-unstyled-border">
                  <li class="media">
                    <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-1.png" alt="avatar">
                    <div class="media-body">
                      <h6 class="media-title"><a href="#"></a></h6>
                      <div class="text-small text-muted"><div class="bullet"></div> <span class="text-primary"></span></div>
                    </div>
                  </li>       
                </ul>
              </div>
            </div>
          </div>
        </div>
</div>
@endsection
