<?php include '../connexion.php'; 

if(isset($_GET['id_d'])){
    $id=$_GET['id_d'];
$sql="DELETE FROM blog WHERE id_post=$id";
$db->query($sql);
header('location:blog.php');
}
if(isset($_GET['id_v'])){
    $id=$_GET['id_v'];
$sql="UPDATE blog set etat=1 WHERE id_post=$id";
$db->query($sql);
header('location:blog.php');
}
$sql="SELECT *,day(post_date) as date FROM blog WHERE etat=0";
$req=$db->query($sql);
?>
<?php include 'header.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">la liste des Blog</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                    <th>Photo</th>
                      <th>Auteur</th>
                      <th>Titre	</th>
                      <th>Texte</th>
                      <th>Duree</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Photo</th>
                      <th>Auteur</th>
                      <th>Titre	</th>
                      <th>Texte</th>
                      <th>Duree</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                      <?php 
                      while($tab=$req->fetch_array()){
                      ?>
                  <tr> 
                      <th><img src="../assets/blog/<?php echo $tab['photo_blog']; ?>" width="60px" height="60px"/></th>
                      <th><?php echo $tab['auteur']; ?></th>
                      <th><?php echo $tab['title']; ?></th>
                      <th><?php echo $tab['content']; ?></th>
                      <th><?php echo date('d')-$tab['date']; ?> day</th>
                      <th>
                     <a href="blog.php?id_d=<?php echo $tab['id_post']; ?>" class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i></a>
                      &ensp;
                     
                      <a href="blog.php?id_v=<?php echo $tab['id_post']; ?>" class="btn btn-success" ><i class="fa fa-check" aria-hidden="true"></i></a>
                      
                    </th>
                    </tr>
                      <?php } ?>
                  </tbody>
                </table>
              </div>
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
            <span>Copyright &copy; Your Website 2019</span>
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

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
