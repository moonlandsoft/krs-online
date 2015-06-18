<?php

if (isset($_params[2]) && $_params[2] == 'yes') {
$query = mysqli_query($koneksi, "DELETE FROM matakuliah WHERE kode='{$_id}'");

	if ($query) {
		echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data matakuliah Berhasil Dihapus',
			type: 'success'
		});
		setTimeout(function(){ window.location.href='{$_url}matakuliah'; }, 2000);
		</script>";
	} else {
		echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Matakuliah Gagal Dihapus',
		    type: 'alert'
		});</script>";
	}
}
?>

<h1>Hapus Matakuliah</h1>
<h3>Apakah anda yakin akan menghapus matakuliah dengan KODE <?= $_id ?> yang berjudul <?= urldecode($_params[1]) ?>?</h3>
<a href="<?= $_url ?>matakuliah/delete/<?= $_id ?>/<?= $_params[1] ?>/yes" class="button primary">Yes</a> <a href="<?= $_url ?>matakuliah" class="button danger">No</a>