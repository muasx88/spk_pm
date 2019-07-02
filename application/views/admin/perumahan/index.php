<div class="card shadow">
	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		<h6 class="m-0 font-weight-bold text-primary">Data Perumahan</h6>
		<a href="<?= base_url('admin/perumahan/tambah') ?>" class="btn btn-primary btn-sm" id="tambah"><i class="fa fa-plus"></i> Tambah</a>
	</div>
	<div class="card-body">
		<?php 
		if (count($data_perumahan) > 0) { ?>
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
								<td><?= $p->alamat_perumahan ?></td>
								<td>
									<a href="<?php echo base_url('admin/perumahan/edit/'.$p->id_perumahan) ?>" title="edit" class="btn btn-info btn-sm btn-circle"><i class="fa fa-edit"></i></a>
									<a href="<?php echo base_url('admin/perumahan/delete/'.$p->id_perumahan) ?>" onclick="return confirm('Apakah anda yakin')" title="hapus" class="btn btn-danger btn-sm btn-circle"><i class="fa fa-trash"></i></a>
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
