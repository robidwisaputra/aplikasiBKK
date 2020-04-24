<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$id_loker 		= empty($loker) ? null : $loker->id_loker;
$nama		= empty($loker) ? null : $loker->nama;
$judul		= empty($loker) ? null : $loker->judul;	
$tgl_buka		= empty($loker) ? null : $loker->tgl_buka;
$tgl_tutup	= empty($loker) ? null : $loker->tgl_tutup;
$tujuan		= empty($loker) ? null : $loker->tujuan;


?>

<div class="box box-default box-solid">
  				<div class="box-header with-border">
				<h3 class="box-title">Data Lowongan Kerja</h3>
                    <a href="<?php echo site_url('admin/pelamar/add_pelamar/'.$id_loker);?>" class="btn btn-info pull-right"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
				</div>
  				<div class="box-body">
				
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-5 control-label">Nama Industri</label>									
					<div class="col-sm-5">
                        <label class="control-label"><?php echo ": ".$nama; ?></label>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-5 control-label">Judul Lowongan</label>									
					<div class="col-sm-5">
                        <label class="control-label"><?php echo ": ".$judul; ?></label>
                    </div>
                </div>

				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-5 control-label">Tanggal Buka</label>									
					<div class="col-sm-5">
                        <label class="control-label"><?php echo ": ".$tgl_buka; ?></label>
                    </div>
                </div>
				
				<div class="form-group">
                    <label for="inputEmail3" class="col-sm-5 control-label">Tanggal Tutup</label>									
					<div class="col-sm-5">
                        <label class="control-label"><?php echo ": ".$tgl_tutup; ?></label>
                    </div>
                </div>				
		</div>
</div>
				
				 <div class="box box-default box-solid">
									<div class="box-header with-border">
									  <h3 class="box-title">Daftar Pelamar</h3>
									  <!-- /.box-tools -->
									</div>
									<!-- /.box-header -->
									<div class="box-body">
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered fdatatables">
						<?php 
						if($this->session->flashdata('alert')==null){						
						}else if($this->session->flashdata('alert')==1){
							echo "<div class='alert alert-info alert-dismissible'><i class='fa fa-check'></i> Data Berhasil Diproses <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button> </div>" ;
						}else if($this->session->flashdata('alert')!=1){
							echo "<div class='alert alert-danger alert-dismissible'><i class='fa fa-warning'></i> Data Tidak Berhasil Diproses <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button> </div>" ;
						}?>
						<thead>
                        <tr>
                            <th width="40px">No</th>
							<th width="50px">FOTO</th>
                            <th width="50px">NISN</th>
							<th width="100">Nama Pelamar</th>
							<th width="50">Jenis Kelamin</th>
							<th width="50">Tanggal Daftar</th>
							<th width="50">Dokumen</th>
							<th width="50">Status</th>
                            <th width="100px">Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($pelamar as $row) :?>
                            <tr>
                                <td style="text-align:center;"><?php echo $i ?></td>
								<td style="text-align:center;">
                                <?php if(!empty($row->foto)){?>
									<img id="image-preview" style="width:150px;height:160px;" src="<?php echo base_url();?>assets\images\alumni\<?=$row->foto?>" class="user-image" alt="image preview">
								<?php }else{ ?>
									<img id="image-preview" src="<?php echo base_url();?>assets\images\no_image.jpg" style="width:150px;height:160px;" alt="image preview" />
								<?php } ?>
								<td style="text-align:center;"><?php echo $row->nisn ?></td>
                                <td style="text-align:left;padding-left:50px"><?php echo $row->nama ?></td>
								<td style="text-align:center;"><?php echo $row->jk ?></td>
								<td style="text-align:center;"><?php echo $row->tanggal_daftar ?></td>
								<td style="text-align:center;">
								
								<?php if(!empty($row->dokumen)){ ?>
									<a href="<?php echo base_url();?>assets/files/alumni/<?=$row->dokumen?>" data-toggle='tooltip' data-placement='top' title='Download Dokumen' ><i class='glyphicon glyphicon-download' style='color: #00c0ef;'></i> Download</a>
								<?php }else{ ?>
									<a href="#" data-toggle='tooltip' data-placement='top' style='color: #dd4b39;' title='Download Dokumen' ><i class='glyphicon glyphicon-download' style='color: #dd4b39;'></i> Tidak Tersedia</a>
								<?php } ?>
								
								
								</td>
								<td style="text-align:center;">
								<?php switch($row->status_pelamar){
									case 1:echo "<font color='orange'>Diproses</font> ";break;
									case 2:echo "<font color='#00c0ef'>Diterima</font> ";break;
									case 3:echo "<font color='#dd4b39'>Ditolak</font> ";break;
								} ?>
								
								
								</td>
								<td style="text-align:center">							          
								<?=form_open('admin/pelamar/edit_dokumen', array('role'=>'form', 'class'=>'inline'))?>
									<input type="hidden" name="id_pelamar" value="<?=$row->id_pelamar?>">
									<input type="hidden" name="id_loker" value="<?=$id_loker?>">
									<input type="hidden" name="nisn" value="<?=$row->nisn?>">
									<button type="submit" name="edit_pelamar" class="btn btn-sm" data-placement='top' title='Upload Dokumen'>
										<i class="glyphicon glyphicon-upload" style='color: #00c0ef;'></i>
									</button>
								<?=form_close()?>
								
								<?=form_open('admin/pelamar/edit_status', array('role'=>'form', 'class'=>'inline'))?>
									<input type="hidden" name="id_pelamar" value="<?=$row->id_pelamar?>">
									<input type="hidden" name="id_loker" value="<?=$id_loker?>">
									<input type="hidden" name="nisn" value="<?=$row->nisn?>">
									<button type="submit" name="edit_pelamar" class="btn btn-sm" data-placement='top' title='Edit status'>
										<i class="glyphicon glyphicon-edit" style='color: #00c0ef;'></i>
									</button>
								<?=form_close()?>
								
								<?=form_open('admin/pelamar/delete_pelamar', array('role'=>'form', 'class'=>'inline'))?>
									<input type="hidden" name="id_pelamar" value="<?=$row->id_pelamar?>">
									<input type="hidden" name="id_loker" value="<?=$id_loker?>">
									<button type="submit" class="btn btn-sm" onclick="return confirm('Anda Yakin ?');">
										<i class="glyphicon glyphicon-trash" style='color: #00c0ef;'></i>
									</button>
								<?=form_close()?>
							</td>
                              
                            </tr>
                        <?php $i++; endforeach; ?>
                    </tbody>
                </table>
									</div>
									<!-- /.box-body -->
								  
</div>		
			
