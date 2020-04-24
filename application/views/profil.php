<?php $this->load->view( 'carousel' ); ?>
<div class="col-sm-9">
        <div class="box box-default">
          <div class="box-header with-border">
            <h2 class="box-title"><b><?php echo $title; ?></b></h2>
          </div>
          <div class="box-body">
            <?php echo $profil; ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
</div>		
<?php $this->load->view( 'info' ); ?>