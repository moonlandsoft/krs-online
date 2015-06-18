<h1>
<a href="<?= $_url ?>" class="nav-button transform"><span></span></a>
Program Studi
<span class="place-right">
	<a href="<?= $_url ?>program-studi/add" class="button">Tambah Program Studi</a>
</span>
</h1>

<?php
	$sql = "SELECT * FROM prodi ORDER BY kode ASC";
	$query = mysqli_query($koneksi, $sql);
?>

<table class="table striped hovered border bordered">
	<thead>
		<tr>
			<th>Kode</th>
			<th>Nama</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

	<?php
		if (mysqli_num_rows($query) > 0):
			while($field = mysqli_fetch_array($query)):
	?>
		<tr>
			<td><?= $field['kode'] ?></td>
			<td><?= $field['nama'] ?></td>
			<td>
				<div class="inline-block">
				    <button class="button mini-button dropdown-toggle">Aksi</button>
				    <ul class="split-content d-menu" data-role="dropdown">
						<li><a href="<?= $_url ?>program-studi/edit/<?= $field['kode'] ?>/<?= urlencode($field['nama']) ?>">
						<span class="mif-pencil"></span> Edit</a></li>
						<li><a href="<?= $_url ?>program-studi/delete/<?= $field['kode'] ?>/<?= urlencode($field['nama']) ?>">
						<span class="mif-cross"></span> Delete</a></li>
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