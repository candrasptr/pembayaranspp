@extends('admin/layout.master')

@section('title','Siswa')
@section('title2','index')
@section('siswa','active')
@section('konten')

<div class="section-body">
  <div class="row">
    <div class="col-md-12">
      <div class="card mt-3">
        <div class="card-body">
            
          @if (Auth::guard('admin')->user()->level == 'admin')
            {{-- Button tambah --}}
          <a href="{{ route('siswa.create') }}" class="btn btn-icon icon-left btn-success mb-3 px-3"><i class="fas fa-plus"></i></a>  
          @endif
            
          {{-- Form search --}}
          <div class="float-right">
            <form action="?" method="GET">
              <div class="input-group mb-3">
                <input name="keyword" id="caribuku" type="text" class="form-control" placeholder="Cari..." aria-label="Cari" aria-describedby="button-addon2" value="{{ Request()->keyword }}" autocomplete="off">
                <div class="input-group-append">
                  <button id="btncaribuku" class="btn btn-outline-success bg-success" type="submit" id="button-addon2"><i class="fas fa-search text-light"></i></button>
                </div>
              </div>
            </form>
          </div>

          {{-- Alert --}}
          @if(session('message'))
          <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert">
                <span>×</span>
              </button>
              {{ session('message') }}
            </div>
          </div>
          @endif

          {{-- tabel --}}
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th>Nisn/Nis</th>
                <th scope="col">Nama siswa</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>No telp</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="mt-2">
                @php
                    $no = 1
                @endphp
              @foreach ($data as $item)
              <tr>
                <th scope="row">{{ $no++ }}</th>
                <td><b>{{ $item->nisn }}</b>/{{ $item->nis }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nama_kelas }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->no_telp }}</td>
                <td>

                  {{-- Button edit --}}
                  @if (Auth::guard('admin')->user()->level == 'admin')
                  <a href="{{ route('siswa.edit',$item->nisn) }}" class="btn btn-success mt-2"><i class="fas fa-edit"></i></a>
                  <a href="#" data-id="" class="btn btn-danger confirm_script-{{$item->nisn}} mr-3 mt-2">
                    <form action="{{ route('siswa.destroy',$item->nisn)}}" class="delete_form-{{$item->nisn}}" method="POST">
                    @method('DELETE')
                    @csrf
                    </form>
                    <i class="fas fa-trash"></i>
                  </a><br> 
                  @endif
                  
                  <a href="{{ route('siswa.history',$item->nisn) }}" class="btn btn-warning mt-2"> HISTORY </a>
              </td>
            </tr>
            @push('page-scripts')

<script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>

@endpush

@push('after-scripts')

<script>
$(".confirm_script-{{$item->nisn}}").click(function(e) {
  // id = e.target.dataset.id;
  swal({
      title: 'Yakin hapus data?',
      text: 'Data yang dihapus tidak bisa di kembalikan',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $('.delete_form-{{$item->nisn}}').submit();
      } else {
      swal('Hapus data telah di batalkan');
      }
    });
});
</script>
@endpush
@endforeach
                  
            </tbody>
          </table>
          {{$data->links()}}
        </div>
      </div>
    </div>
  </div>    
</div>

@endsection

