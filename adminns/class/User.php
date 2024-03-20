<?php if ( ! defined('SECRET_KEY')) exit('<pre>Error 404 : Page Not Found</pre>');
	class User {
		// fungsi untuk menambahkan user baru
		function addUser($data) {
			$pdo = new PDO("mysql:dbname=".DB_NAME.";host=".DB_HOST,DB_USERNAME,DB_PASSWORD);

			foreach ($data as $key =>$val){
				if ($key=="password") {
					$val = $this->getEncrypted($val);
				}
				$vals[] = "'".$val."'";
				$keys[] = $key;
			}

	    	$field = implode(', ', $keys);
	    	$value = implode(', ', $vals);

			$query = "INSERT INTO user (".$field.") VALUES (".$value.")";

			return $pdo->query($query);
		}
		// Mengubah password
		function ubahPassword($username,$new,$old) {
			$pdo = new PDO("mysql:dbname=".DB_NAME.";host=".DB_HOST,DB_USERNAME,DB_PASSWORD);
			if ($this->isExistUnique($username,$old)) {
				$query = "UPDATE user SET password='".$this->getEncrypted($new)."' WHERE username='".$username."' && password='".$this->getEncrypted($old)."'";
				return $pdo->query($query);
			} else {
				return false;
			}
		}
		// fungsi untuk mendapatkan realname pengguna
		private function getRealname($username){
			$pdo = new PDO("mysql:dbname=".DB_NAME.";host=".DB_HOST,DB_USERNAME,DB_PASSWORD);
			$query = "SELECT realname FROM user WHERE username='".$username."'";
			$result = $pdo->query($query);
			$data = $result->fetch(PDO::FETCH_OBJ);

			return $data->realname;
		}
		// fungsi untuk memastikan user ada dan hanya 1
		private function isExistUnique($username, $password) {
			$pdo = new PDO("mysql:dbname=".DB_NAME.";host=".DB_HOST,DB_USERNAME,DB_PASSWORD);
			$sql = $pdo->query("SELECT * FROM user WHERE username='".$username."' && password='".$this->getEncrypted($password)."'");
			$row = $sql->rowCount();
			if ($row==1) {
				return true;
			}else{
				return false;
			}
		}
		// menghasilkan string yang telah di enkripsi
		private function getEncrypted($text) {
			$firstphase = md5($this->strTrim(md5($text),'awal',2));
			$secondphase = md5($this->strFlip($this->strTrim($firstphase,'akhir',5)));
			$thirdphase = $this->strTrim($secondphase,'awal',strlen($secondphase)/2).$this->strTrim($secondphase,'akhir',strlen($secondphase)/2);
			$finalphase = md5($this->strFlip($thirdphase));
			return $finalphase;
		}
		// membalik suatu string Ex. strFlip('baca') -> acab
		private function strFlip($value=''){
			$data = array();
			for ($i=strlen($value)-1; $i >= 0; $i--) {
				array_push($data, $value[$i]);
			}
			return implode('', $data);
		}
		// memotong suatu string Ex. strTrim('baca','awal',2) -> ca
		private function strTrim($value='',$loc='awal',$n=1){
			$data = array();
			if ($loc=='awal'){
				for ($i=$n; $i < strlen($value); $i++) {
					array_push($data, $value[$i]);
				}
			}else{
				for ($i=0; $i < strlen($value)-$n; $i++) {
					array_push($data, $value[$i]);
				}
			}
			return implode('', $data);
		}
		// memproses aksi login dari penggunas
		function login($username, $password) {
			if ($this->isExistUnique($username, $password)) {
				$_SESSION['username'] = $username;
				$_SESSION['realname'] = $this->getRealname($username);
				return true;
			} else {
				return false;
			}
		}
		// memproses aksi logout dari pengguna
		function logout($sure=false) {
			if(session_destroy()) {
				return true;
			} else {
				return  false;
			}
		}
		function isLogin(){
			if(isset($_SESSION['username']) && isset($_SESSION['realname'])) {
				return true;
			} else {
				return false;
			}
		}
	}
?>
