<h1>
<a href="<?= $_url ?>user" class="nav-button transform"><span></span></a>
Tambah User
</h1>

<?php
if (isset($_POST['submit'])) {

	extract($_POST);

	$sql = "INSERT INTO user(nama,username, password, status) values('{$nama}','{$username}', md5('{$password}'), '{$status}')";
	$query = mysqli_query($koneksi, $sql);

	if ($query) {
		echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data User Berhasil Ditambah',
    		type: 'success'
		});</script>";
	} else {
		echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data User Gagal Ditambah',
		    type: 'alert'
		});</script>";
	}
}
?>

<form method="post">

<div class="grid">

<div class="row cells2">
	<div class="cell">
		<label>Username</label>
		<div class="input-control text full-size">
			<input type="text" name="username">
		</div>
	</div>
	
	<div class="cell">
		<label>Password</label>
		<div class="input-control text full-size">
			<input type="password" name="password">
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Nama</label>
		<div class="input-control text full-size">
			<input type="text" name="nama">
		</div>
	</div>

	<div class="cell">
		<label>Level</label>
		<div class="full-size">
		<label class="input-control radio">
			<input type="radio" name="status" value="admin">
		    <span class="check"></span>
		    <span class="caption">Admin</span>
		</label>
		<label class="input-control radio">
			<input type="radio" name="status" value="dosen">
		    <span class="check"></span>
		    <span class="caption">Dosen</span>
		</label>
		<label class="input-control radio">
			<input type="radio" name="status" value="mahasiswa">
		    <span class="check"></span>
		    <span class="caption">Mahasiswa</span>
		</label>
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