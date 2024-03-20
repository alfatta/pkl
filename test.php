<!doctype html>
<html>
<head>
	<title>aasdsa</title>
	<style>
		body {
 			background-image:url(uploads/bali.png);
			background-position: center center;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
			background-color: #aba7a7;
			margin: 0;
			padding: 0;
		}
		@media only screen and (max-width: 767px) {
			body {
				background-image: none;
			}
		}
		.nama_provinsi,	.ibukota_provinsi,
		.nama_hewan,	.gambar_hewan,
		.nama_tanaman,	.gambar_tanaman,
		.deskripsi_1,	.deskripsi_2,
		.deskripsi_3 {
			position: absolute;
			z-index: 1;
			background-color: rgba(0, 0, 0, 0.2);
			padding: 5px;
		}
		.nama_provinsi{
		    left: 35%; top: 0;
		    width: 30%;
			min-height: 30px;
		    text-align: center;
			font-size: 18pt;
		}
		.ibukota_provinsi{
			left: 40%; top: 50px;
		    width: 20%;
		    text-align: center;
			font-size: 12pt;
		}
		.nama_hewan {
			right: 0; top: 30%;
		    width: 20%;
		    text-align: center;
			font-size: 10pt;
		}
		.nama_tanaman {
			left: 0; top: 30%;
		    width: 20%;
		    text-align: center;
			font-size: 10pt;
		}
		.deskripsi_1 {
			left: 0; bottom: 10px;
		    width: 20%;
		    text-align: justify;
			font-size: 10pt;
		}
		.deskripsi_2 {
			left: 40%; bottom: 10px;
		    width: 20%;
		    text-align: justify;
			font-size: 10pt;
		}
		.deskripsi_3 {
			right: 0; bottom: 10px;
		    width: 20%;
		    text-align: justify;
			font-size: 10pt;
		}
	</style>
</head>
<body>
	<div class="nama_provinsi">Daerah Khusus Ibukota Jakarta</div>
	<div class="ibukota_provinsi">Bandar Lampung</div>
	<div class="nama_hewan">Nama Hewan</div>
	<div class="nama_tanaman">Nama Tanaman</div>
	<div class="deskripsi_1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
	<div class="deskripsi_2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
	<div class="deskripsi_3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
</body>
</html>
