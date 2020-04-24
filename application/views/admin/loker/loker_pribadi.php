<div class="box box-primary">

  				<div class="box-header with-border">
					<a href="<?php echo site_url('admin/pelamar/loker_pribadi_cari');?>" class="btn btn-info"><i class="glyphicon glyphicon-plus-sign"></i> Cari Loker</a>
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
                            <th width="70">Nama Industri</th>
                            <th width="150px">Lowongan Kerja</th>
							<th width="100">Gaji</th>
							<th width="50">Tanggal Dibuka</th>
							<th width="50">Tanggal Ditutup</th>
							<th width="50">Status lowongan</th>
							<th width="50">Status lamaran</th>
                            <th width="100px">Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($loker as $row) :?>
                            <tr>
                                <td style="text-align:center;"><?php echo $i ?></td>
                                <td style="text-align:center;"><?php echo $row->nama ?></td>
                                <td style="text-align:left;padding-left:50px"><?php echo $row->judul?></td>
								<td style="text-align:center;">
								<?php switch($row->gaji){
										case 1: echo "< 1.000.000";break;
										case 2: echo "1.000.000 s/d 2.000.000";break;
										case 3: echo "2.000.000 s/d 3.000.000";break;
										case 4: echo "3.000.000 s/d 5.000.000";break;
										case 5: echo "> 5.000.000";break;
								} 
								
								?>
								
								</td>
								<td style="text-align:center;"><?php echo $row->tgl_buka ?></td>
								<td style="text-align:center;"><?php echo $row->tgl_tutup ?></td>
								<td style="text-align:center;">
								<?php switch($row->status_loker){
									case 1:echo "<font color='#00c0ef'>Aktif</font> ";break;
									case 2:echo "<font color='#dd4b39'>Tidak Aktif</font> ";break;
								} ?>
								</td>

								<td style="text-align:center;">
								<?php switch($row->status_lamaran){
										case 1: echo "<font color='orange'>Diproses</font>";break;
										case 2: echo "<font color='#00c0ef'>Diterima</font>";break;
										case 3: echo "<font color='#00c0ef'>Ditolak</font>";break;
								} 
								
								?>
								
								</td>
								
								<td style="text-align:center">
								<a href="<?php echo site_url('admin/pelamar/loker_pribadi_upload_dokumen/'.$row->id_pelamar);?>" data-toggle='tooltip' data-placement='top' title='Edit' ><i class='glyphicon glyphicon-upload' style='color: #00c0ef;'></i></a>
								  &nbsp;							 
								<a href="<?php echo site_url('admin/pelamar/loker_pribadi_delete/'.$row->id_pelamar);?>" data-toggle="tooltip" data-placement='top' title='Delete' onclick="return confirm('Anda Yakin ?');"><i class='glyphicon glyphicon-trash' style='color: #dd4b39;'></i></i></a>                                  
								</td>
                              
                            </tr>
                        <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>