
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 0.1.28
    </div>
    <strong>Copyright &copy; 2022 LIPRO-C.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<?php

function arrayString($array) {
  for($key = 0; $key < sizeof($array); $key++) {
    if($key == sizeof($array)-1) {
      $defider = "";
    }
    else {
      $defider = ",";
    }
    echo "'". $array[$key] . "'" . $defider;
  }
}

//GET JSON to Array
$resArr = getJSON("localhost/iot/api/api_chart.php");

//GET Report Data
$ressReport = getJSON("localhost/iot/api/api_sambaran.php");

?>

<script>
$(function() {
  $("#table").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      buttons: [
            'excel', 'pdf', 'print'
        ],
    
      
      // "buttons": ["excel", "pdf"]
    })
    .buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');

  $.getJSON("api/api_report.php", function(result){
    $("#count").append(result);
  });

  var success = false;

  $.getJSON("http://192.168.0.177", function(json) {
      success = true;
      $("statusServer").append("Connected")
      // ... do what you need to do here
  });

  // Set a 5-second (or however long you want) timeout to check for errors
  setTimeout(function() {
      if (!success)
      {
          // Handle error accordingly
          $("statusServer").append("Disconnected")
      }
  }, 5000);
    
});


  // window.setInterval(() => {
  //   window.location.reload()
  // }, 1000)

  function weather(){
    let current = new Date();

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        const data = JSON.parse(xhr.responseText);
      
        document.getElementById("city").innerHTML = data.name;
        document.getElementById("time").innerHTML = current.toLocaleTimeString();
        document.getElementById("temp").innerHTML = data.main.temp;
        document.getElementById("condition").innerHTML = data.weather[0].description;

        document.getElementById("windSpeed").innerHTML = data.wind.speed;
        document.getElementById("humidity").style.width = powerBar;

      }
    };

    xhr.open("GET", "api/api_weather.php", true)
    xhr.send()
  }

  function getData(){
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
        const data = JSON.parse(xhr.responseText);
        
        //Fetch data to HTML
        
        //Setup Progress Bar Voltage
        let volt = (data.volt / 1000000) * 100;
        voltBar = "%"; 

        //Setup Progress Bar Ampere
        let ampere = (data.ampere / 1000000) * 100;
        ampereBar = "%";
        
        //Setup Progress Bar Power
        let power = (data.power / 1000000) * 100;
        powerBar = "%";

        let freq = (data.freq / 1000000) * 100;
        freqBar = "%";

        document.getElementById("volt").innerHTML = data.volt;
        document.getElementById("voltBar").style.width = volt + voltBar;
        if(data.volt > 0) {
          document.getElementById("voltDesc").innerHTML = volt.toFixed(4) + voltBar;
        } else {
          document.getElementById("voltDesc").innerHTML = "Arus tidak terdeteksi";
        }

        document.getElementById("ampere").innerHTML = data.ampere;
        document.getElementById("ampereBar").style.width = ampere + ampereBar;
        if(data.ampere > 0) {
          document.getElementById("ampereDesc").innerHTML = ampere.toFixed(4) + ampereBar;
        } else {
          document.getElementById("ampereDesc").innerHTML = "Arus tidak terdeteksi";
        }

        document.getElementById("power").innerHTML = data.power;
        document.getElementById("powerBar").style.width = power + powerBar;
        if(data.power > 0) {
          document.getElementById("powerDesc").innerHTML = power.toFixed(4) + powerBar;
        } else {
          document.getElementById("powerDesc").innerHTML = "Arus tidak terdeteksi";
        }

        document.getElementById("freq").innerHTML = data.freq;
        document.getElementById("freqBar").style.width = freq + freqBar;
        if(data.freq > 0) {
          document.getElementById("freqDesc").innerHTML = freq.toFixed(4) + freqBar;
        } else {
          document.getElementById("freqDesc").innerHTML = "Arus tidak terdeteksi";
        }
        
      }
    };

    xhr.open("GET", "api/api_main.php", true)
    xhr.send()
  }

  function voltChart() {
    const data = {
        labels: [<?php arrayString($resArr->label); ?>],
        datasets: [
          {
            label: 'Max Voltage',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [<?php arrayString($resArr->voltMax); ?>]
          },
          {
            label: 'Min Voltage',
            backgroundColor: 'rgb(108, 108, 108)',
            borderColor: 'rgb(108, 108, 108)',
            data: [<?php arrayString($resArr->voltMin); ?>]
            
          }
        ]
      };

      const config = {
        type: 'line',
        data: data,
        options: {
          responsive: true,
          interaction: {
            mode: 'index',
            intersect: false
          },
          scales: {
            x: {
              display: true
            },
            y: {
              display: true
            }
          }
        },
      };

      const voltChart = new Chart(
          document.getElementById('voltChart'),
          config
      );
      voltChart.update()
    }

    function ampereChart() {
    const data = {
        labels: [<?php arrayString($resArr->label); ?>],
        datasets: [
          {
            label: 'Max Current',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [<?php arrayString($resArr->ampereMax); ?>]
            
          },
          {
            label: 'Min Current',
            backgroundColor: 'rgb(108, 108, 108)',
            borderColor: 'rgb(108, 108, 108)',
            data: [<?php arrayString($resArr->ampereMin); ?>]
            
          }
        ]
      };

      const config = {
        type: 'line',
        data: data,
        options: {
          responsive: true,
          interaction: {
            mode: 'index',
            intersect: false
          },
          scales: {
            x: {
              display: true
            },
            y: {
              display: true
            }
          }
        },
      };

      const ampereChart = new Chart(
          document.getElementById('ampereChart'),
          config
      ); 
    }

    function reportChart() {
      const data = {
        labels: [<?php arrayString($ressReport->tgl); ?>],
        datasets: [
          {
            label: 'Total Sambaran',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [<?php arrayString($ressReport->total); ?>]
            
          }
        ]
      };

      const config = {
        type: 'line',
        data: data,
        options: {}
      };

      const reportChart = new Chart(
          document.getElementById('reportChart'),
          config
      ); 
    }

    setInterval(() => {
      getData()
    }, 2000);
    
    <?php
      echo $volt. " ". $ampere ." " . $report . " " .$weather;
    ?>
</script>

</body>
</html>
