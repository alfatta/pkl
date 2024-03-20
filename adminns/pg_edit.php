<?php if ( ! defined('SECRET_KEY')) exit('<pre>Error 404 : Page Not Found</pre>');
	if(!$user->isLogin()) header("Location:".getUrl(ADMIN_URL,'login'));
	if (isset($_GET['data1'])) {
		if ($provinsi->isProvinsi($_GET['data1'])) {
			$datas = $provinsi->getProvinsiDetail($_GET['data1']);
			$data = $datas->fetch(PDO::FETCH_OBJ);
		} else {
			exit('<pre>Error 404 : Page Not Found</pre>');
		}
	}
	if (isset($_POST['id_provinsi'])) {
		$data = array(
			'ibukota_provinsi'=>$_POST['ibukota_provinsi'],
			'nama_hewan'=>$_POST['nama_hewan'],
			'nama_tanaman'=>$_POST['nama_tanaman'],
			'deskripsi_1'=>$_POST['deskripsi_1'],
			'deskripsi_2'=>$_POST['deskripsi_2'],
			'deskripsi_3'=>$_POST['deskripsi_3'],
			'fakta_menarik'=>$_POST['fakta_menarik']
		);
		if (!empty($_FILES['bg']['tmp_name'])) {
			$bg = $provinsi->uploadImage($_FILES,'bg');
			if ($bg!='error') $data = array_merge($data, array('bg'=>$bg));
		}
		if (!empty($_FILES['gh']['tmp_name'])) {
			$gh = $provinsi->uploadImage($_FILES,'gh');
			if ($gh!='error') $data = array_merge($data, array('gh'=>$gh));
		}
		if (!empty($_FILES['gt']['tmp_name'])) {
			$gt = $provinsi->uploadImage($_FILES,'gt');
			if ($gt!='error') $data = array_merge($data, array('gt'=>$gt));
		}
		if ($provinsi->updateProvinsi($data,$_POST['id_provinsi'])) {
			echo "<script>alert('Data berhasil diubah');window.location.href='".getUrl(ADMIN_URL,'edit',$_POST['slug'])."';</script>";
		} else {
			echo "<script>alert('Data gagal diubah');window.location.href='".getUrl(ADMIN_URL,'edit',$_POST['slug'])."';</script>";
		}
	}
	include_once ADMIN_PATH.'/inc_head.php';
?>
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Provinsi <?=$data->nama_provinsi?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Provinsi <?=$data->nama_provinsi?>
                        </div>
                        <div class="panel-body">
                        	<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                        		<input type="hidden" value="<?=$data->id_provinsi?>" name="id_provinsi"></input>
								<input type="hidden" value="<?=$data->slug?>" name="slug"></input>
								<div class="form-group">
									<label for="nama_provinsi" class="col-sm-3 control-label">Provinsi :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="nama_provinsi" name="nama_provinsi" placeholder="Provinsi" value="<?=$data->nama_provinsi?>"  required disabled="">
									</div>
								</div>
								<div class="form-group">
									<label for="ibukota_provinsi" class="col-sm-3 control-label">Ibukota Provinsi :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="ibukota_provinsi" name="ibukota_provinsi" placeholder="Ibukota Provinsi" value="<?=$data->ibukota_provinsi?>"  required	>
									</div>
								</div>
								<div class="form-group">
									<label for="bg" class="col-sm-3 control-label">Background Provinsi :</label>
									<div class="col-sm-9">
										<img src="<?=$data->bg;?>" id="bgimg" height="200"><br><br>
										<input type="file" name="bg" id="bg" accept="image/*" onchange="readimg(this,'bgimg');">
									</div>
								</div>
								<div class="form-group">
									<label for="nama_hewan" class="col-sm-3 control-label">Hewan Endemik :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="nama_hewan" name="nama_hewan" placeholder="Hewan Endemik" value="<?=$data->nama_hewan?>"  required>
									</div>
								</div>
								<div class="form-group">
									<label for="gh" class="col-sm-3 control-label">Gambar Hewan :</label>
									<div class="col-sm-9">
										<img src="<?=$data->gh;?>" id="ghimg" height="200"><br><br>
										<input type="file" name="gh" id="gh" accept="image/*" onchange="readimg(this,'ghimg');">
									</div>
								</div>
								<div class="form-group">
									<label for="nama_tanaman" class="col-sm-3 control-label">Tanaman Endemik :</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="nama_tanaman" name="nama_tanaman" placeholder="Tanaman Endemik" value="<?=$data->nama_tanaman?>"  required>
									</div>
								</div>
								<div class="form-group">
									<label for="gt" class="col-sm-3 control-label">Gambar Tumbuhan :</label>
									<div class="col-sm-9">
										<img src="<?=$data->gt;?>" id="gtimg" height="200"><br><br>
										<input type="file" name="gt" id="gt" accept="image/*" onchange="readimg(this,'gtimg');">
									</div>
								</div>
								<div class="form-group">
									<label for="deskripsi_1" class="col-sm-3 control-label">Deskripsi 1 :</label>
									<div class="col-sm-9">
										<textarea class="form-control" rows="3" id="deskripsi_1" name="deskripsi_1" placeholder="Deskripsi 1" required><?=$data->deskripsi_1?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="deskripsi_2" class="col-sm-3 control-label">Deskripsi 2 :</label>
									<div class="col-sm-9">
										<textarea class="form-control" rows="3" id="deskripsi_2" name="deskripsi_2" placeholder="Deskripsi 2" required><?=$data->deskripsi_2?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="deskripsi_3" class="col-sm-3 control-label">Deskripsi 3 :</label>
									<div class="col-sm-9">
										<textarea class="form-control" rows="3" id="deskripsi_3" name="deskripsi_3" placeholder="Deskripsi 3" required><?=$data->deskripsi_3?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="fakta_menarik" class="col-sm-3 control-label">Fakta Menarik :</label>
									<div class="col-sm-9">
										<textarea class="form-control" rows="3" id="fakta_menarik" name="fakta_menarik" placeholder="Fakta Menarik" required><?=$data->fakta_menarik?></textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-9">
										<button type="submit" class="btn btn-primary">Ubah data</button>
									</div>
								</div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
		function readimg(input,loc) {
			var files = input.files;
			for (var i = 0; i < files.length; i++) {
				var file = files[i];
				if (!file.type.match(/image.*/)) continue;
				var img = document.getElementById(loc);
				img.file = file;
				var reader = new FileReader();
				reader.onload = (function(aImg){return function(e){aImg.src = e.target.result;}})(img);
				reader.readAsDataURL(file);
			};
		}
	</script>
<?php include_once ADMIN_PATH.'/inc_foot.php'; ?>
