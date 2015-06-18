<h1>
<a href="<?= $_url ?>" class="nav-button transform"><span></span></a>
Dosen
<span class="place-right">
	<a href="<?= $_url ?>dosen/add" class="button">Tambah Dosen</a>
</span>
</h1>

<?php
	$sql = "SELECT * FROM dosen ORDER BY npk ASC";
	$query = mysqli_query($koneksi, $sql);
?>

<table class="table striped hovered border bordered">
	<thead>
		<tr>
			<th>NPK</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Jenis Kelamin</th>
			<th>Gelar</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

	<?php
		if (mysqli_num_rows($query) > 0):
			while($field = mysqli_fetch_array($query)):
	?>
		<tr>
			<td><?= $field['npk'] ?></td>
			<td><?= $field['nama'] ?></td>
			<td><?= $field['alamat'] ?></td>
			<td><?= $field['jenis_kelamin'] ?></td>
			<td><?= $field['gelar'] ?></td>
			<td>
				<div class="inline-block">
				    <button class="button mini-button dropdown-toggle">Aksi</button>
				    <ul class="split-content d-menu" data-role="dropdown">
						<li><a href="<?= $_url ?>dosen/view/<?= $field['npk'] ?>/<?= urlencode($field['nama']) ?>"><span class="mif-zoom-in"></span> View</a></li>
						<li><a href="<?= $_url ?>dosen/edit/<?= $field['npk'] ?>/<?= urlencode($field['nama']) ?>"><span class="mif-pencil"></span> Edit</a></li>
						<li><a href="<?= $_url ?>dosen/delete/<?= $field['npk'] ?>/<?= urlencode($field['nama']) ?>"><span class="mif-cross"></span> Delete</a></li>
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