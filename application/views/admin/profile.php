<div class="card shadow">
	<div class="card-body">
		<table class="table table-borderless">
			<?php foreach ($admin as $ad) { ?>
				<tr>
					<td>Username</td>
					<td>:</td>
					<td><?= $ad->username ?></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><?= $ad->nama ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?= $ad->email ?></td>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>
