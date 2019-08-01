<div class="container mt-3">
	<div class="row">
		<div class="col-md-8">
			<?php foreach ($perumahan as $p) { ?>
				<div class="card mb-3">
					<div class="card-body">
						<div class="mb-5">
							<h2 class="font-italic text-info mb-2"><?= $p->nama_perumahan ?></h2>
						</div>
						<div class="col-md-8 mb-2 bg-secondary p-4">
							<div class="row mb-3">
								<div class="col-md-4">
									<i class="fas fa-coins"></i> Rp.<?= $p->harga ?>
								</div>
								<div class="col-md-4">
									<i class="fa fa-user-secret"></i>&nbsp;<?= $p->keamanan ?> Orang
								</div>
								<div class="col-md-4">
									<i class="fas fa-dice-d6"></i> <?= $p->fasilitas ?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<i class="fas fa-city"></i> <?= $p->jarak_kota ?> Km
								</div>
								<div class="col-md-4">
									<i class="fas fa-shopping-cart"></i> <?= $p->jarak_pasar ?> Km
								</div>
							</div>
							
						</div>
						<p style="font-size: 20px">
							<i class="fas fa-map-marked-alt" style="color:#D01313;font-size: 20px"></i> &nbsp;<?= $p->alamat_perumahan ?>
						</p>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="col-md-4">
			<!-- <div class="mb-5">
				<div class="mb-3">
					<h3 class="font-italic">Perumahan</h3>
					<hr>
				</div>
				<div>
					<p style="font-size: 17px"><a href="<?php base_url()?>perumahan?name=taman darussalam">TAMAN DARUSSALAM</a></p>
					<p style="font-size: 17px"><a href="<?php base_url()?>perumahan?name=palgading">PALGADING</a></p>
					<p style="font-size: 17px"><a href="<?php base_url()?>perumahan?name=djogjavillage">DJOGJAVILLAGE</a></p>
				</div>
			</div> -->
			<div class="mb-3">
				<div class="mb-3">
					<h3 class="font-italic">Perangkingan Perumahan</h3>
					<hr>
				</div>
				<div>
					<p>
						Klik tombol di bawah untuk mengetahui perumahan yang terbaik!.
					</p>
					<button class="btn btn-info btn-block btn-lg" id="perangkingan">Rangking</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$("#perangkingan").click(function(event) {
		window.location.href = '<?php echo base_url('perangkingan'); ?>'
	});
</script>
