<h1>
<a href="<?= $_url ?>krs/view/<?= $_id ?>" class="nav-button transform"><span></span></a>
Pilih Matakuliah
</h1>
<?php
$querya = mysqli_query($koneksi, "SELECT mahasiswa.*, prodi.nama as prodi_nama FROM mahasiswa 
	LEFT JOIN prodi ON prodi.kode=mahasiswa.prodi_kode WHERE nim='{$_id}'");
$field = mysqli_fetch_array($querya);
extract($field);
?>

<?php
	$npk = $_id;
	if (isset($_POST['submit'])) {
		extract($_POST);

		$sqlin = "INSERT INTO krs(nim,dosen_mk_id,tahun_ajaran) VALUES('{$nim}','{$mkid}','{$_tahun_ajaran}')";
		$query = mysqli_query($koneksi, $sqlin);

		if ($query) {
			mysqli_query($koneksi, "UPDATE dosen_matakuliah SET `join`=`join`+1 WHERE id={$mkid}");
			echo "<script>$.Notify({
			    caption: 'Success',
			    content: 'Matakuliah Berhasil Dipilih',
	    		type: 'success'
			});</script>";
		} else {
			echo "<script>$.Notify({
			    caption: 'Failed',
			    content: 'Matakuliah Gagal Dipilih',
			    type: 'alert'
			});</script>";
		}
	}

	$qmatakuliah = mysqli_query($koneksi, "SELECT dosen_mk_id FROM krs WHERE nim='{$nim}'");
	$dm = array();
	while ($mk = mysqli_fetch_array($qmatakuliah)) {
		$dm[] = "'{$mk['dosen_mk_id']}'";
	}
	$dm = implode(',', $dm);

	$sql = "SELECT dosen_matakuliah.*, matakuliah.nama as matakuliah_nama, matakuliah.kode as matakuliah_kode, dosen.nama as dosen_nama, dosen.gelar as dosen_gelar 
			FROM dosen_matakuliah 
			LEFT JOIN matakuliah ON dosen_matakuliah.matakuliah_kode=matakuliah.kode
			LEFT JOIN dosen ON dosen_matakuliah.dosen_npk=dosen.npk
			WHERE matakuliah.prodi_kode='{$prodi_kode}' AND dosen_matakuliah.tahun_ajaran='{$_tahun_ajaran}'
			";

	if ($dm!='')
		$sql .= " AND dosen_matakuliah.id not in ({$dm})";

	$sql .= " ORDER BY matakuliah.kode ASC";
	$query= mysqli_query($koneksi, $sql);
?>

<form method="post">

<table class="table striped hovered border bordered">
	<thead>
		<tr>
			<th></th>
			<th>KODE</th>
			<th>Matakuliah</th>
			<th>Dosen</th>
			<th>Maksimal</th>
		</tr>
	</thead>
	<tbody>

	<?php
		if (mysqli_num_rows($query) > 0):
			while($field = mysqli_fetch_array($query)):
	?>
		<tr>
			<td><input type="radio" name="mkid" value="<?= $field['id'] ?>"></td>
			<td><?= $field['matakuliah_kode'] ?></td>
			<td><?= $field['matakuliah_nama'] ?></td>
			<td><?= $field['dosen_nama'] ?>, <?= $field['dosen_gelar'] ?></td>
			<td><?= $field['jumlah_maksimal']-$field['join'] ?></td>
		</tr>
	<?php
			endwhile;
		else:
	?>
		<tr>
			<td colspan="5">
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