<?php

if (isset($_params[2]) && $_params[2] == 'yes') {
$query = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim='{$_id}'");

	if ($query) {
		echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data Mahasiswa Berhasil Dihapus',
			type: 'success'
		});
		setTimeout(function(){ window.location.href='{$_url}mahasiswa'; }, 2000);
		</script>";
	} else {
		echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Mahasiswa Gagal Dihapus',
		    type: 'alert'
		});</script>";
	}
}
?>

<h1>Hapus Mahasiswa</h1>
<h3>Apakah anda yakin akan menghapus mahasiswa dengan NIM <?= $_id ?> yang bernama <?= urldecode($_params[1]) ?>?</h3>
<a href="<?= $_url ?>mahasiswa/delete/<?= $_id ?>/<?= $_params[1] ?>/yes" class="button primary">Yes</a> <a href="<?= $_url ?>mahasiswa" class="button danger">No</a>