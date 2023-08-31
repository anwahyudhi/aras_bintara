<?php
session_start();
include ('../koneksi.php');



$code = $_POST["kode"];

$username = $_POST['email'];
$pass1 = $_POST['password1'];
$pass2 = $_POST['password2'];
 

$query = "select * from user where email = '$username'";
$execute = mysqli_query($dbh,$query);
$count = mysqli_num_rows($execute);
$hasil = mysqli_fetch_array($execute);




if ($pass1 == $pass2) {
    
    if ($code == $hasil['kode_reset']) {
    	$sql=mysqli_query($dbh,"UPDATE user set password = '$pass1', kode_reset = '0' where id_user='$hasil[id_user]'");
			 
			if ($sql) {
			    echo "<script>alert('Password Berhasil diganti!');document.location='../login.php' </script> ";
			}else {
			    echo mysqli_error($dbh);
			    echo "<script>alert('Password Gagal diganti!');document.location='terusan_reset.php' </script> ";
			}
    }else{
    	echo "<script>alert('Kode Reset Salah!');document.location='terusan_reset.php' </script> ";
    }
    		
   


    }
    else{
        ?><script language="JavaScript">alert('Password Tidak Sama!'); 
            document.location='terusan_reset.php'</script><?php
    }

?>    

