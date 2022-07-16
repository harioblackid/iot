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
            <h1>Informasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Monitoring</li>
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
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="fas fa-bolt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Voltage</span>
                <span class="info-box-number"><b id="volt">0</b>/1 MV</span>

                <div class="progress">
                  <div class="progress-bar" id="voltBar"></div>
                </div>
                <span class="progress-description">
                  <strong id="voltDesc">0</strong>
                </span>
                
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-teal">
              <span class="info-box-icon"><i class="fas fa-tachometer"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Current</span>
                <span class="info-box-number"><b id="ampere">0</b>/1 MA</span>

                <div class="progress">
                  <div class="progress-bar" id="ampereBar"></div>
                </div>
                <span class="progress-description">
                  <strong id="ampereDesc">0</strong>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-secondary">
              <span class="info-box-icon"><i class="fas fa-plug"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Power</span>
                <span class="info-box-number"><b id="power">0</b>/1 Mw</span>

                <div class="progress">
                  <div class="progress-bar" id="powerBar"></div>
                </div>
                <span class="progress-description">
                  <strong id="powerDesc">0</strong>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box bg-warning">
              <span class="info-box-icon"><i class="fas fa-satellite-dish"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Frequency</span>
                <span class="info-box-number"><b id="freq">0</b>/1 MHz</span>

                <div class="progress">
                  <div class="progress-bar" id="freqBar"></div>
                </div>
                <span class="progress-description">
                  <strong id="freqDesc">0</strong>  
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>


          
          
        </div>
        <!-- /.row -->

        <!-- Chart -->
        <div class="row">
          <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Pembacaan Tegangan</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas onload="voltChart()" id="voltChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /col -->

          <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Pembacaan Arus</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="ampereChart" onload="ampereChart()" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
        <!-- /Chart -->

      </div>
    </section>
</div>

<?php 

$weather = "";
$volt = "voltChart();";
$ampere = "ampereChart();";
$report = "";

include "footer.php"; 

?>