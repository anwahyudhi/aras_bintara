<?php
include "../../koneksi.php";


$id_siswa = $_POST['nama'];
$sehat = $_POST['sehat'];
$pendidikan = $_POST['pendidikan'];
$psikologi = $_POST['psikologi'];
$akademik = $_POST['akademik'];
$jasmani = $_POST['jasmani'];
$penilai = $_POST['penilai'];



$sql=mysqli_query($dbh,"INSERT INTO nilai_siswa (nama_siswa, nilai_kesehatan, nilai_pendidikan, nilai_psikologi, nilai_akademik, nilai_jasmani, id_penilai) VALUES ('$id_siswa', '$sehat', '$pendidikan', '$psikologi', '$akademik', '$jasmani', '$penilai')");


if ($sql) {
    echo "<script>alert('Data berhasil Ditambahkan');document.location='data_nilai.php' </script> ";
}else {
    echo mysqli_error($dbh);
    echo "<script>alert('Data gagal ditambahkan');document.location='data_nilai.php' </script> ";
}

 ?>
