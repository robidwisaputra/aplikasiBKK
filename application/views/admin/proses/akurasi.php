<div class="box box-primary">

  				<div class="box-header with-border">
					<a href="<?php echo site_url('admin/proses/akurasi');?>" class="btn btn-info"><i class="glyphicon glyphicon-plus-sign"></i> Hitung Kembali</a>
				</div>
  				<div class="box-body">
				
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered ">
						<?php 
						if($this->session->flashdata('alert')==null){						
						}else if($this->session->flashdata('alert')==1){
							echo "<div class='alert alert-info alert-dismissible'><i class='fa fa-check'></i> Data Berhasil Diproses <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button> </div>" ;
						}else if($this->session->flashdata('alert')!=1){
							echo "<div class='alert alert-danger alert-dismissible'><i class='fa fa-warning'></i> Data Tidak Berhasil Diproses <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button> </div>" ;
						}
						
						$jmlBenar=0;
						$jmlSalah=0;
						
						?>
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
                            <th width="50">Data Asli</th>
							<th width="50">Prediksi</th>
							<th width="50">Ketepatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($uji as $row) :?>
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
								<td style="text-align:center;"><?php echo $row->data_asli ?></td>
								<td style="text-align:center;"><?php echo $row->prediksi ?></td>
								<td style="text-align:center;"><?php echo $row->ketepatan ?></td>
                              
                            </tr>
                        <?php $i++; 
						if($row->ketepatan=='BENAR'){
							$jmlBenar++;
						}else{
							$jmlSalah++;
						}						
						endforeach; ?>
                    </tbody>
                </table>
				
				<center>
				<?php
				
				$jmldata=$jmlBenar+$jmlSalah;
				$akurasi=$jmlBenar/$jmldata*100;
				$error=$jmlSalah/$jmldata*100;
				
				echo "<h4>Jumlah prediksi: $jmldata </h4>";
				echo "<h4>Jumlah Tepat: $jmlBenar </h4>";
				echo "<h4>Jumlah Tidak Tepat: $jmlSalah </h4>";
				echo "<h2>AKURASI: $akurasi %</h2>";
				echo "<h2>LAJU ERROR: $error %</h2>";
				
				?>
				</center>
				
            </div>
        </div>