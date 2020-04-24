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
$id_loker		= empty($id_loker) ? null : $id_loker;
$id_pelamar		= empty($id_pelamar) ? null : $id_pelamar;
$nama_pendidikan		= empty($nama_pendidikan) ? null : $nama_pendidikan;
$nama_jurusan		= empty($nama_jurusan) ? null : $nama_jurusan;
?>

<form class="form-horizontal" action="" method="post" id="fform" enctype="multipart/form-data">
<div class="box box-primary">

  				<div class="box-header with-border">
					<button type="submit" name="simpan_pelamar" class="btn btn-info"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
                    <a href="<?php echo site_url('admin/pelamar');?>" class="btn btn-warning"><i class="glyphicon glyphicon-minus-sign"></i> Kembali</a>
				</div>
  				<div class="box-body">
				
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">NISN</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="nisn" value="<?php echo $nisn ?>" data-bv-trigger="blur" readonly>
                    </div>
                </div>
				
		
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Siswa</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="nama" value="<?php echo $nama ?>" data-bv-trigger="blur" readonly>
                    </div>
                </div>			
				
				 <div class="form-group">
				 <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin</label>	
				 <div class="col-sm-8">
                  <input class="form-control" type="text" name="jk" value="<?php echo $jk ?>" data-bv-trigger="blur" readonly>
				  </div>
                </div>
				

				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tahun Keluar</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="tahun_keluar" value="<?php echo $tahun_keluar ?>" data-bv-trigger="blur" readonly>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Jurusan</label>									
					<div class="col-sm-8">

                        
                            <?php 
									foreach($data_jurusan as $row):
										if($row->id_jurusan == $id_jurusan) {
											$nama_jurusan=$row->nama_jurusan;
										} 
									endforeach;
									?>
							<input class="form-control" type="text" name="namajurusan" value="<?php echo $nama_jurusan ?>" data-bv-trigger="blur" readonly>
                    </div>
                </div>
				
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>									
					<div class="col-sm-8">
                       <textarea class="form-control" name="alamat"  data-bv-trigger="blur" rows=5 readonly ><?=$alamat;?></textarea>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">No HP</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="nohp" value="<?php echo $nohp ?>" data-bv-trigger="blur" readonly>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Pendidikan Terakhir</label>									
					<div class="col-sm-8">
					
							<?php switch ($pendidikan){
								case 1: $nama_pendidikan='SMK';break;
								case 2: $nama_pendidikan='D1';break;
								case 3: $nama_pendidikan='D3';break;
								case 4: $nama_pendidikan='S1';break;
								case 5: $nama_pendidikan='S2';break;
								case 6: $nama_pendidikan='S3';break;
							} ?>
							<input class="form-control" type="text" name="pendidikan" value="<?php echo $nama_pendidikan ?>" data-bv-trigger="blur" readonly>
						                   
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Perguruan Tinggi</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="perguruan_tinggi" value="<?php echo $perguruan_tinggi ?>" data-bv-trigger="blur" readonly>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Fakultas</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="fakultas" value="<?php echo $fakultas ?>" data-bv-trigger="blur" readonly>
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
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Berkas File (.zip)</label>									
					<div class="col-sm-8">
						<input class="form-control" type="file" name="dokumen">
                    </div>
                </div>
				
				<input class="form-control" type="hidden" name="id_loker" value="<?php echo $id_loker ?>">
				<input class="form-control" type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
				<input class="form-control" type="hidden" name="proses" value="true">
</div>
</div>
</form>			

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
			
			dokumen: {
					validators: {
						notEmpty: {
                            message: 'Data Harus Diisi'
                        },
					},
				},
 
        }
    });

    // Validate the form manually
});
</script>				
