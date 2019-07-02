<div class="card shadow mb-3">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Kriteria Harga</h6>
		<button class="btn btn-primary btn-sm" id="addKriteriaHarga"><i class="fa fa-plus"></i> Tambah</button>
	</div>
	<div class="card-body">
		<?php 
		if (count($kriteria_harga) > 0) { ?>
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th>Pilihan Kriteria</th>
							<th width="10%">Bobot</th>
							<th width="10%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$num = 1;
						foreach ($kriteria_harga as $kh) { ?>
							<tr>
								<td width="5%" align="center"><?=$num++ ?>.</td>
								<td><?=$kh->pilihan_kriteria ?></td>
								<td width="10%"><?=$kh->bobot ?></td>
								<td width="10%" align="center">
									<button title="edit" data-id="<?= $kh->id_kriteria ?>" class="btn btn-info btn-sm btn-circle editKriteriaHarga"><i class="fa fa-edit"></i></button>
									<button title="hapus" class="btn btn-danger btn-sm btn-circle"><i class="fa fa-trash"></i></button>
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

<!-- modal -->
<div class="modal fade" id="modalKriteriaHarga" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="formKriteriaHarga" autocomplete="off">
				<div class="modal-header">
					<h5 class="modal-title" id="titleKriteriaHarga"><span></span> Kriteria Harga</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="hidden" id="idKriterHarga">
					<div class="form-group">
						<label for="pilihanKriteriaHarga">Pilihan Kriteria C1</label>
						<input type="text" name="pilihanKriteriaHarga" id="pilihanKriteriaHarga" class="form-control">
					</div>
					<div class="form-group">
						<label for="bobotKriteriaHarga">Bobot</label>
						<input type="number" name="bobotKriteriaHarga" id="bobotKriteriaHarga" class="form-control">
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


<script>
	// open modal add
	$("#addKriteriaHarga").click(function(e) {
		reset_data();
		$("#titleKriteriaHarga span").text("Tambah");
		$("#modalKriteriaHarga").modal("show");
	});

	// open modal edit
	$(".editKriteriaHarga").click(function(e) {
		reset_data();

		var id = $(this).data("id");
		$.get('<?php echo base_url('admin/kriteria/getKriteriaHargaById/') ?>'+id, function(data) {
			$("#idKriterHarga").val(data.id_kriteria)
			$("#pilihanKriteriaHarga").val(data.pilihan_kriteria)
			$("#bobotKriteriaHarga").val(data.bobot)
		},'json');
		$("#titleKriteriaHarga span").text("Edit");
		$("#modalKriteriaHarga").modal("show");
	});


	// save button 
	$("#formKriteriaHarga").submit(function(e) {
		e.preventDefault();
		var pilihanKriteriaHarga = $("#pilihanKriteriaHarga").val();
		var bobotKriteriaHarga = $("#bobotKriteriaHarga").val();

		if (pilihanKriteriaHarga == '' && bobotKriteriaHarga == '') {
			alert("Isi semua data!");
		}else{
			var data = {
				"pilihanKriteriaHarga" : pilihanKriteriaHarga,
				"bobotKriteriaHarga" : bobotKriteriaHarga,
			}

			$.ajax({
				url: '<?php echo base_url('admin/kriteria/addKriteriaHarga') ?>',
				type: 'POST',
				data: data,
				success: function(res) {
					if (res == "success") {
						alert("Berhasil");
					}else{
						alert("Gagal");
					}
				}
			});
			
			reset_data();
			$("#modalKriteriaHarga").modal("hide");
		}

	});
	function reset_data(){
		$("#pilihanKriteriaHarga").val("");
		$("#bobotKriteriaHarga").val("");
	}

</script>
