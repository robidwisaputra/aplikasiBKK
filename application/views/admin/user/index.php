<div class="box box-primary">

  				<div class="box-header with-border">
					<a href="<?php echo site_url('admin/user/tambah');?>" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
				</div>
  				<div class="box-body">
				
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered fdatatables">
						<?php 
						if($this->session->flashdata('alert')==null){
							
						}else if($this->session->flashdata('alert')==1){
							echo "<div class='alert alert-info alert-dismissible'><i class='fa fa-check'></i> Data Berhasil Disimpan <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button> </div>" ;
						}else if($this->session->flashdata('alert')==2){
							echo "<div class='alert alert-info alert-dismissible'><i class='fa fa-check'></i> Password Berhasil Di Reset <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button> </div>" ;
						}else if($this->session->flashdata('alert')!=1){
							echo "<div class='alert alert-danger alert-dismissible'><i class='fa fa-warning'></i> Data Tidak Berhasil Disimpan <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button> </div>" ;
						}
						?>
						<thead>
					
                        
                        <tr>
                            <th width="30">No</th>
                            <th>Username</th>
                            <th>Hak Akses</th>
                            <th width="100">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=0; foreach($user as $row ): $no++;?>
						<tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td style="text-align:center;"><?php echo $row->username;?></td>
                        <td style="text-align:center;"><?php echo $row->hakakses;?></td>
                        <td align="center">
                            <a href="<?php echo site_url('admin/user/edit/'.$row->id);?>" data-toggle='tooltip' data-placement='top' title='Reset Password' onclick="return confirm('Anda Yakin ?');"><i class='glyphicon glyphicon-refresh' style='color: #00c0ef;'></i></a>
                            <a href="<?php echo site_url('admin/user/hapus/'.$row->id);?>" data-toggle="tooltip" data-placement='top' title='Delete' onclick="return confirm('Anda Yakin ?');"><i class='glyphicon glyphicon-trash' style='color: #dd4b39;'></i></i></a>       
                        </td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
