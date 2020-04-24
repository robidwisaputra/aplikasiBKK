<?php $this->load->view( 'carousel' ); ?>

<?php
$status					= empty($status) ? null : $status;
$tahun_keluar			= empty($tahun_keluar) ? null : $tahun_keluar;
$id_jurusan				= empty($id_jurusan) ? null : $id_jurusan;
//$pesan				= empty($pesan) ? null : $pesan;
?>


<div class="col-sm-9">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $title; ?></h3>
          </div>
          <div class="box-body">
            <?=form_open('sebaran', array('role'=>'form', 'class'=>'inline'))?>
			<div class="panel panel-default">
				<div class="panel-heading" style="height:50px;">
					<b>Formulir</b> 
					
					<div class="pull-right form-group">
						<button type="submit" class="btn btn-primary btn-sm">
							<i class="glyphicon glyphicon-search"></i> Proses
						</button>
					</div>
				</div>
				
				<div class="panel-body row">
					<div class="col-md-6">	
						<div class="form-group row">
							<div class="col-md-3">Status Lulusan</div>
							<div class="col-md-6">
								<select class="form-control" name="status" data-bv-trigger="blur">
									<option value="">- pilih status -</option>
									<option value="1" <?php if($status=='1'){echo "selected=selected";} ?>>Belum Bekerja</option>
									<option value="2" <?php if($status=='2'){echo "selected=selected";} ?>>Bekerja</option>
									<option value="3" <?php if($status=='3'){echo "selected=selected";} ?>>Kuliah</option>
									<option value="4" <?php if($status=='4'){echo "selected=selected";} ?>>Berwirausaha</option>
								</select>
							</div>
						</div>
					</div>

					
					<div class="col-md-6">	
						<div class="form-group row">
							<div class="col-md-3">Tahun Lulusan</div>
							<div class="col-md-6">
								<select class="form-control" name="tahun_keluar" data-bv-trigger="blur">
									<option value="">- pilih Tahun -</option>
									<option value="1" <?php if($tahun_keluar=='1'){ echo "selected='selected'";} ?>>Semua Tahun</option>
									<?php 
											
											foreach($data_tahun as $row):
												if($row->tahun_keluar == $tahun_keluar) {
													echo '<option value="'.$row->tahun_keluar.'" selected="selected">'.$row->tahun_keluar.'</option>';
												} 
												else {
													echo '<option value="'.$row->tahun_keluar.'">'.$row->tahun_keluar.'</option>';
												}
											endforeach; 	
											?>
								</select>
							</div>
						</div>
					</div>
					
					<div class="col-md-6">	
						<div class="form-group row">
							<div class="col-md-3">Jurusan</div>
							<div class="col-md-6">
								<select class="form-control" name="id_jurusan" data-bv-trigger="blur">
							<option value="">- pilih jurusan -</option>
                            <?php 
									foreach($data_jurusan as $row):
										if($row->id_jurusan == $id_jurusan) {
											echo '<option value="'.$row->id_jurusan.'" selected="selected">'.$row->nama_jurusan.'</option>';
										} 
										else {
											echo '<option value="'.$row->id_jurusan.'">'.$row->nama_jurusan.'</option>';
										}
									endforeach; 
									?>
                        </select>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		<?=form_close()?>
		
		<div class="panel panel-default">
			<div class="panel-heading" style="height:50px;">
					<b>Sebaran Lulusan</b> 
			</div>
			
			<div class="panel-body row table-responsive">
			
			<div class="col-lg-12" style="height:50px;">
			</div>	
			<div id="printableArea">
			
					
			<table class="table table-striped table-bordered">
				<thead>
				<tr>
					<th width="100" style="vertical-align:middle;">NO</th>
					<th width="100" style="vertical-align:middle;">NISN</th>
					<th width="250" style="vertical-align:middle;">Nama Siswa</th>
					<th width="100" style="vertical-align:middle;">Jenis Kelamin</th>
					<th width="100" style="vertical-align:middle;">Tahun Lulusan</th>
					<?php
					if($status=='3'){
						echo "<th width='100' style='vertical-align:middle;'>Perguruan Tinggi</th>";
					}else if(($status=='2') || ($status=='4')){
						echo "<th width='100' style='vertical-align:middle;'>Perusahaan</th>";
					}
					?>
				</tr>
				</thead>
	
				<tbody>
				<?php $no=0; foreach($lap as $row): $no++;?>
				<tr>
                    <td style="text-align:center"><?php echo $no;?></td>
                    <td style="text-align:center"><?php echo $row->nisn;?></td>
                    <td style="text-align:left;padding-left:20px"><?php echo $row->nama;?></td>
                    <td style="text-align:center"><?php echo $row->jk;?></td>
					<td style="text-align:center"><?php echo $row->tahun_keluar;?></td>
					<?php
					if($status=='3'){
						echo "<td style='text-align:center'>$row->perguruan_tinggi</td>";
					}else if(($status=='2') || ($status=='4')){
						echo "<td style='text-align:center'>$row->perusahaan</td>";
					}
					?>
                </tr>
                <?php endforeach;?>
				</tbody>
			</table>
			</div>
			</div>
			</div>
			
			
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
</div>		
<?php $this->load->view( 'info' ); ?>