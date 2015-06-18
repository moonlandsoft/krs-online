<h1>
<a href="<?= $_url ?>matakuliah/view/<?= $_id ?>" class="nav-button transform"><span></span></a>
Tambah Dosen Pengajar
</h1>

<?php
	$matakuliah_kode = $_id;	
	if (isset($_POST['submit'])) {
		$npk = $_POST['npk'];
		$sqlin = "INSERT INTO dosen_matakuliah(dosen_npk,matakuliah_kode) VALUES('{$npk}','{$matakuliah_kode}')";
		$query = mysqli_query($koneksi, $sqlin);

		if ($query) {
			echo "<script>$.Notify({
			    caption: 'Success',
			    content: 'Data Dosen Pengajar Berhasil Ditambah',
	    		type: 'success'
			});</script>";
		} else {
			echo "<script>$.Notify({
			    caption: 'Failed',
			    content: 'Data Dosen Pengajar Gagal Ditambah',
			    type: 'alert'
			});</script>";
		}
	}


	$prodi_kode = $_params[1];

	$dosen_matakuliah = mysqli_query($koneksi, "SELECT dosen_npk FROM dosen_matakuliah WHERE matakuliah_kode='{$matakuliah_kode}'");
	$dm = array();
	while ($dosen = mysqli_fetch_array($dosen_matakuliah)) {
		$dm[] = "'{$dosen['dosen_npk']}'";
	}
	$dm = implode(',', $dm);

	$sql = "SELECT * FROM dosen 
			INNER JOIN dosen_prodi ON dosen.npk=dosen_prodi.dosen_npk AND dosen_prodi.prodi_kode='{$prodi_kode}'";
	if (!empty($dm))
		$sql .= " WHERE dosen.npk NOT IN ({$dm})";

	$sql .= " ORDER BY npk ASC";

	$query = mysqli_query($koneksi, $sql);
?>

<form method="post">

<table class="table striped hovered border bordered">
	<thead>
		<tr>
			<th></th>
			<th>NPK</th>
			<th>Nama</th>
			<th>Gelar</th>
		</tr>
	</thead>
	<tbody>

	<?php
		if (mysqli_num_rows($query) > 0):
			while($field = mysqli_fetch_array($query)):
	?>
		<tr>
			<td><input type="radio" name="npk" value="<?= $field['npk'] ?>"></td>
			<td><?= $field['npk'] ?></td>
			<td><?= $field['nama'] ?></td>
			<td><?= $field['gelar'] ?></td>
		</tr>
	<?php
			endwhile;
		else:
	?>
		<tr>
			<td colspan="4">
			Data tidak ditemukan
			</td>
		</tr>
	<?php
		endif;
	?>
		
	</tbody>
</table>

<button type="submit" name="submit" class="button primary">SUBMIT</button>

</form>