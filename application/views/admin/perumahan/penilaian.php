<div class="card shadow mb-3">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Data Perumahan + Penilaian</h6>
		<button class="btn btn-primary btn-sm" id="addPenilaian"><i class="fa fa-plus"></i> Tambah</button>
	</div>
	<div class="card-body">
		<?php 
		if (count($data_perumahan) > 0) { ?>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th width="7%">No.</th>
							<th>Alternatif</th>
							<th class="text-center">C1</th>
							<th class="text-center">C2</th>
							<th class="text-center">C3</th>
							<th class="text-center">C4</th>
							<th class="text-center">C5</th>
							<th class="text-center" width="10%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($data_perumahan as $p) { ?>
							<tr>
								<td width="7%"><?= $no++ ?>.</td>
								<td>Alternatif A</td>
								<td align="center">1</td>
								<td align="center">2</td>
								<td align="center">3</td>
								<td align="center">5</td>
								<td align="center">5</td>
								<td width="10%" align="center">
									<button title="edit" data-id="<?= $p->id_perumahan ?>" class="btn btn-info btn-sm btn-circle editPenilaian"><i class="fa fa-edit"></i>
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
<div class="modal fade" id="modalPenilaian" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="formPenilaian" autocomplete="off">
				<div class="modal-header">
					<h5 class="modal-title" id="titlePenilaian"><span></span> Penilaian</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="idPenilaian">
					<select class="form-control" name="idPerumahan" id="idPerumahan">
						<option value="1">Perumahan 1</option>
						<option value="2">Perumahan 2</option>
						<option value="3">Perumahan 3</option>
					</select>
				</div>
				<div class="form-group">
					<label for="c1">Kriteria Harga (C1)</label>
					<select class="form-control" name="c1" id="c1">
						<option value="1">C1</option>
						<option value="2">C1</option>
						<option value="3">C1</option>
					</select>
				</div>
				<div class="form-group">
					<label for="c2">Kriteria Jarak Ke Pusat Kota (C2)</label>
					<select class="form-control" name="c2" id="c2">
						<option value="1">C2</option>
						<option value="2">C2</option>
						<option value="3">C2</option>
					</select>
				</div>
				<div class="form-group">
					<label for="c3">Kriteria Jarak Ke Pasar (C3)</label>
					<select class="form-control" name="c3" id="c3">
						<option value="1">C3</option>
						<option value="2">C3</option>
						<option value="3">C3</option>
					</select>
				</div>
				<div class="form-group">
					<label for="c4">Kriteria Keamanan (C4)</label>
					<select class="form-control" name="c4" id="c4">
						<option value="1">C4</option>
						<option value="2">C4</option>
						<option value="3">C4</option>
					</select>
				</div>
				<div class="form-group">
					<label for="c5">Kriteria Fasilitas (C5)</label>
					<select class="form-control" name="c5" id="c5">
						<option value="1">C5</option>
						<option value="2">C5</option>
						<option value="3">C5</option>
					</select>
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
<div class="modal fade" id="modalDeletePenilaian" tabindex="-1" role="dialog" aria-hidden="true">
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
				<button id="confirmDeletePenilaian" class="btn btn-danger">Hapus</button>
			</div>
		</div>
	</div>
</div>

<script>
	// open modal add
	$("#addPenilaian").click(function(e) {
		// reset_data();
		$("#titlePenilaian span").text("Tambah");
		$("#modalPenilaian").modal("show");
	});

	// save button 
	$("#formPenilaian").submit(function(e) {
		var idPerumahan = $("#idPerumahan").val();
		if (idPerumahan == '') {
			alert("Isi semua data!");
		}else{
			var data = {
				"idPenilaian": $("#idPenilaian").val(),
				"idPerumahan": $("#idPerumahan").val(),
				"c1" : $("#c1").val(),
				"c2" : $("#c2").val(),
				"c3" : $("#c3").val(),
				"c4" : $("#c4").val(),
				"c5" : $("#c5").val()
			}

			$.ajax({
				url: '<?php echo base_url('admin/perumahan/savePenilaian') ?>',
				type: 'POST',
				data: data,
				success: function(res) {
					if (res == "success") {
						window.location.reload();
					}
				}
			});
			
			reset_data();
			$("#modalPenilaian").modal("hide");
		}

	});

	// open modal edit
	$(".editPenilaian").click(function(e) {
		reset_data();
		var id = $(this).data("id");
		$.get('<?php echo base_url('admin/perumahan/getPerumahanById/') ?>'+id, function(data) {
			$("#idPerumahan").val(data.nama_perumahan)
			$("#alamatPerumahan").val(data.alamat_perumahan)
		},'json');
		$("#titlePerumahan span").text("Edit");
		$("#modalPerumahan").modal("show");
	});

	// delete modal show
	var idPerumahan="";
	$(".deletePerumahan").click(function(e) {
		idPerumahan = $(this).data("id");
		$("#modalDeletePenilaian").modal("show");
	});
	// confirm delete button
	$("#confirmDeletePenilaian").click(function(e) {
		$.ajax({
			url: '<?php echo base_url('admin/perumahan/deletePerumahan/') ?>'+idPerumahan,
			success: function(res) {
				if (res == "success") {
					window.location.reload();
				}
			}
		});
		
	});

	function reset_data(){
		$("#idPenilaian").val("");
		// $("#alamatPerumahan").val("");
	}

</script>
