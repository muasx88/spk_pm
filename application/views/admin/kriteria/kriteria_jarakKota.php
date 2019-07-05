<div class="card shadow mb-3">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Kriteria Jarak Ke Pusat Kota (C2)</h6>
		<button class="btn btn-primary btn-sm" id="addKriteriaJarakKota"><i class="fa fa-plus"></i> Tambah</button>
	</div>
	<div class="card-body">
		<?php 
		if (count($kriteria_jarakkota) > 0) { ?>
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
						foreach ($kriteria_jarakkota as $kjk) { ?>
							<tr>
								<td width="5%" align="center"><?=$num++ ?>.</td>
								<td><?=$kjk->pilihan_kriteria ?></td>
								<td width="10%" align="center"><?=$kjk->bobot ?></td>
								<td width="20%" align="center">
									<button title="edit" data-id="<?= $kjk->id_kriteria ?>" class="btn btn-info btn-sm btn-circle editKriteriaJarakKota"><i class="fa fa-edit"></i></button>
									<button data-id="<?= $kjk->id_kriteria ?>" title="hapus" class="btn btn-danger btn-sm btn-circle deleteKriteriaJarakKota"><i class="fa fa-trash"></i></button>
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
<div class="modal fade" id="modalKriteriaJarakKota" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="formKriteriaJarakKota" autocomplete="off">
				<div class="modal-header">
					<h5 class="modal-title" id="titleKriteriaJarakKota"><span></span> Kriteria Jarak Ke Kota</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="idKriteriaJarakKota">
					<div class="form-group">
						<label for="pilihanKriteriaJarakKota">Pilihan Kriteria C2</label>
						<input type="text" name="pilihanKriteriaJarakKota" id="pilihanKriteriaJarakKota" class="form-control">
					</div>
					<div class="form-group">
						<label for="bobotKriteriaJarakKota">Bobot</label>
						<input type="number" name="bobotKriteriaJarakKota" id="bobotKriteriaJarakKota" class="form-control">
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
<div class="modal fade" id="modalDeleteKriteriaJarakKota" tabindex="-1" role="dialog" aria-hidden="true">
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
				<button id="confirmDeleteKriteriaJarakKota" class="btn btn-danger">Hapus</button>
			</div>
		</div>
	</div>
</div>


<script>
	// open modal add
	$("#addKriteriaJarakKota").click(function(e) {
		reset_data_kjk();
		$("#titleKriteriaJarakKota span").text("Tambah");
		$("#modalKriteriaJarakKota").modal("show");
	});

	// open modal edit
	$(".editKriteriaJarakKota").click(function(e) {
		reset_data_kjk();
		var id = $(this).data("id");
		$.get('<?php echo base_url('admin/kriteria/getKriteriaJarakKotaById/') ?>'+id, function(data) {
			$("#idKriteriaJarakKota").val(data.id_kriteria)
			$("#pilihanKriteriaJarakKota").val(data.pilihan_kriteria)
			$("#bobotKriteriaJarakKota").val(data.bobot)
		},'json');
		$("#titleKriteriaJarakKota span").text("Edit");
		$("#modalKriteriaJarakKota").modal("show");
	});


	// save button 
	$("#formKriteriaJarakKota").submit(function(e) {
		e.preventDefault();
		var pilihanKriteriaJarakKota = $("#pilihanKriteriaJarakKota").val();
		var bobotKriteriaJarakKota = $("#bobotKriteriaJarakKota").val();

		if (pilihanKriteriaJarakKota == '' && bobotKriteriaJarakKota == '') {
			alert("Isi semua data!");
		}else{
			var data = {
				"idKriteriaJarakKota": $("#idKriteriaJarakKota").val(),
				"pilihanKriteriaJarakKota" : pilihanKriteriaJarakKota,
				"bobotKriteriaJarakKota" : bobotKriteriaJarakKota,
			}

			$.ajax({
				url: '<?php echo base_url('admin/kriteria/saveKriteriaJarakKota') ?>',
				type: 'POST',
				data: data,
				success: function(res) {
					if (res == "success") {
						window.location.reload();
					}
				}
			});
			
			reset_data_kjk();
			$("#modalKriteriaJarakKota").modal("hide");
		}

	});

	// delete modal show
	var idKriteriaJarakKota="";
	$(".deleteKriteriaJarakKota").click(function(e) {
		idKriteriaJarakKota = $(this).data("id");
		$("#modalDeleteKriteriaJarakKota").modal("show");
	});
	// confirm delete button
	$("#confirmDeleteKriteriaJarakKota").click(function(e) {
		$.ajax({
			url: '<?php echo base_url('admin/kriteria/deleteKriteriaJarakKota/') ?>'+idKriteriaJarakKota,
			type: 'POST',
			success: function(res) {
				if (res == "success") {
					window.location.reload();
				}
			}
		});
		
	});

	function reset_data_kjk(){
		$("#idKriteriaJarakKota").val("");
		$("#pilihanKriteriaJarakKota").val("");
		$("#bobotKriteriaJarakKota").val("");
	}

</script>
