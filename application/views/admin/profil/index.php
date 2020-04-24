<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$profil 		= empty($profil) ? null : $profil;
?>

<form class="form-horizontal" action="" method="post" id="fform">
<div class="box box-primary">

  				<div class="box-header with-border">
					<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
                    <a href="<?php echo site_url('admin/dashboard');?>" class="btn btn-warning"><i class="glyphicon glyphicon-minus-sign"></i> Batal</a>
				</div>
  				<div class="box-body">
				
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Profil</label>									
					<div class="col-sm-8">
                       <textarea id="richtext" class="form-control" name="profil"  data-bv-trigger="blur" rows=20 richtext><?=$profil;?></textarea>
                    </div>
                </div>
			
				
				
</div>
</form>			
<script type="text/javascript">
$(document).ready(function() {
    // Generate a simple captcha
    $('#fform').bootstrapValidator({
//        live: 'disabled',
        message: 'Data yang di input tidak sesuai ketentuan',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			profil: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},					
					},
				},

        }
    });

    // Validate the form manually
});
</script>				
<script>
  $(function () {
    //bootstrap WYSIHTML5 - text editor
    $("#richtext").wysihtml5();
  });
</script>