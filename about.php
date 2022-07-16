<?php 

include "koneksi.php";
include "header.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile Team</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Software Enginer
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Fajar Gemilang</b></h2>
                      <p class="text-muted text-sm">
                      	<b>Jurusan: </b>Teknik Elektro <br>
                      	<b>Fakultas: </b>Teknik
                      </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Universitas Singaperbangsa Karawang</li>

                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="dist/img/Fajar.jpeg" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Lead Enginer
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Gilang Soebakti Saputra</b></h2>
                      <p class="text-muted text-sm">
                      	<b>Jurusan: </b>Teknik Elektro <br>
                      	<b>Fakultas: </b>Teknik
                      </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Universitas Singaperbangsa Karawang</li>

                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="dist/img/Gilang.jpeg" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Project Planner
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Rizka Adelia</b></h2>
                      <p class="text-muted text-sm">
                      	<b>Jurusan: </b>Teknik Elektro <br>
                      	<b>Fakultas: </b>Teknik
                      </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Universitas Singaperbangsa Karawang</li>

                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="dist/img/Riska.jpeg" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                
              </div>
            </div>

            
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php

$weather = "";
$volt = "";
$ampere = "";
$report = "";

include "footer.php";
?>
