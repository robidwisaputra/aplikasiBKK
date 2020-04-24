<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php

$id_loker				= empty($id_loker) ? null : $id_loker;

?>
<div class="row">
	<div class="col-lg-12">
		<?=form_open('admin/laporan/laporan_pelamar', array('role'=>'form', 'class'=>'inline'))?>
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
							<div class="col-md-3">Lowongan Kerja</div>
							<div class="col-md-6">
								<select class="form-control" name="id_loker" data-bv-trigger="blur">
									<option value="">- pilih Loker -</option>
									<option value="1" <?php if($id_loker=='1'){ echo "selected='selected'";} ?>>Semua Loker</option>
									<?php 
											
											foreach($data_loker as $row):
												if($row->id_loker == $id_loker) {
													echo '<option value="'.$row->id_loker.'" selected="selected">'.$row->judul.' | '.$row->nama.'</option>';
												} 
												else {
													echo '<option value="'.$row->id_loker.'">'.$row->judul.' | '.$row->nama.'</option>';
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
	</div>
	
	<?php if($id_loker == null) { ?>
		<div class="col-lg-12">
			<div class="clearfix alert alert-info">
				<p><b><i class="glyphicon glyphicon-info-sign"></i> INFORMASI</b></p>
				<p>
					Silahkan pilih <b>Lowongan kerja</b> pada form diatas 
					untuk menampilkan data
				</p>
			</div>
		</div>
		
	<?php } else { ?>
		
		<div class="col-lg-12">
			<div class="panel panel-default">
			<div class="panel-heading" style="height:50px;">
					<b>Print Area</b> 
					
					<div class="pull-right form-group">
						<a href="#" class="btn btn-primary btn-sm pull-right" onclick="printDiv('printableArea')" value="Print Invoice"><i class="glyphicon glyphicon-print"></i> Cetak</a>
					</div>
			</div>
			
			<div class="panel-body row table-responsive">
			
			<div class="col-lg-12" style="height:50px;">
			
			</div>	
			<div id="printableArea">
			
			<table cellpadding="0" cellspacing="0" border="0" class="table">
						<tr >
							<td style="text-align:center;"><h1>SMK Negeri 1 Cianjur</h1></td>
						</tr>
						<tr>
							<td style="text-align:center;"><h3>Laporan Pelamar</h3></td>
						</tr>
						
					</table>
					
			<table class="table table-striped table-bordered">
				<thead>
				<tr>
					<th width="50" style="vertical-align:middle;">NO</th>
					<th width="50" style="vertical-align:middle;">NISN</th>
					<th width="100" style="vertical-align:middle;">Nama Siswa</th>
					<th width="30" style="vertical-align:middle;">Jenis Kelamin</th>
					<th width="30" style="vertical-align:middle;">Tahun Lulusan</th>
					<th width="30" style="vertical-align:middle;">Nama Industri</th>
					<th width="30" style="vertical-align:middle;">Lamaran Sebagai</th>
					<th width="30" style="vertical-align:middle;">Status</th>
				</tr>
				</thead>
	
				<tbody>
				<?php $no=0; foreach($lap as $row): $no++;?>
				<tr>
                    <td style="text-align:center"><?php echo $no;?></td>
                    <td style="text-align:center"><?php echo $row->nisn;?></td>
                    <td style="text-align:left;padding-left:20px"><?php echo $row->nama_siswa;?></td>
                    <td style="text-align:center"><?php echo $row->jk;?></td>
					<td style="text-align:center"><?php echo $row->tahun_keluar;?></td>
					<td style="text-align:center"><?php echo $row->nama_industri;?></td>
					<td style="text-align:center"><?php echo $row->judul;?></td>
					<td style="text-align:center">
					<?php switch($row->status){
						case 1:echo "Diproses";break;
						case 2:echo "Diterima";break;
						case 3:echo "Ditolak";break;
					}
					?>
					</td>
                </tr>
                <?php endforeach;?>
				</tbody>
			</table>
			</div>
			</div>
			</div>
		</div>

		
		
	<?php } ?>
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