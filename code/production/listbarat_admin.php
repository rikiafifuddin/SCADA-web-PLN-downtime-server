<?php 
@session_start();
if (@$_SESSION['username'] !='admin' ){
  header("location:listbarat.php");
}
?>
<!DOCTYPE html>
<!-- Connection For Database. -->
<?php include("connection.php"); ?>

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
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
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
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>TABEL REKAP SISTEM METRO</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>REDUDANT SISTEM <small>Barat</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form action="export.php" method="POST">
                        <div class="form-group">
                            <label class="control-label col-md-2 ">Pilih tanggal export<span>*</span>
                            </label>
                            <div class='input-group date col-md-5 col-sm-6 col-xs-12' id='myDatepicker'>
                              <input type='text' class="form-control" name="exportDatered" />
                              <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                            </div>
                          </div>
                        <button name="exportButtonRed" type="submit" class="btn btn-danger btn-sm">Excel</button>
                        <button name="PdfButtonRed" type="submit" class="btn btn-danger btn-sm">PDF</button>
                    </form>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Peralatan</th>
                          <th>Down Time</th>
                          <th>Up Time</th>
                          <th>Lama Gangguan</th>
                          <th>Keterangan</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr class="even pointer">
                            <?php
                                $i=1;
                                $sql = "SELECT * FROM redudant_barat ORDER BY id DESC";	
                                $query = mysqli_query($db, $sql);
								
                                while($redudant_barat = mysqli_fetch_array($query)){
                                    echo "<tr class='even pointer'>";
                                    echo "<td>$i</td>";
                                    echo "<td>".$redudant_barat['peralatan']."</td>";
                                    echo "<td>".$redudant_barat['down_time']."</td>";
                                    echo "<td>".$redudant_barat['up_time']."</td>";
                                    echo "<td>".$redudant_barat['int_errortime']." Jam</td>";
									                  echo "<td>".$redudant_barat['keterangan']."</td>";
                                    echo "<td>";
                                    echo "<a href='formeditredudantbarat.php?id=".$redudant_barat['id']."'>Edit</a> |";
                                    echo "<a href='deleteredudantbarat.php?id=".$redudant_barat['id']."'>Hapus</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                    $i++;
                                }
                            ?>
                          </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
                                
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>STAND ALONE SISTEM <small>Barat</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <form action="export.php" method="POST">
                       <div class="form-group">
                        <label class="control-label col-md-2 ">Pilih tanggal export<span>*</span>
                        </label>
                        <div class='input-group date col-md-5 col-sm-6 col-xs-12' id='myDatepicker2'>
                          <input type='text' class="form-control" name="exportDateSA" />
                          <span class="input-group-addon">
                             <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      </div>
                    <button name="exportButtonSA" type="submit" class="btn btn-danger btn-sm">Excel</button>
				          	</form>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Peralatan</th>
                          <th>Down Time</th>
                          <th>Up Time</th>
                          <th>Lama Gangguan</th>
                          <th>Keterangan</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr class="even pointer">
                            <?php
                                $i=1;
                                $sql = "SELECT * FROM standalone_barat ORDER BY id DESC";	
                                $query = mysqli_query($db, $sql);
								
                                while($standalone_barat = mysqli_fetch_array($query)){
                                    echo "<tr class='even pointer'>";
                                    echo "<td>$i</td>";
                                    echo "<td>".$standalone_barat['peralatan']."</td>";
                                    echo "<td>".$standalone_barat['down_time']."</td>";
                                    echo "<td>".$standalone_barat['up_time']."</td>";
                                    echo "<td>".$standalone_barat['int_errortime']." Jam</td>";
									                  echo "<td>".$standalone_barat['keterangan']."</td>";
                                    echo "<td>";
                                    echo "<a href='formeditstandalonebarat.php?id=".$standalone_barat['id']."'>Edit</a> | ";
                                    echo "<a href='deletestandalonebarat.php?id=".$standalone_barat['id']."'>Hapus</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                    $i++;
                                }
                            ?>
                          </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>PERIPHERAL SISTEM <small>Barat</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form action="export.php" method="POST">
                       <div class="form-group">
                        <label class="control-label col-md-2 ">Pilih tanggal export<span>*</span>
                        </label>
                        <div class='input-group date col-md-5 col-sm-6 col-xs-12' id='myDatepicker3'>
                          <input type='text' class="form-control" name="exportDatePer" />
                          <span class="input-group-addon">
                             <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      </div>
                    <button name="exportButtonPer" type="submit" class="btn btn-danger btn-sm">Excel</button>
					          </form>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Peralatan</th>
                          <th>Down Time</th>
                          <th>Up Time</th>
                          <th>Lama Gangguan</th>
                          <th>Keterangan</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr class="even pointer">
                            <?php
                                $i=1;
                                $sql = "SELECT * FROM peripheral_barat ORDER BY id DESC";	
                                $query = mysqli_query($db, $sql);
								
                                while($peripheral_barat = mysqli_fetch_array($query)){
                                    echo "<tr class='even pointer'>";
                                    echo "<td>$i</td>";
                                    echo "<td>".$peripheral_barat['peralatan']."</td>";
                                    echo "<td>".$peripheral_barat['down_time']."</td>";
                                    echo "<td>".$peripheral_barat['up_time']."</td>";
                                    echo "<td>".$peripheral_barat['int_errortime']." Jam</td>";
									                  echo "<td>".$peripheral_barat['keterangan']."</td>";
                                    echo "<td>";
                                    echo "<a href='formeditperipheralbarat.php?id=".$peripheral_barat['id']."'>Edit</a> | ";
                                    echo "<a href='deleteperipheralbarat.php?id=".$peripheral_barat['id']."'>Hapus</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                    $i++;
                                }
                            ?>
                          </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>


          </div>
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
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>

    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

<script>
    $('#myDatepicker').datetimepicker({
		viewMode: 'days',
		format: 'YYYY/MM/DD'
	});
	
	$('#myDatepicker2').datetimepicker({
		viewMode: 'days',
		format: 'YYYY/MM/DD'
	});
	
	$('#myDatepicker3').datetimepicker({
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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>