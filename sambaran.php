<?php 

include "koneksi.php";
include "header.php"; 

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Informasi Total Sambaran</h1>
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
        <div class="card">
          <div class="card-header">
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <a class="nav-link active" href="#report-table" data-toggle="tab">Report Table</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#report-chart" data-toggle="tab">Chart</a>
                </li>
              </ul>
            </div>
          </div>

          <!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active" id="report-table">
                <?php 
                  $exec = $conn->query("SELECT * FROM loging WHERE ampere > ${limitCurrent} ORDER BY id DESC");
                  
                ?>
                <table id="table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Waktu - Tanggal</th>
                    <th>Voltage</th>
                    <th>Ampere</th>
                    <th>Power</th>
                    <th>Energy</th>
                    <th>Frequency</th>
                    <th>PF</th>
                  </tr>
                  </thead>
                  <tbody id="rowData">

                    
                    <?php foreach($exec as $row) : ?>
                      <tr>
                        <td><?= date_indo($row['onupdate']); ?></td>
                        <td><?= $row["volt"]; ?></td>
                        <td><?= $row["ampere"]; ?></td>
                        <td><?= $row["watt"]; ?></td>
                        <td><?= $row["energy"]; ?></td>
                        <td><?= $row["freq"]; ?></td>
                        <td><?= $row["pf"]; ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane" id="report-chart">
                <div class="chart">
                  <canvas id="reportChart" onload="reportChart()" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
            </div> 

            
          </div>
        </div>
        <!-- Small boxes (Stat box) -->
      </div>
    </section>
</div>

<?php 

$weather = "";
$volt = "";
$ampere = "";
$report = "reportChart();";

include "footer.php"; 

?>
        