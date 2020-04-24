<div class="box box-primary">

  				<div class="box-header with-border">
					<a href="<?php echo site_url('admin/proses/add_rules');?>" class="btn btn-info"><i class="glyphicon glyphicon-plus-sign"></i> Buat Rules</a>
					<a href="<?php echo site_url('admin/proses/delete_rules');?>" class="btn btn-info" data-toggle="tooltip" data-placement='top' title='Delete' onclick="return confirm('Anda Yakin ?');"><i class='glyphicon glyphicon-trash'></i> Hapus Rules</a>
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
							<th width="40px">Id Rules</th>
                            <th width="300px">Parent</th>
                            <th width="50px">Akar</th>
							<th width="50px">Keputusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($rules as $row) :?>
                            <tr>
                                <td style="text-align:center;"><?php echo $row->id ?></td>
                                <td style="text-align:left;padding-left:50px"><?php echo $row->parent ?></td>
								<td style="text-align:center;"><?php echo $row->akar ?></td>
								<td style="text-align:center;"><?php echo $row->keputusan ?></td>
                              
                            </tr>
                        <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>