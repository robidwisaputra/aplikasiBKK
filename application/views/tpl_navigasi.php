<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">

			
			<li class="<?php echo ($this->uri->segment(1) == 'beranda') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('beranda'); ?>">
							 Beranda
						</a>
			</li>
			
			<li class="<?php echo ($this->uri->segment(1) == 'profil') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('profil'); ?>">
							 Profil BKK
						</a>
			</li>
			
			<li class="<?php echo ($this->uri->segment(1) == 'sebaran') ? 'active' : ''; ?>">
						<a href="<?php echo site_url('sebaran'); ?>">
							 Sebaran Lulusan
						</a>
			</li>
			
          </ul>
        </div>