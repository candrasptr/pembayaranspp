
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pembayaran</title>
	
	<style >
		body{
			font-family: arial;
		}
		.print{
			margin-top: 10px;
		}
		@media print{
			.print{
				display: none;
			}
		}
		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<h3>SMK NEGERI 1 PADAHERANG<b><br/>LAPORAN PEMBAYARAN SPP</b></h3>
	<br/>
	<hr/>
	Tanggal {{ $dari }} - {{ $ke }}
	<br/>
	<br>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
		<th>NISN/NIS</th>
		<th>NAMA SISWA</th>
		<th>KELAS</th>
		<th>TANGGAL BAYAR</th>
		<th>TAHUN SPP</th>
		<th>JUMLAH</th>
		<th>KETERANGAN</th>
	</tr>
        @php
            $no = 1
        @endphp
        @foreach ($data as $item)
        <tr>
		<td align="center">{{ $no++ }}</td>
		<td align="center">{{ $item->nisn }}/{{ $item->nis }}</td>
		<td align="center">{{ $item->nama }}</td>
		<td align="">{{ $item->nama_kelas }}</td>
		<td align="">{{ $item->tanggal_bayar }}</td>
		<td align="">{{ $item->tahun }}</td>
		<td align="">{{ $item->nominal }}</td>
		<td align="center">{{ $item->ket }}</td>
		</tr>
        @endforeach
<tr>
		<td colspan="7" align="right">TOTAL</td>
		<td align="right"><b>{{ $data->sum('nominal') }}</b></td>
	</tr>
	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<BR/>
			<p>Padaherang , <?= date('d/m/y') ?> <br/>
                {{ Auth::guard('admin')->user()->nama_petugas }},
			<br/>
			<br/>
			<br/>
		<p>__________________________</p>
		</td>
	</tr>
</table>
</body>
</html>