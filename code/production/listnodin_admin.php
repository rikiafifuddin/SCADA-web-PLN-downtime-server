<?php
@session_start(); 
if (@$_SESSION['username'] !='admin' ){
  header("location:listnodin.php");
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
    <title>SCADA Teknologi Informasi</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
   <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

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
                <h3>TABLE REKAP</h3>
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
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  </div>
              </div>
            </div>
              <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel <small>Rekap NODIN</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <form action="exportIcNod.php" method="POST">
                       <div class="form-group">
                        <label class="control-label col-md-2 ">Pilih tanggal export<span>*</span>
                        </label>
                        <div class='input-group date col-md-5 col-sm-6 col-xs-12' id='myDatepicker'>
                          <input type='text' class="form-control" name="exportDatenodin" />
                          <span class="input-group-addon">
                             <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      </div>
                    <button name="exportButtonExNod" type="submit" class="btn btn-danger btn-sm">Excel</button>
					          <button name="exportButtonPdfN" type="submit" class="btn btn-danger btn-sm">PDF</button>
                  </form>
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">No </th>
                            <th class="column-title">Nama NODIN</th>
                            <th class="column-title">Tanggal Diterima </th>
                            <th class="column-title">Tanggal Selesai </th>
                            <th class="column-title">Rentang Waktu</th>
                            <th class="column-title">Keterangan </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr class="even pointer">
                            <?php
                                $i=1;
                                $sql = "SELECT * FROM rekap_nodin ORDER BY id DESC";
                                $query = mysqli_query($db, $sql);

                                while($nodin = mysqli_fetch_array($query)){
                                    echo "<tr>";

                                    echo "<td>$i</td>";
                                    echo "<td>".$nodin['nama']."</td>";
                                    echo "<td>".$nodin['tanggal_awal']."</td>";
                                    echo "<td>".$nodin['tanggal_akhir']."</td>";
                                    echo "<td>".$nodin['errortime']." Hari</td>";
                                    echo "<td>".$nodin['keterangan']."</td>";
                                    echo "<td>";
                                    echo "<a href='formeditnodin.php?id=".$nodin['id']."'>Edit</a> | ";
                                    echo "<a href='deletenodin.php?id=".$nodin['id']."'>Hapus</a>";
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
    	<!-- bootstrap-daterangepicker -->
      <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<!-- Initialize datetimepicker -->
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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>