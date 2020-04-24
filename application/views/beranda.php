<?php $this->load->view( 'carousel' ); ?>

<div class="col-sm-9">	
<!-- info loker -->
<div class="box box-info box-solid">
							
							<div class="box-header with-border">
							<h3 class="box-title">Lowongan Kerja</h3>
									  <!-- /.box-tools -->
							</div>	
<div class="box-body">
							
<?php $i=1; foreach ($loker as $row) :?>
                            <tr>
						
								 <div class="box box-success box-solid">
									<div class="box-header with-border">
									  <h3 class="box-title"><?php echo strtoupper($row->judul);?></h3>
									  <!-- /.box-tools -->
									</div>
									<!-- /.box-header -->
									<div class="box-body">
										<div class="col-sm-10">
											<b><?php echo strtoupper($row->nama).' | Tanggal '.$row->tgl_buka.' s/d '.$row->tgl_tutup; ?></br></br></b>
											 <p>
												<?php echo $row->deskripsi;?>
											 </p>
									    </div>
										
									</div>
									<!-- /.box-body -->
								  </div>
								  <!-- /.box -->
								  
							
                              
                            </tr>
                        <?php $i++; endforeach; ?>		
</div>
</div>
<!-- end info loker -->

<!-- info jadwal -->

<div class="box box-warning box-solid">
							
							<div class="box-header with-border">
							<h3 class="box-title">Info Jadwal Test</h3>
									  <!-- /.box-tools -->
							</div>	
<div class="box-body">
							
<?php $i=1; foreach ($jadwal as $row) :?>
                            <tr>
						
								 <div class="box box-danger box-solid">
									<div class="box-header with-border">
									  <h3 class="box-title"><?php echo strtoupper($row->judul);?></h3>
									  <!-- /.box-tools -->
									</div>
									<!-- /.box-header -->
									<div class="box-body">
										<div class="col-sm-10">
											<b><?php echo strtoupper($row->nama).' | Tanggal '.$row->tgl_mulai.' s/d '.$row->tgl_selesai; ?></br></br></b>
											 <p>Akan dilaksanakan di
												<?php echo $row->lokasi_alamat;?>
											 </p>
									    </div>
										
									</div>
									<!-- /.box-body -->
								  </div>
								  <!-- /.box -->
								  
							
                              
                            </tr>
                        <?php $i++; endforeach; ?>		
</div>
</div>

<!-- end info jadwal -->
</div>
<?php $this->load->view( 'info' ); ?>