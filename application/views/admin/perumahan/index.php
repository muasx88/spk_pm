<div class="card shadow">
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Data Perumahan</h6>
    <a href="<?= base_url('admin/perumahan/tambah') ?>" class="btn btn-primary btn-sm" id="tambah"><i class="fa fa-plus"></i> Tambah</a>
  </div>
  <div class="card-body">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Perumahan</th>
					<th>Alamat</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach ($data_perumahan as $p) { ?>
					<tr>
						<td><?= $no++ ?>.</td>
						<td><?= $p->nama_perumahan ?></td>
						<td><?= $p->alamat ?></td>
						<td>Aksi</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
  </div>
 
</div>


<!-- modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
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
				<div class="form-group">
					<label for="nama_perumahan">Nama Perumahan</label>
					<input type="text" name="nama_perumahan" id="nama_perumahan" class="form-control">
				</div>

				<div class="form-group">
					<label for="alamat">Alamat</label>
					<input type="text" name="alamat" id="alamat" class="form-control">
				</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save changes</button>
	      </div>
      </form>
    </div>
  </div>
</div>