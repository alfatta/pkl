<?php if ( ! defined('SECRET_KEY')) exit('<pre>Error 404 : Page Not Found</pre>');
	if(!$user->isLogin()) header("Location:".getUrl(ADMIN_URL,'login'));

	$datas = $provinsi->getProvinsiList();

	include_once ADMIN_PATH.'/inc_head.php';
?>
		<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Provinsi</h1>
                </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar provinsi di Indonesia
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Provinsi</th>
                                        <th>Ibukota</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php while($data = $datas->fetch(PDO::FETCH_OBJ)) { ?>
                                    <tr class="<?= $data->id_provinsi%2==0 ? 'even':'odd';?>">
                                        <td><?= $data->id_provinsi;?></td>
                                        <td><?= $data->nama_provinsi;?></td>
                                        <td><?= $data->ibukota_provinsi;?></td>
                                        <td><a href="<?= getUrl(ADMIN_URL,'edit',$data->slug);?>"><i class="fa fa-edit fa-fw"></i> Ubah</a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include_once ADMIN_PATH.'/inc_foot.php'; ?>
