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
						</select>
					</div>

					<div class="form-group">
						<label for="c1">Kriteria Harga (C1)</label>
						<select class="form-control" name="c1" id="c1">
						</select>
					</div>
					<div class="form-group">
						<label for="c2">Kriteria Jarak Ke Pusat Kota (C2)</label>
						<select class="form-control" name="c2" id="c2">
						</select>
					</div>
					<div class="form-group">
						<label for="c3">Kriteria Jarak Ke Pasar (C3)</label>
						<select class="form-control" name="c3" id="c3">
						</select>
					</div>
					<div class="form-group">
						<label for="c4">Kriteria Keamanan (C4)</label>
						<select class="form-control" name="c4" id="c4">
						</select>
					</div>
					<div class="form-group">
						<label for="c5">Kriteria Fasilitas (C5)</label>
						<select class="form-control" name="c5" id="c5">
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

	// get data json
	function getDataJson() {
		// get data perumahan and append to select
		$.getJSON('<?php echo base_url('admin/perumahan/getPerumahanJSON') ?>', function(data) {
			$('#idPerumahan').append($('<option>').text("Pilih").attr('value', ""));
			$.each(data.data, function(i, obj){
				$('#idPerumahan').append($('<option>').text(obj.nama_perumahan).attr('value', obj.id_perumahan));
			});
		});


		// get data KRITERIA HARGA and append to select
		$.getJSON('<?php echo base_url('admin/kriteria/getKriteriaJSON') ?>',{
			db:"kriteria_harga"
		},function(data) {
			$('#c1').append($('<option>').text("Pilih").attr('value', ""));
			$.each(data.data, function(i, obj){
				$('#c1').append($('<option>').text(obj.pilihan_kriteria).attr('value', obj.id_kriteria));
			});
		});

		// get data KRITERIA JARAK KE PUSAT KOTA and append to select
		$.getJSON('<?php echo base_url('admin/kriteria/getKriteriaJSON') ?>',{
			db:"kriteria_jarakkota"
		},function(data) {
			$('#c2').append($('<option>').text("Pilih").attr('value', ""));
			$.each(data.data, function(i, obj){
				$('#c2').append($('<option>').text(obj.pilihan_kriteria).attr('value', obj.id_kriteria));
			});
		});

		// get data KRITERIA JARAK KE PASAR and append to select
		$.getJSON('<?php echo base_url('admin/kriteria/getKriteriaJSON') ?>',{
			db:"kriteria_jarakpasar"
		},function(data) {
			$('#c3').append($('<option>').text("Pilih").attr('value', ""));
			$.each(data.data, function(i, obj){
				$('#c3').append($('<option>').text(obj.pilihan_kriteria).attr('value', obj.id_kriteria));
			});
		});

		// get data KRITERIA KEAMANAN and append to select
		$.getJSON('<?php echo base_url('admin/kriteria/getKriteriaJSON') ?>',{
			db:"kriteria_keamanan"
		},function(data) {
			$('#c4').append($('<option>').text("Pilih").attr('value', ""));
			$.each(data.data, function(i, obj){
				$('#c4').append($('<option>').text(obj.pilihan_kriteria).attr('value', obj.id_kriteria));
			});
		});

		// get data KRITERIA FASILITAS and append to select
		$.getJSON('<?php echo base_url('admin/kriteria/getKriteriaJSON') ?>',{
			db:"kriteria_fasilitas"
		},function(data) {
			$('#c5').append($('<option>').text("Pilih").attr('value', ""));
			$.each(data.data, function(i, obj){
				$('#c5').append($('<option>').text(obj.pilihan_kriteria).attr('value', obj.id_kriteria));
			});
		});
	}

	// open modal add
	$("#addPenilaian").click(function(e) {
		reset_data_penilaian();
		$('select option').remove();
		getDataJson();
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
		reset_data_penilaian();
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