@extends('admin/layout.master')

@section('title','Siswa')
@section('title2','index')
@section('petugas','active')
@section('konten')

<div class="section-body">
  <div class="row">
    <div class="col-md-12">
      <div class="card mt-3">
        <div class="card-body">
            {{-- Button tambah --}}
          <a href="data_siswa_cetak" class="btn btn-icon icon-left btn-danger mb-3 px-3">CETAK</a>
          
          {{-- tabel --}}
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">NISN/NIS</th>
                <th>Nama siswa</th>
                <th>Kelas</th>
              </tr>
            </thead>
            <tbody class="mt-2">
                @php
                    $no = 1
                @endphp
              @foreach ($data as $item)
              <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $item->nisn }}/{{ $item->nis }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nama_kelas }}</td>
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

