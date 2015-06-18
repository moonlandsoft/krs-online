<?php
	if ($_access == 'mahasiswa' && $_id != $_username) {
		header("location:{$_url}krs/view/{$_username}");
	}
?>
<style type="text/css">
	.input-control {
		border: 1px solid #d9d9d9;
		padding: 10px;
	}
</style>

<h1>
<a href="<?= $_url ?><?= in_array($_access, array('admin','dosen')) ? 'krs' : '' ?>" class="nav-button transform"><span></span></a>
KRS Mahasiswa
</h1>

<?php
$querya = mysqli_query($koneksi, "SELECT mahasiswa.*, prodi.nama as prodi_nama FROM mahasiswa 
	LEFT JOIN prodi ON prodi.kode=mahasiswa.prodi_kode WHERE nim='{$_id}'");
$field = mysqli_fetch_array($querya);
extract($field);
?>

<div class="grid">

<div class="row cells2">
	<div class="cell">
		<label>NIM</label>
		<div class="input-control text full-size">
			<?= $nim ?>
		</div>
	</div>
	
	<div class="cell">
		<label>Nama</label>
		<div class="input-control text full-size">
			<?= $nama ?>
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Tahun Ajaran</label>
		<div class="input-control text full-size">
			<?= $_tahun_ajaran ?>
		</div>
	</div>

	<div class="cell">
		<label>Program Studi</label>
		<div class="input-control text full-size">
			<?= $prodi_nama ?>
		</div>
	</div>
</div>

</div>

<a href="<?= $_url ?>krs/add/<?= $_id ?>" class="button primary">Pilih Matakuliah</a>
<?php if (in_array($_access, array('admin', 'dosen'))): ?>
<a href="<?= $_url ?>krs/approve/<?= $_id ?>" class="button success">Approve</a>
<?php endif; ?>

<?php
	//if (in_array($_access, array('admin', 'mahasiswa'))) {
		$sql = "SELECT krs.*,matakuliah.nama as matakuliah_nama, matakuliah.kode as matakuliah_kode, dosen.nama as dosen_nama, dosen.gelar as dosen_gelar 
			FROM krs
			LEFT JOIN dosen_matakuliah ON krs.dosen_mk_id=dosen_matakuliah.id
			LEFT JOIN matakuliah ON dosen_matakuliah.matakuliah_kode=matakuliah.kode
			LEFT JOIN dosen ON dosen_matakuliah.dosen_npk=dosen.npk
			WHERE krs.nim='{$nim}'
			ORDER BY matakuliah.kode ASC";
	/*
	} else if ($_access == 'dosen') {
		$sql = "SELECT krs.*,matakuliah.nama as matakuliah_nama, matakuliah.kode as matakuliah_kode, dosen.nama as dosen_nama, dosen.gelar as dosen_gelar 
			FROM krs
			LEFT JOIN dosen_matakuliah ON krs.dosen_mk_id=dosen_matakuliah.id
			LEFT JOIN matakuliah ON dosen_matakuliah.matakuliah_kode=matakuliah.kode
			LEFT JOIN dosen ON dosen_matakuliah.dosen_npk=dosen.npk
			LEFT JOIN dosen_wali ON dosen_wali.mahasiswa_nim=krs.nim
			WHERE krs.nim='{$nim}' AND dosen_wali.dosen_npk='{$_username}'
			ORDER BY matakuliah.kode ASC";
	}*/

	$query = mysqli_query($koneksi, $sql);
?>

<table class="table striped hovered border bordered">
	<thead>
		<tr>
			<th>Kode</th>
			<th>Matakuliah</th>
			<th>Dosen</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

	<?php
		if (mysqli_num_rows($query) > 0):
			while($field = mysqli_fetch_array($query)):
	?>
		<tr>
			<td><?= $field['matakuliah_kode'] ?></td>
			<td><?= $field['matakuliah_nama'] ?></td>
			<td><?= $field['dosen_nama'] ?>, <?= $field['dosen_gelar'] ?></td>
			<td>
				<?php if (!$field['accept'] OR in_array($_access, array('admin'))): ?>
					<a href="<?= $_url ?>krs/delete/<?= $nim ?>/<?= $field['id'] ?>/<?= urlencode($field['matakuliah_nama']) ?>"><span class="mif-cross"></span></a>
				<?php else: ?>
					<span class="mif-checkmark"></span>
				<?php endif; ?>
			</td>
		</tr>
	<?php
			endwhile;
		else:
	?>
		<tr>
			<td colspan="4">
			Data tidak ditemukan
			</td>
		</tr>
	<?php
		endif;
	?>
		
	</tbody>
</table>