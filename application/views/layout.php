<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SPK-PM</title>
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/home.png" />
	<link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootswatch/bootstrap.min.css') ?>">
	<link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>assets/css/font.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/app.css') ?>">

</head>
<body>

	<?php $this->load->view('partial/navbar'); ?>
	
	<?= $contents; ?>

	
	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
