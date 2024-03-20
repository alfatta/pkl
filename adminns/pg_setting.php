<?php if ( ! defined('SECRET_KEY')) exit('<pre>Error 404 : Page Not Found</pre>');
	if(!$user->isLogin()) header("Location:".getUrl(ADMIN_URL,'login'));
	if (isset($_POST['realname']) && isset($_SESSION['username'])) {
		$data = array('username'=>$_POST['username'],'realname'=>$_POST['realname'],'password'=>$_POST['password']);
        if ($user->addUser($data)) {
            echo "<script>alert('Pengguna baru berhasil ditambahkan');window.location.href='".getUrl(ADMIN_URL,'setting')."';</script>";
        }else{
            echo "<script>alert('Pengguna baru gagal ditambahkan');window.location.href='".getUrl(ADMIN_URL,'setting')."';</script>";
        }
    }
    if (isset($_POST['password_lama']) && isset($_SESSION['username']) && $_POST['password_baru']==$_POST['re_password_baru']) {
    	if($user->ubahPassword($_SESSION['username'],$_POST['password_baru'],$_POST['password_lama'])){
            echo "<script>alert('Password berhasil diubah');window.location.href='".getUrl(ADMIN_URL,'setting')."';</script>";
        } else {
			echo "<script>alert('Password gagal diubah');window.location.href='".getUrl(ADMIN_URL,'setting')."';</script>";
		}
	}
	include_once ADMIN_PATH.'/inc_head.php';
?>
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pengaturan</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ubah Password
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="post">
                            	<div class="form-group">
									<label for="password_lama" class="col-sm-2 control-label">Password Lama :</label>
									<div class="col-sm-10">
										<input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="Password Lama" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="password_baru" class="col-sm-2 control-label">Password Baru :</label>
									<div class="col-sm-10">
										<input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Password Baru" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="re_password_baru" class="col-sm-2 control-label">Ulangi Password :</label>
									<div class="col-sm-10">
										<input type="password" class="form-control" id="re_password_baru" name="re_password_baru" placeholder="Ulangi Password" required="">
									</div>
								</div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Ubah Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tambah Pengguna
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="post">
	                            <div class="form-group">
									<label for="username" class="col-sm-2 control-label">Username :</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="username" name="username" placeholder="Username" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="col-sm-2 control-label">Password :</label>
									<div class="col-sm-10">
										<input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="realname" class="col-sm-2 control-label">Nama Lengkap :</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="realname" name="realname" placeholder="Nama Lengkap" required="">
									</div>
								</div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Tambah User</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include_once ADMIN_PATH.'/inc_foot.php'; ?>