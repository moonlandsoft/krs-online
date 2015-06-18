<h1>
<a href="<?= $_url ?>" class="nav-button transform"><span></span></a>
Matakuliah
<span class="place-right">
	<a href="<?= $_url ?>matakuliah/add" class="button">Tambah Matakuliah</a>
</span>
</h1>

<?php
	$sql = "SELECT matakuliah.*, prodi.nama as prodi_nama FROM matakuliah 
	LEFT JOIN prodi ON matakuliah.prodi_kode=prodi.kode ORDER BY matakuliah.kode ASC";
	$query = mysqli_query($koneksi, $sql);
?>

<table class="table striped hovered border bordered">
	<thead>
		<tr>
			<th>Kode</th>
			<th>Nama</th>
			<th>SKS</th>
			<th>Semester</th>
			<th>Program Studi</th>
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
			<td><?= $field['sks'] ?></td>
			<td><?= $field['semester'] ?></td>
			<td><?= $field['prodi_nama'] ?></td>
			<td>
				<div class="inline-block">
				    <button class="button mini-button dropdown-toggle">Aksi</button>
				    <ul class="split-content d-menu" data-role="dropdown">
						<li><a href="<?= $_url ?>matakuliah/view/<?= $field['kode'] ?>/<?= urlencode($field['nama']) ?>">
						<span class="mif-zoom-in"></span> View</a></li>
						<li><a href="<?= $_url ?>matakuliah/edit/<?= $field['kode'] ?>/<?= urlencode($field['nama']) ?>">
						<span class="mif-pencil"></span> Edit</a></li>
						<li><a href="<?= $_url ?>matakuliah/delete/<?= $field['kode'] ?>/<?= urlencode($field['nama']) ?>">
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