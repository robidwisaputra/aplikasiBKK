<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$status					= empty($status) ? null : $status;
$tahun_keluar			= empty($tahun_keluar) ? null : $tahun_keluar;
$id_jurusan				= empty($id_jurusan) ? null : $id_jurusan;
//$pesan				= empty($pesan) ? null : $pesan;
?>
<div class="row">
	<div class="col-lg-12">
		<?=form_open('admin/laporan/laporan_keterserapan_lulusan', array('role'=>'form', 'class'=>'inline'))?>
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
	</div>
	
	<?php if($status == null) { ?>
		<div class="col-lg-12">
			<div class="clearfix alert alert-info">
				<p><b><i class="glyphicon glyphicon-info-sign"></i> INFORMASI</b></p>
				<p>
					Silahkan pilih <b>Status Lulusan</b>,<b>Tahun Lulusan</b>,<b>Jurusan</b> pada form diatas 
					untuk menampilkan keterserapan lulusan
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
							<td style="text-align:center;"><h3>Laporan Keterserapan Lulusan</h3></td>
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
					<?php
					if($status=='3'){
						echo "<th width='100' style='vertical-align:middle;'>Perguruan Tinggi</th>";
					}else{
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
					if($row->status=='3'){
						echo "<td style='text-align:center'>$row->perguruan_tinggi</td>";
					}else{
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