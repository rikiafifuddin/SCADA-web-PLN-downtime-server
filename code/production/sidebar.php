<?php 
include("connection.php");
include("user.php"); ?>            
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg  " alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['nama'] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-line-chart"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Grafik Tahunan</a></li>
                      <li><a href="index3.php ">Grafik Bulanan</a></li>
                      <li><a href="index2.php ">Grafik NODIN</a></li>
                      <li><a href="index4.php ">Grafik ICON</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_nodin.php">Rekap Nodin Baru</a></li>
                      <li><a href="form_icon.php">Rekap Icon Failure</a></li>
					  
					  <li><a><i class=" "></i> Rekap Kinerja Server <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
								<li><a><i class="fa fa-edit"></i> Metro-Barat <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="redudant_barat.php">Redundant Sistem</a></li>
											<li><a href="standalone_barat.php">Stand Alone</a></li>
											<li><a href="peripheral_barat.php">Peripheral</a></li>
										</ul>
									<li><a><i class="fa fa-edit"></i> Timur <span class="fa fa-chevron-down"></span></a>
										<ul class="nav child_menu">
											<li><a href="redudant_timur.php">Redundant Sistem</a></li>
											<li><a href="standalone_timur.php">Stand Alone</a></li>
											<li><a href="peripheral_timur.php">Peripheral</a></li>
										</ul>
									</li>
								</li>	
						  </ul>
						</li>
					  </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="listnodin.php">Hasil Rekap NODIN</a></li>
                      <li><a href="listicon.php">Hasil Rekap ICON Failure</a></li>
                      <li><a href="listbarat.php">Hasil Rekap Sistem Metro</a></li>
                      <li><a href="listtimur.php">Hasil Rekap Sistem Timur</a></li>
					</ul>
                  </li>
              </div>

            </div>

            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>