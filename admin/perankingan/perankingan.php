<?php 
include "../../koneksi.php";
session_start();
$bobot = array();
$id = $_SESSION['id_user'];

$x = 0;
$sqlx = "SELECT * FROM kriteria";
foreach ($dbh->query($sqlx) as $datax) :

$bobot[$x] = $datax['bobot'];
$x++;
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
        <link rel="stylesheet" href="../..\assets\bootstrap\css\bootstrap.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="../../assets/index.css">
    </head>
    <body>



        <div class="wrapper" >
            <!-- Sidebar Holder -->
            <nav id="sidebar" style="background-color: #808080;">
                <div class="sidebar-header" style="background-color: #808080;">
                    <a href="../index-admin.php">
                    <h3>Pemilihan Calon Siswa BINTARA POLRESTA Samarinda</h3>
                        <strong>
                            <i class="glyphicon glyphicon-home"></i>
                        </a></strong>
                </div>

                <ul class="list-unstyled components" style="background-color: #808080;">
                    <li>
                        <a href="../data_kriteria/data_kriteria.php">
                            <i class="glyphicon glyphicon-briefcase"></i>
                            Data Kriteria
                        </a>
                        <a href="../data_siswa/data_siswa.php" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Data Siswa
                        </a>
                        <a href="../penilaian/data_nilai.php" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Penilaian
                        </a>
                        <a href="perankingan.php" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Perhitungan
                        </a>
                        <a href="../hasil_rank.php" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Hasil Rank
                        </a>
                    </li>
                </ul>

                <ul class="list-unstyled CTAs" >
                    <hr>
                    <center>
                        <h4><?php echo date('Y') ?></h4>
                    </center>
                    <hr>  
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div class="container" id="content">

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
                    <h2>Halaman Perankingan</h2>
                    
                    <hr>

                </div>
                <div class="panel-body">
                    <div class="panel panel-default">
                     <div class="panel-heading">
                         <h3>Nilai Bobot</h3>
                     </div>
                        <div class="panel-body">
                            <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama Siswa</td>
                                    <td>Nilai Kesehatan</td>
                                    <td>Nilai Pendidikan</td>
                                    <td>Nilai Psikologi</td>
                                    <td>Nilai Akademik</td>
                                    <td>Nilai Jasmani</td>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                    $n1 = array();
                                    $n2 = array();
                                    $n3 = array();
                                    $n4 = array();
                                    $n5 = array();
                                    $n0 = array();
                                  $sql = "SELECT * FROM nilai_siswa ";
                                  $no = 1;
                                   $i=0;
                                foreach ($dbh->query($sql) as $data) :
                                ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    
                                    <td><?php echo $data['nama_siswa']; ?></td>
                                    <?php if ($data['nilai_kesehatan'] <= 100 && $data['nilai_kesehatan'] > 79 ) {
                                        $n1[$i] = 5;
                                        ?><td> 5 </td><?php 
                                    }elseif($data['nilai_kesehatan'] < 80 && $data['nilai_kesehatan'] > 69 ){
                                        $n1[$i] = 4;
                                        ?><td> 4 </td><?php 
                                    }elseif($data['nilai_kesehatan'] < 70  && $data['nilai_kesehatan'] > 59 ){
                                        $n1[$i] = 3;
                                        ?><td> 3 </td><?php 
                                    }elseif($data['nilai_kesehatan'] < 60 && $data['nilai_kesehatan'] > 49 ){
                                        $n1[$i] = 2;
                                        ?><td> 2 </td><?php 
                                    }elseif($data['nilai_kesehatan'] < 50){
                                        $n1[$i] = 1;
                                        ?><td> 1 </td><?php 
                                    }else{
                                        $n1[$i] = 0;
                                        ?><td> 0 </td><?php
                                    }
                                     ?>

                                    <?php if ($data['nilai_pendidikan'] <= 100 && $data['nilai_pendidikan'] > 79 ) {
                                        $n2[$i] = 5;
                                        ?><td> 5 </td><?php 
                                    }elseif($data['nilai_pendidikan'] < 80 && $data['nilai_pendidikan'] > 69 ){
                                        $n2[$i] = 4;
                                        ?><td> 4 </td><?php 
                                    }elseif($data['nilai_pendidikan'] < 70  && $data['nilai_pendidikan'] > 59 ){
                                        $n2[$i] = 3;
                                        ?><td> 3 </td><?php 
                                    }elseif($data['nilai_pendidikan'] < 60 && $data['nilai_pendidikan'] > 49 ){
                                        $n2[$i] = 2;
                                        ?><td> 2 </td><?php 
                                    }elseif($data['nilai_pendidikan'] < 50){
                                        $n2[$i] = 1;
                                        ?><td> 1 </td><?php 
                                    }else{
                                        $n2[$i] = 0;
                                        ?><td> 0 </td><?php
                                    }
                                     ?>

                                     <!-- NILAI PSIKOLOGI -->
                                     
                                    <?php if ($data['nilai_psikologi'] <= 100 && $data['nilai_psikologi'] > 79 ) {
                                        $n3[$i] = 5;
                                        ?><td> 5 </td><?php 
                                    }elseif($data['nilai_psikologi'] < 80 && $data['nilai_psikologi'] > 69 ){
                                        $n3[$i] = 4;
                                        ?><td> 4 </td><?php 
                                    }elseif($data['nilai_psikologi'] < 70  && $data['nilai_psikologi'] > 59 ){
                                        $n3[$i] = 3;
                                        ?><td> 3 </td><?php 
                                    }elseif($data['nilai_psikologi'] < 60 && $data['nilai_psikologi'] > 49 ){
                                        $n3[$i] = 2;
                                        ?><td> 2 </td><?php 
                                    }elseif($data['nilai_psikologi'] < 50){
                                        $n3[$i] = 1;
                                        ?><td> 1 </td><?php 
                                    }else{
                                        $n3[$i] = 0;
                                        ?><td> 0 </td><?php
                                    }
                                     ?>

                                     <!-- Nilai Akademik -->
                                    <?php if ($data['nilai_akademik'] <= 100 && $data['nilai_akademik'] > 79 ) {
                                        $n4[$i] = 5;
                                        ?><td> 5 </td><?php 
                                    }elseif($data['nilai_akademik'] < 80 && $data['nilai_akademik'] > 69 ){
                                        $n4[$i] = 4;
                                        ?><td> 4 </td><?php 
                                    }elseif($data['nilai_akademik'] < 70  && $data['nilai_akademik'] > 59 ){
                                        $n4[$i] = 3;
                                        ?><td> 3 </td><?php 
                                    }elseif($data['nilai_akademik'] < 60 && $data['nilai_akademik'] > 49 ){
                                        $n4[$i] = 2;
                                        ?><td> 2 </td><?php 
                                    }elseif($data['nilai_akademik'] < 50){
                                        $n4[$i] = 1;
                                        ?><td> 1 </td><?php 
                                    }else{
                                        $n4[$i] = 0;
                                        ?><td> 0 </td><?php
                                    }
                                     ?>

                                    <?php if ($data['nilai_jasmani'] <= 100 && $data['nilai_jasmani'] > 79 ) {
                                        $n5[$i] = 5;
                                        ?><td> 5 </td><?php 
                                    }elseif($data['nilai_jasmani'] < 80 && $data['nilai_jasmani'] > 69 ){
                                        $n5[$i] = 4;
                                        ?><td> 4 </td><?php 
                                    }elseif($data['nilai_jasmani'] < 70  && $data['nilai_jasmani'] > 59 ){
                                        $n5[$i] = 3;
                                        ?><td> 3 </td><?php 
                                    }elseif($data['nilai_jasmani'] < 60 && $data['nilai_jasmani'] > 49 ){
                                        $n5[$i] = 2;
                                        ?><td> 2 </td><?php 
                                    }elseif($data['nilai_jasmani'] < 50){
                                        $n5[$i] = 1;
                                        ?><td> 1 </td><?php 
                                    }else{
                                        $n5[$i] = 0;
                                        ?><td> 0 </td><?php
                                    }
                                     ?>
                                        
                                   
                                   
                                  
                                    
                                </tr>
                                <?php
                                $i++;
                                $no++; 
                                endforeach;
                                 ?>
                                 <tr>
                            <td colspan="2">Max</td>
                            <td><?php echo max($n1); $n0[0] = max($n1); ?></td>
                            <td><?php echo max($n2); $n0[1] = max($n2); ?></td>
                            <td><?php echo max($n3); $n0[2] = max($n3);?></td>
                            <td><?php echo max($n4); $n0[3] = max($n4);?></td>
                            <td><?php echo max($n5); $n0[4] = max($n5);?></td>
                          </tr>
                            </tbody>
                        </table>
                        </div>
                        <hr>
                    </div>
                	 
                     <!-- perhitungan  -->
                     <div class="panel">
                         <div class="panel-heading">
                             <h3>Normalisasi</h3>
                         </div>
                         <div class="panel-body">
                             <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    
                                    <td>Alternatif</td>
                                    <td>Nilai Kesehatan</td>
                                    <td>Nilai Pendidikan</td>
                                    <td>Nilai Psikologi</td>
                                    <td>Nilai Akademik</td>
                                    <td>Nilai Jasmani</td>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>A0</td>
                                    <td><?php echo number_format($n0[0]/(array_sum($n1)+$n0[0]), 4) ?></td>
                                    <td><?php echo number_format($n0[1]/(array_sum($n2)+$n0[1]),4) ?></td>
                                    <td><?php echo number_format($n0[2]/(array_sum($n3)+$n0[2]),4) ?></td>
                                    <td><?php echo number_format($n0[3]/(array_sum($n4)+$n0[3]),4) ?></td>
                                    <td><?php echo number_format($n0[4]/(array_sum($n5)+$n0[4]),4) ?></td>
                                </tr>
                                 <?php  
                                  $i=0;
                                 $sql = "SELECT * FROM nilai_siswa ";
                                foreach ($dbh->query($sql) as $data) :
                                ?>
                                <tr>

                                    
                                <td><?php echo $data['nama_siswa']; ?></td>
                                    
                                <td> <?php echo number_format($n1[$i]/(array_sum($n1)+$n0[0]), 4)?></td>
                                <td> <?php echo number_format($n2[$i]/(array_sum($n2)+$n0[1]), 4) ?></td>
                                <td> <?php echo number_format($n3[$i]/(array_sum($n3)+$n0[2]), 4) ?></td>
                                <td> <?php echo number_format($n4[$i]/(array_sum($n4)+$n0[3]), 4) ?></td>
                                <td> <?php echo number_format($n5[$i]/(array_sum($n5)+$n0[4]), 4) ?></td>
                                </tr>
                                <?php
                                $i++;
                                $no++; 
                                endforeach;
                                 ?>
                            </tbody>
                        </table>
                         </div>
                     </div>
                     <hr>
                		<!-- Normalisasi Berbobot -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3>Normalisasi Berbobot</h3>
                            </div>
                            <div class="panel-body">
                                
                             <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    
                                    <td>Alternatif</td>
                                    <td>Nilai Kesehatan</td>
                                    <td>Nilai Pendidikan</td>
                                    <td>Nilai Psikologi</td>
                                    <td>Nilai Akademik</td>
                                    <td>Nilai Jasmani</td>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nb0=array(); 
                                  $nb1=array();
                                  $nb2=array();
                                  $nb3=array();
                                  $nb4=array();
                                  $nb5=array();


                                 ?>
                                <tr>
                                    <td>A0</td>
                                    <td><?php $nb0[0]=($n0[0]/(array_sum($n1)+$n0[0])*$bobot[0]); 
                                    echo number_format($nb0[0],4);?></td>
                                    <td><?php $nb0[1]=($n0[1]/(array_sum($n2)+$n0[1])*$bobot[1]); echo number_format($nb0[1],4); ?></td>
                                    <td><?php $nb0[2]=($n0[2]/(array_sum($n3)+$n0[2])*$bobot[2]); echo number_format($nb0[2],4); ?></td>
                                    <td><?php $nb0[3]=($n0[3]/(array_sum($n4)+$n0[3])*$bobot[3]); echo  number_format($nb0[3],4); ?></td>
                                    <td><?php $nb0[4]=($n0[4]/(array_sum($n5)+$n0[4])*$bobot[4]); echo  number_format($nb0[4],4); ?></td>
                                </tr>
                                 <?php  
                                  $i=0;
                                 
                                 $sql = "SELECT * FROM nilai_siswa ";
                                foreach ($dbh->query($sql) as $data) :
                                ?>
                                <tr>
                                <td><?php echo $data['nama_siswa']; ?></td>
                                <td> <?php $nb1[$i] = ($n1[$i]/(array_sum($n1)+$n0[0])*$bobot[0]); echo number_format($nb1[$i],4);?></td>
                                <td> <?php $nb2[$i] = ($n2[$i]/(array_sum($n2)+$n0[1])*$bobot[1]); echo number_format($nb2[$i],4);?></td>
                                <td> <?php $nb3[$i] = ($n3[$i]/(array_sum($n3)+$n0[2])*$bobot[2]); echo number_format($nb3[$i],4);?></td>
                                <td> <?php $nb4[$i] = ($n4[$i]/(array_sum($n4)+$n0[3])*$bobot[3]); echo number_format($nb4[$i],4);?></td>
                                <td> <?php $nb5[$i] = ($n5[$i]/(array_sum($n5)+$n0[4])*$bobot[4]); echo number_format($nb5[$i],4);?></td>
                                </tr>
                                <?php
                                $i++;
                                $no++; 
                                endforeach;
                                 ?>
                                 <tr>
                                     <td> Bobot </td>
                                     <td><?php echo $bobot[0]; ?></td>
                                     <td><?php echo $bobot[1]; ?></td>
                                     <td><?php echo $bobot[2]; ?></td>
                                     <td><?php echo $bobot[3]; ?></td>
                                     <td><?php echo $bobot[4]; ?></td>
                                 </tr>
                            </tbody>
                        </table>
                         
                            </div>
                        </div>
                        <hr>

                        <!-- Menghitung NIlai utilitas -->
                        <div class="panel">
                            <div class="navbar-header">
                                <h3>Menghitung Nilai Utilitas</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <td>Alternatif</td>
                                            <td>Nilai Kesehatan</td>
                                            <td>Nilai Pendidikan</td>
                                            <td>Nilai Psikologi</td>
                                            <td>Nilai Akademik</td>
                                            <td>Nilai Jasmani</td>
                                            <td>Si</td>
                                            <td>Ki</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>A0</td>
                                            <td><?php echo number_format($nb0[0],4); ?></td>
                                            <td><?php echo number_format($nb0[1],4); ?></td>
                                            <td><?php echo number_format($nb0[2],4); ?></td>
                                            <td><?php echo number_format($nb0[3],4); ?></td>
                                            <td><?php echo number_format($nb0[4],4); ?></td>
                                            <td><?php echo number_format(array_sum($nb0),4); ?></td>
                                            <td></td>
                                        </tr>

                                       <?php  
                                  $i=0;
                                 $si=array();
                                 $ki=array();
                                 $sql = "SELECT * FROM nilai_siswa ";
                                foreach ($dbh->query($sql) as $data) :
                                ?>
                                <tr>

                                    
                                
                                <td><?php echo $data['nama_siswa']; ?></td>
                                    
                                <td> <?php echo number_format($nb1[$i],4);?></td>
                                <td> <?php echo number_format($nb2[$i],4);?></td>
                                <td> <?php echo number_format($nb3[$i],4);?></td>
                                <td> <?php echo number_format($nb4[$i],4);?></td>
                                <td> <?php echo number_format($nb5[$i],4);?></td>
                                <td> <?php $si[$i]= $nb1[$i]+$nb2[$i]+$nb3[$i]+$nb4[$i]+$nb5[$i];echo number_format($si[$i],4); ?></td>
                                <td> <?php $ki[$i]= $si[$i]/array_sum($nb0);echo number_format($ki[$i],4); ?></td>
                                </tr>
                                <?php

                                $sql=mysqli_query($dbh,"UPDATE nilai_siswa set ki = '$ki[$i]' where id_nilai='$data[id_nilai]'");
                                if ($sql) {
                                }

                                $i++;
                                endforeach;
                                 ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>

                        <!-- Hasil Ranking -->

                        <div class="panel">
                            <div class="navbar-header">
                                <h3>Hasil Ranking</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <td>Rank</td>
                                            <td>Alternatif</td>
                                            <td>Nilai Ki</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                  $i=0;
                                  $no=1;
                                 $sql = "SELECT * FROM nilai_siswa  order by ki DESC";
                                foreach ($dbh->query($sql) as $data) :
                                ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    
                                
                                <td><?php echo $data['nama_siswa']; ?></td>
                                    
                                <td><?php echo number_format($data['ki'],4) ?></td>
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
