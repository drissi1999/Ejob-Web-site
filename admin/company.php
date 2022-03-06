<?php 
include '../connexion.php'; 
if(isset($_POST['delete'])){
  if(isset($_POST['actions']))
  foreach($_POST['actions'] as $value){
    $sql="DELETE FROM recruteur WHERE id_recruteur=$value";
    $db->query($sql);
    $sqll="DELETE FROM offre_emploi WHERE id_recruteur=$value";
    $db->query($sqll);
  }
}
if(isset($_POST['blocker'])){
  if(isset($_POST['actions']))
  foreach($_POST['actions'] as $value){
    $sql="UPDATE recruteur set etat=1 WHERE id_recruteur=$value";
    $db->query($sql) or die("err");
  }
}
if(isset($_POST['deblocker'])){
  if(isset($_POST['actions']))
  foreach($_POST['actions'] as $value){
    $sql="UPDATE recruteur set etat=0 WHERE id_recruteur=$value";
    $db->query($sql);
  }
}
?>
    <?php
 include 'header.php'; 
if(isset($_POST['natures'])){
  $_SESSION['natures']=$_POST['natures'];
}
if(isset($_SESSION['natures'])){
  if($_SESSION['natures']==0)
  $sql="SELECT *,day(created_at) as date FROM recruteur WHERE etat=0";
  else 
  $sql="SELECT *,day(created_at) as date FROM recruteur WHERE etat=1";
  }else $sql="SELECT *,day(created_at) as date FROM recruteur WHERE etat=0";

  $req=$db->query($sql);
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                    <form method="post">
                        <div class="row">
                            <div class="col">
                                <?php if(isset($_SESSION['natures'])) {
                    if($_SESSION['natures']==0){ ?>
                                    <h6 class="m-0 font-weight-bold text-primary">la liste des Company nom blocker</h6>
                                    <?php }else{ ?>
                                        <h6 class="m-0 font-weight-bold text-primary">la liste des Company est blocker</h6>
                                        <?php } ?>
                                            <?php }else{ ?>
                                                <h6 class="m-0 font-weight-bold text-primary">la liste des Company nom blocker</h6>
                                                <?php } ?>

                            </div>
                            <div class="col">
                                <select class="form-control form-control-lg" onchange="this.form.submit()" name="natures">
                                    <?php  if(isset($_SESSION['natures']) ){
                                             if($_SESSION['natures']==0){ ?>
                                        <option value="0" selected>la liste des Company nom blocker</option>
                                        <?php }else{ ?>
                                            <option value="0">la liste des Company nom blocker</option>
                                            <?php }
                                            if($_SESSION['natures']==1){
                                            ?>
                                                <option value="1" selected>la liste des Company est blocker</option>
                                                <?php }else{ ?>
                                                    <option value="1">la liste des Company est blocker</option>
                                                    <?php }  
                                            }
                                            else{
                                            ?>
                                                        <option value="0">la liste des Company nom blocker</option>
                                                        <option value="1">la liste des Company est blocker</option>
                                                        <?php } ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <form method="post">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Logo</th>
                                        <th>Name</th>
                                        <th>Secteur recruteur </th>
                                        <th>Telephone</th>
                                        <th>Url</th>
                                        <th>Duree</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>
                                            <input type="submit" name="delete" class="btn btn-danger" value="Delete" />
                                        </th>
                                        <?php if(isset($_SESSION['natures']) ){
                        if($_SESSION['natures']==0){
                        ?>
                                            <th>
                                                <input type="submit" name="blocker" class="btn btn-dark" value="Blocker" />
                                            </th>
                                            <?php }else{ ?>
                                                <th>
                                                    <input type="submit" name="deblocker" class="btn btn-success" value="De-blocker" />
                                                </th>
                                                <?php }}else{ ?>
                                                    <th>
                                                        <input type="submit" name="blocker" class="btn btn-dark" value="Blocker" />
                                                    </th>
                                                    <?php } ?>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                      while($tab=$req->fetch_array()){
                      ?>
                                        <tr>
                                            <th><img src="../assets/logo/<?php echo $tab['logo']; ?>" width="60px" height="80px" /></th>
                                            <th>
                                                <?php echo $tab['nom_recruteur']; ?>
                                            </th>
                                            <th>
                                                <?php echo $tab['secteur_recruteur']; ?>
                                            </th>
                                            <th>
                                                <?php echo $tab['telephone']; ?>
                                            </th>
                                            <th>
                                                <?php echo $tab['url']; ?>
                                            </th>
                                            <th>
                                                <?php echo date('d')-$tab['date']; ?> day</th>
                                            <th>
                                                <input type="checkbox" value="<?php echo $tab['id_recruteur']; ?>" class="largerCheckbox" name="actions[]">
                                            </th>
                                        </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
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