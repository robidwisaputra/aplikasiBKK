<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<html lang="id">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Aplikasi BKK</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo1.png">

		<link href="http://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo base_url();?>assets/css/bootstrap.datepicker.min.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo base_url();?>assets/css/bootstrap.validator.min.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo base_url();?>assets/css/awesome.min.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo base_url();?>assets/css/ionicons.min.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo base_url();?>assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo base_url();?>assets/css/AdminLTE.skin-green.min.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo base_url();?>assets/plugins/iCheck/all.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php echo base_url();?>assets/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
		<!--textarea rich text> -->
		<link href="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" media="all" />
		<!--[if lt IE 9]>
			<script src="<?php echo base_url();?>assets/js/html5shiv.js"></script>
			<script src="<?php echo base_url();?>assets/js/respond.js"></script>
		<![endif]-->
		
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-2.2.4.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.clock.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.datepicker.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.validator.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/adminlte.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/chart.js/Chart.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/tinymce/jquery.tinymce.min.js.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/tinymce/tinymce.min.js"></script>
		<!-- textarea rich text-->
		<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		
		
		<style>
				#i {
				color: #00c0ef;
				text-shadow: 1px 1px 1px #ccc;
				font-size: 1.5em;
				}
		</style>
		<?php //$this->load->view( 'admin/tpl_js' ); ?>
		<?php $this->load->view( 'admin/aplikasi_js' ); ?>
	</head>
	
	<body class="hold-transition skin-green sidebar-mini">
		<div class="wrapper">