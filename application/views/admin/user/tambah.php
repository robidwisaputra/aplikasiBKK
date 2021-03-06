<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form class="form-horizontal" action="" method="post" id="fform">
<div class="box box-primary">

  				<div class="box-header with-border">
					<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
					<a href="<?php echo site_url('admin/user');?>" class="btn btn-warning"><i class="glyphicon glyphicon-minus-sign"></i> Batal</a>
				</div>
  				<div class="box-body">
				<?php 
						if($this->session->flashdata('alert')==null){
						}else if($this->session->flashdata('alert')==1){
							echo "<div class='alert alert-info alert-dismissible'><i class='fa fa-check'></i> Data Berhasil Diproses <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button> </div>" ;
						}else if($this->session->flashdata('alert')==2){
							echo "<div class='alert alert-danger alert-dismissible'><i class='fa fa-warning'></i> Password Tidak Sama <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button> </div>" ;
						}else if($this->session->flashdata('alert')==3){
							echo "<div class='alert alert-danger alert-dismissible'><i class='fa fa-warning'></i> Username sudah digunakan <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button> </div>" ;
						}else if($this->session->flashdata('alert')!=1){
							echo "<div class='alert alert-danger alert-dismissible'><i class='fa fa-warning'></i> Password Tidak Sama <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button> </div>" ;
						}
						?>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">User Name</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="username" data-bv-trigger="blur" >
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="password" name="password" data-bv-trigger="blur">
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Conform Password</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="password" name="cpassword" data-bv-trigger="blur">
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
			username: {
					validators: {
						notEmpty: {
							message: 'Username tidak boleh kosong',
						},
					stringLength: {
							min: 4,
							max: 20,
							message: 'username minimal 6 karakter sampai 20 karakter',
						},						
						regexp: {
							regexp: /^[a-zA-Z0-9]+$/,
							message: 'Username hanya boleh berisi huruf dan nomor',
						},		
					},
				},
				password: {
					validators: {
						callback: {
							callback: function(value, validator) {
								if (value.length < 8) {
									return {
										valid: false,
										message: 'Kata sandi tidak boleh kosong, minimal 8 karakter'
									}
								}

								if (value === value.toLowerCase()) {
									return {
										valid: false,
										message: 'Kata sandi harus ada karakter huruf besar, minimal 1 huruf'
									}
								}
								if (value === value.toUpperCase()) {
									return {
										valid: false,
										message: 'Kata sandi harus ada karakter huruf kecil, minimal 1 huruf'
									}
								}
								if (value.search(/[0-9]/) < 0) {
									return {
										valid: false,
										message: 'Kata sandi harus ada karakter angka, minimal 1 angka'
									}
								}
								if (value.search(/[$@!%*?&]/) < 0) {
									return {
										valid: false,
										message: 'Kata sandi harus ada simbol, minimal 1 simbol'
									}
								}

								return true;
							}
						},
					},
				},
				cpassword: {
					validators: {
						notEmpty: {
							message: 'Ulangi kata sandi tidak boleh kosong',
						},
						identical: {
							field: 'password',
							message: 'Ulangi kata sandi tidak sama dengan kata sandi',
						},
					},
				},
			
            
        }
    });

    // Validate the form manually
});
</script>	
