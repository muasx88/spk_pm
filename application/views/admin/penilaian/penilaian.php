<!-- Perumahan + Penilaian -->

<div class="card shadow mb-3">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Data Perumahan + Penilaian</h6>
		<button class="btn btn-primary btn-sm" id="addPenilaian"><i class="fa fa-plus"></i> Tambah</button>
	</div>
	<div class="card-body">
		<?php 
		if (count($data_kecocokan) > 0) { ?>
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Alternatif</th>
							<th>Harga</th>
							<th>Jarak ke Kota</th>
							<th>Jarak ke Pasar</th>
							<th>Keamanan</th>
							<th>Fasilitas</th>
							<th class="text-center" width="10%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data_kecocokan as $dk) { ?>
							<tr>
								<td><?= $dk->nama_perumahan ?></td>
								<td><?= $dk->c1_kriteria ?></td>
								<td><?= $dk->c2_kriteria ?></td>
								<td><?= $dk->c3_kriteria ?></td>
								<td><?= $dk->c4_kriteria ?></td>
								<td><?= $dk->c5_kriteria ?></td>
								<td width="10%" align="center">
									<button title="edit" data-id="<?= $dk->id_penilaian ?>" class="btn btn-info btn-sm btn-circle editPenilaian"><i class="fa fa-edit"></i>
									</button>
									<button data-id="<?= $dk->id_penilaian ?>" title="hapus" class="btn btn-danger btn-sm btn-circle deletePerumahan"><i class="fa fa-trash"></i>
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
					<div class="form-group">
						<input type="hidden" id="idPenilaian">
						<select class="form-control" name="idPerumahan" id="idPerumahan">
							<option value="">Pilih</option>
							<?php foreach ($perumahan as $p) { ?>
								<option value="<?= $p->id_perumahan ?>"><?= $p->nama_perumahan ?></option>
							<?php } ?>
						</select>
					</div>

					<div class="form-group">
						<label for="c1">Kriteria Harga (C1)</label>
						<select class="form-control" name="c1" id="c1">
							<option value="">Pilih</option>
							<?php foreach ($kriteria_harga as $kh) { ?>
								<option value="<?= $kh->id_kriteria ?>"><?= $kh->pilihan_kriteria.' &nbsp;-&nbsp; '.$kh->keterangan ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="c2">Kriteria Jarak Ke Pusat Kota (C2)</label>
						<select class="form-control" name="c2" id="c2">
							<option value="">Pilih</option>
							<?php foreach ($kriteria_jarakkota as $kjk) { ?>
								<option value="<?= $kjk->id_kriteria ?>"><?= $kjk->pilihan_kriteria.' &nbsp;-&nbsp; '.$kjk->keterangan ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="c3">Kriteria Jarak Ke Pasar (C3)</label>
						<select class="form-control" name="c3" id="c3">
							<option value="">Pilih</option>
							<?php foreach ($kriteria_jarakpasar as $kjp) { ?>
								<option value="<?= $kjp->id_kriteria ?>"><?= $kjp->pilihan_kriteria.' &nbsp;-&nbsp; '.$kjp->keterangan ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="c4">Kriteria Keamanan (C4)</label>
						<select class="form-control" name="c4" id="c4">
							<option value="">Pilih</option>
							<?php foreach ($kriteria_keamanan as $ka) { ?>
								<option value="<?= $ka->id_kriteria ?>"><?= $ka->pilihan_kriteria.' &nbsp;-&nbsp; '.$ka->keterangan ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="c5">Kriteria Fasilitas (C5)</label>
						<select class="form-control" name="c5" id="c5">
							<option value="">Pilih</option>
							<?php foreach ($kriteria_fasilitas as $kf) { ?>
								<option value="<?= $kf->id_kriteria ?>"><?= $kf->pilihan_kriteria.' &nbsp;-&nbsp; '.$kf->keterangan ?></option>
							<?php } ?>
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
		reset_data_penilaian();
		$("#titlePenilaian span").text("Tambah");
		$("#modalPenilaian").modal("show");
	});

	// save button 
	$("#formPenilaian").submit(function(e) {
		e.preventDefault();
		var idPerumahan = $("#idPerumahan").val();
		var c1 = $("#c1").val();
		var c2 = $("#c2").val();
		var c3 = $("#c3").val();
		var c4 = $("#c4").val();
		var c5 = $("#c5").val();
		if (idPerumahan =="" && c1 =="" && c2 =="" && c3 =="" && c4 == "" && c5 =="") {
			alert("Isi semua data!");
		}else{
			var data = {
				"idPenilaian": $("#idPenilaian").val(),
				"idPerumahan": idPerumahan,
				"C1" : c1,
				"C2" : c2,
				"C3" : c3,
				"C4" : c4,
				"C5" : c5,
			}

			// console.log(data)
			$.ajax({
				url: '<?php echo base_url('admin/penilaian/savePenilaian') ?>',
				type: 'POST',
				data: data,
				success: function(res) {
					if (res == "success") {
						window.location.reload();
					}
					// console.log(res)
				}
			});
			
			reset_data_penilaian();
			$("#modalPenilaian").modal("hide");
		}

	});

	// open modal edit
	$(".editPenilaian").click(function(e) {
		var id = $(this).data('id');
		reset_data_penilaian();
		$.getJSON('<?php echo base_url('admin/penilaian/getPenilaianByID/') ?>'+id,function(data) {
			$("#formPenilaian #idPenilaian").val(data.id_penilaian);
			$("#formPenilaian #idPerumahan").val(data.id_perumahan).change();
			$("#formPenilaian #c1").val(data.C1).change();
			$("#formPenilaian #c2").val(data.C2).change();
			$("#formPenilaian #c3").val(data.C3).change();
			$("#formPenilaian #c4").val(data.C4).change();
			$("#formPenilaian #c5").val(data.C5).change();
		});

		$("#titlePenilaian span").text("Edit");
		$("#modalPenilaian").modal("show");
	});

	// delete modal show
	var idPenilaian="";
	$(".deletePerumahan").click(function(e) {
		idPenilaian = $(this).data("id");
		$("#modalDeletePenilaian").modal("show");
	});
	// confirm delete button
	$("#confirmDeletePenilaian").click(function(e) {
		$.ajax({
			url: '<?php echo base_url('admin/penilaian/deletePenilaian/') ?>'+idPenilaian,
			success: function(res) {
				if (res == "success") {
					window.location.reload();
				}
			}
		});
		
	});

	function reset_data_penilaian(){
		$("#idPenilaian").val("");
		$("#idPerumahan").val("");
		$("#c1").val("");
		$("#c2").val("");
		$("#c3").val("");
		$("#c4").val("");
		$("#c5").val("");
		// $("#alamatPerumahan").val("");
	}



</script>
