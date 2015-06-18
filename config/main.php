<?php
// starting session
session_start();

// set session
$_access = isset($_SESSION['access']) ? $_SESSION['access'] : '';
$_username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$_name = isset($_SESSION['name']) ? $_SESSION['name'] : '';

// configuration conection with format 'host','username','password','dbname'
$koneksi = mysqli_connect('localhost','3ch3r46','123qwe!@#','kuliah_pbw_krs');

$_tahun_ajaran = 20151;

// configuration access rule who can access page
$_rules = array(
	'dashboard/index' => array('admin','mahasiswa','dosen'),
	// route mahasiswa
	'mahasiswa/index' => array('admin'),
	'mahasiswa/add' => array('admin'),
	'mahasiswa/view' => array('admin','mahasiswa','dosen'),
	'mahasiswa/edit' => array('admin','mahasiswa'),
	'mahasiswa/delete' => array('admin'),
	'mahasiswa/wali' => array('dosen'),

	// route krs
	'krs/index' => array('dosen','admin'),
	'krs/view' => array('dosen','mahasiswa','admin'),
	'krs/add' => array('dosen','mahasiswa','admin'),
	'krs/approve' => array('dosen','admin'),
	'krs/delete' => array('dosen','mahasiswa','admin'),

	// route matakuliah
	'matakuliah/index' => array('admin'),
	'matakuliah/edit' => array('admin'),
	'matakuliah/add' => array('admin'),
	'matakuliah/delete' => array('admin'),
	'matakuliah/add-dosen' => array('admin'),
	'matakuliah/delete-dosen' => array('admin'),

	// route dosen
	'dosen/index' => array('admin'),
	'dosen/view' => array('admin','dosen'),
	'dosen/edit' => array('admin','dosen'),
	'dosen/add' => array('admin'),
	'dosen/delete' => array('admin'),
	'dosen/add-mahasiswa' => array('admin'),
	'dosen/delete-mahasiswa' => array('admin'),
	'dosen/add-prodi' => array('admin'),
	'dosen/delete-prodi' => array('admin'),

	// route Program studi
	'program-studi/index' => array('admin'),
	'program-studi/edit' => array('admin'),
	'program-studi/add' => array('admin'),
	'program-studi/delete' => array('admin'),

	// route user
	'user/index' => array('admin'),
	'user/add' => array('admin'),
	'user/edit' => array('admin'),
	'user/delete' => array('admin'),
	'user/synchronize' => array('admin'),
	'user/change-password' => array('admin','dosen','mahasiswa'),

	// route sign
	'sign/in' => array(''),
	'sign/out' => array('admin', 'dosen', 'mahasiswa'),
);

$_url = str_replace('/index.php', '/', $_SERVER['PHP_SELF']);
$_route = explode($_url, explode("?", $_SERVER['REQUEST_URI'])[0], 2)[1];
