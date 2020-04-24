<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<?php $this->load->view( 'admin/tpl_header' ); ?>

	<?php $this->load->view( 'admin/navigasi' ); ?>
	
	<?php $this->load->view( 'admin/sidebar_left' ); ?>

		<!-- Content -->
		<div class="content-wrapper">
    <!-- Content Header (Page header) -->
			<section class="content-header">
			  <h1>
				<?php echo $title ;?>
			  </h1>
			  <ol class="breadcrumb">
				<li><a href="<?php echo site_url('admin/dashboard/');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active"><?php echo $title ;?></li>
			  </ol>
			</section>

			<!-- Isi -->
			<section class="content container-fluid fcontent">
				<?php $this->load->view( $file ); ?>
			</section>
		</div>

	<?php $this->load->view( 'admin/sidebar_bottom' ); ?>
		
<?php $this->load->view( 'admin/tpl_footer' ); ?>