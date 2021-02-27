@extends('admin/layout.master')

@section('title','kelas')
@section('title2','index')
@section('kelas','active')
@section('konten')

<div class="section-body">
  <div class="row">
    <div class="col-md-12">
      <div class="card mt-3">
        <div class="card-body">
            
          {{-- Button tambah --}}
          <a href="{{ route('kelas.create') }}" class="btn btn-icon icon-left btn-danger mb-3 px-3"><i class="fas fa-plus"></i></a>
            
          {{-- Form search --}}
          <div class="float-right">
            <form action="?" method="GET">
              <div class="input-group mb-3">
                <input name="keyword" id="caribuku" type="text" class="form-control" placeholder="Cari..." aria-label="Cari" aria-describedby="button-addon2" value="{{ Request()->keyword }}" autocomplete="off">
                <div class="input-group-append">
                  <button id="btncaribuku" class="btn btn-outline-danger bg-danger" type="submit" id="button-addon2"><i class="fas fa-search text-light"></i></button>
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
                <th>Nama kelas</th>
                <th scope="col">kompetensi keahlian</th>
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
                <td>{{ $item->nama_kelas }}</td>
                <td>{{ $item->kompetensi_keahlian }}</td>
                <td>

                  {{-- Button edit --}}
                  <a href="{{ route('kelas.edit',$item->id_kelas) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                  <a href="#" data-id="" class="btn btn-danger confirm_script-{{$item->id_kelas}} mr-3">
                    <form action="{{ route('kelas.destroy',$item->id_kelas)}}" class="delete_form-{{$item->id_kelas}}" method="POST">
                    @method('DELETE')
                    @csrf
                    </form>
                    <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
            @push('page-scripts')

<script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js')}}"></script>

@endpush

@push('after-scripts')

<script>
$(".confirm_script-{{$item->id_kelas}}").click(function(e) {
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
        $('.delete_form-{{$item->id_kelas}}').submit();
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

