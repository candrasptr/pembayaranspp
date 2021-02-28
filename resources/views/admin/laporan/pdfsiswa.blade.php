
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Siswa</title>
	<hr/>
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
	<b>LAPORAN DATA SISWA</b>
	<br>
	<hr/>
	
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
        <th>NISN/NIS</th>
        <th>NAMA SISWA</th>
		<th>KELAS</th>		
	</tr>
	<tr>
        @php
            $no = 1
        @endphp
        @foreach ($data as $item)
		<td align="center">{{ $no++ }}</td>
		<td align="center">{{ $item->nisn}}/{{ $item->nis }}</td>
		<td align="">{{{ $item->nama }}}</td>
        <td>{{ $item->nama_kelas }}</td>
        @endforeach
	</tr>
	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
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