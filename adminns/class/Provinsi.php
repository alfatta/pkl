<?php if ( ! defined('SECRET_KEY')) exit('<pre>Error 404 : Page Not Found</pre>');
	class Provinsi {
		// fungsi untuk mendapatkan data seluruh provinsi yang hanya berisi id, nama, dan ibukota provinsi
		function getProvinsiList() {
			$pdo = new PDO("mysql:dbname=".DB_NAME.";host=".DB_HOST,DB_USERNAME,DB_PASSWORD);
			$query = "SELECT id_provinsi, nama_provinsi, ibukota_provinsi, slug FROM provinsi";
			return $pdo->query($query);
		}
		// fungsi untuk mendapatkan seluruh data dari sebuah provinsi
		function getProvinsiDetail($provinsi) {
			$pdo = new PDO("mysql:dbname=".DB_NAME.";host=".DB_HOST,DB_USERNAME,DB_PASSWORD);
			$query = "SELECT * FROM provinsi WHERE slug='".$provinsi."'";
			return $pdo->query($query);
		}
		// fungsi untuk mengecek apakah string yang diinputkan merupakan provinsi
		function isProvinsi($provinsi) {
			$pdo = new PDO("mysql:dbname=".DB_NAME.";host=".DB_HOST,DB_USERNAME,DB_PASSWORD);
			$query = "SELECT id_provinsi FROM provinsi WHERE slug='".$provinsi."'";
			$result = $pdo->query($query);

			if($result->rowCount() == 1){
	        	return true;
	        } else {
	        	return false;
	        }
		}
		// fungsi untuk mengubah data provinsi
		function updateProvinsi($data,$id) {
			$pdo = new PDO("mysql:dbname=".DB_NAME.";host=".DB_HOST,DB_USERNAME,DB_PASSWORD);
			$query = "UPDATE provinsi SET";
			$i=0;
			foreach ($data as $key => $value) {
				if ($i!=0) {
					$query .= ",";
				}
				$query .= " ".$key."='".$value."'";
				$i=1;
			}
			$query .= " WHERE id_provinsi=".$id."";
			return $pdo->query($query);
		}
		function uploadImage($files,$ht) {
			$check = 1;
			if (!empty($files[$ht]["tmp_name"])) {
				$dir = "uploads/";
				$img = $dir.$ht.round(microtime(true)*1000)."-".basename($_FILES[$ht]['name']);
				$imgtype = pathinfo($img,PATHINFO_EXTENSION);
				if(!getimagesize($_FILES[$ht]["tmp_name"])) $check = 0;
				if(file_exists($img)) $check = 0;
				if ($_FILES[$ht]["size"] > 50000000) $check = 0;
				if($imgtype != "jpg" && $imgtype != "png" && $imgtype != "jpeg" && $imgtype != "gif" ) $check = 0;
				if ($check==1) {
					if (move_uploaded_file($_FILES[$ht]["tmp_name"], $img)) {
						return $img;
					} else {
						return "error";
					}
				} else {
					return "error";
				}
			}
		}
	}
?>
