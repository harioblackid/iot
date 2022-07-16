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
            <h1>Selamat Datang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Home</li>
              <!-- <li class="breadcrumb-item active">Collapsed Sidebar</li> -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="info.php">
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>
                    <i class="nav-icon fas fa-chart-line"></i>
                  </h3>

                  <p>Informasi Perangkat</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                
              </div>
            </a>
            
          </div>
          <!-- ./col -->
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="sambaran.php">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>
                    <i class="nav-icon fas fa-gear"></i>
                  </h3>

                  <p>Data Sambaran</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                
              </div>
            </a>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="weather.php">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>
                    <i class="nav-icon fas fa-cloud"></i>
                  </h3>

                  <p>Cuaca</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                
              </div>
            </a>
          </div>
          <!-- ./col -->
          

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="#">
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>
                    <i class="nav-icon fas fa-circle-info"></i>
                  </h3>

                  <p>Tentang Aplikasi</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>

              </div>
            </a>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div>
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