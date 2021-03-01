@extends('admin/layout.master')

@section('title','Pembayaran')
@section('title2','index')
@section('transaksi','active')
@section('konten')
<div class="container-fluid mt-3">
	<div class="row">
		<div class="col-md-6">
			<img src="{{ asset('assets/img/logo4.png') }}" style="width: 150px;" alt="">
		</div>
		<div class="col-md-6 text-right">
			<span id="me">Petugas</span><br>
			<span class="text-danger"><i class="fas fa-user"></i> {{ Auth::guard('admin')->user()->nama_petugas }}</span>
		</div>
		<div class="col-md-6 mt-5">
			<form action="/transaksi_cari" method="GET">
				@csrf
				<div class="input-group input-group-sm mb-3">
					<div class="input-group-prepend">
					  <span class="input-group-text" id="inputGroup-sizing-sm">NISN</span>
					</div>
					<input autocomplete="off" name="keyword" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
					<div class="input-group-append">
						<button class="btn btn-success px-3" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
					</div>
				  </div>
			</form>
		</div>
        <div class="col-md-12 mb-5"></div>
		@if(session('message'))
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible show fade">
				<div class="alert-body">
				  <button class="close" data-dismiss="alert">
					<span>×</span>
				  </button>
				  {{ session('message') }}
				</div>
			</div>
		</div> 
        @endif
		@if ($data->count() != '')
        
		<div class="col-md-4">
			<div class="row">
                <div class="card" style="border: none;
                box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2);
                border-radius: 7px;
                background-color: transparent;
                transition: transform 1s ease;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3 text-center">
                                <h5>BIODATA</h5> 
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <span>NISN/NIS</span><br>
                                <span>Nama siswa</span><br>
                                <span>Kelas</span>
                            </div>
                            <div class="col-md-6">
                                <span>: {{ $data_siswa->nisn }}/{{ $data_siswa->nis }}</span><br>
                                <span>: {{ $data_siswa->nama }}</span><br>
                                <span>: {{ $data_siswa->nama_kelas }}</span>
                            </div>
                        </div>
                    </div>
                </div>
    		</div>
		</div>
		<div class="col-md-8">
			<table class="table table-striped">
			  <thead>
				<tr>
				  <th scope="col">No</th>
				  <th scope="col">Tahun spp</th>
				  <th scope="col">Nominal</th>
                  <th>Tanggal bayar</th>
				  <th scope="col">Status</th>
                  <th></th>
				</tr>
			  </thead>
			  <tbody>
				  @php
					  $no = 1;
				  @endphp
				  @foreach ($data as $item)
				  <tr>
					<th scope="row">{{ $no++ }}</th>
					<td>{{ $item->tahun }}</td>
					<td>{{ $item->nominal }}</td>
                    <td>@if ($item->tanggal_bayar != '')
                        {{ $item->tanggal_bayar }}
                    @else
                        belum
                    @endif</td>
					<td>{{ $item->ket }}</td>
					<td>
                        @if ($item->ket == 'lunas')
                            <a href="{{ route('transaksi.pdf',$item->id_pembayaran) }}" class="btn btn-warning mr-2 mb-2">CETAK</a>
                            <a href="{{ route('transaksi.batal',$item->id_pembayaran) }}" class="btn btn-danger mb-2">BATAL</a>
                        @else
                            <a href="{{ route('transaksi.bayar',$item->id_pembayaran) }}" class="btn btn-success">Bayar</a>
                        @endif
                    </td>
				  </tr>
				  @endforeach	
			  </tbody>
			</table>
			<hr>
		</div>
		@endif
		
	</div>		
</div>
@endsection
@push('page-scripts')
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script>
    

  function hitung()
  {
    var total = $('#total').val();
    var jumlah_pembayaran = $('#jumlah_pembayaran').val();
    var kembalian = $('#kembalian').val();
    var bayar = $('#bayar').val();
    var a = jumlah_pembayaran - total;
    $('#kembalian').val(a);
    if(a < 0)
    {
      $("#bayar").prop("disabled", true);
    }
    else
    {
      $("#bayar").prop("disabled", false);
    }
  }

$(document).ready(function() {
    var t = $('#example').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    } );
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
    </script>
    @endpush