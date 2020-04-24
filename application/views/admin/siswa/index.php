<div class="box box-primary">

  				<div class="box-header with-border">
					<a href="<?php echo site_url('admin/siswa/add_siswa');?>" class="btn btn-info"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</a>
					<a href="<?php echo site_url('admin/siswa/import_siswa');?>" class="btn btn-success"><i class="glyphicon glyphicon-import"></i> Import</a>
				</div>
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
							<th width="70">FOTO</th>
                            <th width="70">NISN</th>
                            <th width="200px">Nama</th>
							<th width="50">JK</th>
							<th width="50">Tahun Keluar</th>
							<th width="50">Status</th>
                            <th width="100px">Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($siswa as $row) :?>
                            <tr>
                                <td style="text-align:center;"><?php echo $i ?></td>
								<td style="text-align:center;">
								<?php if(!empty($row->foto)){?>
									<img id="image-preview" style="width:150px;height:160px;" src="<?php echo base_url();?>assets\images\alumni\<?=$row->foto?>" class="user-image" alt="image preview">
								<?php }else{ ?>
									<img id="image-preview" src="<?php echo base_url();?>assets\images\no_image.jpg" style="width:150px;height:160px;" alt="image preview" />
								<?php } ?>
								</td>
                                <td style="text-align:center;"><?php echo $row->nisn ?></td>
                                <td style="text-align:left;padding-left:50px"><?php echo $row->nama ?></td>
								<td style="text-align:center;"><?php echo $row->jk ?></td>
								<td style="text-align:center;"><?php echo $row->tahun_keluar ?></td>
								<td style="text-align:left;">
								<?php 
								switch($row->status){
									case 1:echo "Belum Bekerja";break;
									case 2:echo "Bekerja";break;
									case 3:echo "Kuliah";break;
									case 4:echo "Berwirausaha";break;
								}
								?>		
								</td>
								<td style="text-align:center">
								<a href="<?php echo site_url('admin/siswa/edit_siswa/'.$row->nisn);?>" data-toggle='tooltip' data-placement='top' title='Edit' ><i class='glyphicon glyphicon-edit' style='color: #00c0ef;'></i></a>
								  &nbsp;							 
								<a href="<?php echo site_url('admin/siswa/delete_siswa/'.$row->nisn);?>" data-toggle="tooltip" data-placement='top' title='Delete' onclick="return confirm('Anda Yakin ?');"><i class='glyphicon glyphicon-trash' style='color: #dd4b39;'></i></i></a>                                  
								</td>
                              
                            </tr>
                        <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>