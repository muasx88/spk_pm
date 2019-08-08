<div class="card shadow mb-3">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Data Perumahan</h6>
		<button class="btn btn-primary btn-sm" id="addPerumahan"><i class="fa fa-plus"></i> Tambah</button>
	</div>
	<div class="card-body">
		<?php 
		if (count($data_perumahan) > 0) { ?>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama Perumahan</th>
							<th>Alamat</th>
							<th width="10%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($data_perumahan as $p) { ?>
							<tr>
								<td><?= $no++ ?>.</td>
								<td><?= $p->nama_perumahan ?></td>
								<td><?= $p->alamat_perumahan ?></td>
								<td width="10%">
									<button title="edit" data-id="<?= $p->id_perumahan ?>" class="btn btn-info btn-sm btn-circle editPerumahan"><i class="fa fa-edit"></i>
									</button>
									<button data-id="<?= $p->id_perumahan ?>" title="hapus" class="btn btn-danger btn-sm btn-circle deletePerumahan"><i class="fa fa-trash"></i>
									</button>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>

		<?php }else{ ?>
			<p>Data tidak ada</p>
		<?php }
		?>

	</div>
</div>

<!-- modal form -->
<div class="modal fade" id="modalPerumahan" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="formPerumahan" autocomplete="off">
				<div class="modal-header">
					<h5 class="modal-title" id="titlePerumahan"><span></span> Perumahan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="idPerumahan">
					<div class="form-group">
						<label for="namaPerumahan">Nama Perumahan</label>
						<input type="text" name="namaPerumahan" id="namaPerumahan" class="form-control">
					</div>
					<div class="form-group">
						<label for="hargaPerumahan">Harga</label>
						<div class="input-group">
							<div class="input-group-prepend">
				         	<div class="input-group-text">Rp.</div>
				        	</div>
							<input type="number" name="hargaPerumahan" id="hargaPerumahan" class="form-control">
							
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="jkPerumahan">Jarak Pusat Kota</label>
								<div class="input-group">
									<input type="text" name="jkPerumahan" id="jkPerumahan" class="form-control">
									<div class="input-group-prepend">
						         	<div class="input-group-text">Km</div>
						        	</div>
								</div>
							</div>
							
						</div>
						<div class="col">
							<div class="form-group">
								<label for="jpPerumahan">Jarak Pasar</label>
								<div class="input-group">
									<input type="number" name="jpPerumahan" id="jpPerumahan" class="form-control">
									<div class="input-group-prepend">
						         	<div class="input-group-text">Km</div>
						        	</div>
								</div>
							</div>
							
						</div>
					</div>
					<div class="form-group">
						<label for="keaPerumahan">Keamanan</label>
						<input type="number" name="keaPerumahan" id="keaPerumahan" class="form-control">
					</div>
					
					<div class="form-group">
						<label for="fasPerumahan">Fasilitas</label>
						<textarea name="fasPerumahan" id="fasPerumahan" class="form-control"></textarea>
						<!-- <input type="number" name="fasPerumahan" id="fasPerumahan" class="form-control"> -->
					</div>
					<div class="form-group">
						<label for="alamatPerumahan">Alamat</label>
						<textarea type="text" name="alamatPerumahan" id="alamatPerumahan" class="form-control"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- modal delete -->
<div class="modal fade" id="modalDeletePerumahan" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Konfirmasi Hapus</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Yakin ingin menghapus data?
			</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button id="confirmDeletePerumahan" class="btn btn-danger">Hapus</button>
			</div>
		</div>
	</div>
</div>

<script>
	// open modal add
	$("#addPerumahan").click(function(e) {
		reset_data_perumahan();
		$("#titlePerumahan span").text("Tambah");
		$("#modalPerumahan").modal("show");
	});

	// save button 
	$("#formPerumahan").submit(function(e) {
		e.preventDefault();
		var namaPerumahan = $("#namaPerumahan").val();
		var hargaPerumahan = $("#hargaPerumahan").val();
		var jkPerumahan = $("#jkPerumahan").val();
		var jpPerumahan = $("#jpPerumahan").val();
		var keaPerumahan = $("#keaPerumahan").val();
		var fasPerumahan = $("#fasPerumahan").val();
		var alamatPerumahan = $("#alamatPerumahan").val();

		if (namaPerumahan == '' && alamatPerumahan == '' && hargaPerumahan=='' && jkPerumahan=='' && jpPerumahan=='' && keaPerumahan=='' && fasPerumahan=='') {
			alert("Isi semua data!");
		}else{
			var data = {
				"idPerumahan": $("#idPerumahan").val(),
				"namaPerumahan" : namaPerumahan,
				"hargaPerumahan" : hargaPerumahan,
				"jkPerumahan" : jkPerumahan,
				"jpPerumahan" : jpPerumahan,
				"keaPerumahan" : keaPerumahan,
				"fasPerumahan" : fasPerumahan,
				"alamatPerumahan" : alamatPerumahan,
			}

			$.ajax({
				url: '<?php echo base_url('admin/perumahan/savePerumahan') ?>',
				type: 'POST',
				data: data,
				success: function(res) {
					if (res == "success") {
						window.location.reload();
					}
				}
			});
			
			reset_data_perumahan();
			$("#modalPerumahan").modal("hide");
		}

	});

	// open modal edit
	$(".editPerumahan").click(function(e) {
		reset_data_perumahan();
		var id = $(this).data("id");
		$.get('<?php echo base_url('admin/perumahan/getPerumahanById/') ?>'+id, function(data) {
			$("#idPerumahan").val(data.id_perumahan)
			$("#namaPerumahan").val(data.nama_perumahan)
			$("#hargaPerumahan").val(data.harga)
			$("#jkPerumahan").val(data.jarak_kota)
			$("#jpPerumahan").val(data.jarak_pasar)
			$("#keaPerumahan").val(data.keamanan)
			$("#fasPerumahan").val(data.fasilitas)
			$("#alamatPerumahan").val(data.alamat_perumahan)
		},'json');
		$("#titlePerumahan span").text("Edit");
		$("#modalPerumahan").modal("show");
	});

	// delete modal show
	var idPerumahan="";
	$(".deletePerumahan").click(function(e) {
		idPerumahan = $(this).data("id");
		$("#modalDeletePerumahan").modal("show");
	});
	// confirm delete button
	$("#confirmDeletePerumahan").click(function(e) {
		$.ajax({
			url: '<?php echo base_url('admin/perumahan/deletePerumahan/') ?>'+idPerumahan,
			success: function(res) {
				if (res == "success") {
					window.location.reload();
				}
			}
		});
		
	});

	function reset_data_perumahan(){
		$("#idPerumahan").val("");
		$("#namaPerumahan").val("");
		$("#hargaPerumahan").val("");
		$("#jkPerumahan").val("");
		$("#jpPerumahan").val("");
		$("#keaPerumahan").val("");
		$("#fasPerumahan").val("");
		$("#alamatPerumahan").val("");
	}

</script>
