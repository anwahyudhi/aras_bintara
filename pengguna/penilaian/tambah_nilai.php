<?php 
include "../../koneksi.php";
session_start();

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



        <div class="wrapper">
            <!-- Sidebar Holder -->
            
            <nav id="sidebar" style="background-color: #808080;">
                <div class="sidebar-header" style="background-color: #808080;">
                    <a href="../index-pengguna.php">
                    <h3>Pemilihan Calon Siswa BINTARA POLRESTA Samarinda</h3>
                        <strong>
                            <i class="glyphicon glyphicon-home"></i>
                        </a></strong>
                </div>

                <ul class="list-unstyled components">
                    <li>
                       <a href="../data_siswa/data_siswa.php" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Data Siswa
                        </a>
                        
                        <a href="data_nilai.php" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Penilaian
                        </a>
                        <a href="../perankingan/perankingan.php" aria-expanded="false">
                            <i class="glyphicon glyphicon-duplicate"></i>
                            Perankingan
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
            <div class="container-fluid">
                
            
            <div id="content">

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
                    <h2>Tambah Data Nilai Siswa</h2>

                </div>
                <div class="panel-body">
                	 <div class="col-md-6 col-md-offset-3 text-center">
                 <form class="form" action="proses_tambah_nilai.php" method="POST" enctype="multipart/form-data">
                   
                   

                     <div class="form-group">
                      <label for="sel1">Nama Siswa</label>
                      <select class="form-control" id="sel1" name="nama">
                        <?php
                        $sql1 = "SELECT * FROM data_siswa";

                        foreach ($dbh->query($sql1) as $data1) :
                         ?>
                         <<option value="<?php echo $data1['nama_siswa'] ?>"><?php echo $data1['nama_siswa']; ?></option>

                        <?php
                        endforeach;
                         ?>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Nilai Kesehatan</label>
                      <input type="number" name="sehat"  max="100" min="0" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Nilai Pendidikan</label>
                     
                      <input type="number" name="pendidikan"  max="100" min="0" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Nilai Psikologi</label>
                      
                      <input type="number" name="psikologi"  max="100" min="0" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Nilai Akademik</label>
                      
                      <input type="number" name="akademik"  max="100" min="0" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Nilai Jasmani</label>
                      
                      <input type="number" name="jasmani"  max="100" min="0" class="form-control">
                    </div>
                    <br>

               		<div class="form-group">
               			<input type="text" name="penilai" class="form-control" value="<?php echo $_SESSION['id_user']; ?>" readonly>
               		</div>
                    	

                    
                    <br>
            <div class="form-group">
              <input type="reset" required name="Reset" class="btn btn-warning pull-right btn-fill"> 
              <input type="submit" required name="nanam" value = "Simpan" class="btn btn-success btn-fill pull-left" onclick="return confirm('Apa anda yakin dengan Penambahan data Nilai Siswa?');">
        </div>
                  </form>
          
          
                  
                
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
