<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$id 		= empty($industri) ? null : $industri->id_industri;
$nama		= empty($industri) ? null : $industri->nama;
$id_prov			= empty($industri) ? null : $industri->id_prov;
$id_kabkot			= empty($industri) ? null : $industri->id_kabkot;	
$id_bidang			= empty($industri) ? null : $industri->id_bidang;
$alamat			= empty($industri) ? null : $industri->alamat;
$notlp			= empty($industri) ? null : $industri->notlp;
$nohp			= empty($industri) ? null : $industri->nohp;	
$email			= empty($industri) ? null : $industri->email;
?>

<form class="form-horizontal" action="" method="post" id="fform">
<div class="box box-primary">

  				<div class="box-header with-border">
					<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
                    <a href="<?php echo site_url('admin/industri/index');?>" class="btn btn-warning"><i class="glyphicon glyphicon-minus-sign"></i> Kembali</a>
				</div>
  				<div class="box-body">
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Industri</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="nama" value="<?php echo $nama ?>" data-bv-trigger="blur">
                    </div>
                </div>			
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Provinsi</label>									
					<div class="col-sm-8">
                        <select class="form-control" name="id_prov" data-bv-trigger="blur" id="cboprov">
							<option value="">- pilih Provinsi -</option>
                            <?php 
									foreach($prov as $row):
										if($row->id_prov == $id_prov) {
											echo '<option value="'.$row->id_prov.'" selected="selected">'.$row->nama_prov.'</option>';
										} 
										else {
											echo '<option value="'.$row->id_prov.'">'.$row->nama_prov.'</option>';
										}
									endforeach; 
									?>
                        </select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Kabupaten</label>									
					<div class="col-sm-8">
                        <select class="form-control" name="id_kabkot" data-bv-trigger="blur" id="cbokabkot">
                            <?php if(empty($id_kabkot)){
								echo "<option value=''>- pilih Provinsi Terlebih Dahulu -</option>";
							}else{
									foreach($kabkot as $row):
										if($row->id_kabkot == $id_kabkot) {
											echo '<option value="'.$row->id_kabkot.'" selected="selected">'.$row->nama_kabkot.'</option>';
										} 
										else {
											echo '<option value="'.$row->id_kabkot.'">'.$row->nama_kabkot.'</option>';
										}
									endforeach; 								
							}
							?>                 
                        </select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Bidang</label>									
					<div class="col-sm-8">
                        <select class="form-control" name="id_bidang" data-bv-trigger="blur">
                            <option value="">- pilih Bidang -</option>
                            <?php 
									foreach($bidang as $row):
										if($row->id_bidang == $id_bidang) {
											echo '<option value="'.$row->id_bidang.'" selected="selected">'.$row->nama_bidang.'</option>';
										} 
										else {
											echo '<option value="'.$row->id_bidang.'">'.$row->nama_bidang.'</option>';
										}
									endforeach; 
									?>
                        </select>
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
                    <label for="inputEmail3" class="col-sm-2 control-label">No HP</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="nohp" value="<?php echo $nohp ?>" data-bv-trigger="blur">
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="email" value="<?php echo $email ?>" data-bv-trigger="blur">
                    </div>
                </div>
				
				<input class="form-control" type="hidden" name="id" value="<?php echo $id ?>">
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
		
			nama: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
			id_prov: {
					validators: {
						notEmpty: {
							message: 'Data harus Dipilih',
						},						
					},
				},
			id_kabkot: {
					validators: {
						notEmpty: {
							message: 'Data harus Dipilih',
						},						
					},
				},
			id_bidang: {
					validators: {
						notEmpty: {
							message: 'Data harus Dipilih',
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
			nohp: {
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
				
 
        }
    });

    // Validate the form manually
});
</script>

<script type="text/javascript">
    $(function(){
        $("#cboprov").change(function(){   
			var cariisi=$("#cboprov").val();
            
            $.ajax({
                url:"<?php echo site_url('admin/industri/cari_isi_kabkot');?>",
                type:"POST",
                data:"cariisi="+cariisi,
                cache:false,
                success:function(html){
                    $("#cbokabkot").html(html);
                }
            })
        })
        
    })
</script>				
