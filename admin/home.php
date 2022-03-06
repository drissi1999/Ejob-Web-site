<?php include 'header.php';
 ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nombre des recruteur</div>
                      <?php
                      $sql="SELECT count(id_recruteur) nb FROM recruteur ";
                      $req=$db->query($sql);
                      $tab=$req->fetch_array();
                      $nb_r=$tab['nb'];
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nb_r; ?></div>
                    </div>
                    <div class="col-auto">
                      <img src="img/enterprise.png" />
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Nombre des offres</div>
                      <?php
                      $sql="SELECT count(id_offre_emploi) nb FROM offre_emploi ";
                      $req=$db->query($sql);
                      $tab=$req->fetch_array();
                      $nb_r=$tab['nb'];
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nb_r; ?></div>
                    </div>
                    <div class="col-auto">
                      <img src="img/offre.png" />
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Nombre des Blog</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                        <?php
                      $sql="SELECT count(id_post) nb FROM blog ";
                      $req=$db->query($sql);
                      $tab=$req->fetch_array();
                      $nb_r=$tab['nb'];
                      ?>
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $nb_r; ?></div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-auto">
                    <img src="img/blog.png" />
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Nombre des Candidates</div>
                      <?php
                      $sql="SELECT count(id_candidate) nb FROM candidate ";
                      $req=$db->query($sql);
                      $tab=$req->fetch_array();
                      $nb_r=$tab['nb'];
                      ?>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nb_r; ?></div>
                    </div>
                    <div class="col-auto">
                    <img src="img/can.png" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                
                <div class="card-body">
                  
                 

                <?php 
     $sql="SELECT count(id_recruteur) nb_r FROM recruteur";
     $reqq=$db->query($sql);
     $tt=$reqq->fetch_array();
     $total=$tt['nb_r'];
       
     $sll="SELECT COUNT(DISTINCT id_recruteur) nb_r FROM offre_emploi ";
     $reqqt=$db->query($sll);
     $ttt=$reqqt->fetch_array();
     $total_offre=$ttt['nb_r'];
    

     $total_n_offre=$total-$total_offre;
     ?>           
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Company offres',<?php echo $total_offre; ?>],
          ['Company sans offres',<?php echo $total_n_offre; ?>]
        ]);

        var options = {
          title: 'Statistic Offres',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    <div id="piechart_3d" style="width: 500px; height: 500px;"></div>




                </div>
              </div>

     

            </div>




            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
              
                <div class="card-body">
                 
                <?php 
     $sql="SELECT count(id_candidate) nb_c FROM candidate";
     $reqq=$db->query($sql);
     $tt=$reqq->fetch_array();
     $total=$tt['nb_c'];      


     $sql="SELECT count(DISTINCT c.id_candidate) nb_c FROM  candidate c INNER join experience f ON c.id_candidate=f.id_candidate";
     $reqq=$db->query($sql);
     $tt=$reqq->fetch_array();
      $total_resume=$tt['nb_c']; 
     
      $total_n_resume=$total-$total_resume;
                 ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Language', 'Speakers (in millions)'],
          ['Candidate avec CV', <?php echo $total; ?>], ['Candidate sans CV', <?php echo $total_n_resume; ?>]
        ]);

        var options = {
          title: 'Statistic resume CV',
          legend: 'none',
          pieSliceText: 'label',
          slices: {  4: {offset: 0.2},
                    12: {offset: 0.3},
                    14: {offset: 0.4},
                    15: {offset: 0.5},
          },
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
 
    <div id="piechart" style="width: 500px; height: 500px;" ></div>





              

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Khedemti 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
