<?php include 'header.php'; ?>
    <?php
if(isset($_POST['update'])){
    if(!empty($_POST['name']) and empty($_POST['login']) and empty($_POST['p1']) and empty($_POST['p2'])){
    $sql="UPDATE admin set name='{$_POST['name']}' WHERE id_admin={$_SESSION['login']}";
    $db->query($sql);
    $_SESSION['admin']=$_POST['name'];
    }
    if(empty($_POST['name']) and !empty($_POST['login']) and empty($_POST['p1']) and empty($_POST['p2'])){
        $sql="UPDATE admin set login='{$_POST['login']}' WHERE id_admin={$_SESSION['login']}";
        $db->query($sql);
        }
    if(!empty($_POST['name']) and !empty($_POST['login']) and empty($_POST['p1']) and empty($_POST['p2'])){
            $sql="UPDATE admin set login='{$_POST['login']}',name='{$_POST['name']}' WHERE id_admin={$_SESSION['login']}";
            $db->query($sql);
            $_SESSION['admin']=$_POST['name'];
            }
    if(!empty($_POST['name']) and !empty($_POST['login']) and !empty($_POST['p1']) and !empty($_POST['p2']))
        if($_POST['p1']==$_POST['p2']){
                $sql="UPDATE admin set login='{$_POST['login']}',name='{$_POST['name']}',password='{$_POST['p1']}' WHERE id_admin={$_SESSION['login']}";
                $db->query($sql);
                $_SESSION['admin']=$_POST['name'];
                }
  if(empty($_POST['name']) and empty($_POST['login']) and !empty($_POST['p1']) and !empty($_POST['p2']))
                if($_POST['p1']==$_POST['p2']){
                        $sql="UPDATE admin set password='{$_POST['p1']}' WHERE id_admin={$_SESSION['login']}";
                        $db->query($sql);
                        }          
}
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <?php 

                                   include '../connexion.php'; 
                                  $sql="SELECT * FROM admin WHERE id_admin={$_SESSION['login']}";
                                  $req=$db->query($sql);
                                  $tab=$req->fetch_array();
                                   ?>
                                            <div class="row">
                                                <div class="col-md-6 pr-1">
                                                    <div class="form-group">
                                                        <label> Name</label>
                                                        <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $tab['name']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pl-1">
                                                    <div class="form-group">
                                                        <label>Login</label>
                                                        <input type="text" name="login" class="form-control" placeholder="Login" value="<?php echo $tab['login']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 pr-1">
                                                    <div class="form-group">
                                                        <label> Password</label>
                                                        <input type="password" class="form-control" name="p1" placeholder="password">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pl-1">
                                                    <div class="form-group">
                                                        <label>Confirme Password</label>
                                                        <input type="password" class="form-control" name="p2" placeholder="Confirme password">
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" name="update" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                            <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>

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

        </body>

        </html>