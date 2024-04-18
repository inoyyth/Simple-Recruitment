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
		.page-break {
			page-break-after: always;
		}
	</style>
	
		<div style="position: relative;height:100vh;">
			<h1>Page 1</h1>
			<img src="{{ $image }}" />
			<img src="{{ $image }}" />
			<img src="{{ $image }}" />
			<img src="{{ $image }}" />
			<img src="{{ $image }}" />
			<img src="{{ $image }}" />
			<div style="position: absolute;bottom: 0;text-align: center;">footer</div>
		</div>
		<div class="page-break"></div>
		<div style="position: relative;height:100vh;">
			<h1>Page 2</h1>
			<div style="position: absolute;bottom: 0;text-align: center;">footer</div>
		</div>
		<script type="text/php">
			<?php
			if ( isset($pdf) ) {
				dd('croot');
				$font = Font_Metrics::get_font("helvetica", "bold");
				$pdf->page_text(72, 18, "Header: {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
			}
			?>
		</script> 
</body>
</html>