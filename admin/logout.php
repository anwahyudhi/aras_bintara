<?php
	
	session_start();
session_destroy();
	echo "<script>alert('Logout berhasil ');document.location='../index.php' </script> ";
	
?>