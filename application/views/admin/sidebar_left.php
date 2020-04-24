<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Sidebar -->
<aside class="main-sidebar">
	<section class="sidebar">

		<!-- Info Pengguna -->
		<div class="user-panel">
			<div class="pull-left image">
			<img src="<?php echo base_url();?>assets\images\admin.png" class="img-circle" alt="User Image" style="width:40px;height:40px;">
			</div>
			
			<div class="pull-left info">
				<p><a href="#" style="color:#fff;"><?php echo $this->session->userdata('username');?> <span style="font-size:8px;color:yellow"></span></a></p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>

		<?php if ($this->session->userdata('hakakses') == 'admin'){ ?>
			
		<!-- Menu ADMIN-->
		<ul class="sidebar-menu" data-widget="tree">
			<li class=" <?php echo ($this->uri->segment(2) == 'dashboard' or $this->uri->segment(2) == null) ? 'active' : ''; ?>"><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> <span>Dasbor</span></a></li>
			
			<li class="treeview <?php echo ($this->uri->segment(2) == 'user' or $this->uri->segment(2) == 'profil') ? 'active' : ''; ?>">
				<a href="#">
					<i class="fa fa-gears"></i> <span>Setup BKK</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>				
				<ul class="treeview-menu">
					<li class="<?php echo ($this->uri->segment(2) == 'profil') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/profil/index'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'profil') ? 'text-aqua' : ''; ?>"></i> Profil BKK
						</a>
					</li>
					<li class="<?php echo ($this->uri->segment(2) == 'user') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/user'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'user') ? 'text-aqua' : ''; ?>"></i> Manajemen User
						</a>
					</li>			
				</ul>
			</li>
			
			<li class="treeview <?php echo ($this->uri->segment(2) == 'industri' or $this->uri->segment(2) == 'affiliate') ? 'active' : ''; ?>">
				<a href="#">
					<i class="fa fa-building"></i> <span>Manajemen Mitra</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				
				<ul class="treeview-menu">
					<li class="<?php echo ($this->uri->segment(2) == 'industri' ) ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/industri/index'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'industri' ) ? 'text-aqua' : ''; ?>"></i> Mitra Industri
						</a>
					</li>
					<li class="<?php echo ($this->uri->segment(2) == 'affiliate') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/affiliate/index'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'affiliate' ) ? 'text-aqua' : ''; ?>"></i> Affiliate BKK
						</a>
					</li>
					
					
				</ul>
			</li>
			
			<li class="treeview <?php echo ($this->uri->segment(2) == 'siswa') ? 'active' : ''; ?>">
				<a href="#">
					<i class="fa fa-users"></i> <span>Manajemen Alumni</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				
				<ul class="treeview-menu">
					<li class="<?php echo ($this->uri->segment(2) == 'siswa') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/siswa/index'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'siswa') ? 'text-aqua' : ''; ?>"></i> Data Alumni
						</a>
					</li>

					
				</ul>
			</li>
			
			<li class="treeview <?php echo ($this->uri->segment(2) == 'loker' or $this->uri->segment(2) == 'jadwal' or $this->uri->segment(2) == 'pelamar') ? 'active' : ''; ?>">
				<a href="#">
					<i class="fa fa-line-chart"></i> <span>Bursa Kerja</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				
				<ul class="treeview-menu">
					<li class="<?php echo ($this->uri->segment(2) == 'loker') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/loker/index'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'loker') ? 'text-aqua' : ''; ?>"></i> Manajemen Loker
						</a>
					</li>
					
					<li class="<?php echo ($this->uri->segment(2) == 'jadwal') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/jadwal/index'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'jadwal') ? 'text-aqua' : ''; ?>"></i> Jadwal Test
						</a>
					</li>
					
					<li class="<?php echo ($this->uri->segment(2) == 'pelamar') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/pelamar/index'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'pelamar') ? 'text-aqua' : ''; ?>"></i> Manajemen Pelamar
						</a>
					</li>
					
				</ul>
			</li>
			
			<li class="treeview <?php echo ($this->uri->segment(2) == 'laporan') ? 'active' : ''; ?>">
				<a href="#">
					<i class="fa fa-print"></i> <span>Laporan</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				
				<ul class="treeview-menu">
					<li class="<?php echo ($this->uri->segment(2) == 'laporan' and $this->uri->segment(3) == 'laporan_belum_bekerja') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/laporan/laporan_belum_bekerja'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'laporan' and $this->uri->segment(3) == 'laporan_belum_bekerja') ? 'text-aqua' : ''; ?>"></i> Laporan Siswa Belum Bekerja
						</a>
					</li>
					
					<li class="<?php echo ($this->uri->segment(2) == 'laporan' and $this->uri->segment(3) == 'laporan_industri') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/laporan/laporan_industri'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'laporan' and $this->uri->segment(3) == 'laporan_industri') ? 'text-aqua' : ''; ?>"></i> Laporan Mitra Industri
						</a>
					</li>
					
					<li class="<?php echo ($this->uri->segment(2) == 'laporan' and $this->uri->segment(3) == 'laporan_keterserapan_lulusan') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/laporan/laporan_keterserapan_lulusan'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'laporan' and $this->uri->segment(3) == 'laporan_keterserapan_lulusan') ? 'text-aqua' : ''; ?>"></i> Laporan Keterserapan Lulusan
						</a>
					</li>
					
					<li class="<?php echo ($this->uri->segment(2) == 'laporan' and $this->uri->segment(3) == 'laporan_pelamar') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/laporan/laporan_pelamar'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'laporan' and $this->uri->segment(3) == 'laporan_pelamar') ? 'text-aqua' : ''; ?>"></i> Laporan Pelamar
						</a>
					</li>
					
					<li class="<?php echo ($this->uri->segment(2) == 'laporan' and $this->uri->segment(3) == 'laporan_pelamar_diterima') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/laporan/laporan_pelamar_diterima'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'laporan' and $this->uri->segment(3) == 'laporan_pelamar_diterima') ? 'text-aqua' : ''; ?>"></i> Laporan Pelamar Diterima
						</a>
					</li>
					
					<li class="<?php echo ($this->uri->segment(2) == 'laporan' and $this->uri->segment(3) == 'laporan_loker') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/laporan/laporan_loker'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'laporan' and $this->uri->segment(3) == 'laporan_loker') ? 'text-aqua' : ''; ?>"></i> Laporan Lowongan Kerja
						</a>
					</li>
					
				</ul>
			</li>
		
			
					
			<li>
				<a href="<?php echo site_url('login/logout') ?>" data-confirm-keluar="Anda yakin akan keluar dari halaman ini?">
					<i class="fa fa-sign-out"></i> <span>Keluar</span>
				</a>
			</li>
		</ul>
		
		
		<?php }else if($this->session->userdata('hakakses') == 'operator'){ ?>
		
		<!-- Menu OPERATOR-->
		<ul class="sidebar-menu" data-widget="tree">
			<li class=" <?php echo ($this->uri->segment(2) == 'dashboard' or $this->uri->segment(2) == null) ? 'active' : ''; ?>"><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> <span>Dasbor</span></a></li>
			
			<li class="treeview <?php echo ($this->uri->segment(2) == 'industri' or $this->uri->segment(2) == 'affiliate') ? 'active' : ''; ?>">
				<a href="#">
					<i class="fa fa-building"></i> <span>Manajemen Mitra</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				
				<ul class="treeview-menu">
					<li class="<?php echo ($this->uri->segment(2) == 'industri' ) ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/industri/index'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'industri' ) ? 'text-aqua' : ''; ?>"></i> Mitra Industri
						</a>
					</li>
					<li class="<?php echo ($this->uri->segment(2) == 'affiliate') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/affiliate/index'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'affiliate' ) ? 'text-aqua' : ''; ?>"></i> Affiliate BKK
						</a>
					</li>
					
					
				</ul>
			</li>
			
			<li class="treeview <?php echo ($this->uri->segment(2) == 'siswa') ? 'active' : ''; ?>">
				<a href="#">
					<i class="fa fa-users"></i> <span>Manajemen Alumni</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				
				<ul class="treeview-menu">
					<li class="<?php echo ($this->uri->segment(2) == 'siswa') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/siswa/index'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'siswa') ? 'text-aqua' : ''; ?>"></i> Data Alumni
						</a>
					</li>
				</ul>
			</li>
			
			<li class="treeview <?php echo ($this->uri->segment(2) == 'loker' or $this->uri->segment(2) == 'jadwal' or $this->uri->segment(2) == 'pelamar') ? 'active' : ''; ?>">
				<a href="#">
					<i class="fa fa-line-chart"></i> <span>Bursa Kerja</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				
				<ul class="treeview-menu">
					<li class="<?php echo ($this->uri->segment(2) == 'loker') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/loker/index'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'loker') ? 'text-aqua' : ''; ?>"></i> Manajemen Loker
						</a>
					</li>
					
					<li class="<?php echo ($this->uri->segment(2) == 'jadwal') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/jadwal/index'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'jadwal') ? 'text-aqua' : ''; ?>"></i> Jadwal Test
						</a>
					</li>
					
					<li class="<?php echo ($this->uri->segment(2) == 'pelamar') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/pelamar/index'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'pelamar') ? 'text-aqua' : ''; ?>"></i> Manajemen Pelamar
						</a>
					</li>
					
				</ul>
			</li>
			
			<li class="treeview <?php echo ($this->uri->segment(2) == 'laporan') ? 'active' : ''; ?>">
				<a href="#">
					<i class="fa fa-print"></i> <span>Laporan</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				
				<ul class="treeview-menu">
					<li class="<?php echo ($this->uri->segment(2) == 'laporan' and $this->uri->segment(3) == 'laporan_belum_bekerja') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/laporan/laporan_belum_bekerja'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'laporan' and $this->uri->segment(3) == 'laporan_belum_bekerja') ? 'text-aqua' : ''; ?>"></i> Laporan Siswa Belum Bekerja
						</a>
					</li>
					
					<li class="<?php echo ($this->uri->segment(2) == 'laporan' and $this->uri->segment(3) == 'laporan_industri') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/laporan/laporan_industri'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'laporan' and $this->uri->segment(3) == 'laporan_industri') ? 'text-aqua' : ''; ?>"></i> Laporan Mitra Industri
						</a>
					</li>
					
					<li class="<?php echo ($this->uri->segment(2) == 'laporan' and $this->uri->segment(3) == 'laporan_keterserapan_lulusan') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('admin/laporan/laporan_keterserapan_lulusan'); ?>">
							<i class="fa fa-circle-o <?php echo ($this->uri->segment(2) == 'laporan' and $this->uri->segment(3) == 'laporan_keterserapan_lulusan') ? 'text-aqua' : ''; ?>"></i> Laporan Sebaran Lulusan
						</a>
					</li>
					
				</ul>
			</li>
		
			
					
			<li>
				<a href="<?php echo site_url('login/logout') ?>" data-confirm-keluar="Anda yakin akan keluar dari halaman ini?">
					<i class="fa fa-sign-out"></i> <span>Keluar</span>
				</a>
			</li>
		</ul>
		
		
		<?php }else if($this->session->userdata('hakakses') == 'alumni'){ ?>
		
		<!-- Menu ALUMNI-->
		<ul class="sidebar-menu" data-widget="tree">
			<li class=" <?php echo ($this->uri->segment(2) == 'dashboard' or $this->uri->segment(2) == null) ? 'active' : ''; ?>"><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> <span>Dasbor</span></a></li>
			
			<li class="<?php echo ($this->uri->segment(3) == 'edit_siswa_pribadi') ? 'active' : ''; ?>">
				<a href="<?php echo site_url('admin/siswa/edit_siswa_pribadi/'.$this->session->userdata('username'));?>">
					<i class="fa fa-user <?php echo ($this->uri->segment(3) == 'edit_siswa_pribadi') ? 'text-aqua' : ''; ?>"></i> Ubah Data Diri
				</a>
			</li>
			
			<li class="<?php echo ($this->uri->segment(3) == 'edit_pass_pribadi') ? 'active' : ''; ?>">
				<a href="<?php echo site_url('admin/user/edit_pass_pribadi/');?>">
					<i class="fa fa-lock <?php echo ($this->uri->segment(3) == 'edit_pass_pribadi') ? 'text-aqua' : ''; ?>"></i> Ubah Password
				</a>
			</li>
					
			<li class="<?php echo ($this->uri->segment(3) == 'loker_pribadi' ) ? 'active' : ''; ?>">
				<a href="<?php echo site_url('admin/pelamar/loker_pribadi/'.$this->session->userdata('username')); ?>">
					<i class="fa fa-line-chart <?php echo ($this->uri->segment(3) == 'loker_pribadi') ? 'text-aqua' : ''; ?>"></i> Lowongan Kerja
				</a>
			</li>
			
					
			<li>
				<a href="<?php echo site_url('login/logout') ?>" data-confirm-keluar="Anda yakin akan keluar dari halaman ini?">
					<i class="fa fa-sign-out"></i> <span>Keluar</span>
				</a>
			</li>
		</ul>
		<?php } ?>
		
	</section>
</aside>