<?php 
if (count($data_kecocokan) > 0) { ?>
	<div class="card shadow mb-3">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary">Rating Kecocokan</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Alternatif</th>
							<th class="text-center">C1</th>
							<th class="text-center">C2</th>
							<th class="text-center">C3</th>
							<th class="text-center">C4</th>
							<th class="text-center">C5</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data_kecocokan as $dk) { ?>
							<tr>
								<td><?= $dk->nama_perumahan ?></td>
								<td align="center"><?= $dk->c1_bobot ?></td>
								<td align="center"><?= $dk->c2_bobot ?></td>
								<td align="center"><?= $dk->c3_bobot ?></td>
								<td align="center"><?= $dk->c4_bobot ?></td>
								<td align="center"><?= $dk->c5_bobot ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php } ?>
