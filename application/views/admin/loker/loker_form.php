<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$id 		= empty($loker) ? null : $loker->id_loker;
$id_industri		= empty($loker) ? null : $loker->id_industri;
$judul		= empty($loker) ? null : $loker->judul;
$deskripsi		= empty($loker) ? null : $loker->deskripsi;	
$gaji		= empty($loker) ? null : $loker->gaji;
$tgl_buka		= empty($loker) ? null : $loker->tgl_buka;
$tgl_tutup	= empty($loker) ? null : $loker->tgl_tutup;
$tujuan		= empty($loker) ? null : $loker->tujuan;
$id_prov		= empty($loker) ? null : $loker->id_prov;	
$kategori_jk		= empty($loker) ? null : $loker->kategori_jk;
$kategori_jumlah		= empty($loker) ? null : $loker->kategori_jumlah;
$kategori_tinggi_badan		= empty($loker) ? null : $loker->kategori_tinggi_badan;
$kategori_berat_badan		= empty($loker) ? null : $loker->kategori_berat_badan;
$kategori_umur		= empty($loker) ? null : $loker->kategori_umur;
$kategori_lowongan		= empty($loker) ? null : $loker->kategori_lowongan;
$kategori_jurusan		= empty($loker) ? null : $loker->kategori_jurusan;
$status		= empty($loker) ? null : $loker->status;

?>

<form class="form-horizontal" action="" method="post" id="fform">
<div class="box box-primary">

  				<div class="box-header with-border">
					<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
                    <a href="<?php echo site_url('admin/loker/index');?>" class="btn btn-warning"><i class="glyphicon glyphicon-minus-sign"></i> Kembali</a>
				</div>
  				<div class="box-body">
				
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nama Industri</label>									
					<div class="col-sm-8">
                        <select class="form-control" name="id_industri" data-bv-trigger="blur">
							<option value="">- pilih Industri -</option>
                            <?php 
									foreach($industri as $row):
										if($row->id_industri == $id_industri) {
											echo '<option value="'.$row->id_industri.'" selected="selected">'.$row->nama.'</option>';
										} 
										else {
											echo '<option value="'.$row->id_industri.'">'.$row->nama.'</option>';
										}
									endforeach; 
									?>
                        </select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Judul Lowongan</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="judul" value="<?php echo $judul ?>" data-bv-trigger="blur">
                    </div>
                </div>

				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi</label>									
					<div class="col-sm-8">
                       <textarea class="form-control" name="deskripsi"  data-bv-trigger="blur" rows=10><?=$deskripsi;?></textarea>
                    </div>
                </div>	

				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Gaji</label>									
					<div class="col-sm-8">
                        <select class="form-control" name="gaji" data-bv-trigger="blur">
                            <option value="">- pilih gaji -</option>
                            <option value="1" <?php if($gaji=='1'){echo "selected=selected";} ?>><?php echo "< 1.000.000"; ?></option>
                            <option value="2" <?php if($gaji=='2'){echo "selected=selected";} ?>><?php echo "1.000.000 s/d 2.000.000"; ?></option>
							<option value="3" <?php if($gaji=='3'){echo "selected=selected";} ?>><?php echo "2.000.000 s/d 3.000.000"; ?></option>
                            <option value="4" <?php if($gaji=='4'){echo "selected=selected";} ?>><?php echo "3.000.000 s/d 5.000.000"; ?></option>
							<option value="5" <?php if($gaji=='5'){echo "selected=selected";} ?>><?php echo "> 5.000.000"; ?></option>
                        </select>
                    </div>
                </div>				
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Dibuka</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="date" name="tgl_buka" value="<?php echo $tgl_buka ?>" data-bv-trigger="blur">
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Ditutup</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="date" name="tgl_tutup" value="<?php echo $tgl_tutup ?>" data-bv-trigger="blur">
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Lowongan Tujuan</label>									
					<div class="col-sm-8">
                        <select class="form-control" name="tujuan" data-bv-trigger="blur">
                            <option value="">- pilih tujuan -</option>
                            <option value="1" <?php if($tujuan=='1'){echo "selected=selected";} ?>><?php echo "Umum"; ?></option>
                            <option value="2" <?php if($tujuan=='2'){echo "selected=selected";} ?>><?php echo "BKK sekolah"; ?></option>
                        </select>
                    </div>
                </div>			
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Provinsi</label>									
					<div class="col-sm-8">
                        <select class="form-control" name="id_prov" data-bv-trigger="blur">
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
                    <label for="inputEmail3" class="col-sm-2 control-label">Kategori Jenis Kelamin</label>									
					<div class="col-sm-8">
                        <select class="form-control" name="kategori_jk" data-bv-trigger="blur">
                            <option value="">- pilih kategori jenis kelamin -</option>
                            <option value="1" <?php if($kategori_jk=='1'){echo "selected=selected";} ?>><?php echo "Semua"; ?></option>
                            <option value="2" <?php if($kategori_jk=='2'){echo "selected=selected";} ?>><?php echo "Laki-laki"; ?></option>
							<option value="3" <?php if($kategori_jk=='3'){echo "selected=selected";} ?>><?php echo "Perempuan"; ?></option>
                        </select>
                    </div>
                </div>			
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Kategori Jumlah</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="kategori_jumlah" value="<?php echo $kategori_jumlah ?>" data-bv-trigger="blur">
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Kategori Tinggi Badan</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="kategori_tinggi_badan" value="<?php echo $kategori_tinggi_badan ?>" data-bv-trigger="blur">
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Kategori Berat Badan</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="kategori_berat_badan" value="<?php echo $kategori_berat_badan ?>" data-bv-trigger="blur">
                    </div>
                </div>
				
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Kategori Umur</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="kategori_umur" value="<?php echo $kategori_umur ?>" data-bv-trigger="blur">
                    </div>
                </div>
				
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Kategori Lowongan</label>									
					<div class="col-sm-8">
                        <select class="form-control" name="kategori_lowongan" data-bv-trigger="blur">
							<option value="">- pilih Kategori Lowongan -</option>
                            <?php 
									foreach($bidang as $row):
										if($row->id_bidang == $kategori_lowongan) {
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
                    <label for="inputEmail3" class="col-sm-2 control-label">Kategori Jurusan</label>									
					<div class="col-sm-8">
                        <select class="form-control" name="kategori_jurusan" data-bv-trigger="blur">
							<option value="">- pilih jurusan -</option>
                            <?php 
									foreach($jurusan as $row):
										if($row->id_jurusan == $kategori_jurusan) {
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
                            <option value="1" <?php if($status=='1'){echo "selected=selected";} ?>><?php echo "Aktif"; ?></option>
                            <option value="2" <?php if($status=='2'){echo "selected=selected";} ?>><?php echo "Tidak Aktif"; ?></option>
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
			id_industri: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},					
					},
				},
			judul: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
			deskripsi: {
					validators: {
						notEmpty: {
							message: 'Data harus Dipilih',
						},						
					},
				},
			gaji: {
					validators: {
						notEmpty: {
							message: 'Data harus Dipilih',
						},						
					},
				},
			tgl_buka: {
					validators: {
						notEmpty: {
							message: 'Data harus Dipilih',
						},

					},
				},
			tgl_tutup: {
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
				
			tujuan: {
				validators: {
					notEmpty: {
						message: 'Data harus Dipilih',
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
			
			kategori_jk: {
				validators: {
					notEmpty: {
						message: 'Data harus Dipilih',
						},						
					},
				},
			
			kategori_jumlah: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},	
						regexp: {
							regexp: /^[0-9]+$/,
							message: 'Hanya boleh berisi nomor',
						},						
					},
				},
				
			kategori_tinggi_badan: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},	
						regexp: {
							regexp: /^[0-9]+$/,
							message: 'Hanya boleh berisi nomor',
						},						
					},
				},
				
			kategori_berat_badan: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},	
						regexp: {
							regexp: /^[0-9]+$/,
							message: 'Hanya boleh berisi nomor',
						},						
					},
				},
			
			kategori_umur: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},	
						regexp: {
							regexp: /^[0-9]+$/,
							message: 'Hanya boleh berisi nomor',
						},						
					},
				},
			kategori_lowongan: {
				validators: {
					notEmpty: {
						message: 'Data harus Dipilih',
						},						
					},
				},
			kategori_jurusan: {
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
