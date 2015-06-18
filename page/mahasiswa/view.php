<?php
	if ($_access == 'mahasiswa' && $_id != $_username) {
		header("location:{$_url}mahasiswa/view/{$_username}");
	}
?>
<style type="text/css">
	.input-control {
		border: 1px solid #d9d9d9;
		padding: 10px;
	}
</style>

<?php
$querya = mysqli_query($koneksi, "SELECT mahasiswa.*, prodi.nama as prodi_nama FROM mahasiswa 
	LEFT JOIN prodi ON prodi.kode=mahasiswa.prodi_kode WHERE nim='{$_id}'");
$field = mysqli_fetch_array($querya);
extract($field);
?>
<h1>
<a href="<?= $_url ?><?= $_access == 'admin' ? 'mahasiswa' : '' ?>" class="nav-button transform"><span></span></a>
Mahasiswa <br> <?= $nama ?>
</h1>

<?php if (in_array($_access, array('admin','mahasiswa'))): ?>
<a href="<?= $_url ?>mahasiswa/edit/<?= $_id ?>/<?= urlencode($nama) ?>" class="button primary">Update Data</a>
<?php endif; ?>

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
		<label>Alamat</label>
		<div class="input-control text full-size">
			<?= $alamat ?>
		</div>
	</div>

	<div class="cell">
		<label>Telepon</label>
		<div class="input-control text full-size">
			<?= $telepon ?>
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Tempat Lahir</label>
		<div class="input-control text full-size">
			<?= $tempat_lahir ?>
		</div>
	</div>

	<div class="cell">
		<label>Tanggal Lahir</label>
		<div class="input-control text full-size">
			<?= $tanggal_lahir ?>
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Agama</label>
		<div class="input-control text full-size">
			<?= $agama ?>
		</div>
	</div>

	<div class="cell">
		<label>Jenis Kelamin</label>
		<div class="input-control text full-size">
			<?= $jenis_kelamin ?>
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Tahun Masuk</label>
		<div class="input-control text full-size">
			<?= $tahun_masuk ?>
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