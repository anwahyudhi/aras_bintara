<?php 
include "../koneksi.php";
session_start();

$i = 0;
$jumlah=0;
$sql = "SELECT * FROM nilai_siswa order by ki DESC";
foreach ($dbh->query($sql) as $data) :
    $jumlah++;
endforeach;

 ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

       <title>Sistem Pendukung Keputusan Pemilihan Calon Siswa BINTARA POLRESTA Samarinda</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="..\assets\bootstrap\css\bootstrap.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="../assets/index.css">
    </head>
    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar" style="background-color: #808080;">
                <div class="sidebar-header" style="background-color: #808080;">
                    <a href="index-admin.php">
                    <h3>Pemilihan Calon Siswa BINTARA POLRESTA Samarinda</h3>
                        <strong>
                            <i class="glyphicon glyphicon-home"></i>
                        </a></strong>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="data_kriteria/data_kriteria.php">
                            <i class="glyphicon glyphicon-briefcase"></i>
                            Data Kriteria
                        </a>
                         <a href="data_siswa/data_siswa.php" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Data Siswa
                        </a>
                        <a href="penilaian/data_nilai.php" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Penilaian
                        </a>
                        <a href="perankingan/perankingan.php" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Perhitungan
                        </a>
                        <a href="hasil_rank.php" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Hasil Rank
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled CTAs">
                    <hr>
                    <center>
                        <h4><?php echo date('Y') ?></h4>
                    </center>
                    <hr>  
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div class="container-fluid" id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-secondary navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Toggle Sidebar</span>
                            </button>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <p></p><div class="dropdown"> <!-- warna dropdown menu diubah-->
                                <span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['nama_user']; ?>
                                <button class="btn btn-secondary"><a href="../logout.php">Log out</a></button>
                            
                            </div>
                        </ul>
                    </div>
                </nav>
                <div class="panel panel-default">
                <center>
                <div class="panel panel-heading">
                    <h2>Halaman Hasil Rank</h2>
                   
                    <br><br>

                </div>
                <div class="panel-body">
                     
                         <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <td>Rank</td>
                                            <td>Nama Siswa</td>
                                            <td>Nilai Kesehatan</td>
                                            <td>Ketegori</td>
                                            <td>Nilai Pendidikan</td>
                                            <td>Ketegori</td>
                                            <td>Nilai Psikologi</td>
                                            <td>Ketegori</td>
                                            <td>Nilai Akademik</td>
                                            <td>Ketegori</td>
                                            <td>Nilai Jasmani</td>
                                            <td>Ketegori</td>
                                            <td>Nilai Akhir</td>
                                            <td>Keterangan</td>
                                            <td>Nilai ARAS</td>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                  $c=0;
                                  $no=1;
                                  $total = array();
                                 $sql = "SELECT * FROM nilai_siswa order by ki DESC";
                                foreach ($dbh->query($sql) as $data) :
                                    
                                

                                ?>
                                <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $data['nama_siswa']; ?></td>
                                <td><?php echo $data['nilai_kesehatan'];
                                    $total[$c] = 0;
                                    $total[$c] += $data['nilai_kesehatan'];
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    if ($data['nilai_kesehatan']>=80) {
                                        echo "Sangat Baik";

                                    }elseif ($data['nilai_kesehatan']>=70 && $data['nilai_kesehatan']<80) {
                                        echo "Baik";
                                    }elseif ($data['nilai_kesehatan']>=60 && $data['nilai_kesehatan']<70) {
                                        echo "Cukup";
                                    }elseif ($data['nilai_kesehatan']>=50 && $data['nilai_kesehatan']<60) {
                                        echo "Kurang";
                                    }elseif ($data['nilai_kesehatan']<50) {
                                        echo "Sangat Kurang";
                                    }
                                     ?>
                                </td>
                                <td><?php echo $data['nilai_pendidikan'];
                                    $total[$c] += $data['nilai_pendidikan'];
                                     ?></td>
                                <td>
                                     <?php 
                                    if ($data['nilai_pendidikan']>=80) {
                                        echo "Sangat Baik";
                                    }elseif ($data['nilai_pendidikan']>=70 && $data['nilai_pendidikan']<80) {
                                        echo "Baik";
                                    }elseif ($data['nilai_pendidikan']>=60 && $data['nilai_pendidikan']<70) {
                                        echo "Cukup";
                                    }elseif ($data['nilai_pendidikan']>=50 && $data['nilai_pendidikan']<60) {
                                        echo "Kurang";
                                    }elseif ($data['nilai_pendidikan']<50) {
                                        echo "Sangat Kurang";
                                    }
                                     ?>
                                </td>
                                <td><?php echo $data['nilai_psikologi'];
                                    $total[$c] += $data['nilai_psikologi'];
                                     ?></td>
                                <td>
                                    <?php 
                                    if ($data['nilai_psikologi']>=80) {
                                        echo "Sangat Baik";
                                    }elseif ($data['nilai_psikologi']>=70 && $data['nilai_psikologi']<80) {
                                        echo "Baik";
                                    }elseif ($data['nilai_psikologi']>=60 && $data['nilai_psikologi']<70) {
                                        echo "Cukup";
                                    }elseif ($data['nilai_psikologi']>=50 && $data['nilai_psikologi']<60) {
                                        echo "Kurang";
                                    }elseif ($data['nilai_psikologi']<50) {
                                        echo "Sangat Kurang";
                                    }
                                     ?>
                                </td>
                                <td><?php echo $data['nilai_akademik'];
                                    $total[$c] += $data['nilai_akademik'];
                                    ?></td>
                                <td>
                                <?php 
                                    if ($data['nilai_akademik']>=80) {
                                        echo "Sangat Baik";
                                    }elseif ($data['nilai_akademik']>=70 && $data['nilai_akademik']<80) {
                                        echo "Baik";
                                    }elseif ($data['nilai_akademik']>=60 && $data['nilai_akademik']<70) {
                                        echo "Cukup";
                                    }elseif ($data['nilai_akademik']>=50 && $data['nilai_akademik']<60) {
                                        echo "Kurang";
                                    }elseif ($data['nilai_akademik']<50) {
                                        echo "Sangat Kurang";
                                    }
                                     ?>
                                    
                                </td>
                                <td><?php echo $data['nilai_jasmani'];
                                    $total[$c] += $data['nilai_jasmani'];
                                     ?></td>
                                <td>
                                    <?php 
                                    if ($data['nilai_jasmani']>=80) {
                                        echo "Sangat Baik";
                                    }elseif ($data['nilai_jasmani']>=70 && $data['nilai_jasmani']<80) {
                                        echo "Baik";
                                    }elseif ($data['nilai_jasmani']>=60 && $data['nilai_jasmani']<70) {
                                        echo "Cukup";
                                    }elseif ($data['nilai_jasmani']>=50 && $data['nilai_jasmani']<60) {
                                        echo "Kurang";
                                    }elseif ($data['nilai_jasmani']<50) {
                                        echo "Sangat Kurang";
                                    }
                                     ?>
                                </td>
                                <td><?php echo $total[$c]/5;
                                    $akhir =  $total[$c]/5;?></td>
                                <td>
                                    <?php
                                     if ($akhir >= 75 && $i <=60) {
                                        echo "LULUS";
                                        }else{
                                            echo "TIDAK LULUS";
                                        }
                                     ?>
                                </td>
                                <td><?php echo number_format($data['ki'],4) ?></td>
                                
                                </tr>
                                <?php 
                                
                                 $i++;
                                 $no++;
                                endforeach; ?>
                                    </tbody>
                                </table>
                    </div>
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
