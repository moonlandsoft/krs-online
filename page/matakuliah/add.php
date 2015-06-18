<h1>
<a href="<?= $_url ?>matakuliah" class="nav-button transform"><span></span></a>
Tambah Matakuliah
</h1>

<?php
if (isset($_POST['submit'])) {

	extract($_POST);

	$sql = "INSERT INTO matakuliah values('{$kode}', '{$nama}', '{$sks}', '{$singkatan}', '{$semester}', '{$prodi_kode}');";
	$query = mysqli_query($koneksi, $sql);

	if ($query) {
		echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data Matakuliah Berhasil Ditambah',
    		type: 'success'
		});</script>";
	} else {
		echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Matakuliah Gagal Ditambah',
		    type: 'alert'
		});</script>";
	}
}
?>

<form method="post">

<div class="grid">

<div class="row cells2">
	<div class="cell">
		<label>Kode</label>
		<div class="input-control text full-size">
			<input type="text" name="kode">
		</div>
	</div>
	
	<div class="cell">
		<label>Nama</label>
		<div class="input-control text full-size">
			<input type="text" name="nama">
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Jumlah SKS</label>
		<div class="input-control number full-size">
			<input type="number" maxlength="1" name="sks">
		</div>
	</div>

	<div class="cell">
		<label>Semester</label>
		<div class="input-control text full-size">
			<input type="number" maxlength="1" name="semester">
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Singkatan</label>
		<div class="input-control text full-size">
			<input type="text" name="singkatan">
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
						echo "<option value='{$field['kode']}'>{$field['nama']}</option>";
					}
				?>
			</select>
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<button type="submit" name="submit" class="button primary">SUBMIT</button>
	</div>
</div>

</div>

</form>