<?php
session_start();
require 'functions.php';

function ubah($data)
{
    global $conn;
    $stambuk = $data['stambuk'];
    $nama = $data['nama'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $jurusan = $data['jurusan'];

    $query = "UPDATE tb_alternatif SET
				nama = '$nama',
				jenis_kelamin = '$jenis_kelamin',
				jurusan = '$jurusan'
                WHERE stambuk = '$stambuk'
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// Ubah Data
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["ubah"])) {

    // cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        $_SESSION['status'] = "Data Alternatif";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Diubah";
        header("Location: alternatif.php");
    } else {
        $_SESSION['status'] = "Data Alternatif";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Diubah";
        header("Location: alternatif.php");
    }
}
