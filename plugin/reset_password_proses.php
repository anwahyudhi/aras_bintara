<?php
session_start();
include ('../koneksi.php');



$code = $_POST["captcha_code"];

$username = $_POST['email'];

$query = "select * from user where email = '$username'";
$execute = mysqli_query($dbh,$query);
$count = mysqli_num_rows($execute);
$hasil = mysqli_fetch_array($execute);

$random_alpha = md5(rand());

$kode_reset = substr($random_alpha, 0, 6);


if ($code == $_SESSION["captcha_code"]) {
 // jika benar, redirec ke halaman utama
    
    if ($count ==  1 ) {

    		//metode 1 = ngirim kode reset ke user melalui database user di admin, lalu masukkan kode reset untuk reset password
			$sql=mysqli_query($dbh,"UPDATE user set kode_reset = '$kode_reset' where id_user='$hasil[id_user]'");

			//metode 2 = kirim kode reset sebagai password baru, cek kode di halaman admin
			//$sql=mysqli_query($dbh,"UPDATE user set password = '$kode_reset' where id_user='$hasil[id_user]'");    
						 
			if ($sql) {
			    echo "<script>alert('Kode Reset Telah dikirim');document.location='terusan_reset.php' </script> ";
			}else {
			    echo mysqli_error($dbh);
			    echo "<script>alert('E-mail Tidak Terdaftar!');document.location='data_siswa.php' </script> ";
			}
   


    }}
    else{
        ?><script language="JavaScript">alert('Login Gagal  !'); 
            document.location='login.php'</script><?php
    }

?>    

