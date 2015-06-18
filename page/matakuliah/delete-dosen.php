<?php
$matakuliah_kode = $_id;
$dosen_npk = $_params[1];

if (isset($_params[3]) && $_params[3] == 'yes') {

	$query = mysqli_query($koneksi, "DELETE FROM dosen_matakuliah WHERE matakuliah_kode='{$_id}' AND dosen_npk='{$dosen_npk}'");

	if ($query) {
		echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data Dosen Pengajar Berhasil Dihapus',
			type: 'success'
		});
		setTimeout(function(){ window.location.href='{$_url}matakuliah/view/{$matakuliah_kode}'; }, 2000);
		</script>";
	} else {
		echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Dosen Pengajar Gagal Dihapus',
		    type: 'alert'
		});</script>";
	}
}
?>

<h1>Hapus Dosen Pengajar</h1>
<h3>Apakah anda yakin akan menghapus Dosen Pengajar dengan NPK <?= $dosen_npk ?> yang bernama <?= urldecode($_params[2]) ?>?</h3>
<a href="<?= $_url ?>matakuliah/delete-dosen/<?= $matakuliah_kode ?>/<?= $dosen_npk ?>/<?= $_params[2] ?>/yes" class="button primary">Yes</a>
<a href="<?= $_url ?>matakuliah/view/<?= $matakuliah_kode ?>" class="button danger">No</a>