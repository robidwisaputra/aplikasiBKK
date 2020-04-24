<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$id 		= empty($jadwal) ? null : $jadwal->id_jadwal;
$id_loker			= empty($jadwal) ? null : $jadwal->id_loker;
$judul		= empty($jadwal) ? null : $jadwal->judul;
$id_prov			= empty($jadwal) ? null : $jadwal->lokasi_prov;
$id_kabkot			= empty($jadwal) ? null : $jadwal->lokasi_kabkot;	
$alamat			= empty($jadwal) ? null : $jadwal->lokasi_alamat;
$status			= empty($jadwal) ? null : $jadwal->status;
$tgl_mulai			= empty($jadwal) ? null : $jadwal->tgl_mulai;	
$tgl_selesai			= empty($jadwal) ? null : $jadwal->tgl_selesai;
?>

<form class="form-horizontal" action="" method="post" id="fform">
<div class="box box-primary">

  				<div class="box-header with-border">
					<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
                    <a href="<?php echo site_url('admin/jadwal/index');?>" class="btn btn-warning"><i class="glyphicon glyphicon-minus-sign"></i> Kembali</a>
				</div>
  				<div class="box-body">
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Lowongan Kerja</label>									
					<div class="col-sm-8">
                        <select class="form-control" name="id_loker" data-bv-trigger="blur">
							<option value="">- pilih Loker -</option>
                            <?php 
									foreach($loker as $row):
										if($row->id_loker == $id_loker) {
											echo '<option value="'.$row->id_loker.'" selected="selected">'.$row->nama.' | posisi sebagai: '.$row->judul.'</option>';
										} 
										else {
											echo '<option value="'.$row->id_loker.'">'.$row->nama.' | posisi sebagai : '.$row->judul.'</option>';
										}
									endforeach; 
									?>
                        </select>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Judul Test</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="text" name="judul" value="<?php echo $judul ?>" data-bv-trigger="blur">
                    </div>
                </div>	

				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Mulai</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="date" name="tgl_mulai" value="<?php echo $tgl_mulai ?>" data-bv-trigger="blur">
                    </div>
                </div>

				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Selesai</label>									
					<div class="col-sm-8">
                        <input class="form-control" type="date" name="tgl_selesai" value="<?php echo $tgl_selesai ?>" data-bv-trigger="blur">
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
                    <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>									
					<div class="col-sm-8">
                       <textarea class="form-control" name="alamat"  data-bv-trigger="blur" rows=5><?=$alamat;?></textarea>
                    </div>
                </div>		
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Status</label>									
					<div class="col-sm-8">
                        <select class="form-control" name="status" data-bv-trigger="blur">
                            <option value="">- pilih status -</option>
                            <option value="1" <?php if($status=='1'){echo "selected=selected";} ?>>Aktif</option>
                            <option value="2" <?php if($status=='2'){echo "selected=selected";} ?>>Tidak Aktif</option>
                        </select>
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
		
			judul: {
					validators: {
						notEmpty: {
							message: 'Data harus Dipilih',
						},						
					},
				},
			id_loker: {
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
			
			alamat: {
					validators: {
						notEmpty: {
							message: 'Data harus Dipilih',
						},						
					},
				},
			tgl_mulai: {
					validators: {
						notEmpty: {
							message: 'Data harus Diisi',
						},						
					},
				},
				
			tgl_selesai: {
					validators: {
						notEmpty: {
							message: 'Data harus Diisi',
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

<script type="text/javascript">
    $(function(){
        $("#cboprov").change(function(){   
			var cariisi=$("#cboprov").val();
            
            $.ajax({
                url:"<?php echo site_url('admin/jadwal/cari_isi_kabkot');?>",
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
