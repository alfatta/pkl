<?php if ( ! defined('SECRET_KEY')) exit('<pre>Error 404 : Page Not Found</pre>');?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Website Edukasi Kementerian Lingkungan Hidup dan Kehutanan">
    <meta name="author" content="Kementerian Lingkungan Hidup dan Kehutanan">
    <title>Website Edukasi Kementerian Lingkungan Hidup dan Kehutanan</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- <meta http-equiv="refresh" content="1" /> -->
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Website Edukasi Kementerian Lingkungan Hidup dan Kehutanan</a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?=$_SESSION['realname']?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="<?= getUrl(ADMIN_URL,'setting');?>">
                                <i class="fa fa-gear fa-fw"></i> Pengaturan
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?= getUrl(ADMIN_URL,'logout');?>">
                                <i class="fa fa-sign-out fa-fw"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?= getUrl(ADMIN_URL);?>"><i class="fa fa-file-text-o fa-fw"></i> Data Provinsi</a>
                        </li>
                        <li class="divider"></li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?= getUrl(ADMIN_URL,'setting');?>"><i class="fa fa-gear fa-fw"></i> Pengaturan</a>
                        </li>
                        <li>
                            <a href="<?= getUrl(ADMIN_URL,'logout');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
