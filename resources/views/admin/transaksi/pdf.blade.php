
<!DOCTYPE html>
<html>
<head>
	<title>Bukti pembayaran spp</title>
	
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
	<table>
		<tr>
			<td>Nama Siswa </td>
			<td>:</td>
			<td> {{ $data->nama }}</td>
		</tr>
		<tr>
			<td>NISN/NIS </td>
			<td>:</td>
			<td> {{ $data->nisn }}/{{ $data->nis }}</td>
		</tr>
		<tr>
			<td>Kelas </td>
			<td>:</td>
			<td> {{ $data->nama_kelas }}</td>
		</tr>
	</table>
	<hr>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
		<th>TAHUN SPP</th>
        <th>TANGGAL BAYAR</th>
		<th>JUMLAH</th>
		<th>KETERANGAN</th>
	</tr>
	<tr>
		<td align="center">1</td>
		<td align="center">{{ $data->tahun }}</td>
		<td align="">{{ $data->tanggal_bayar }}</td>
		<td align="right">{{ $data->nominal }}</td>
		<td align="center">{{ $data->ket }}</td>
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