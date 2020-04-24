<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
			<div class="panel-heading" style="height:50px;">
					<b>Print Area</b> 
					
					<div class="pull-right form-group">
						<a href="#" class="btn btn-primary btn-sm pull-right" onclick="printDiv('printableArea')" value="Print Invoice"><i class="glyphicon glyphicon-print"></i> Cetak</a>
					</div>
			</div>
			
			<div class="panel-body row table-responsive">
				
				<div id="printableArea">
				
					<table cellpadding="0" cellspacing="0" border="0" class="table">
						<tr >
							<td style="text-align:center;"><h1>SMK Negeri 1 Cianjur</h1></td>
						</tr>
						<tr>
							<td style="text-align:center;"><h3>Laporan Data Mitra Industri</h3></td>
						</tr>
						
					</table>
			
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
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
							<th width="200">Bidang</th>
							<th width="250">Alamat</th>
							<th width="100">Provinsi</th>
							<th width="200">Kabupaten</th>							
							<th width="100">No TLP</th>
							<th width="100">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($industri as $row) :?>
                            <tr>
                                <td style="text-align:center;"><?php echo $i ?></td>
                                <td style="text-align:left;padding-left:50px;"><?php echo $row->nama ?></td>
								<td style="text-align:center;"><?php echo $row->nama_bidang ?></td>
								<td style="text-align:center;"><?php echo $row->alamat ?></td>
                                <td style="text-align:center"><?php echo $row->nama_prov ?></td>
								<td style="text-align:center;"><?php echo $row->nama_kabkot ?></td>								
								<td style="text-align:center;"><?php echo $row->notlp ?></td>
								<td style="text-align:center;"><?php echo $row->email ?></td>
                              
                            </tr>
                        <?php $i++; endforeach; ?>
                    </tbody>
                </table>
				<br><br><br><br><br><br>
			</div>
            </div>
        </div>
</div>
</div>
<script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>