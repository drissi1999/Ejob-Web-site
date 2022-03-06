<?php 
session_start();
include"header.php";
include"connexion.php";
$msg='';
if(isset($_SESSION['id_candidate']))
    if(isset($_POST['ok']))
    {
    $pass=$_POST['existingPassword'];
    $password=$_POST['password'];
    $confirmPassword=$_POST['confirmPassword'];
    $sql="SELECT password from candidate where id_candidate='{$_SESSION['id_candidate']}' and password='{$pass}'";
    $req=$db->query($sql) or die("error");
    $tab = $req->num_rows;
    if($tab>0)
        {
            if($password==$confirmPassword)
                {
                 $query="UPDATE candidate set password='{$password}' where id_candidate='{$_SESSION['id_candidate']}'" or die("error Update");
                 $run=$db->query($query);
                  if($run){
                     $msg="<div class='alert alert-success'>Modification réussi</div>";
                }else
                $msg="<div class='alert alert-danger'>Modification echoué ressayer a nouveau</div>";  
                   
             }
             else
                 $msg="<div class='alert alert-danger'>Password not  match</div>"; 
     }
    else
         $msg="<div class='alert alert-danger'>Existing Password incorrect</div>"; 

}
if(isset($_SESSION['id_company']))
    if(isset($_POST['ok']))
    {
    $pass=$_POST['existingPassword'];
    $password=$_POST['password'];
    $confirmPassword=$_POST['confirmPassword'];
    $sql="SELECT password from recruteur where id_recruteur='{$_SESSION['id_company']}' and password='{$pass}'";
    $req=$db->query($sql) or die("error");
    $tab = $req->num_rows;
    if($tab>0)
        {
            if($password==$confirmPassword)
                {
                 $query="UPDATE recruteur set password='{$password}' where id_recruteur='{$_SESSION['id_company']}'" or die("error Update");
                 $run=$db->query($query);
                  if($run){
                     $msg="<div class='alert alert-success'>Modification réussi</div>";
                }else
                $msg="<div class='alert alert-danger'>Modification echoué ressayer a nouveau</div>";  
                   
             }
             else
                 $msg="<div class='alert alert-danger'>Password not  match</div>"; 
     }
    else
         $msg="<div class='alert alert-danger'>Existing Password incorrect</div>"; 

}

?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/volta.css">
<div class="container ">
    <br><br><br>
 <div class="row"><?=$msg ?></div>
 <main class="Nx-main" id="content-wrapper">   
    <section id="edit-profile">
        <img src="assets/img/key.png">
       <h3> Change password</h3>

        <form id="profile_password_form" method="post">
            <div class="Vlt-grid">
                <div class="Vlt-col Vlt-col--1of2">
                    <div class="Vlt-form__element">
                        <label class="Vlt-label" for="existingPassword">Existing password</label>
                        <div class="Vlt-input">
                            <input id="profile_existingPassword" name="existingPassword" type="password" required >
                        </div>

                    </div>

                    <div class="Vlt-form__element">
                        <label class="Vlt-label" for="profile_newPassword">New password</label>
                        <div class="Vlt-input">
                            <input id="profile_newPassword" name="password" type="password" required>
                        </div>

                    </div>

                    <div class="Vlt-form__element">
                        <label class="Vlt-label" for="profile_confirmPassword">Confirm password</label>
                        <div class="Vlt-input">
                            <input id="profile_confirmPassword" name="confirmPassword" type="password" required>
                        </div>

                    </div>

                    <div class="Vlt-grid">
                        <div class="Vlt-col Vlt-col--right">
                            <input class="Vlt-btn Vlt-btn--secondary Vlt-btn--app" type="submit" id="password_change_button" name="ok" value="Update">
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </section>
</main>
</div>
