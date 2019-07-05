<div class="card shadow mb-3">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Kriteria Jarak Ke Pasar (C3)</h6>
		<button class="btn btn-primary btn-sm" id="addKriteriaJarakPasar"><i class="fa fa-plus"></i> Tambah</button>
	</div>
	<div class="card-body">
		<?php 
		if (count($kriteria_jarakpasar) > 0) { ?>
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th>Pilihan Kriteria</th>
							<th width="10%">Bobot</th>
							<th width="20%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$num = 1;
						foreach ($kriteria_jarakpasar as $kjp) { ?>
							<tr>
								<td width="5%" align="center"><?=$num++ ?>.</td>
								<td><?=$kjp->pilihan_kriteria ?></td>
								<td width="10%" align="center"><?=$kjp->bobot ?></td>
								<td width="20%" align="center">
									<button title="edit" data-id="<?= $kjp->id_kriteria ?>" class="btn btn-info btn-sm btn-circle editKriteriaJarakPasar"><i class="fa fa-edit"></i></button>
									<button data-id="<?= $kjp->id_kriteria ?>" title="hapus" class="btn btn-danger btn-sm btn-circle deleteKriteriaJarakPasar"><i class="fa fa-trash"></i></button>
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
<div class="modal fade" id="modalKriteriaJarakPasar" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="formKriteriaJarakPasar" autocomplete="off">
				<div class="modal-header">
					<h5 class="modal-title" id="titleKriteriaJarakPasar"><span></span> Kriteria Jarak Ke Pasar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="idKriteriaJarakPasar">
					<div class="form-group">
						<label for="pilihanKriteriaJarakPasar">Pilihan Kriteria C3</label>
						<input type="text" name="pilihanKriteriaJarakPasar" id="pilihanKriteriaJarakPasar" class="form-control">
					</div>
					<div class="form-group">
						<label for="bobotKriteriaJarakPasar">Bobot</label>
						<input type="number" name="bobotKriteriaJarakPasar" id="bobotKriteriaJarakPasar" class="form-control">
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
<div class="modal fade" id="modalDeleteKriteriaJarakPasar" tabindex="-1" role="dialog" aria-hidden="true">
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
				<button id="confirmDeleteKriteriaJarakPasar" class="btn btn-danger">Hapus</button>
			</div>
		</div>
	</div>
</div>


<script>
	// open modal add
	$("#addKriteriaJarakPasar").click(function(e) {
		reset_data();
		$("#titleKriteriaJarakPasar span").text("Tambah");
		$("#modalKriteriaJarakPasar").modal("show");
	});

	// open modal edit
	$(".editKriteriaJarakPasar").click(function(e) {
		reset_data();
		var id = $(this).data("id");
		$.get('<?php echo base_url('admin/kriteria/getKriteriaJarakPasarById/') ?>'+id, function(data) {
			$("#idKriteriaJarakPasar").val(data.id_kriteria)
			$("#pilihanKriteriaJarakPasar").val(data.pilihan_kriteria)
			$("#bobotKriteriaJarakPasar").val(data.bobot)
		},'json');
		$("#titleKriteriaJarakPasar span").text("Edit");
		$("#modalKriteriaJarakPasar").modal("show");
	});


	// save button 
	$("#formKriteriaJarakPasar").submit(function(e) {
		e.preventDefault();
		var pilihanKriteriaJarakPasar = $("#pilihanKriteriaJarakPasar").val();
		var bobotKriteriaJarakPasar = $("#bobotKriteriaJarakPasar").val();

		if (pilihanKriteriaJarakPasar == '' && bobotKriteriaJarakPasar == '') {
			alert("Isi semua data!");
		}else{
			var data = {
				"idKriteriaJarakPasar": $("#idKriteriaJarakPasar").val(),
				"pilihanKriteriaJarakPasar" : pilihanKriteriaJarakPasar,
				"bobotKriteriaJarakPasar" : bobotKriteriaJarakPasar,
			}

			$.ajax({
				url: '<?php echo base_url('admin/kriteria/saveKriteriaJarakPasar') ?>',
				type: 'POST',
				data: data,
				success: function(res) {
					if (res == "success") {
						window.location.reload();
					}
				}
			});
			
			reset_data();
			$("#modalKriteriaJarakPasar").modal("hide");
		}

	});

	// delete modal show
	var idKriteriaJarakPasar="";
	$(".deleteKriteriaJarakPasar").click(function(e) {
		idKriteriaJarakPasar = $(this).data("id");
		$("#modalDeleteKriteriaJarakPasar").modal("show");
	});
	// confirm delete button
	$("#confirmDeleteKriteriaJarakPasar").click(function(e) {
		$.ajax({
			url: '<?php echo base_url('admin/kriteria/deleteKriteriaJarakPasar/') ?>'+idKriteriaJarakPasar,
			type: 'POST',
			success: function(res) {
				if (res == "success") {
					window.location.reload();
				}
			}
		});
		
	});

	function reset_data(){
		$("#idKriteriaJarakPasar").val("");
		$("#pilihanKriteriaJarakPasar").val("");
		$("#bobotKriteriaJarakPasar").val("");
	}

</script>
