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
                    <h2>Halaman Data Siswa</h2>
                    <a href="tambah_nilai.php" class="btn btn-success btn-fill">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Tambah Data Nilai Siswa</span>
                    </a>
                    <br><br>

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
                                    <!-- <td>Nama Penilai</td> -->
                					<td>Aksi</td>
                				</tr>
                			</thead>
                			<tbody>
                				<?php 
		                          $sql = "SELECT * FROM nilai_siswa";
                                  $no = 1;
		                        foreach ($dbh->query($sql) as $data) :
		                        ?>
		                        <tr>
		                        	<td><?php echo $no; ?></td>
                                   
                                    <td><?php echo $data['nama_siswa']; ?></td>
                                   
		                        	<td><?php echo $data['nilai_kesehatan'] ?></td>
                                    <td><?php echo $data['nilai_pendidikan'] ?></td>
                                    <td><?php echo $data['nilai_psikologi'] ?></td>
                                    <td><?php echo $data['nilai_akademik'] ?></td>
                                    <td><?php echo $data['nilai_jasmani'] ?></td>
                                    
		                        	<td>
					                      <a href="edit_nilai.php?siswa=<?php echo $data['id_nilai'] ?>" class="btn btn-warning btn-sm btn-fill btn-block">
			                              <i class="glyphicon glyphicon-pencil"></i>
			                              <span>ubah</span>
			                            </a>   
                                         <a class="btn btn-danger btn-sm btn-fill btn-block" href="hapus_nilai.php?id=<?php echo $data['id_nilai'] ?>" onclick="return confirm('Apa anda yakin dengan penghapusan data ???');">
                                                <i class="glyphicon glyphicon-trash"></i>
                                                <span>hapus</span>
                                            </a>
		                        	</td>
		                        </tr>
		                        <?php
                                $no++;
		                        endforeach;

		                         ?>
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
