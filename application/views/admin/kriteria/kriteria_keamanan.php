<div class="card shadow mb-3">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Kriteria Keamanan (C4)</h6>
		<button class="btn btn-primary btn-sm" id="addKriteriaKeamanan"><i class="fa fa-plus"></i> Tambah</button>
	</div>
	<div class="card-body">
		<?php 
		if (count($kriteria_keamanan) > 0) { ?>
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
						foreach ($kriteria_keamanan as $kk) { ?>
							<tr>
								<td width="5%" align="center"><?=$num++ ?>.</td>
								<td><?=$kk->pilihan_kriteria ?></td>
								<td width="10%" align="center"><?=$kk->bobot ?></td>
								<td width="20%" align="center">
									<button title="edit" data-id="<?= $kk->id_kriteria ?>" class="btn btn-info btn-sm btn-circle editKriteriaKeamanan"><i class="fa fa-edit"></i></button>
									<button data-id="<?= $kk->id_kriteria ?>" title="hapus" class="btn btn-danger btn-sm btn-circle deleteKriteriaKeamanan"><i class="fa fa-trash"></i></button>
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
<div class="modal fade" id="modalKriteriaKeamanan" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="formKriteriaKeamanan" autocomplete="off">
				<div class="modal-header">
					<h5 class="modal-title" id="titleKriteriaKeamanan"><span></span> Kriteria Keamanan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="idKriteriaKeamanan">
					<div class="form-group">
						<label for="pilihanKriteriaKeamanan">Pilihan Kriteria C4</label>
						<input type="text" name="pilihanKriteriaKeamanan" id="pilihanKriteriaKeamanan" class="form-control">
					</div>
					<div class="form-group">
						<label for="bobotKriteriaKeamanan">Bobot</label>
						<input type="number" name="bobotKriteriaKeamanan" id="bobotKriteriaKeamanan" class="form-control">
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
<div class="modal fade" id="modalDeleteKriteriaKeamanan" tabindex="-1" role="dialog" aria-hidden="true">
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
				<button id="confirmDeleteKriteriaKeamanan" class="btn btn-danger">Hapus</button>
			</div>
		</div>
	</div>
</div>


<script>
	// open modal add
	$("#addKriteriaKeamanan").click(function(e) {
		reset_data();
		$("#titleKriteriaKeamanan span").text("Tambah");
		$("#modalKriteriaKeamanan").modal("show");
	});

	// open modal edit
	$(".editKriteriaKeamanan").click(function(e) {
		reset_data();
		var id = $(this).data("id");
		$.get('<?php echo base_url('admin/kriteria/getKriteriaKeamananById/') ?>'+id, function(data) {
			$("#idKriteriaKeamanan").val(data.id_kriteria)
			$("#pilihanKriteriaKeamanan").val(data.pilihan_kriteria)
			$("#bobotKriteriaKeamanan").val(data.bobot)
		},'json');
		$("#titleKriteriaKeamanan span").text("Edit");
		$("#modalKriteriaKeamanan").modal("show");
	});


	// save button 
	$("#formKriteriaKeamanan").submit(function(e) {
		e.preventDefault();
		var pilihanKriteriaKeamanan = $("#pilihanKriteriaKeamanan").val();
		var bobotKriteriaKeamanan = $("#bobotKriteriaKeamanan").val();

		if (pilihanKriteriaKeamanan == '' && bobotKriteriaKeamanan == '') {
			alert("Isi semua data!");
		}else{
			var data = {
				"idKriteriaKeamanan": $("#idKriteriaKeamanan").val(),
				"pilihanKriteriaKeamanan" : pilihanKriteriaKeamanan,
				"bobotKriteriaKeamanan" : bobotKriteriaKeamanan,
			}

			$.ajax({
				url: '<?php echo base_url('admin/kriteria/saveKriteriaKeamanan') ?>',
				type: 'POST',
				data: data,
				success: function(res) {
					if (res == "success") {
						window.location.reload();
					}
				}
			});
			
			reset_data();
			$("#modalKriteriaKeamanan").modal("hide");
		}

	});

	// delete modal show
	var idKriteriaKeamanan="";
	$(".deleteKriteriaKeamanan").click(function(e) {
		idKriteriaKeamanan = $(this).data("id");
		$("#modalDeleteKriteriaKeamanan").modal("show");
	});
	// confirm delete button
	$("#confirmDeleteKriteriaKeamanan").click(function(e) {
		$.ajax({
			url: '<?php echo base_url('admin/kriteria/deleteKriteriaKeamanan/') ?>'+idKriteriaKeamanan,
			type: 'POST',
			success: function(res) {
				if (res == "success") {
					window.location.reload();
				}
			}
		});
		
	});

	function reset_data(){
		$("#idKriteriaKeamanan").val("");
		$("#pilihanKriteriaKeamanan").val("");
		$("#bobotKriteriaKeamanan").val("");
	}

</script>
