<?php 
include "../../koneksi.php";
$id = $_GET['siswa'];
$nama = $_POST['nama'];
$tempat = $_POST['tempat'];
$lahir = $_POST['lahir'];
$lulus = $_POST['lulus'];
$alamat = $_POST['alamat'];

$sql=mysqli_query($dbh,"UPDATE data_siswa set nama_siswa = '$nama', tempat_lahir='$tempat', tanggal_lahir = '$lahir', pendidikan_terakhir='$lulus', alamat_siswa='$alamat' where id_siswa='$id'");
    
 
if ($sql) {
    echo "<script>alert('Data berhasil Diubah');document.location='data_siswa.php' </script> ";
}else {
    echo mysqli_error($dbh);
    echo "<script>alert('Data gagal Diubah');document.location='data_siswa.php' </script> ";
}

 ?>