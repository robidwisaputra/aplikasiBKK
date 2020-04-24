<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$nisn 		= empty($siswa) ? null : $siswa->nisn;
$nama		= empty($siswa) ? null : $siswa->nama;
$jk			= empty($siswa) ? null : $siswa->jk;
$tahun_keluar			= empty($siswa) ? null : $siswa->tahun_keluar;
$status			= empty($siswa) ? null : $siswa->status;
$id_jurusan     = empty($siswa) ? null : $siswa->id_jurusan;
$alamat     = empty($siswa) ? null : $siswa->alamat;
$nohp     = empty($siswa) ? null : $siswa->nohp;
$perusahaan     = empty($siswa) ? null : $siswa->perusahaan;
$pendidikan     = empty($siswa) ? null : $siswa->pendidikan;
$perguruan_tinggi     = empty($siswa) ? null : $siswa->perguruan_tinggi;
$fakultas     = empty($siswa) ? null : $siswa->fakultas;
$foto		= empty($siswa) ? null : $siswa->foto;
?>

<form class="form-horizontal" action="" method="post" id="fform" enctype="multipart/form-data">
<div class="box box-primary">

  				<div class="box-header with-border">
					<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
				</div>
  				<div class="box-body">
				
						<?php 
						if($this->session->flashdata('alert')==null){						
						}else if($this->session->flashdata('alert')==1){
							echo "<div class='alert alert-info alert-dismissible'><i class='fa fa-check'></i> Data Berhasil Diproses <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button> </div>" ;
						}else if($this->session->flashdata('alert')!=1){
							echo "<div class='alert alert-danger alert-dismissible'><i class='fa fa-warning'></i> Data Tidak Berhasil Diproses <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button> </div>" ;
						}?>
				
				
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">NISN</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="nisn" value="<?php echo $nisn ?>" data-bv-trigger="blur" <?php if(!empty($nisn)){echo "readonly";} ?>>
                    </div>
                </div>
				
		
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Siswa</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="nama" value="<?php echo $nama ?>" data-bv-trigger="blur">
                    </div>
                </div>			
				
				 <div class="form-group">
				 <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin</label>	
				 <div class="col-sm-8">
                  <div class="radio">
                    <label>
                      <input type="radio" name="jk" value="L" <?php if($jk=='L'){echo "checked";} ?> checked>
                      Laki-laki
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="jk" value="P" <?php if($jk=='P'){echo "checked";} ?>>
                      Perempuan
                    </label>
                  </div>
				  </div>
                </div>
				

				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tahun Keluar</label>									
					<div class="col-sm-8">
                        <select class="form-control" name="tahun_keluar" data-bv-trigger="blur" id="cboprov">
							<option value="">- pilih Tahun -</option>
                            <?php 
									
									for($i=date('Y')-10;$i<=date('Y');$i++){
										if($i == $tahun_keluar) {
											echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
										} 
										else {
											echo '<option value="'.$i.'">'.$i.'</option>';
										}
									}
									?>
                        </select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Jurusan</label>									
					<div class="col-sm-8">
                        <select class="form-control" name="id_jurusan" data-bv-trigger="blur">
                            <option value="">- pilih Jurusan -</option>
                            <?php 
									foreach($data_jurusan as $row):
										if($row->id_jurusan == $id_jurusan) {
											echo '<option value="'.$row->id_jurusan.'" selected="selected">'.$row->nama_jurusan.'</option>';
										} 
										else {
											echo '<option value="'.$row->id_jurusan.'">'.$row->nama_jurusan.'</option>';
										}
									endforeach; 
									?>
                        </select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Status</label>									
					<div class="col-sm-8">
                        <select class="form-control" name="status" data-bv-trigger="blur">
                            <option value="">- pilih status -</option>
                            <option value="1" <?php if($status=='1'){echo "selected=selected";} ?>>Belum Bekerja</option>
                            <option value="2" <?php if($status=='2'){echo "selected=selected";} ?>>Bekerja</option>
							<option value="3" <?php if($status=='3'){echo "selected=selected";} ?>>Kuliah</option>
                            <option value="4" <?php if($status=='4'){echo "selected=selected";} ?>>Berwirausaha</option>
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
                    <label for="inputEmail3" class="col-sm-2 control-label">No HP</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="nohp" value="<?php echo $nohp ?>" data-bv-trigger="blur">
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Perusahaan Tempat Kerja</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="perusahaan" value="<?php echo $perusahaan ?>" data-bv-trigger="blur">
                    </div>
                </div>	
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Pendidikan Terakhir</label>									
					<div class="col-sm-8">
                        <select class="form-control" name="pendidikan" data-bv-trigger="blur">
                            <option value="">- pilih pendidikan -</option>
                            <option value="1" <?php if($pendidikan=='1'){echo "selected=selected";} ?>>SMK</option>
                            <option value="2" <?php if($pendidikan=='2'){echo "selected=selected";} ?>>D1</option>
							<option value="3" <?php if($pendidikan=='3'){echo "selected=selected";} ?>>D3</option>
                            <option value="4" <?php if($pendidikan=='4'){echo "selected=selected";} ?>>S1</option>
							<option value="5" <?php if($pendidikan=='5'){echo "selected=selected";} ?>>S2</option>
							<option value="6" <?php if($pendidikan=='6'){echo "selected=selected";} ?>>S3</option>
                        </select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Perguruan Tinggi</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="perguruan_tinggi" value="<?php echo $perguruan_tinggi ?>" data-bv-trigger="blur">
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Fakultas</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="fakultas" value="<?php echo $fakultas ?>" data-bv-trigger="blur">
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Foto</label>									
					<div class="col-sm-8">
						<input class="form-control" type="file" name="foto" value="<?php echo $foto ?>" data-bv-trigger="blur" id="image-source" onchange="previewImage();">
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Preview Foto</label>									
					<div class="col-sm-8">
						<?php if(!empty($foto)){?>
							<img id="image-preview" style="width:150px;height:160px;" src="<?php echo base_url();?>assets\images\alumni\<?=$foto?>" class="user-image" alt="image preview">
						<?php }else{ ?>
							<img id="image-preview" src="<?php echo base_url();?>assets\images\no_image.jpg" style="width:150px;height:160px;" alt="image preview" />
						<?php } ?>
						
                    </div>
                </div>
				
				
</div>
</form>			

<script type="text/javascript">
	function previewImage() {
    document.getElementById("image-preview").style.display = "block";
    var oFReader = new FileReader();
     oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("image-preview").src = oFREvent.target.result;
    };
  };
</script>

<script type="text/javascript">
$(document).ready(function() {  // Generate a simple captcha
    $('#fform').bootstrapValidator({
//        live: 'disabled',
        message: 'Data yang di input tidak sesuai ketentuan',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			nisn: {
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

			tahun_keluar: {
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
			id_jurusan: {
					validators: {
						notEmpty: {
							message: 'Data harus Dipilih',
						},						
					},
				},
			alamat: {
					validators: {
						notEmpty: {
							message: 'Data harus Diisi',
						},						
					},
				},
			nohp: {
					validators: {
						notEmpty: {
							message: 'Data harus Diisi',
						},						
					},
				},
			pendidikan: {
					validators: {
						notEmpty: {
							message: 'Data harus Dipilih',
						},						
					},
				},
			foto: {
					validators: {
                        file: {
                            extension: 'jpeg,jpg,png',
                            type: 'image/jpeg,image/png',
                            maxSize: 2097152,   // 2048 * 1024
                            message: 'Foto harus bertipe jpeg,jpg,png'
                        },
					},
				},
 
        }
    });

    // Validate the form manually
});
</script>				
