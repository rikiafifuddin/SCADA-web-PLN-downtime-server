<!DOCTYPE html>
<!-- Connection For Database. -->
<?php include("connection.php"); ?>
<?php include("chartmonth.php"); 
  if (@$_COOKIE["avredudant_barat"] == NULL and @$_COOKIE['avsa_barat']==NULL and @$_COOKIE['avper_barat']==NULL and @$_COOKIE['avredudant_timur']==NULL and @$_COOKIE['avsa_timur']==NULL and @$_COOKIE['lamagangguan_barat']==NULL and @$_COOKIE['lamagangguan_timur']==NULL and @$_COOKIE['banyakgangguanbarat']==NULL and @$_COOKIE['banyakgangguantimur']==NULL){
    $_COOKIE["avredudant_barat"]=100;
    $_COOKIE['avsa_barat']=100;
    $_COOKIE['avper_barat']=100;
    $_COOKIE['avredudant_timur']=100;
    $_COOKIE['avsa_timur']=100;
    $_COOKIE['avper_timur']=100;
    $_COOKIE['lamagangguan_barat']=0;
    $_COOKIE['lamagangguan_timur']=0;
    $_COOKIE['banyakgangguanbarat']=0;
    $_COOKIE['banyakgangguantimur']=0;
    $_COOKIE['averagepeforma']=100;
  }
  
?>

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/pln.png" type="image/ico" />

    <title>SCADA TEKNOLOGI INFORMASI</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="clearfix"></div>
            <!-- sidebar menu -->
            <?php include("sidebar.php") ?>
            <!-- /sidebar menu -->
          </div>
        </div>
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-7 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> REDUNDANT METRO</span>
              <div class="count"><?php echo number_format($_COOKIE['avredudant_barat'], 2)?>%</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-7 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> STANDALONE METRO</span>
              <div class="count"><?php echo number_format($_COOKIE['avsa_barat'], 2)?>%</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-7 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> PERIPHERAL METRO </span>
              <div class="count"><?php echo number_format($_COOKIE['avper_barat'], 2)?>%</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-7 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> REDUDANT TIMUR</span>
              <div class="count"><?php echo number_format($_COOKIE['avredudant_timur'], 2)?>%</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-7 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> STANDALONE TIMUR</span>
              <div class="count"><?php echo number_format($_COOKIE['avsa_timur'], 2)?>%</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-7 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> PERIPHERAL TIMUR</span>
              <div class="count"><?php echo number_format($_COOKIE['avper_timur'], 2)?>%</div>
            </div>
          </div>
          <!-- /top tiles -->

          

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">
                
                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>PEFORMANSI SISTEM PLN <small>Down Time System</small></h3>
                  </div>
                  <form action="chartmonth.php" method="POST">
                  <div class="form-group">
                        <div class='input-group date col-md-2 pull-right' id='myDatepicker'>
                                <input type='text' class="form-control" name="bulan" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                        </div>
                        <button  name="Monthpick" type="submit" class="pull-right btn btn-danger btn-md">Go</button>
                    </div>
                  </form>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
                <canvas id="lineChart"></canvas>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                  <div class="x_title">
                    <h2>Summary Performance</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Total Waktu Gangguan Sistem Metro  <code> <?php echo $_COOKIE['lamagangguan_barat'] *10 ?> </code></p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 90%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $_COOKIE['lamagangguan_barat'] ?>"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>Total Waktu  Gangguan Sistem Timu <code> <?php echo $_COOKIE['lamagangguan_timur'] *10 ?> </code></p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 90%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $_COOKIE['lamagangguan_timur'] ?>"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Bayak Gangguan Sistem Metro <code> <?php echo $_COOKIE['banyakgangguanbarat'] *10 ?> </code> </p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 90%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $_COOKIE['banyakgangguanbarat'] ?>"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>Bayak Gangguan Sistem Timur <code> <?php echo $_COOKIE['banyakgangguantimur'] *10 ?> </code> </p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 90%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo $_COOKIE['banyakgangguantimur'] ?>"></div>
                        </div>
                      </div>
                    </div>
                    <div class="sidebar-widget">
                        <h4>Rata Rata Peforma </br>Sistem Metro & Sistem Timur</h4>
                        <canvas width="240" height="150" id="chart_gauge_01" class="" style="width: 235px; height: 140px;"></canvas>
                        <div class="goal-wrapper">
                          <span id="gauge-text" class="gauge-value pull-left">0</span>
                          <span class="gauge-value pull-left">%</span>
                          <span id="goal-text" class="goal-value pull-right">100%</span>
                        </div>
                    </div>
                  </div>
                
                </div>

                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            PT. PLN APD Jawa timur
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script>
            $('#myDatepicker').datetimepicker({
            viewMode: 'days',
            format: 'YYYY/MM/DD'
        });
        
            $('#datetimepicker6').datetimepicker();
            
            $('#datetimepicker7').datetimepicker({
                useCurrent: false
            });
            
            $("#datetimepicker6").on("dp.change", function(e) {
                $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
            });
            
            $("#datetimepicker7").on("dp.change", function(e) {
                $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
            });
    </script>

    <!-- Graph Line -->
    <script>
        if ($('#lineChart').length ){	          
              var ctx = document.getElementById("lineChart");
              var lineChart = new Chart(ctx, {
              type: 'line',
              data: {
                labels: ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"],
                datasets: [{
                label: "Sistem Metro",
                backgroundColor: "rgba(38, 185, 154, 0.31)",
                borderColor: "rgba(38, 185, 154, 0.7)",
                pointBorderColor: "rgba(38, 185, 154, 0.7)",
                pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointBorderWidth: 1,
                data: [0, <?php echo $_COOKIE['hari1']; ?>,  <?php echo $_COOKIE['hari2']; ?>,  <?php echo $_COOKIE['hari3']; ?>, <?php echo $_COOKIE['hari4']; ?>, <?php echo $_COOKIE['hari5']; ?>,  <?php echo $_COOKIE['hari6']; ?>,  <?php echo $_COOKIE['hari7']; ?>,  <?php echo $_COOKIE['hari8']; ?>,  <?php echo $_COOKIE['hari9']; ?>,  <?php echo $_COOKIE['hari10']; ?>,  <?php echo $_COOKIE['hari11']; ?>, <?php echo $_COOKIE['hari12']; ?>, <?php echo $_COOKIE['hari13']; ?>, <?php echo $_COOKIE['hari14']; ?>, <?php echo $_COOKIE['hari15']; ?>, <?php echo $_COOKIE['hari16']; ?>, <?php echo $_COOKIE['hari17']; ?>, <?php echo $_COOKIE['hari18']; ?>, <?php echo $_COOKIE['hari19']; ?>, <?php echo $_COOKIE['hari20']; ?>,<?php echo $_COOKIE['hari21']; ?>,<?php echo $_COOKIE['hari22']; ?>,<?php echo $_COOKIE['hari23']; ?>,<?php echo $_COOKIE['hari24']; ?>,<?php echo $_COOKIE['hari25']; ?>,<?php echo $_COOKIE['hari26']; ?>,<?php echo $_COOKIE['hari27']; ?>,<?php echo $_COOKIE['hari28']; ?>,<?php echo $_COOKIE['hari29']; ?>,<?php echo $_COOKIE['hari30']; ?>,<?php echo $_COOKIE['hari31']; ?> ]
                }, {
                label: "Sistem Timur",
                backgroundColor: "rgba(3, 88, 106, 0.3)",
                borderColor: "rgba(3, 88, 106, 0.70)",
                pointBorderColor: "rgba(3, 88, 106, 0.70)",
                pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgba(151,187,205,1)",
                pointBorderWidth: 1,
                data: [0, <?php echo $_COOKIE['day1']; ?>,  <?php echo $_COOKIE['day2']; ?>,  <?php echo $_COOKIE['day3']; ?>, <?php echo $_COOKIE['day4']; ?>, <?php echo $_COOKIE['day5']; ?>,  <?php echo $_COOKIE['day6']; ?>,  <?php echo $_COOKIE['day7']; ?>,  <?php echo $_COOKIE['day8']; ?>,  <?php echo $_COOKIE['day9']; ?>,  <?php echo $_COOKIE['day10']; ?>,  <?php echo $_COOKIE['day11']; ?>, <?php echo $_COOKIE['day12']; ?>, <?php echo $_COOKIE['day13']; ?>, <?php echo $_COOKIE['day14']; ?>, <?php echo $_COOKIE['day15']; ?>, <?php echo $_COOKIE['day16']; ?>, <?php echo $_COOKIE['day17']; ?>, <?php echo $_COOKIE['day18']; ?>, <?php echo $_COOKIE['day19']; ?>, <?php echo $_COOKIE['day20']; ?>,<?php echo $_COOKIE['day21']; ?>,<?php echo $_COOKIE['day22']; ?>,<?php echo $_COOKIE['day23']; ?>,<?php echo $_COOKIE['day24']; ?>,<?php echo $_COOKIE['day25']; ?>,<?php echo $_COOKIE['day26']; ?>,<?php echo $_COOKIE['day27']; ?>,<?php echo $_COOKIE['day28']; ?>,<?php echo $_COOKIE['day29']; ?>,<?php echo $_COOKIE['day30']; ?>,<?php echo $_COOKIE['day31']; ?> ]
                }]
              },
              });
            }
    </script>
    
    <script>
    function init_gauge() {

        if (typeof (Gauge) === 'undefined') { return; }

        console.log('init_gauge [' + $('.gauge-chart').length + ']');

        console.log('init_gauge');


        var chart_gauge_settings = {
          lines: 12,
          angle: 0,
          lineWidth: 0.4,
          pointer: {
            length: 0.75,
            strokeWidth: 0.042,
            color: '#1D212A'
          },
          limitMax: 'false',
          colorStart: '#1ABC9C',
          colorStop: '#1ABC9C',
          strokeColor: '#F0F3F3',
          generateGradient: true
        };


        if ($('#chart_gauge_01').length) {

          var chart_gauge_01_elem = document.getElementById('chart_gauge_01');
          var chart_gauge_01 = new Gauge(chart_gauge_01_elem).setOptions(chart_gauge_settings);

        }


        if ($('#gauge-text').length) {

          chart_gauge_01.maxValue = 100000;
          chart_gauge_01.animationSpeed = 40;
          chart_gauge_01.set(<?php echo $_COOKIE['averagepeforma']*1000  ?>);
          chart_gauge_01.setTextField(document.getElementById("gauge-text"));

        }

        if ($('#chart_gauge_02').length) {

          var chart_gauge_02_elem = document.getElementById('chart_gauge_02');
          var chart_gauge_02 = new Gauge(chart_gauge_02_elem).setOptions(chart_gauge_settings);

        }


        if ($('#gauge-text2').length) {

          chart_gauge_02.maxValue = 9000;
          chart_gauge_02.animationSpeed = 32;
          chart_gauge_02.set(2400);
          chart_gauge_02.setTextField(document.getElementById("gauge-text2"));

        }
    }
    </script>

</script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.js"></script>
	
  </body>
</html>
