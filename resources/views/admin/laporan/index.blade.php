@extends('admin/layout.master')

@section('title','Petugas')
@section('title2','index')
@section('petugas','active')
@section('konten')

<div class="section-body">
  <div class="row">
    <div class="col-md-12">
      <div class="card mt-3">
        <div class="card-body">
            {{-- Button tambah --}}
          <a href="data_guru_cetak" class="btn btn-icon icon-left btn-success mb-3 px-3">CETAK</a>
          
          {{-- tabel --}}
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th>Nama petugas</th>
                <th scope="col">Username</th>
                <th>Level</th>
              </tr>
            </thead>
            <tbody class="mt-2">
                @php
                    $no = 1
                @endphp
              @foreach ($data as $item)
              <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $item->nama_petugas }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->level }}</td>
            </tr>
            
@endforeach
                  
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>    
</div>

@endsection

