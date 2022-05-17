<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-info elevation-1">
	<!-- Brand Logo -->
	<a href="dashboard" class="brand-link text-center bg-info">
		<span class="brand-text font-weight-bold">Diana Laundry</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= base_url('dashboard'); ?>" class="nav-link <?= activeMenu('dashboard'); ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-header text-uppercase">Data Master</li>
				<?php if (role(1, false)) :  ?>
					<li class="nav-item">
						<a href="<?= base_url('kategori'); ?>" class="nav-link <?= activeMenu('kategori'); ?>">
							<i class="fas fa-th-list nav-icon"></i>
							<p>Data Kategori</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url('paket'); ?>" class="nav-link <?= activeMenu('paket'); ?>">
							<i class="fas fa-tshirt nav-icon"></i>
							<p>Data Paket</p>
						</a>
					</li>
				<?php endif;  ?>
				<li class="nav-item">
					<a href="<?= base_url('pelanggan'); ?>" class="nav-link <?= activeMenu('pelanggan'); ?>">
						<i class=" nav-icon fas fa-user-alt"></i>
						<p>
							Data Pelanggan
						</p>
					</a>
				</li>
				<li class="nav-header text-uppercase">Transaksi</li>
				<li class="nav-item">
					<a href="<?= base_url('transaksi') ?>" class="nav-link <?= activeMenu('transaksi'); ?>">
						<i class="nav-icon fas fa-cash-register"></i>
						<p>
							Transaksi
						</p>
					</a>
				</li>
				<?php if (is_role(1, false)) :  ?>
					<li class="nav-header text-uppercase">Lainnya</li>
					<li class="nav-item">
						<a href="<?= base_url('laporan'); ?>" class="nav-link <?= activeMenu('laporan'); ?>">
							<i class="nav-icon fas fa-print"></i>
							<p>
								Laporan
							</p>
						</a>
					</li>
				<?php endif;  ?>

		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><?= $title; ?></h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
						<?php if ($this->uri->segment(1) != 'dashboard') :  ?>
							<li class="breadcrumb-item active">
								<?= $this->uri->segment(1); ?>
							</li>
						<?php endif;  ?>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
