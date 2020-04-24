<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$status					= empty($status) ? null : $status;
$tahun_keluar			= empty($tahun_keluar) ? null : $tahun_keluar;
$id_jurusan				= empty($id_jurusan) ? null : $id_jurusan;
//$pesan				= empty($pesan) ? null : $pesan;
?>
<div class="row">
	<div class="col-lg-12">
		<?=form_open('admin/laporan/laporan_belum_bekerja', array('role'=>'form', 'class'=>'inline'))?>
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
					

					
				</div>
			</div>
		<?=form_close()?>
	</div>
	
	<?php if($tahun_keluar == null) { ?>
		<div class="col-lg-12">
			<div class="clearfix alert alert-info">
				<p><b><i class="glyphicon glyphicon-info-sign"></i> INFORMASI</b></p>
				<p>
					Silahkan pilih <b>Tahun Lulusan</b> pada form diatas 
					untuk menampilkan data siswa belum lulus
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
							<td style="text-align:center;"><h3>Laporan Data Siswa Belum Bekerja</h3></td>
						</tr>
						
					</table>
					
			<table class="table table-striped table-bordered">
				<thead>
				<tr>
					<th width="100" style="vertical-align:middle;">NO</th>
					<th width="100" style="vertical-align:middle;">NISN</th>
					<th width="250" style="vertical-align:middle;">Nama Siswa</th>
					<th width="100" style="vertical-align:middle;">Jenis Kelamin</th>
					<th width="100" style="vertical-align:middle;">Tahun Lulusan</th>
	
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