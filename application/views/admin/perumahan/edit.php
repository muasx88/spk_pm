<div class="card shadow">
	<div class="card-body">
		<form action="<?= base_url('admin/perumahan/edit/'.$old->id_perumahan) ?>" method="POST" autocomplete="off">
			<div class="form-group">
				<label for="nama_perumahan">Nama Perumahan</label>
				<input value="<?=$old->nama_perumahan?>" type="text" name="nama_perumahan" id="nama_perumahan" class="form-control <?= form_error('nama_perumahan') != null ? 'is-invalid' : ''  ?>">
				<span class="invalid-feedback">
					<?php echo form_error('nama_perumahan'); ?>
				</span>
			</div>

			<div class="form-group">
				<label for="alamat">Alamat</label>
				<input type="text" name="alamat" id="alamat" class="form-control" value="<?=$old->alamat_perumahan?>">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary mr-3"><i class="fa fa-save"></i> Update</button>
				<button type="reset" class="btn btn-secondary"><i class="fa fa-undo"></i> Reset</button>
			</div>
		</form>
	</div>

</div>


<!-- modal -->
<!-- <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="formPerumahan">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
-->
