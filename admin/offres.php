<?php include '../connexion.php'; 
include 'header.php';

if(isset($_POST['dd'])){
  if(isset($_POST['Actions']))
  foreach($_POST['Actions'] as $value){
    $sql="DELETE FROM offre_emploi WHERE id_offre_emploi=$value";
    $db->query($sql);
  }
}
if(isset($_POST['bb'])){
  if(isset($_POST['Actions']))
  foreach($_POST['Actions'] as $value){
    $sql="UPDATE offre_emploi set etat=0 WHERE id_offre_emploi=$value";
    $db->query($sql);
  }
}
if(isset($_POST['dbb'])){
  if(isset($_POST['Actions']))
  foreach($_POST['Actions'] as $value){
    $sql="UPDATE offre_emploi set etat=1 WHERE id_offre_emploi=$value";
    $db->query($sql);
  }
}

if(isset($_POST['nature'])){
  $_SESSION['nature']=$_POST['nature'];
}
if(isset($_SESSION['nature'])){
  if($_SESSION['nature']==0)
  $sql="SELECT *,day(o.created_at) as date FROM recruteur r inner join offre_emploi o on r.id_recruteur=o.id_recruteur WHERE o.etat=1";
  else 
  $sql="SELECT *,day(o.created_at) as date FROM recruteur r inner join offre_emploi o on r.id_recruteur=o.id_recruteur WHERE o.etat=0";
  }else $sql="SELECT *,day(o.created_at) as date FROM recruteur r inner join offre_emploi o on r.id_recruteur=o.id_recruteur WHERE o.etat=1";

  $req=$db->query($sql);

$str=file_get_contents('../diplome.json');
$json_d=json_decode($str,true);
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
                            <?php if(isset($_SESSION['nature'])) {
                    if($_SESSION['nature']==0){ ?>
                                <h6 class="m-0 font-weight-bold text-primary">la liste des Offres nom blocker</h6>
                                <?php }else{ ?>
                                    <h6 class="m-0 font-weight-bold text-primary">la liste des Offres est blocker</h6>
                                    <?php } ?>
                                        <?php }else{ ?>
                                            <h6 class="m-0 font-weight-bold text-primary">la liste des Offres nom blocker</h6>
                                            <?php } ?>

                        </div>
                        <div class="col">
                            <select class="form-control form-control-lg" onchange="this.form.submit()" name="nature">
                                <?php  if(isset($_SESSION['nature']) ){
                                             if($_SESSION['nature']==0){ ?>
                                    <option value="0" selected>la liste des Offres nom blocker</option>
                                    <?php }else{ ?>
                                        <option value="0">la liste des Offres nom blocker</option>
                                        <?php }
                                            if($_SESSION['nature']==1){
                                            ?>
                                            <option value="1" selected>la liste des Offres est blocker</option>
                                            <?php }else{ ?>
                                                <option value="1">la liste des Offres est blocker</option>
                                                <?php }  
                                            }
                                            else{
                                            ?>
                                                    <option value="0">la liste des Offres nom blocker</option>
                                                    <option value="1">la liste des Offres est blocker</option>
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
                                    <th>Raison social</th>
                                    <th>Specialite</th>
                                    <th>Cantrat</th>
                                    <th>Vacancy</th>
                                    <th>Salaire</th>
                                    <th>Duree</th>
                                    <th>Actions</th>
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
                                        <input type="submit" name="dd" class="btn btn-danger" value="Delete" />
                                    </th>
                                    <?php if(isset($_SESSION['nature']) ){
                        if($_SESSION['nature']==0){
                        ?>
                                        <th>
                                            <input type="submit" name="bb" class="btn btn-dark" value="Blocker" />
                                        </th>
                                        <?php }else{ ?>
                                            <th>
                                                <input type="submit" name="dbb" class="btn btn-success" value="De-blocker" />
                                            </th>
                                            <?php }}else{ ?>
                                                <th>
                                                    <input type="submit" name="bb" class="btn btn-dark" value="Blocker" />
                                                </th>
                                                <?php } ?>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php 
                      while($tab=$req->fetch_array()){
                      ?>
                                    <tr>
                                        <th>
                                            <?php echo $tab['raison_social']; ?>
                                        </th>
                                        <th>
                                            <?php 
                      foreach($json_d as $value)
                      if($tab['id_specialite']==$value['id'])
                      echo $value['name'];
                      ?>
                                        </th>
                                        <th>
                                            <?php echo $tab['contrat']; ?>
                                        </th>
                                        <th>
                                            <?php echo $tab['Vacancy']; ?>
                                        </th>
                                        <th>
                                            <?php echo $tab['salaire']; ?> DH</th>
                                        <th>
                                            <?php echo date('d')-$tab['date']; ?> day</th>
                                        <th>
                                            <input type="checkbox" value="<?php echo $tab['id_offre_emploi']; ?>" class="largerCheckbox" name="Actions[]">
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