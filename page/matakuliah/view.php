<style type="text/css">
	.input-control {
		border: 1px solid #d9d9d9;
		padding: 10px;
	}
</style>

<?php
$querya = mysqli_query($koneksi, "SELECT matakuliah.*, prodi.nama as prodi_nama FROM matakuliah 
	LEFT JOIN prodi ON matakuliah.prodi_kode=prodi.kode 
	WHERE matakuliah.kode='{$_id}'");
$field = mysqli_fetch_array($querya);
extract($field);
?>
<h1>
<a href="<?= $_url ?>matakuliah" class="nav-button transform"><span></span></a>
Matakuliah <br> <?= $nama ?>
</h1>

<div class="grid">

<div class="row cells2">
	<div class="cell">
		<label>Kode</label>
		<div class="input-control text full-size">
			<?= $kode ?>
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
		<label>Jumlah SKS</label>
		<div class="input-control text full-size">
			<?= $sks ?>
		</div>
	</div>

	<div class="cell">
		<label>Semester</label>
		<div class="input-control text full-size">
			<?= $semester ?>
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Singkatan</label>
		<div class="input-control text full-size">
			<?= $singkatan ?>
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

<div class="panel" data-role="panel">
    <div class="heading">
        <span class="title">Dosen Pengajar Matakuliah</span>
    </div>
    <div class="content">
		<a href="<?= $_url ?>matakuliah/add-dosen/<?= $_id ?>/<?= $prodi_kode ?>" class="button primary">Tambah Dosen Pengajar</a>
		<?php
			$sql = "SELECT dosen.* FROM dosen_matakuliah 
			LEFT JOIN dosen ON dosen_matakuliah.dosen_npk=dosen.npk 
			WHERE dosen_matakuliah.matakuliah_kode='{$_id}'
			ORDER BY dosen.npk ASC";
			$query = mysqli_query($koneksi, $sql);
		?>

		<table class="table striped hovered border bordered">
			<thead>
				<tr>
					<th>NPK</th>
					<th>Nama Dosen</th>
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
					<td>
						<a href="<?= $_url ?>matakuliah/delete-dosen/<?= $_id ?>/<?= $field['npk'] ?>/<?= urlencode($field['nama']) ?>"><span class="mif-cross"></span></a>
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