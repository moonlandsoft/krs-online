<?php
	if ($_access == 'mahasiswa' && $_id != $_username) {
		header("location:{$_url}mahasiswa/edit/{$_username}");
	}

$querya = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='{$_id}'");
$field = mysqli_fetch_array($querya);
extract($field);
?>
<h1>
<a href="<?= $_url ?>mahasiswa<?= $_access == 'mahasiswa' ? '/view/' . $_id . '/' . urlencode($nama) : '' ?>" class="nav-button transform"><span></span></a>
Edit Mahasiswa<br><?= $nama ?>
</h1>

<?php

if (isset($_POST['submit'])) {

	extract($_POST);

	$sql = "UPDATE mahasiswa SET nim='{$nim}', prodi_kode='{$prodi_kode}', nama='{$nama}', alamat='{$alamat}', telepon='{$telepon}', tempat_lahir='{$tempat_lahir}', 
		tanggal_lahir='{$tanggal_lahir}', agama='{$agama}', jenis_kelamin='{$jenis_kelamin}', tahun_masuk='{$tahun_masuk}' WHERE nim='{$_id}'";
	$query = mysqli_query($koneksi, $sql);

	if ($query) {
		echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data Mahasiswa Berhasil Ubah',
    		type: 'success'
		});</script>";
	} else {
		echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Mahasiswa Gagal Ubah',
		    type: 'alert'
		});</script>";
	}
}
?>

<form method="post">

<div class="grid">

<div class="row cells2">
	<?php if ($_access == 'admin'): ?>
	<div class="cell">
		<label>NIM</label>
		<div class="input-control text full-size">
			<input type="text" name="nim" value="<?= $nim ?>">
		</div>
	</div>
	<?php endif; ?>
	
	<div class="cell">
		<label>Nama</label>
		<div class="input-control text full-size">
			<input type="text" name="nama" value="<?= $nama ?>">
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Alamat</label>
		<div class="input-control text full-size">
			<input type="text" name="alamat" value="<?= $alamat ?>">
		</div>
	</div>

	<div class="cell">
		<label>Telepon</label>
		<div class="input-control text full-size">
			<input type="text" name="telepon" value="<?= $telepon ?>">
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Tempat Lahir</label>
		<div class="input-control text full-size">
			<input type="text" name="tempat_lahir" value="<?= $tempat_lahir ?>">
		</div>
	</div>

	<div class="cell">
		<label>Tanggal Lahir</label>
		<div class="input-control text full-size" data-role="datepicker" data-format="yyyy-mm-dd">
			<input type="text" name="tanggal_lahir" value="<?= $tanggal_lahir ?>">
			<button class="button"><span class="mif-calendar"></span></button>
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Agama</label>
		<div class="input-control text full-size">
			<input type="text" name="agama" value="<?= $agama ?>">
		</div>
	</div>

	<div class="cell">
		<label>Jenis Kelamin</label>
		<div class="full-size">
		<label class="input-control radio">
			<input type="radio" name="jenis_kelamin" value="Laki-laki" <?= $jenis_kelamin=='Laki-laki'? 'selected' : '' ?>>
		    <span class="check"></span>
		    <span class="caption">Laki-laki</span>
		</label>
		<label class="input-control radio">
			<input type="radio" name="jenis_kelamin" value="Perempuan" <?= $jenis_kelamin=='Perempuan'? 'selected' : '' ?>>
		    <span class="check"></span>
		    <span class="caption">Perempuan</span>
		</label>
		</div>
	</div>
</div>

<?php if ($_access == 'admin'): ?>
<div class="row cells2">
	<div class="cell">
		<label>Tahun Masuk</label>
		<div class="input-control text full-size">
			<input type="text" name="tahun_masuk" value="<?= $tahun_masuk ?>">
		</div>
	</div>

	<div class="cell">
		<label>Program Studi</label>
		<div class="input-control select full-size">
			<select name="prodi_kode">
				<option value="">-- pilih --</option>
				<?php
					$query = mysqli_query($koneksi, "SELECT * FROM prodi ORDER BY kode");
					while ($field = mysqli_fetch_array($query)) {
						if ($field['kode'] == $prodi_kode)
							echo "<option value='{$field['kode']}' selected>{$field['nama']}</option>";
						else
							echo "<option value='{$field['kode']}'>{$field['nama']}</option>";
					}
				?>
			</select>
		</div>
	</div>
</div>
<?php endif; ?>

<div class="row cells2">
	<div class="cell">
		<button type="submit" name="submit" class="button primary">SUBMIT</button>
	</div>
</div>

</div>

</form>