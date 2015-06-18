<?php

if (isset($_params[2]) && $_params[2] == 'yes') {
$query = mysqli_query($koneksi, "DELETE FROM prodi WHERE kode='{$_id}'");

	if ($query) {
		echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data program-studi Berhasil Dihapus',
			type: 'success'
		});
		setTimeout(function(){ window.location.href='{$_url}program-studi'; }, 2000);
		</script>";
	} else {
		echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Program-studi Gagal Dihapus',
		    type: 'alert'
		});</script>";
	}
}
?>

<h1>Hapus Program-studi</h1>
<h3>Apakah anda yakin akan menghapus program-studi dengan KODE <?= $_id ?> yang bernama <?= urldecode($_params[1]) ?>?</h3>
<a href="<?= $_url ?>program-studi/delete/<?= $_id ?>/<?= $_params[1] ?>/yes" class="button primary">Yes</a> <a href="<?= $_url ?>program-studi" class="button danger">No</a>