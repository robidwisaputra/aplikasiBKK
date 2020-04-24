<div class="box box-primary">

  				<div class="box-header with-border">
					<a href="<?php echo site_url('admin/affiliate/add_affiliate');?>" class="btn btn-info"><i class="glyphicon glyphicon-plus-sign"></i> Tambah</a>
					<a href="<?php echo site_url('admin/affiliate/import_affiliate');?>" class="btn btn-success"><i class="glyphicon glyphicon-import"></i> Import</a>
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
                            <th width="70">NPSN</th>
                            <th width="150px">Nama Sekolah</th>
							<th width="300">Alamat</th>
							<th width="50">No Telephone</th>
							<th width="50">Status</th>
                            <th width="100px">Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($affiliate as $row) :?>
                            <tr>
                                <td style="text-align:center;"><?php echo $i ?></td>
                                <td style="text-align:center;"><?php echo $row->npsn ?></td>
                                <td style="text-align:left;padding-left:50px"><?php echo $row->nama_sekolah?></td>
								<td style="text-align:center;"><?php echo $row->alamat ?></td>
								<td style="text-align:center;"><?php echo $row->notlp ?></td>
								<td style="text-align:center;">
								<?php if($row->status=='1'){
										echo "Bergabung";
									}else{
										echo "Proses Bergabung";
									} 
								?>								
								</td>
								<td style="text-align:center">
								<a href="<?php echo site_url('admin/affiliate/edit_affiliate/'.$row->id_affiliate);?>" data-toggle='tooltip' data-placement='top' title='Edit' ><i class='glyphicon glyphicon-edit' style='color: #00c0ef;'></i></a>
								  &nbsp;							 
								<a href="<?php echo site_url('admin/affiliate/delete_affiliate/'.$row->id_affiliate);?>" data-toggle="tooltip" data-placement='top' title='Delete' onclick="return confirm('Anda Yakin ?');"><i class='glyphicon glyphicon-trash' style='color: #dd4b39;'></i></i></a>                                  
								</td>
                              
                            </tr>
                        <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>