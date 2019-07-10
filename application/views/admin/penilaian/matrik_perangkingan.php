<?php 
if (count($data_kecocokan) > 0) { ?>
	<div class="card shadow mb-3">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary">Matrik Perangkingan</h6>
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
							<th class="text-center">Jumlah</th>
						</tr>
					</thead>
					<tbody>
						<?php $alternatif = "A"; 
						foreach ($matrik_perangkingan as $dk) { ?>
							<tr>
								<td><?= $dk['nama_perumahan'] ?></td>
								<td align="center"><?= $dk["C1"] ?></td>
								<td align="center"><?= $dk["C2"] ?></td>
								<td align="center"><?= $dk["C3"] ?></td>
								<td align="center"><?= $dk["C4"] ?></td>
								<td align="center"><?= $dk["C5"] ?></td>
								<td align="center"><?= $dk["jumlah"] ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="card shadow mb-3">
		<div class="card-body">
			<h3>Kesimpulan</h3>
			<p>Dari hasil perhitungan rangking diatas, maka pemilihan Perumahan Muslim terbaik adalah <strong><?= $rangking->nama_perumahan ?></strong> dengan nilai <strong><?= $rangking->nilai ?></strong></p>
		</div>
	</div>




<?php } ?>
