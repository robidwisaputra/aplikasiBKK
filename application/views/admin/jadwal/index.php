<div class="box box-primary">

  				<div class="box-header with-border">
					<a href="<?php echo site_url('admin/jadwal/add_jadwal');?>" class="btn btn-info"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</a>
					
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
                            <th width="200px">Judul Test</th>
							<th width="50">Judul Loker</th>
							<th width="50">Mulai Test</th>
							<th width="50">Selesai Test</th>
							<th width="50">Status</th>
                            <th width="100px">Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($jadwal as $row) :?>
                            <tr>
                                <td style="text-align:center;"><?php echo $i ?></td>
                                <td style="text-align:center;"><?php echo $row->judul_test ?></td>
                                <td style="text-align:left;padding-left:50px"><?php echo $row->judul_loker ?></td>
								<td style="text-align:center;"><?php echo $row->tgl_mulai ?></td>
								<td style="text-align:center;"><?php echo $row->tgl_selesai ?></td>
								<td style="text-align:center;">
								<?php switch($row->status){
									case 1:echo "<font color='#00c0ef'>Aktif</font> ";break;
									case 2:echo "<font color='#dd4b39'>Tidak Aktif</font> ";break;
								} ?>
								</td>
								<td style="text-align:center">
								<a href="<?php echo site_url('admin/jadwal/edit_jadwal/'.$row->id_jadwal);?>" data-toggle='tooltip' data-placement='top' title='Edit' ><i class='glyphicon glyphicon-edit' style='color: #00c0ef;'></i></a>
								  &nbsp;							 
								<a href="<?php echo site_url('admin/jadwal/delete_jadwal/'.$row->id_jadwal);?>" data-toggle="tooltip" data-placement='top' title='Delete' onclick="return confirm('Anda Yakin ?');"><i class='glyphicon glyphicon-trash' style='color: #dd4b39;'></i></i></a>                                  
								</td>
                              
                            </tr>
                        <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>