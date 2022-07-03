<?php require 'header.php' ?>
<div class="main-content">
        <section class="section">
          <h1 class="section-header">
            <div>Dashboard</div>
          </h1>
    <div class="section-body">
        <?php require 'model/total.php'; ?>
    </div>
    <div class="container-fluid">
        <div class="row">
          <h4>Visitor Graph</h4>
          <div class="card w-100">
            <div class="card-body">
            <script src="dist/js/chart.js"></script>
              <canvas id="myChart" style="width:100%"></canvas>
              <script>
              var xValues = [<?php 
                foreach($visitdata as $key => $visitval){
                  echo '"'.date("M d" , strtotime($visitval['date'])).'",';
                }
              ?>];
              var yValues = [<?php 
                foreach($visitdata as $key => $visitval){
                  echo $visitval['pnv'].',';
                }
              ?>];

              new Chart("myChart", {
                type: "line",
                data: {
                  labels: xValues,
                  datasets: [{
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
                    data: yValues
                  }]
                },
                options: {
                  legend: {display: false},
                  scales: {
                    yAxes: [],
                  }
                }
              });
              </script>

            </div>
          </div>
        </div>
    </div>
</dvi>
</section>
<?php require 'footer.php' ?>
