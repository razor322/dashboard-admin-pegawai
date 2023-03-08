<?php
// isi nama host, username mysql, dan password mysql anda
$con = mysqli_connect("localhost", "root", "", "db_pegawai");

if (!$con) {
	echo "Mohon maaf, tidak dapat menghubungi database";
} else {
};
