<?php 
include "../koneksi.php";
session_start();


//cara mencari urutan diatas 60
$i = 0;
$rank=0;
$sql = "SELECT * FROM nilai_siswa order by ki DESC";
foreach ($dbh->query($sql) as $data) :
    if ($_SESSION['id_user'] == $data['id_siswa']) {
      $rank = $i; 
    }
    else{
        $i++;
    }
endforeach;
 ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Sistem Pendukung Keputusan Pemilihan Calon Siswa BINTARA POLRESTA Samarinda</title>

         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="../assets/index.css">
    </head>
    <body>



        <div class="wrapper">
            <div id="content" style="width:100%">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                            
                            <span><img src="../assets/icons/p2.png" style="width: 65px;height: 65px;"></span>
                   
                        <span>
                            <h3>Seleksi Siswa Bintara Polresta Samarinda</h3>
                           
                            
                        </span>
                        <ul class="nav navbar-nav navbar-right">
                            <p></p><div class="dropdown"> <!-- warna dropdown menu diubah-->
                                <span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['nama_user']; ?>
                                <button class="btn btn-secondary"><a href="logout.php">Log out</a></button>
                            
                            </div>
                        </ul>
                    </div>
                </nav>
                <div class="panel panel-default">
                <center>
                <div class="panel panel-heading">
                    <h2>Selamat Datang <?php echo $_SESSION['nama_user']; ?></h2>
                </div>
                </center>
                <div class="panel-body">
                    <div class="container">
                        <div class="panel panel-info">
                    <div class="panel-heading">
                        data siswa
                    </div>
                    <div class="panel-body">
                        <table class="table table-borderless">
                            <tr>
                                <td>Nama Siswa</td>
                                <td> <?php echo $_SESSION['nama_user']; ?> </td>
                            </tr>
                            <?php
                                        $sql1 = "SELECT * FROM nilai_siswa
                                        where id_siswa = '$_SESSION[id_user]'";
                                        
                                        foreach ($dbh->query($sql1) as $data1) :

                            ?>
                            <tr>
                                <td>Nilai Kesehatan</td>
                                <td><?php echo $data1['nilai_kesehatan'] ?></td>
                            </tr>
                            <tr>
                                 <td>Nilai Pendidikan</td>
                                <td><?php echo $data1['nilai_pendidikan'] ?></td>
                            </tr>
                            <tr>
                                 <td>Nilai Psikologi</td>
                                <td><?php echo $data1['nilai_psikologi'] ?></td>
                            </tr>
                            <tr>
                                <td>Nilai Akademik</td>
                                <td><?php echo $data1['nilai_akademik'] ?></td>
                            </tr>
                            <tr>
                                 <td>Nilai Jasmani</td>
                                <td><?php echo $data1['nilai_jasmani'] ?></td>
                            </tr>
                            <?php 
                            endforeach; ?>
                        </table>
                    </div>
                </div>

                <?php 

                if ($rank < 60) {
                    
                

                 ?>
                <div class="panel">
                    <div class="panel-heading" style="background-color:palegreen;">
                        <center>
                            <h3>Anda dinyatakan lulus seleksi Calon Siswa BINTARA POLRESTA Samarinda</h3>
                        </center>
                    </div>
                    </div>
                
                <?php }
                else{

                ?>
                <div class="panel">
                    <div class="panel-heading" style="background-color:salmon;">
                        <center>
                            <h3>Anda dinyatakan lulus seleksi Calon Siswa BINTARA POLRESTA Samarinda</h3>
                        </center>
                    </div>
                    </div>
                </div>
            <?php } ?>
                    </div>
                <center>
                <a href="hasil_rank.php" class="btn btn-info">Hasil Rank</a>
                <br><br><br>
                </center>
                </div>
                

                </div>
        </div>





        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
    </body>
</html>


