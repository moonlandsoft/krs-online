<h1>
<a href="<?= $_url ?>mahasiswa" class="nav-button transform"><span></span></a>
Tambah Mahasiswa
</h1>

<?php
if (isset($_POST['submit'])) {

	extract($_POST);

	$sql = "INSERT INTO mahasiswa values('{$nim}', '{$prodi_kode}', '{$nama}', '{$alamat}', '{$telepon}', '{$tempat_lahir}', 
		'{$tanggal_lahir}', '{$agama}', '{$jenis_kelamin}', '{$tahun_masuk}')";
	$query = mysqli_query($koneksi, $sql);

	if ($query) {
		echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data Mahasiswa Berhasil Ditambah',
    		type: 'success'
		});</script>";
	} else {
		echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Mahasiswa Gagal Ditambah',
		    type: 'alert'
		});</script>";
	}
}
?>

<form method="post">

<div class="grid">

<div class="row cells2">
	<div class="cell">
		<label>NIM</label>
		<div class="input-control text full-size">
			<input type="text" name="nim">
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
		<label>Alamat</label>
		<div class="input-control text full-size">
			<input type="text" name="alamat">
		</div>
	</div>

	<div class="cell">
		<label>Telepon</label>
		<div class="input-control text full-size">
			<input type="text" name="telepon">
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Tempat Lahir</label>
		<div class="input-control text full-size">
			<input type="text" name="tempat_lahir">
		</div>
	</div>

	<div class="cell">
		<label>Tanggal Lahir</label>
		<div class="input-control text full-size" data-role="datepicker" data-format="yyyy-mm-dd">
			<input type="text" name="tanggal_lahir">
			<button class="button"><span class="mif-calendar"></span></button>
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Agama</label>
		<div class="input-control text full-size">
			<input type="text" name="agama">
		</div>
	</div>

	<div class="cell">
		<label>Jenis Kelamin</label>
		<div class="full-size">
		<label class="input-control radio">
			<input type="radio" name="jenis_kelamin" value="Laki-laki">
		    <span class="check"></span>
		    <span class="caption">Laki-laki</span>
		</label>
		<label class="input-control radio">
			<input type="radio" name="jenis_kelamin" value="Perempuan">
		    <span class="check"></span>
		    <span class="caption">Perempuan</span>
		</label>
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Tahun Masuk</label>
		<div class="input-control text full-size">
			<input type="text" name="tahun_masuk">
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