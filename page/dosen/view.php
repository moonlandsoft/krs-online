<?php
	if ($_access == 'dosen' && $_id != $_username) {
		header("location:{$_url}dosen/view/{$_username}");
	}
?>
<style type="text/css">
	.input-control {
		border: 1px solid #d9d9d9;
		padding: 10px;
	}
</style>

<?php
$querya = mysqli_query($koneksi, "SELECT * FROM dosen WHERE npk='{$_id}'");
$field = mysqli_fetch_array($querya);
extract($field);
?>
<h1>
<a href="<?= $_url ?><?= $_access == 'admin' ? 'dosen' : '' ?>" class="nav-button transform"><span></span></a>
Dosen <br> <?= $nama ?>
</h1>

<a href="<?= $_url ?>dosen/edit/<?= $_id ?>/<?= urlencode($nama) ?>" class="button primary">Update Data</a>

<div class="grid">

<div class="row cells2">
	<div class="cell">
		<label>NPK</label>
		<div class="input-control text full-size">
			<?= $npk ?>
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
		<label>Jenis Kelamin</label>
		<div class="input-control text full-size">
			<?= $jenis_kelamin ?>
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Gelar</label>
		<div class="input-control text full-size">
			<?= $gelar ?>
		</div>
	</div>
</div>

</div>

<div class="panel" data-role="panel">
    <div class="heading">
        <span class="title">Program Studi</span>
    </div>
    <div class="content">
        <?php if ($_access == 'admin'): ?>
		<a href="<?= $_url ?>dosen/add-prodi/<?= $_id ?>" class="button">Tambahkan Program Studi</a>
		<?php endif; ?>
		<?php
			$sqla = "SELECT dosen_prodi.*, prodi.nama as prodi_nama FROM dosen_prodi 
			LEFT JOIN prodi ON dosen_prodi.prodi_kode=prodi.kode
			WHERE dosen_prodi.dosen_npk='{$_id}'
			ORDER BY prodi_nama ASC";
			$querya = mysqli_query($koneksi, $sqla);

		?>
		<table class="table striped hovered border bordered">
			<thead>
				<tr>
					<th>Kode</th>
					<th>Nama</th>
				</tr>
			</thead>
			<tbody>

			<?php
				if (mysqli_num_rows($querya) > 0):
					while($field = mysqli_fetch_array($querya)):
			?>
				<tr>
					<td><?= $field['prodi_kode'] ?></td>
					<td><?= $field['prodi_nama'] ?>
					<?php if ($_access == 'admin'): ?>
					<a href="<?= $_url ?>dosen/delete-prodi/<?= $_id ?>/<?= $field['prodi_kode'] ?>/<?= urlencode($field['prodi_nama']) ?>" class="place-right"><span class="mif-cross"></span></a>
					<?php endif; ?>
					</td>
				</tr>
			<?php
					endwhile;
				else:
			?>
				<tr>
					<td colspan="3">
					Data tidak ditemukan
					</td>
				</tr>
			<?php
				endif;
			?>
				
			</tbody>
		</table>
	</div>
</div>

<div class="panel" data-role="panel">
    <div class="heading">
        <span class="title">Mengajar Matakuliah</span>
    </div>
    <div class="content">
		<?php
			$sqlb = "SELECT matakuliah.*, prodi.nama as prodi_nama FROM matakuliah 
			LEFT JOIN prodi ON matakuliah.prodi_kode=prodi.kode
			INNER JOIN dosen_matakuliah ON dosen_matakuliah.matakuliah_kode=matakuliah.kode
			WHERE dosen_matakuliah.dosen_npk='{$_id}'
			ORDER BY matakuliah.kode ASC";
			$queryb = mysqli_query($koneksi, $sqlb);
		?>

		<table class="table striped hovered border bordered">
			<thead>
				<tr>
					<th>Kode</th>
					<th>Nama</th>
					<th>SKS</th>
					<th>Semester</th>
					<th>Program Studi</th>
				</tr>
			</thead>
			<tbody>

			<?php
				if (mysqli_num_rows($queryb) > 0):
					while($field = mysqli_fetch_array($queryb)):
			?>
				<tr>
					<td><?= $field['kode'] ?></td>
					<td><?= $field['nama'] ?></td>
					<td><?= $field['sks'] ?></td>
					<td><?= $field['semester'] ?></td>
					<td><?= $field['prodi_nama'] ?></td>
				</tr>
			<?php
					endwhile;
				else:
			?>
				<tr>
					<td colspan="5">
					Data tidak ditemukan
					</td>
				</tr>
			<?php
				endif;
			?>
				
			</tbody>
		</table>
	</div>
</div>

<?php if ($_access == 'admin') : ?>
<div class="panel" data-role="panel">
    <div class="heading">
        <span class="title">WALI dari Mahasiswa</span>
    </div>
    <div class="content">
        <?php if ($_access == 'admin'): ?>
		<a href="<?= $_url ?>dosen/add-mahasiswa/<?= $_id ?>" class="button">Tambahkan Mahasiswa</a>
		<?php endif; ?>

		<?php
			$sqlb = "SELECT mahasiswa.*, prodi.nama as prodi_nama FROM dosen_wali 
			LEFT JOIN mahasiswa ON mahasiswa.nim=dosen_wali.mahasiswa_nim
			LEFT JOIN prodi ON prodi.kode=mahasiswa.prodi_kode
			WHERE dosen_wali.dosen_npk='{$_id}'
			ORDER BY mahasiswa.nim ASC";
			$queryb = mysqli_query($koneksi, $sqlb);
		?>

		<table class="table striped hovered border bordered">
			<thead>
				<tr>
					<th>NIM</th>
					<th>Nama</th>
					<th>Tahun Masuk</th>
					<th>Program Studi</th>
					<th></th>
				</tr>
			</thead>
			<tbody>

			<?php
				if (mysqli_num_rows($queryb) > 0):
					while($field = mysqli_fetch_array($queryb)):
			?>
				<tr>
					<td><?= $field['nim'] ?></td>
					<td><?= $field['nama'] ?></td>
					<td><?= $field['tahun_masuk'] ?></td>
					<td><?= $field['prodi_nama'] ?></td>
					<td>
					<?php if ($_access == 'admin'): ?>
					<a href="<?= $_url ?>dosen/delete-mahasiswa/<?= $_id ?>/<?= $field['nim'] ?>/<?= urlencode($field['nama']) ?>"><span class="mif-cross"></span></a>
					<?php endif; ?>
					</td>
				</tr>
			<?php
					endwhile;
				else:
			?>
				<tr>
					<td colspan="5">
					Data tidak ditemukan
					</td>
				</tr>
			<?php
				endif;
			?>
				
			</tbody>
		</table>
	</div>
</div>
<?php endif; ?>