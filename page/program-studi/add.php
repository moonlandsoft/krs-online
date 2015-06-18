<h1>
<a href="<?= $_url ?>program-studi" class="nav-button transform"><span></span></a>
Tambah Program Studi
</h1>

<?php
if (isset($_POST['submit'])) {

	extract($_POST);

	$sql = "INSERT INTO prodi values('{$kode}', '{$nama}');";
	$query = mysqli_query($koneksi, $sql);

	if ($query) {
		echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data Program studi Berhasil Ditambah',
    		type: 'success'
		});</script>";
	} else {
		echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Program studi Gagal Ditambah',
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
		<button type="submit" name="submit" class="button primary">SUBMIT</button>
	</div>
</div>

</div>

</form>