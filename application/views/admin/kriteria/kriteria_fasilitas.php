<div class="card shadow mb-3">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Kriteria Fasilitas (C5)</h6>
		<button class="btn btn-primary btn-sm" id="addKriteriaFasilitas"><i class="fa fa-plus"></i> Tambah</button>
	</div>
	<div class="card-body">
		<?php 
		if (count($kriteria_fasilitas) > 0) { ?>
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Pilihan Kriteria</th>
							<th width="10%">Bobot</th>
							<th>Keterangan</th>
							<th width="20%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						foreach ($kriteria_fasilitas as $kf) { ?>
							<tr>
								<td><?=$kf->pilihan_kriteria ?></td>
								<td width="10%" align="center"><?=$kf->bobot ?></td>
								<td align="center"><?=$kf->keterangan ?></td>
								<td width="20%" align="center">
									<button title="edit" data-id="<?= $kf->id_kriteria ?>" class="btn btn-info btn-sm btn-circle editKriteriaFasilitas"><i class="fa fa-edit"></i></button>
									<button data-id="<?= $kf->id_kriteria ?>" title="hapus" class="btn btn-danger btn-sm btn-circle deleteKriteriaFasilitas"><i class="fa fa-trash"></i></button>
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
<div class="modal fade" id="modalKriteriaFasilitas" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="formKriteriaFasilitas" autocomplete="off">
				<div class="modal-header">
					<h5 class="modal-title" id="titleKriteriaFasilitas"><span></span> Kriteria Fasilitas</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="idKriteriaFasilitas">
					<div class="form-group">
						<label for="pilihanKriteriaFasilitas">Pilihan Kriteria C5</label>
						<input type="text" name="pilihanKriteriaFasilitas" id="pilihanKriteriaFasilitas" class="form-control">
					</div>
					<div class="form-group">
						<label for="keteranganKriteriaFasilitas">Keterangan</label>
						<input type="text" name="keteranganKriteriaFasilitas" id="keteranganKriteriaFasilitas" class="form-control">
					</div>
					<div class="form-group">
						<label for="bobotKriteriaFasilitas">Bobot</label>
						<input type="number" name="bobotKriteriaFasilitas" id="bobotKriteriaFasilitas" class="form-control">
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
<div class="modal fade" id="modalDeleteKriteriaFasilitas" tabindex="-1" role="dialog" aria-hidden="true">
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
				<button id="confirmDeleteKriteriaFasilitas" class="btn btn-danger">Hapus</button>
			</div>
		</div>
	</div>
</div>


<script>
	var tbl_kriteria_fasilitas="kriteria_fasilitas";
	// open modal add
	$("#addKriteriaFasilitas").click(function(e) {
		reset_data_kf();
		$("#titleKriteriaFasilitas span").text("Tambah");
		$("#modalKriteriaFasilitas").modal("show");
	});

	// open modal edit
	$(".editKriteriaFasilitas").click(function(e) {
		reset_data_kf();
		var id = $(this).data("id");
		$.getJSON('<?php echo base_url('admin/kriteria/getKriteriaById/') ?>'+id,{
			tbl:tbl_kriteria_fasilitas
		},function(data) {
			$("#idKriteriaFasilitas").val(data.id_kriteria)
			$("#pilihanKriteriaFasilitas").val(data.pilihan_kriteria)
			$("#keteranganKriteriaFasilitas").val(data.keterangan)
			$("#bobotKriteriaFasilitas").val(data.bobot)
		});
		$("#titleKriteriaFasilitas span").text("Edit");
		$("#modalKriteriaFasilitas").modal("show");
	});


	// save button 
	$("#formKriteriaFasilitas").submit(function(e) {
		e.preventDefault();
		var pilihanKriteriaFasilitas = $("#pilihanKriteriaFasilitas").val();
		var bobotKriteriaFasilitas = $("#bobotKriteriaFasilitas").val();
		var keteranganKriteriaFasilitas = $("#keteranganKriteriaFasilitas").val();

		if (pilihanKriteriaFasilitas == '' && bobotKriteriaFasilitas == '' && keteranganKriteriaFasilitas == '') {
			alert("Isi semua data!");
		}else{
			var data = {
				"idKriteria": $("#idKriteriaFasilitas").val(),
				"pilihanKriteria" : pilihanKriteriaFasilitas,
				"keteranganKriteria" : keteranganKriteriaFasilitas,
				"bobotKriteria" : bobotKriteriaFasilitas,
				"tbl":tbl_kriteria_fasilitas
			}

			$.ajax({
				url: '<?php echo base_url('admin/kriteria/saveKriteria') ?>',
				type: 'POST',
				data: data,
				success: function(res) {
					if (res == "success") {
						window.location.reload();
					}
				}
			});
			
			reset_data_kf();
			$("#modalKriteriaFasilitas").modal("hide");
		}

	});

	// delete modal show
	var idKriteriaFasilitas="";
	$(".deleteKriteriaFasilitas").click(function(e) {
		idKriteriaFasilitas = $(this).data("id");
		$("#modalDeleteKriteriaFasilitas").modal("show");
	});
	// confirm delete button
	$("#confirmDeleteKriteriaFasilitas").click(function(e) {
		$.ajax({
			url: '<?php echo base_url('admin/kriteria/deleteKriteria/') ?>'+idKriteriaFasilitas,
			type: 'GET',
			data:"tbl="+tbl_kriteria_fasilitas,
			success: function(res) {
				if (res == "success") {
					window.location.reload();
				}
			}
		});
		
	});

	function reset_data_kf(){
		$("#idKriteriaFasilitas").val("");
		$("#pilihanKriteriaFasilitas").val("");
		$("#bobotKriteriaFasilitas").val("");
	}

</script>
