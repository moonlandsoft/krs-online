<h1>
<a href="<?= $_url ?>" class="nav-button transform"><span></span></a>
Mahasiswa
<span class="place-right">
	<a href="<?= $_url ?>mahasiswa/synchronize" class="button"><span class="mif-sync-problem"></span> Sinkronisasi Data</a>
	<a href="<?= $_url ?>mahasiswa/add" class="button">Tambah Mahasiswa</a>
</span>
</h1>

<?php
	$sql = "SELECT mahasiswa.*, prodi.nama as prodi_nama FROM mahasiswa 
			LEFT JOIN prodi ON prodi.kode=mahasiswa.prodi_kode
			ORDER BY nim ASC";
	$query = mysqli_query($koneksi, $sql);
?>

<table class="table striped hovered border bordered">
	<thead>
		<tr>
			<th>NIM</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Jenis Kelamin</th>
			<th>Program Studi</th>
			<th>Tahun Masuk</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

	<?php
		if (mysqli_num_rows($query) > 0):
			while($field = mysqli_fetch_array($query)):
	?>
		<tr>
			<td><?= $field['nim'] ?></td>
			<td><?= $field['nama'] ?></td>
			<td><?= $field['alamat'] ?></td>
			<td><?= $field['jenis_kelamin'] ?></td>
			<td><?= $field['prodi_nama'] ?></td>
			<td><?= $field['tahun_masuk'] ?></td>
			<td>
				<div class="inline-block">
				    <button class="button mini-button dropdown-toggle">Aksi</button>
				    <ul class="split-content d-menu" data-role="dropdown">
						<li><a href="<?= $_url ?>mahasiswa/view/<?= $field['nim'] ?>/<?= urlencode($field['nama']) ?>"><span class="mif-zoom-in"></span> View</a></li>
						<li><a href="<?= $_url ?>mahasiswa/edit/<?= $field['nim'] ?>/<?= urlencode($field['nama']) ?>"><span class="mif-pencil"></span> Edit</a></li>
						<li><a href="<?= $_url ?>mahasiswa/delete/<?= $field['nim'] ?>/<?= urlencode($field['nama']) ?>"><span class="mif-cross"></span> Delete</a></li>
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