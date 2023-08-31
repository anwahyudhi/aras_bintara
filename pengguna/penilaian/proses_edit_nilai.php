<?php 
include "../../koneksi.php";

$id = $_GET['siswa'];
$id_siswa = $_POST['nama'];
$sehat = $_POST['sehat'];
$pendidikan = $_POST['pendidikan'];
$psikologi = $_POST['psikologi'];
$akademik = $_POST['akademik'];
$jasmani = $_POST['jasmani'];
$penilai = $_POST['penilai'];


$sql=mysqli_query($dbh,"UPDATE nilai_siswa set nama_siswa = '$id_siswa', nilai_kesehatan='$sehat', nilai_pendidikan = '$pendidikan', nilai_psikologi = '$psikologi', nilai_akademik ='$akademik', nilai_jasmani ='$jasmani', id_penilai = '$penilai' where id_nilai='$id'");
    
 
if ($sql) {
    echo "<script>alert('Data berhasil Diubah');document.location='data_nilai.php' </script> ";
}else {
    echo mysqli_error($dbh);
    echo "<script>alert('Data gagal Diubah');document.location='data_nilai.php' </script> ";
}

 ?>