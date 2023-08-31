<?php 
include "../../koneksi.php";
$id = $_GET['kriteria'];
$bobot=$_POST['bobot'];
$nama = $_POST['nama'];



$sql=mysqli_query($dbh,"UPDATE kriteria set nama_kriteria = '$nama', bobot='$bobot' where id_kriteria='$id'");
    
 
if ($sql) {
    echo "<script>alert('Data berhasil Diubah');document.location='data_kriteria.php' </script> ";
}else {
    echo mysqli_error($dbh);
    echo "<script>alert('Data gagal Diubah');document.location='data_kriteria.php' </script> ";
}

 ?>