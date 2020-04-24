<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$id 		= empty($affiliate) ? null : $affiliate->id_affiliate;
$npsn		= empty($affiliate) ? null : $affiliate->npsn;
$nama		= empty($affiliate) ? null : $affiliate->nama_sekolah;
$alamat		= empty($affiliate) ? null : $affiliate->alamat;	
$notlp		= empty($affiliate) ? null : $affiliate->notlp;
$email		= empty($affiliate) ? null : $affiliate->email;
$website	= empty($affiliate) ? null : $affiliate->website;
$status		= empty($affiliate) ? null : $affiliate->status;	
?>

<form class="form-horizontal" action="" method="post" id="fform">
<div class="box box-primary">

  				<div class="box-header with-border">
					<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
                    <a href="<?php echo site_url('admin/affiliate/index');?>" class="btn btn-warning"><i class="glyphicon glyphicon-minus-sign"></i> Kembali</a>
				</div>
  				<div class="box-body">
				
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">NPSN</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="npsn" value="<?php echo $npsn ?>" data-bv-trigger="blur">
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Sekolah</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="nama" value="<?php echo $nama ?>" data-bv-trigger="blur">
                    </div>
                </div>


				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>									
					<div class="col-sm-8">
                       <textarea class="form-control" name="alamat"  data-bv-trigger="blur" rows=5><?=$alamat;?></textarea>
                    </div>
                </div>				
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">No Telephon</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="notlp" value="<?php echo $notlp ?>" data-bv-trigger="blur">
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="email" value="<?php echo $email ?>" data-bv-trigger="blur">
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">WebSite</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="website" value="<?php echo $website ?>" data-bv-trigger="blur">
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Status</label>									
					<div class="col-sm-8">
                        <select class="form-control" name="status" data-bv-trigger="blur">
                            <option value="">- pilih nilai -</option>
                            <option value="1" <?php if($status=='1'){echo "selected=selected";} ?>>Bergabung</option>
                            <option value="2" <?php if($status=='2'){echo "selected=selected";} ?>>Proses Bergabung</option>
                        </select>
                    </div>
                </div>
				
				<input class="form-control" type="hidden" name="id" value="<?php echo $id ?>" data-bv-trigger="blur">
				
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
			npsn: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},					
					},
				},
			nama: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
			alamat: {
					validators: {
						notEmpty: {
							message: 'Data harus Dipilih',
						},						
					},
				},
			notlp: {
					validators: {
						notEmpty: {
							message: 'Data harus Dipilih',
						},	
						regexp: {
							regexp: /^[0-9]+$/,
							message: 'Hanya boleh berisi nomor',
						},						
					},
				},
			email: {
					validators: {
						notEmpty: {
							message: 'Data harus Dipilih',
						},
						emailAddress: {
							message: 'Harus diisi alamat email'
						},
					},
				},
			website: {
					validators: {
						notEmpty: {
							message: 'Data harus Dipilih',
						},						
					},
				},
			status: {
					validators: {
						notEmpty: {
							message: 'Data harus Dipilih',
						},						
					},
				},
			
			
 
        }
    });

    // Validate the form manually
});
</script>				
