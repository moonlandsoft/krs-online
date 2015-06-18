<?php


?>
<h1>
<a href="<?= $_url ?>" class="nav-button transform"><span></span></a>
Change Password
</h1>

<?php
$password = '';
$password_repeat = '';
if (isset($_POST['submit'])) {

	extract($_POST);

	$sql = "UPDATE user SET password=md5('{$password}') WHERE username='{$_username}'";

	if ($password == $password_repeat && mysqli_query($koneksi, $sql)) {
		echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Ubah Password Berhasil',
    		type: 'success'
		});</script>";
	} else {
		echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Ubah Password Gagal.<br>Check lagi password baru dan ulangi password baru harus sama.',
		    type: 'alert'
		});</script>";
	}
}
?>

<form method="post">

<div class="grid">

<div class="row cells2">
	<div class="cell">
		<label>Password Baru</label>
		<div class="input-control text full-size">
			<input type="password" name="password" value="<?= $password ?>">
		</div>
	</div>
	
	<div class="cell">
		<label>Ulangi Password Baru</label>
		<div class="input-control text full-size">
			<input type="password" name="password_repeat" value="<?= $password_repeat ?>">
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