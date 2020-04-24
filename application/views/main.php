<!DOCTYPE html>

<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<?php $this->load->view( 'tpl_header' ); ?>

  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
	  
	  <section class="content container-fluid fcontent">
				<?php $this->load->view( $file ); ?>
	  </section>
	  

      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php $this->load->view( 'tpl_footer' ); ?>
  
  
  
