<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Aplikasi BKK</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--basic styles-->   
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo1.png">       
		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" />

        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/open_sans.css" />

		<!--ace styles-->

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-skins.min.css" />

		<style>
			.defendLine {
				padding-top: 100px;
				padding-bottom: 5px;
				display:flex;
				justify-content: center;
				align-items: center;
				text-align:center;
			}
</style>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>

	<body class="login-layout" style="background-color: #008d4c">
		<div class="main-container container-fluid">
			<div class="main-content">
				<div class="row-fluid">
					<div class="span12" >
					<div class="row-fluid">
						 <center>
							<div class="row-fluid">
								<h1 class="white"><b>APLIKASI BURSA KERJA KHUSUS</b></h1><BR>
								<img style="width:200px;height:210px;" src="http://localhost/Laravelminimarket\public\assets\dist\img\market.png" class="user-image" alt="Gambar Pengguna">								<h2 class="white"><b>SMK NEGERI 1 CIANJUR</b></h2><BR>
							</div>
						</center>
					</div>		
					
						<div class="login-container">
							

							<div class="space-6"></div>

							<div class="row-fluid">
								<div class="position-relative">
									<div id="login-box" class="login-box visible widget-box no-border">
										<div class="widget-body" >
											<div class="widget-main">
												<h4 class="header blue lighter bigger">
													<i class="glyphicon glyphicon-login green"></i>
													Login
												</h4>

												<div class="space-2"></div>

												<form class="form-horizontal" role="form" action="<?php echo site_url('login/getLogin');?>" method="post">
                                    				<?php echo $this->session->flashdata('message');?>
													<fieldset >
														<label>
															<span class="block input-icon input-icon-right" style="width:290px;">
																<input type="text" class="form-control" placeholder="Username" name="username"/>
																<i class="glyphicon glyphicon-user"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right" style="width:290px;">
																<input type="password" class="form-control" placeholder="Password" name="password"/>
																<i class="glyphicon glyphicon-lock"></i>
															</span>
														</label>

														<div class="space"></div>

														<div class="clearfix">
															<button  class="width-100 pull-right btn btn-small btn-success">
																<i class="glyphicon glyphicon-lock"></i>
																Login
															</button>
															
																
														</div>

														<div class="space-4"></div>
													</fieldset>
												</form>

												
												
											</div><!--/widget-main-->
										</div><!--/widget-body-->
									</div><!--/login-box-->
								</div><!--/position-relative-->
							</div>
						</div>
					</div><!--/.span-->
				</div><!--/.row-fluid-->
			</div>
		</div><!--/.main-container-->


		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

	

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url() ?>assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		
		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo base_url() ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

		

		<script src="<?php echo base_url() ?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->

		<script type="text/javascript">
			function show_box(id) {
			 $('.widget-box.visible').removeClass('visible');
			 $('#'+id).addClass('visible');
			}
		</script>
	</body>
</html>
