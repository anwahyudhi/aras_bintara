<?php
session_start();
include ('koneksi.php');

$code = $_POST["captcha_code"];


$username = $_POST['email'];
$password = $_POST['password'];
$query = "select * from user where email = '$username' and password = '$password'";
$execute = mysqli_query($dbh,$query);
$count = mysqli_num_rows($execute);
$hasil = mysqli_fetch_array($execute);
$nama = $hasil['nama_user'];
$jabatan = $hasil['jabatan_user'];

if($count == 0) { // jika salah, redirect ke login
    ?><script language="JavaScript">alert('Login Gagal  !'); 
            document.location='login.php'</script><?php
}
else { // jika benar, redirec ke halaman utama
    $_SESSION['id_user'] = $hasil['id_user'];
    
    $_SESSION['nama_user'] = $nama;

    if ($jabatan == 'admin') {
       ?>
       <script language="JavaScript">
            alert('Masuk');
            document.location='admin/index-admin.php'; 
        </script>

       <?php 
    }else{
       ?>
       <script language="JavaScript">
            alert('Selamat Datang');
            document.location='pengguna/index-pengguna.php'; 
        </script>

       <?php 
    }
    ?>



        
    <?php
   
    
    
}
?>
    

