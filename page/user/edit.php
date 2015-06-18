<?php
$querya = mysqli_query($koneksi, "SELECT * FROM user WHERE id='{$_id}'");
$field = mysqli_fetch_array($querya);
extract($field);
?>
<h1>
<a href="<?= $_url ?>user" class="nav-button transform"><span></span></a>
Edit User <br> <?= $username ?>
</h1>

<?php

if (isset($_POST['submit'])) {

	extract($_POST);

	$setdb = array("username='{$username}'","nama='{$nama}'");

	if ($password != null)
		$setdb[] = "password=md5('{$password}')";

	$setdb = implode(',', $setdb);

	$sql = "UPDATE user SET {$setdb} WHERE id='{$_id}'";
	$query = mysqli_query($koneksi, $sql);

	if ($query) {
		echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data User Berhasil Ubah',
    		type: 'success'
		});</script>";
	} else {
		echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data User Gagal Ubah',
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
			<input type="text" name="username" value="<?= $username ?>">
		</div>
	</div>
	
	<div class="cell">
		<label>Password</label>
		<div class="input-control password full-size">
			<input type="text" name="password">
		</div>
	</div>
</div>

<div class="row cells2">
	<div class="cell">
		<label>Nama</label>
		<div class="input-control text full-size">
			<input type="text" name="nama" value="<?= $nama ?>">
		</div>
	</div>

	<div class="cell">
		<label>Level</label>
		<div class="full-size">
		<label class="input-control radio">
			<input type="radio" name="status" value="admin" <?= isset($status) && $status=='admin' ? 'selected' : '' ?>>
		    <span class="check"></span>
		    <span class="caption">Admin</span>
		</label>
		<label class="input-control radio">
			<input type="radio" name="status" value="dosen" <?= isset($status) && $status=='dosen' ? 'selected' : '' ?>>
		    <span class="check"></span>
		    <span class="caption">Dosen</span>
		</label>
		<label class="input-control radio">
			<input type="radio" name="status" value="mahasiswa" <?= isset($status) && $status=='mahasiswa' ? 'selected' : '' ?>>
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