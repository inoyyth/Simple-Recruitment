<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<htmlpageheader name="page-header">
	Your Header Content
	</htmlpageheader>
	<center>
     <h5>Membuat Laporan PDF Dengan DOMPDF Laravel</h4>
	</center>
    {{ $name }}
    
    <img src="<?php echo public_path() . '/images/slide2.jpg';?>" />
    
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Alamat</th>
				<th>Telepon</th>
				<th>Pekerjaan</th>
			</tr>
		</thead>
	</table>
	<htmlpagefooter name="page-footer">
	Your Footer Content
</htmlpagefooter>
</body>
</html>