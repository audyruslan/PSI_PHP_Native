<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "psi_db");

// Hapus Data Alternatif
function hapus_alternatif($stambuk)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_alternatif WHERE stambuk = '$stambuk'");
    return mysqli_affected_rows($conn);
}

// Hapus Data Penilaian
function hapus_penilaian($stambuk)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_penilaian WHERE stambuk = '$stambuk'");
    return mysqli_affected_rows($conn);
}
