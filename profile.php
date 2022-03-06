<?php
session_start();
    include"header.php";
    include"connexion.php";
     $msg='';
if(isset($_SESSION['id_candidate']))
    if(isset($_POST['_profileUpdate']))
    {
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $number=$_POST['number'];
        $adresse=$_POST['adresse'];
        if(mysqli_query($db,"UPDATE candidate set nom_candidate='{$firstName}',
                             prenom_candidate='{$lastName}',
                             telephone_candidate='{$number}',
                             adresse_candidate='{$adresse}'
                             where id_candidate={$_SESSION['id_candidate']}
         ")){
              $msg="<div class='alert alert-success'>Modification réussi</div>";
              $_SESSION['flage']=strtoupper($firstName);
         }else
            $msg="<div class='alert alert-danger'>Modification echoué ressayer a nouveau</div>";
    } 
if(isset($_SESSION['id_company']))
    if(isset($_POST['_companyUpdate']))
    {
        $companyName=$_POST['companyName'];
        $Raison=$_POST['Raison'];
        $companyCity=$_POST['companyCity'];
        $companyState=$_POST['companyState'];
        $companyZip=$_POST['companyZip'];
        if(mysqli_query($db,"UPDATE recruteur set nom_recruteur='{$companyName}',
                             raison_social='{$Raison}',
                             telephone='{$companyZip}',
                             url='{$companyState}',
                             adresse_recruteur='{$companyCity}'                   
                             where id_recruteur='{$_SESSION['id_company']}'
            ")){
              $msg="<div class='alert alert-success'>Modification réussi</div>";
              $_SESSION['flage']=strtoupper($companyName);
         }else
            $msg="<div class='alert alert-danger'>Modification echoué ressayer a nouveau</div>";
    }

if(isset($_SESSION['id_candidate']))
    {
        $sql="SELECT * from candidate where id_candidate={$_SESSION['id_candidate']}";
       $req=mysqli_query($db,$sql);
       $tab=mysqli_fetch_assoc($req); 

    }
    if (isset($_SESSION['id_company'])) {
        $sql="SELECT * from recruteur where id_recruteur={$_SESSION['id_company']}";
       $req=mysqli_query($db,$sql);
       $tab=mysqli_fetch_assoc($req); 
    }

?>
    <link rel="stylesheet" type="text/css" href="css/user.css">
    <link rel="stylesheet" type="text/css" href="css/volta.css">
    <div class="container">
        <div class="row">
            <?=$msg ?>
        </div>
        <main class="Nx-main" id="content-wrapper">
            <section id="edit-profile">
                <h2 class="Vlt-title--icon">
		<img src="assets/img/resume.png">
		Edit Profile
	</h2>
                <?php
     if(isset($_SESSION['id_candidate'])): ?>
                    <div class="Vlt-grid">
                        <div class="Vlt-col">
                            <form method="post">
                                <div class="Vlt-form__element Vlt-form__element--elastic">
                                    <label class="Vlt-label" for="firstName">First name</label>
                                    <div class="Vlt-input">
                                        <input id="firstName" name="firstName" type="text" size="50" value="<?php echo $tab['nom_candidate'] ?>">
                                    </div>

                                </div>

                                <div class="Vlt-form__element Vlt-form__element--elastic">
                                    <label class="Vlt-label" for="lastName">Last name</label>
                                    <div class="Vlt-input">
                                        <input id="lastName" name="lastName" type="text" size="50" value="<?php echo $tab['prenom_candidate'] ?>">
                                    </div>

                                </div>

                                <div class="Vlt-form__element Vlt-form__element--elastic">
                                    <label class="Vlt-label" for="email">Email</label>
                                    <div class="Vlt-input">

                                        <input id="email" name="email" title="Please enter a valid email address" type="email" value="<?php echo $tab['email_candidate'] ?>" readonly size="50">

                                    </div>
                                </div>

                                <div class="Vlt-form__element Vlt-form__element--elastic">
                                    <label class="Vlt-label">Phone number</label>

                                    <div class="Vlt-composite">
                                        <div class="Vlt-input">
                                            <input id="profile_phone_number" type="number" maxlength="10" name="number" value="<?php echo $tab['telephone_candidate']  ?>">
                                        </div>
                                        <div class="Vlt-composite__append">
                                            <a class="Vlt-btn Vlt-btn--tertiary Vlt-btn--app Vlt-btn--icon" id="profile_phone_number_link">
                                                <img src="assets/img/call-answer.png">
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <div class="Vlt-form__element Vlt-form__element--elastic">
                                    <label class="Vlt-label" for="adresse">Adress</label>
                                    <div class="Vlt-input">
                                        <input id="lastName" name="adresse" type="text" size="50" height="150" value="<?php echo $tab['adresse_candidate'] ?>">
                                    </div>

                                </div>

                                <div class="Vlt-margin--top2">
                                    <h4>Account security</h4>

                                    <div class="Vlt-form__element">
                                        <label class="Vlt-label" for="existingPassword">Password</label>
                                        <a class="Vlt-btn Vlt-btn--tertiary Vlt-btn--app" id="profile_password_link" href="change.php">
                                            <img src="assets/img/small.png"> Change password
                                        </a>
                                    </div>
                                </div>
                                <input type="submit" id="profile_submit" name="_profileUpdate" class="Vlt-btn Vlt-btn--secondary Vlt-btn--app Vlt-margin--top3 Vlt-margin--bottom4" value="Save changes">

                            </form>
                        </div>
                    </div>
                    <?php elseif(isset($_SESSION['id_company'])): ?>
                        <div class="Vlt-grid">
                            <div class="Vlt-col">

                                <h2>Company Details</h2>

                                <form id="company_form" method="post">

                                    <div class="Vlt-form__element Vlt-form__element--elastic">
                                        <label class="Vlt-label">Name</label>
                                        <div class="Vlt-input">
                                            <input id="companyName" name="companyName" type="text" value="<?php echo $tab['nom_recruteur'] ?>" size="50">

                                        </div>
                                    </div>
                                    <div class="Vlt-form__element Vlt-form__element--elastic">
                                        <label class="Vlt-label" for="lastName">Raison Sociale</label>
                                        <div class="Vlt-input">
                                            <input id="lastName" name="Raison" type="text" size="50" height="150" value="<?php echo $tab['raison_social'] ?>">
                                        </div>

                                    </div>
                                    <div class="Vlt-form__element Vlt-form__element--elastic">
                                        <label class="Vlt-label" for="email">Email</label>
                                        <div class="Vlt-input">

                                            <input id="email" name="email" title="Please enter a valid email address" type="email" value="<?php echo $tab['email_contact'] ?>" readonly size="50">

                                        </div>
                                        <div class="Vlt-form__element Vlt-form__element--elastic">
                                            <label class="Vlt-label">Adress</label>
                                            <div class="Vlt-input">
                                                <input id="companyCity" name="companyCity" type="text" value="<?php echo $tab['adresse_recruteur']  ?>" size="50">

                                            </div>
                                        </div>
                                        <div class="Vlt-form__element Vlt-form__element--elastic">
                                            <label class="Vlt-label">URL</label>
                                            <div class="Vlt-input">
                                                <input id="companyState" name="companyState" type="text" value="<?php echo $tab['url'] ?>" size="50">

                                            </div>
                                        </div>
                                        <div class="Vlt-form__element Vlt-form__element--elastic">
                                            <label class="Vlt-label">Telephone</label>
                                            <div class="Vlt-input">
                                                <input id="companyZip" name="companyZip" type="number" value="<?php echo $tab['telephone']  ?>" size="50">

                                            </div>
                                        </div>
                                        <div class="Vlt-margin--top2">
                                            <h4>Account security</h4>

                                            <div class="Vlt-form__element">
                                                <label class="Vlt-label" for="existingPassword">Password</label>
                                                <a class="Vlt-btn Vlt-btn--tertiary Vlt-btn--app" id="profile_password_link" href="change.php">
                                                    <img src="assets/img/small.png"> Change password
                                                </a>
                                            </div>
                                        </div>
                                        <input type="submit" id="company_submit" name="_companyUpdate" class="Vlt-btn Vlt-btn--secondary Vlt-btn--app Vlt-margin--top2" value="Save changes">

                                </form>
                                </div>
                            </div>
                            <?php endif  ?>
            </section>
        </main>

        </div>