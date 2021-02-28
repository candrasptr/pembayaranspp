
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Petugas</title>
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
	<b>LAPORAN DATA PETUGAS</b>
	<br>
	<hr/>
	
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
        <th>NAMA PETUUGAS</th>
		<th>LEVEL</th>		
	</tr>
	<tr>
        @php
            $no = 1
        @endphp
        @foreach ($data as $item)
		<td align="center">{{ $no++ }}</td>
		<td align="center">{{ $item->nama_petugas }}</td>
		<td align="">{{ $item->level }}</td>
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