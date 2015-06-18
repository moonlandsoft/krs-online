<h1>
<a href="<?= $_url ?>" class="nav-button transform"><span></span></a>
Users
<span class="place-right">
	<a href="<?= $_url ?>user/synchronize" class="button">Sinkronisasi User</a>
	<a href="<?= $_url ?>user/add" class="button">Tambah User</a>
</span>
</h1>

<?php
	$sql = "SELECT * FROM user ORDER BY nama ASC";
	$query = mysqli_query($koneksi, $sql);
?>

<table class="table striped hovered border bordered">
	<thead>
		<tr>
			<th>Nama</th>
			<th>Username</th>
			<th>Level</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

	<?php
		if (mysqli_num_rows($query) > 0):
			while($field = mysqli_fetch_array($query)):
	?>
		<tr>
			<td><?= $field['nama'] ?></td>
			<td><?= $field['username'] ?></td>
			<td><?= $field['status'] ?></td>
			<td>
				<div class="inline-block">
				    <button class="button mini-button dropdown-toggle">Aksi</button>
				    <ul class="split-content d-menu" data-role="dropdown">
						<li><a href="<?= $_url ?>user/edit/<?= $field['id'] ?>/<?= urlencode($field['username']) ?>"><span class="mif-pencil"></span> Edit</a></li>
						<li><a href="<?= $_url ?>user/delete/<?= $field['id'] ?>/<?= urlencode($field['username']) ?>"><span class="mif-cross"></span> Delete</a></li>
				    </ul>
				</div>
			</td>
		</tr>
	<?php
			endwhile;
		else:
	?>
		<tr>
			<td colspan="6">
			Data tidak ditemukan
			</td>
		</tr>
	<?php
		endif;
	?>
		
	</tbody>
</table>