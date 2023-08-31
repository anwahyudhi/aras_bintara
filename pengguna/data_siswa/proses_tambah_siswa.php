<?php
include "../../koneksi.php";


$nama = $_POST['nama'];
$tempat = $_POST['tempat'];
$lahir = $_POST['lahir'];
$lulus = $_POST['lulus'];
$alamat = $_POST['alamat'];



$sql=mysqli_query($dbh,"INSERT INTO data_siswa (nama_siswa, tempat_lahir, tanggal_lahir, pendidikan_terakhir, alamat_siswa) VALUES ('$nama', '$tempat', '$lahir', '$lulus', '$alamat')");


if ($sql) {
    echo "<script>alert('Data berhasil Ditambahkan');document.location='data_siswa.php' </script> ";
}else {
    echo mysqli_error($dbh);
    echo "<script>alert('Data gagal ditambahkan');document.location='data_siswa.php' </script> ";
}

 ?>
