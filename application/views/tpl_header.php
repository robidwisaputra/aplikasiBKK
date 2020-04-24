<html>
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
		
		
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
		<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url() ?>assets/web/assets/jquery/jquery.min.js"></script>
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
		<style>
				#i {
				color: #00c0ef;
				text-shadow: 1px 1px 1px #ccc;
				font-size: 1.5em;
				}
		</style>
		
		<!-- bootstrap carousel online
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		-->
		
		<!-- bootstrap carousel offline -->
		<link href="<?php echo base_url();?>assets/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
		<script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/jquery.min.js"></script>
		
</head>

<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
			<a href="#" class="logo">
				<span class="logo-mini"><b>BKK</b></span>
				<span class="logo-lg"><img style="width:40px;height:40px;" src="<?php echo base_url();?>assets\images\logo1.png" class="user-image" alt="Gambar Pengguna">  Aplikasi<b>BKK</b></span>
			</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        
		<?php $this->load->view( 'tpl_navigasi' ); ?>
		
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <a href="<?php echo site_url('login');?>" class="form-control"><i class="glyphicon glyphicon-lock"></i> login</a>
            </div>
          </form>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>