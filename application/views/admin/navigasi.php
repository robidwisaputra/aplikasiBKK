<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Header -->
<header class="main-header">
	<!-- Logo Kecil dan Besar-->
	<a href="#" class="logo">
		<span class="logo-mini"><b>BKK</b></span>
		<span class="logo-lg"><img style="width:40px;height:40px;" src="<?php echo base_url();?>assets\images\logo1.png" class="user-image" alt="Gambar Pengguna">  Aplikasi<b>BKK</b></span>
	</a>

	<!-- Navigasi Atas -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Navigasi Atas Kiri -->
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		
		<!-- Navigasi Atas Kanan -->
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<!--<li class="dropdown messages-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-book"></i>
						Dokumentasi
					</a>
				</li>-->

				<!-- Akun Pengguna -->
				<li><div class="fclock" style="font-weight:bold;color:white;margin-top:15px;margin-right:10px;padding-left:15px;border:solid 0px #fff"></div></li>
				
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url();?>assets\images\admin.png" class="user-image" alt="Gambar Pengguna">
						<span class="hidden-xs"><?php echo $this->session->userdata('username');?></span>
					</a>
					
					<ul class="dropdown-menu">
						<li class="user-header">
							<img src="<?php echo base_url();?>assets\images\admin.png" class="img-circle" alt="User Image">

							<p>
							<?php echo $this->session->userdata('username');?>
							</p>
						</li>

						<li class="user-footer">
							<div class="pull-left">
								<a href="<?php echo site_url('admin/user/edit_pass_pribadi/');?>" class="btn btn-default btn-flat"><i class="fa fa-lock"></i> Kata Sandi</a>
							</div>
							
							<div class="pull-right">
								<a href="<?php echo site_url('login/logout') ?>" class="btn btn-default btn-flat" data-confirm-keluar="Anda yakin akan keluar dari halaman ini?"><i class="fa fa-sign-out"></i> Keluar</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>