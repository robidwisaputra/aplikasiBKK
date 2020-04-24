<div class="box box-primary">

  				<div class="box-header with-border">
					<a href="<?php echo site_url('admin/proses/proses_prediksi');?>" class="btn btn-info"><i class="glyphicon glyphicon-plus-sign"></i> Proses Prediksi</a>
					<a href="<?php echo site_url('admin/proses/delete_prediksi');?>" class="btn btn-info" data-toggle="tooltip" data-placement='top' title='Delete' onclick="return confirm('Anda Yakin ?');"><i class='glyphicon glyphicon-trash'></i> Hapus Prediksi</a>

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
                            <th width="70">NIS</th>
                            <th width="200px">Nama</th>
							<th width="50">Nilai math</th>
							<th width="50">Nilai Fisika</th>
							<th width="50">Nilai Kimia</th>
							<th width="50">Nilai pemr web</th>
							<th width="50">Nilai pemr mobile</th>
							<th width="50">Nilai pemr oop</th>
							<th width="50">Hasil Prediksi</th>
							<th width="50">Id Rules</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($prediksi as $row) :?>
                            <tr>
                                <td style="text-align:center;"><?php echo $i ?></td>
                                <td style="text-align:center;"><?php echo $row->NIS ?></td>
                                <td style="text-align:left;padding-left:50px"><?php echo $row->nama ?></td>
								<td style="text-align:center;"><?php echo $row->n1 ?></td>
								<td style="text-align:center;"><?php echo $row->n2 ?></td>
								<td style="text-align:center;"><?php echo $row->n3 ?></td>
								<td style="text-align:center;"><?php echo $row->n4 ?></td>
								<td style="text-align:center;"><?php echo $row->n5 ?></td>
								<td style="text-align:center;"><?php echo $row->n6 ?></td>
								<td style="text-align:center;"><?php echo $row->hasil ?></td>
								<td style="text-align:center;"><?php echo $row->id_rule ?></td>
                            </tr>
                        <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>