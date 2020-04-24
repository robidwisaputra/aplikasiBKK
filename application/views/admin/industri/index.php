<div class="box box-primary">

  				<div class="box-header with-border">
					<a href="<?php echo site_url('admin/industri/add_industri');?>" class="btn btn-info"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</a>
					<a href="<?php echo site_url('admin/industri/import_Industri');?>" class="btn btn-success"><i class="glyphicon glyphicon-import"></i> Import</a>
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
                            <th width="200px">Nama</th>
							<th width="50">Provinsi</th>
							<th width="50">Kabupaten</th>
							<th width="50">Bidang</th>
							<th width="50">No TLP</th>
							<th width="50">Email</th>
                            <th width="100px">Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($industri as $row) :?>
                            <tr>
                                <td style="text-align:center;"><?php echo $i ?></td>
                                <td style="text-align:center;"><?php echo $row->nama ?></td>
                                <td style="text-align:left;padding-left:50px"><?php echo $row->nama_prov ?></td>
								<td style="text-align:center;"><?php echo $row->nama_kabkot ?></td>
								<td style="text-align:center;"><?php echo $row->nama_bidang ?></td>
								<td style="text-align:center;"><?php echo $row->notlp ?></td>
								<td style="text-align:center;"><?php echo $row->email ?></td>
								<td style="text-align:center">
								<a href="<?php echo site_url('admin/industri/edit_industri/'.$row->id_industri);?>" data-toggle='tooltip' data-placement='top' title='Edit' ><i class='glyphicon glyphicon-edit' style='color: #00c0ef;'></i></a>
								  &nbsp;							 
								<a href="<?php echo site_url('admin/industri/delete_industri/'.$row->id_industri);?>" data-toggle="tooltip" data-placement='top' title='Delete' onclick="return confirm('Anda Yakin ?');"><i class='glyphicon glyphicon-trash' style='color: #dd4b39;'></i></i></a>                                  
								</td>
                              
                            </tr>
                        <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>