<div class="box box-primary">

  				<div class="box-header with-border">
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
								<?=form_open('admin/pelamar/add_pelamar', array('role'=>'form', 'class'=>'inline'))?>
									<input type="hidden" name="id_loker" value="<?=$id_loker?>">
									<input type="hidden" name="nisn" value="<?=$row->nisn?>">
									<button type="submit" class="btn btn-sm">
										<i class="glyphicon glyphicon-plus" style='color: #00c0ef;'></i>
									</button>
								<?=form_close()?>
								</td>
                              
                            </tr>
                        <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>