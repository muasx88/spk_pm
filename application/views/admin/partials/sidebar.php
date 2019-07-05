<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('admin/dashboard') ?>">
		<div class="sidebar-brand-icon">
			<i class="fas fa-home"></i>
		</div>
		<div class="sidebar-brand-text mx-3">SPK <sup>PM</sup></div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item <?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>">
		<a class="nav-link" href="<?=base_url('admin/dashboard') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span>
		</a>
	</li>

	<!-- kriteria -->
	<li class="nav-item <?php echo $this->uri->segment(2) == 'kriteria' ? 'active' : ''; ?>">
		<a class="nav-link" href="<?= base_url('admin/kriteria') ?>">
			<i class="fas fa-fw fa-chart-area"></i>
			<span>Kriteria</span>
		</a>
	</li>

	<!-- Alternatif -->
	<li class="nav-item <?php echo $this->uri->segment(2) == 'perumahan' ? 'active' : ''; ?>">
		<a class="nav-link" href="<?= base_url('admin/perumahan') ?>">
			<i class="fas fa-fw fa-table"></i>
			<span>Perumahan</span>
		</a>
	</li>



	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
