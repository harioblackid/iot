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
            <h1>Informasi Cuaca</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Informasi Cuaca</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-8 col-lg-6 col-xl-4">

              <div class="card" style="color: #4B515D; border-radius: 35px;">
                <div class="card-body p-4">

                  <div class="d-flex">
                    <h6 id="city" class="flex-grow-1"></h6>
                    <h6 id="time"></h6>
                  </div>

                  <div class="d-flex flex-column text-center mt-5 mb-4">
                    <h4 class="display-4 mb-0 font-weight-bold" style="color: #1C2331;"><span id="temp"></span> °C </h4>
                    <span id="condition" class="small" style="color: #868B94"></span>
                  </div>

                  <div class="d-flex align-items-center">
                    <div class="flex-grow-1" style="font-size: 1rem;">
                      <div><i class="fas fa-wind fa-fw" style="color: #868B94;"></i> 
                        <span id="windSpeed" class="ms-1"> 40 </span>km/h
                      </div>
                      <div><i class="fas fa-tint fa-fw" style="color: #868B94;"></i> 
                        <span id="humidity" class="ms-1"> 84 </span> %
                      </div>
    
                    </div>
                    <div>
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-weather/ilu1.webp"
                        width="100px">
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 

$weather = "weather()";
$volt = "";
$ampere = "";
$report = "";

include "footer.php"; 

?>