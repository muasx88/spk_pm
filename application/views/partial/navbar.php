<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<div class="container">
		<a class="navbar-brand" href="<?php echo base_url() ?>">
			<img height="30" width="30" src="<?php echo base_url() ?>assets/img/home.png" alt="logo">
			<strong class="ml-1">
				SPK PM
			</strong>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item <?= $this->uri->uri_string()==''? 'active': ''?>">
					<a class="nav-link" href="<?php echo base_url() ?>">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item <?= $this->uri->uri_string()=='perumahan' || $this->uri->uri_string()=='perangkingan' ? 'active': ''?>">
					<a class="nav-link" href="<?php echo base_url('perumahan') ?>">Perumahan</a>
				</li>
				<li class="nav-item <?= $this->uri->uri_string()=='about' ? 'active': ''?>">
					<a class="nav-link" href="<?php echo base_url('about') ?>">About Us</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
