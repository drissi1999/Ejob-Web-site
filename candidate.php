<!DOCTYPE html>
<html >
  
<?php
 include'header.php';
 include'nav.php'; 
 $falag="disabled";
 if(isset($_SESSION['id_candidate']))
 $falag="";
$str=file_get_contents('diplome.json');
$json=json_decode($str,true);
$email=$nom=$mail=$cin=$situation=$diplome=$specialite=$duree=$type=$societe=$service=$langue=$dergee="";
 //session_unset();
 if(isset($_POST['addformation'])){
    $nom=$_POST['nom'];
    $email=$_POST['mail'];
    $cin=$_POST['cin'];
    $situation=$_POST['situation'];
     if(!empty($_POST['diplome']) and !empty($_POST['specialite']) and !empty($_POST['duree'])){
    if(!isset($_SESSION['formation']))
    $nb=0;
    else
    $nb=count($_SESSION['formation']);
    $flage=false;
    if(isset($_SESSION['formation']))
    foreach($_SESSION['formation'] as $val)
    if($val['diplome']==$_POST['diplome'])
    $flage=true;
   if($flage==false){
    $_SESSION['formation'][$nb]['diplome']=$_POST['diplome'];
    $_SESSION['formation'][$nb]['specialite']=$_POST['specialite'];
    $_SESSION['formation'][$nb]['date']=$_POST['duree'];
    }
     }
    }
    ///////////////////
    if(isset($_POST['skill'])){
        $nom=$_POST['nom'];
        $email=$_POST['mail'];
        $cin=$_POST['cin'];
        $situation=$_POST['situation'];
       if(!isset($_SESSION['langue']))
       $nb=0;
       else
       $nb=count($_SESSION['langue']);
       $flage=false;
       if(isset($_SESSION['langue']))
       foreach($_SESSION['langue'] as $val)
       if($val['langue']==$_POST['langue'])
       $flage=true;
      if($flage==false){
       $_SESSION['langue'][$nb]['langue']=$_POST['langue'];
       $_SESSION['langue'][$nb]['degree']=$_POST['degree'];
       }
       }
    /////////////////////////
    if(isset($_POST['addesperience'])){
        $nom=$_POST['nom'];
        $email=$_POST['mail'];
        $cin=$_POST['cin'];
        $situation=$_POST['situation'];
        if(!empty($_POST['date_debut']) and !empty($_POST['date_fin']) and !empty($_POST['societe']) and !empty($_POST['service']) and !empty($_POST['description'])){
       if(!isset($_SESSION['experience']))
       $nb=0;
       else
       $nb=count($_SESSION['experience']);
       $flage=false;
       if(isset($_SESSION['experience']))
       foreach($_SESSION['experience'] as $val)
       if($val['service']==$_POST['service'] and $val['societe']==$_POST['societe'] and $val['description']==$_POST['description'])
       $flage=true;
      if($flage==false){
       $_SESSION['experience'][$nb]['service']=$_POST['service'];
       $_SESSION['experience'][$nb]['societe']=$_POST['societe'];
       $_SESSION['experience'][$nb]['description']=$_POST['description'];
       $_SESSION['experience'][$nb]['date_fin']=$_POST['date_fin'];
       $_SESSION['experience'][$nb]['date_debut']=$_POST['date_debut'];
       $_SESSION['experience'][$nb]['type']=$_POST['type'];
       }
        }
       }

 if(isset($_SESSION['id_candidate'])){
    $id=$_SESSION['id_candidate'];
    $sql="SELECT * FROM candidate WHERE id_candidate=$id";
    $result=$db->query($sql) or die("er1");
    $row = $result->num_rows;
    $tab=$result->fetch_array(MYSQLI_ASSOC);
    $nom=$tab['nom_candidate'];
    $email=$tab['email_candidate'];
}
if(isset($_POST['Create'])){
  $nom=$_POST['nom'];
  $email=$_POST['mail'];
  $cin=$_POST['cin'];
  $situation=$_POST['situation'];
     $dossier = 'assets/photo/';
     $fichier = basename($_FILES['photo']['name']);    
     move_uploaded_file($_FILES['photo']['tmp_name'],$dossier.$fichier);
     $photo=$fichier;

     $dossiers = 'assets/cv_pdf/';
     $cv = basename($_FILES['cv']['name']);    
     move_uploaded_file($_FILES['cv']['tmp_name'],$dossiers.$cv);
    

    $sql="UPDATE candidate set nom_candidate='$nom',email_candidate='$email',cin='$cin',situation='$situation',photo_candidate='$photo',cv_pdf='$cv' WHERE id_candidate='{$_SESSION['id_candidate']}'";
     $db->query($sql) or die("er1");
   if(isset($_SESSION['formation']))
     foreach($_SESSION['formation'] as $value){
    $sql="INSERT INTO `formation`(`diplome`, `specialite`, `date_obtention`, `id_candidate`) VALUES ({$value['diplome']},{$value['specialite']},'{$value['date']}',{$_SESSION['id_candidate']})";
     $db->query($sql) ;
     }
   if(isset($_SESSION['experience']))
     foreach($_SESSION['experience'] as $value){
     $sql="INSERT INTO  experience set 	type='{$value['type']}',date_debut='{$value['date_debut']}',date_fin='{$value['date_fin']}',entreprise='$societe',id_candidate='{$_SESSION['id_candidate']}',service='{$value['service']}',description='{$value['description']}'";
     $db->query($sql) or die("er2");  
     }
     if(isset($_SESSION['langue']))
     foreach($_SESSION['langue'] as $value){
     $sql="INSERT INTO langue  set 	langue='{$value['langue']}',degree='{$value['degree']}',id_candidate='{$_SESSION['id_candidate']}'";
     $db->query($sql) or die("er3");  

     }
     if(isset($_POST['P']))
     foreach($_POST['P'] as $value){
        $sql="INSERT INTO permis  set 	permis='{$value}',id_candidate='{$_SESSION['id_candidate']}'";
        $db->query($sql) or die("er3");     
     }
     if(isset($_POST['O']))
     foreach($_POST['O'] as $value){
        $sql="INSERT INTO office  set 	office='{$value}',id_candidate='{$_SESSION['id_candidate']}'";
        $db->query($sql) or die("er3");     
     }
     unset($_SESSION['langue']);
     unset($_SESSION['formation']);
     unset($_SESSION['experience']);
     unset($_POST['Create']);
    }

 ?>

  
    <body>
    <style>
.header-nav-bar .navbar-nav .nav-link {
    padding: 35px 15px;
    color: rgba(0, 0, 0, 0.7);
}
.button-primary, .button-primary:focus {
    color: #fff;
    background-color: #1087eb;
    border-color: #1087eb;
}
.header-nav-bar .navbar-nav .nav-item:hover .nav-link, .header-nav-bar .navbar-nav .nav-item:focus .nav-link, .header-nav-bar .navbar-nav .nav-item.active .nav-link {
    color: #000;
}
</style>
			<!-- ============================ Hero Banner  Start================================== -->
      <div class="page-title pt-img-bg" style="background-color: #0f7dff; height:200px;">
      <div class="page-title pt-img-bg" style="background-color:white; height:150px;" >
			</div>
				<div class="container">
					<div class="col-lg-12 col-md-12 align-middle" >
							<h1>Submit Resume</h1>
					</div>
				</div>
			</div>
        <div id="main-wrapper">
    
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
      
      <div class="breadcrumbs-custom-aside">
          <div class="container">
            <ul class="breadcrumbs-custom-path">
              <li><a href="index.php">Home</a></li>
              <li class="active">For Candidates</li>
              <li class="active">Submit Resume</li>
            </ul>
          </div>
        </div>
      <div class="clearfix"></div>
      <!-- ============================================================== -->
      <!-- Top header  -->
      <!-- ============================================================== -->



      <style type="text/css">

.alert-type-1 {
    padding: 20px 20px 20px 30px
}

.alert-type-1 .alert-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    margin-bottom: -20px;
    margin-left: -20px
}

.alert-type-1 .alert-inner:empty {
    margin-bottom: 0;
    margin-left: 0
}

.alert-type-1 .alert-inner>* {
    display: inline-block;
    margin-top: 0;
    margin-bottom: 20px;
    margin-left: 20px
}

.alert-type-1 .alert-main {
    max-width: 595px;
    letter-spacing: .025em;
    color: #151515
}

@media(min-width:768px) {
    .alert-type-1 .alert-main {
        font-size: 16px;
        line-height: 1.5
    }
}
p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}        
.breadcrumbs-custom+.bg-gray-100 {
    border-top: 1px solid #d6d6d6
}

.breadcrumbs-custom-main {
    position: relative;
    padding: 40px 0;
    background-position: center center;
    background-size: cover
}

.breadcrumbs-custom-main[style*=background-image]::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    pointer-events: none;
    z-index: 1;
    background: rgba(54, 67, 82, .45)
}

.breadcrumbs-custom-main>* {
    position: relative;
    z-index: 2
}

.breadcrumbs-custom-aside {
    padding: 15px 0;
    background: #f3f4f9
}

.breadcrumbs-custom-path {
    margin-left: -15px;
    margin-right: -15px
}

.breadcrumbs-custom-path>* {
    padding-left: 15px;
    padding-right: 15px
}

.breadcrumbs-custom-path a {
    display: inline;
    vertical-align: middle
}

.breadcrumbs-custom-path a,
.breadcrumbs-custom-path a:active,
.breadcrumbs-custom-path a:focus {
    color: #1087eb
}

.breadcrumbs-custom-path li {
    position: relative;
    display: inline-block;
    line-height: 1.2;
    letter-spacing: .05em;
    vertical-align: middle
}

.breadcrumbs-custom-path li::after {
    content: '';
    position: absolute;
    width: 1px;
    height: 100%;
    right: 0;
    top: 50%;
    transform: translate3d(0, -50%, 0);
    background: #cbcbcb
}

.breadcrumbs-custom-path li:last-child:after {
    display: none
}

.breadcrumbs-custom-path a:hover,
.breadcrumbs-custom-path li.active {
    color: #9a9a9a
}

@media(min-width:576px) {
    .breadcrumbs-custom-aside {
        padding: 23px 0
    }
}

@media(min-width:768px) {
    .breadcrumbs-custom-main {
        padding: 65px 0 70px
    }
}
*+.block-form {
    margin-top: 50px
}
@media(min-width:768px) {
    p+p {
        margin-top: 24px
    }
    *+.block-form {
        margin-top: 65px
    }

}
html .group-middle {
    display: inline-table;
    vertical-align: middle
}

.rd-search-classic .form-input {
    color: #9a9a9a;
    padding-right: 60px
}

.rd-search-classic .form-input,
.rd-search-classic .form-label {
    letter-spacing: 0
}

.rd-search-classic .rd-search-submit {
    background: 0 0;
    border: none;
    display: inline-block;
    padding: 0;
    outline: none;
    outline-offset: 0;
    cursor: pointer;
    -webkit-appearance: none;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    width: 50px;
    padding-top: 3px;
    padding-right: 2px;
    margin: 0;
    text-align: center;
    color: #151515;
    font-size: 0;
    line-height: 0
}

.rd-search-classic .rd-search-submit::-moz-focus-inner {
    border: none;
    padding: 0
}

.rd-search-classic .rd-search-submit:before {
    position: relative;
    top: -1px;
    content: '\e01c';
    font: 400 20px fl-budicons-launch;
    line-height: 1;
    transition: .33s all ease
}

.rd-search-classic .rd-search-submit:hover {
    color: #1087eb
}

.rd-search-classic.form-lg .form-input {
    padding-right: 70px
}

.rd-search-classic.form-lg .rd-search-submit {
    width: 60px
}

.rd-search.form-inline {
    position: relative
}

.rd-search.form-inline .form-input {
    padding-right: 50px
}

.rd-search.form-inline .button-link {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 50px;
    right: 0;
    margin: 0;
    font-size: 21px;
    color: #d6d6d6;
    transition: .33s
}

.rd-search.form-inline .button-link::before {
    display: block;
    margin: auto
}

.rd-search.form-inline .button-link:hover {
    color: #1087eb
}

.rd-search.form-inline.form-sm .form-input {
    padding-right: 40px
}

.rd-search.form-inline.form-sm .button-link {
    width: 40px;
    font-size: 18px
}

.rd-search.form-inline.form-lg .form-input {
    padding-right: 60px
}

.rd-search.form-inline.form-lg .button-link {
    width: 60px
}

.form-wrap-icon .form-label,
.form-wrap-icon .form-input,
.form-wrap-icon .select2-container--default .select2-selection--single .select2-selection__rendered {
    padding-left: 57px
}

.has-error .form-input,
.has-error .select2-container--default .select2-selection--single {
    border-color: #eb6a6a
}

.has-focus .form-input,
.has-focus .select2-container--default .select2-selection--single {
    border-color: #1087eb
}

.form-wrap+* {
    margin-top: 30px
}

.rd-form .form-wrap+.row {
    margin-top: 30px
}

.form-input {
    display: block;
    width: 100%;
    min-height: 50px;
    padding: 12px 26px;
    font-size: 14px;
    font-weight: 400;
    line-height: 24px;
    color: #151515;
    background-color: #fff;
    background-image: none;
    border-radius: 0;
    -webkit-appearance: none;
    transition: .3s ease-in-out;
    border: 1px solid #e0e0e0
}

.form-input:focus {
    outline: 0
}

textarea.form-input {
    height: 175px;
    min-height: 50px;
    max-height: 298px;
    resize: vertical
}

.form-label,
.form-label-outside {
    margin-bottom: 0;
    color: #9a9a9a;
    font-weight: 400
}


.form-label.focus {
    opacity: 0
}

.form-label.auto-fill {
    color: #151515
}

.form-label-outside {
    display: inline-block;
    margin-bottom: 6px;
    letter-spacing: .025em;
    color: #151515;
    cursor: pointer
}

@media(min-width:768px) {
    .form-label-outside {
        position: static
    }
    .form-label-outside,
    .form-label-outside.focus,
    .form-label-outside.auto-fill {
        transform: none
    }
}

.form-label-outside+.form-wrap-inner .form-label,
.form-label-outside+.form-wrap-inner .form-input,
.form-label-outside+.form-wrap-inner .select2-selection--single .select2-selection__rendered {
    color: #9a9a9a
}

[data-x-mode=true] .form-label {
    pointer-events: auto
}

.form-validation {
    position: absolute;
    right: 8px;
    top: 0;
    z-index: 11;
    margin-top: 2px;
    font-size: 9px;
    font-weight: 400;
    line-height: 12px;
    letter-spacing: 0;
    color: #eb6a6a;
    transition: .3s
}

.form-validation-left .form-validation {
    top: 100%;
    right: auto;
    left: 0
}

#form-output-global {
    position: fixed;
    bottom: 30px;
    left: 15px;
    z-index: 2000;
    visibility: hidden;
    transform: translate3d(-500px, 0, 0);
    transition: .3s all ease
}

#form-output-global.active {
    visibility: visible;
    transform: translate3d(0, 0, 0)
}

@media(min-width:576px) {
    #form-output-global {
        left: 30px
    }
}

.form-output {
    position: absolute;
    top: 100%;
    left: 0;
    font-size: 10px;
    font-weight: 400;
    line-height: 1.2;
    margin-top: 2px;
    transition: .3s;
    opacity: 0;
    visibility: hidden
}

.form-output.active {
    opacity: 1;
    visibility: visible
}

.form-output.error {
    color: #eb6a6a
}

.form-output.success {
    color: #98bf44
}

.radio .radio-custom,
.radio-inline .radio-custom,
.checkbox .checkbox-custom,
.checkbox-inline .checkbox-custom {
    opacity: 0
}

.radio .radio-custom,
.radio .radio-custom-dummy,
.radio-inline .radio-custom,
.radio-inline .radio-custom-dummy,
.checkbox .checkbox-custom,
.checkbox .checkbox-custom-dummy,
.checkbox-inline .checkbox-custom,
.checkbox-inline .checkbox-custom-dummy {
    position: absolute;
    left: 0;
    width: 14px;
    height: 14px;
    outline: none;
    cursor: pointer
}

.radio .radio-custom-dummy,
.radio-inline .radio-custom-dummy,
.checkbox .checkbox-custom-dummy,
.checkbox-inline .checkbox-custom-dummy {
    pointer-events: none
}

.radio .radio-custom-dummy::after,
.radio-inline .radio-custom-dummy::after,
.checkbox .checkbox-custom-dummy::after,
.checkbox-inline .checkbox-custom-dummy::after {
    position: absolute;
    opacity: 0;
    transition: .22s
}

.radio .radio-custom:focus,
.radio-inline .radio-custom:focus,
.checkbox .checkbox-custom:focus,
.checkbox-inline .checkbox-custom:focus {
    outline: none
}

.radio,
.radio-inline,
.checkbox,
.checkbox-inline {
    position: relative;
    cursor: pointer;
    user-select: none
}
.form-label-outside+.form-wrap-inner .form-label, .form-label-outside+.form-wrap-inner .form-input, .form-label-outside+.form-wrap-inner .select2-selection--single .select2-selection__rendered {
    color: #9a9a9a;
}
.form-lg .form-input {
    min-height: 60px;
}
.form-lg .form-input, .form-lg .select2-selection.select2-selection--single .select2-selection__rendered {
    padding-top: 17px;
    padding-bottom: 17px;
}
.form-input {
    display: block;
    width: 100%;
    min-height: 50px;
    padding: 12px 26px;
    font-size: 14px;
    font-weight: 400;
    line-height: 24px;
    color: #151515;
    background-color: #fff;
    background-image: none;
    border-radius: 0;
    -webkit-appearance: none;
    transition: .3s ease-in-out;
    border: 1px solid #e0e0e0;
}
input, button, select, textarea {
    outline: none;
}
      </style>   


<section class="section section-md">
<form class="rd-mailform" id="submit-resume-form" enctype ="multipart/form-data" data-form-output="form-output-global" data-form-type="contact" method="post" novalidate="novalidate">
        <div class="container">
         <?php if(!isset($_SESSION['flage'])){ ?>
          <div class="alert alert-info alert-type-1" role="alert">
            <div class="alert-inner">
              <div class="alert-main">
                <p>Have an account? If you don’t have an account you can create one below by entering your email address</p>
              </div>
              <div class="alert-aside"><a class="button button-xs button-primary button-icon button-icon-left" href="inscription.php"><span class="icon mdi mdi-account-outline"></span>Sign Up</a></div>
            </div>
          </div>
         <?php } ?>


          <div class="block-form">
            <h4>General Information</h4>
            <hr>
            <!-- RD Mailform-->
             <div class="rd-form rd-mailform form-lg" novalidate="novalidate">
              <div class="row row-40">
                <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="general-information-name">Your Name</label>
                    <div class="form-wrap-inner">
                     <input class="form-input form-control-has-validation"  value="<?php echo $nom; ?>" id="name"  required="" type="text" name="nom"  placeholder="First Name"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="general-information-email">Your Email</label>
                    <div class="form-wrap-inner">
                    <input class="form-input form-control-has-validation" value="<?php echo $email; ?>" id="email"  required="" type="email" name="mail"  placeholder="First Name"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
          
                <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="general-information-CIN">Your CIN</label>
                    <div class="form-wrap-inner">
                    <input class="form-input form-control-has-validation" value="<?php echo $cin; ?>" required="" id="general-information-CIN" form="submit-resume-form" type="text" name="cin" placeholder="ex U 12232" data-constraints="@Required"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                <label class="form-label-outside" for="situation">Your family situation</label>
    	          <select id="situation" class="selectpicker form-control"   name="situation"  >
                      <?php if($situation=="Célibataire"){ ?>
                       <option selected>Celibataire</option>
                      <?php }else{ ?>
                       <option >Celibataire</option>

                      <?php }if($situation=="Marié(e)"){ ?>
                      <option selected >Marie(e)</option>
                      <?php }else{ ?>
                      <option >Marie(e)</option>

                      <?php }if($situation=="Divorcé(e)"){ ?>
                      <option selected>Divorce(e)</option>
                      <?php }else{ ?>
                    <option>Divorce(e)</option>

                    <?php }if($situation=="Veuf(e)"){ ?>
                      <option selected >Veuf(e)</option>
                      <?php }else{ ?>
                        <option>Veuf(e)</option>
                      <?php } ?>
                </select>
                </div>
         
              </div>
            </div>

          </div>
          <div class="block-form">
            <h4>Formation</h4>
            <hr>
            <!-- RD Mailform-->
            <div class="rd-form rd-mailform form-lg form-corporate" novalidate="novalidate">
            <div class="row row-40">

            <div class="col-md-6">
             <label for="diplome" class="form-label-outside" >Diplome :</label>
											<select name="diplome" id="diplome"class="selectpicker form-control">
												<option value="">Select Diplome</option>
							</select>
             </div>

            <div class="col-md-6">
            <label for="specialite" class="form-label-outside" >Specialité :</label>
											<select name="specialite" id="specialite"class="selectpicker form-control">
												<option value="">Select Specialité</option>
							</select>
            </div>

               <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="general-information-time">Your length of time</label>
                    <div class="form-wrap-inner">
                    <input class="form-input form-control-has-validation" value="<?php echo $duree; ?>"  required=""id="general-information-time" form="submit-resume-form" type="date" name="duree" data-constraints="@Required"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                  <div class="form-wrap">
                    <div class="form-wrap-inner">
                    <button class="button button-sm button-primary" <?php echo $falag; ?>  name="addformation" ><span class="icon mdi mdi-plus"></span>Add education</button>
                    </div>
                  </div>
                </div>

            </div>
            </div>
<br>

            <?php if(isset($_SESSION['formation'])) {?>
            <table class="table">
                <tr><td>Diplome</td><td>Specialité</td><td>Length of time</td><td width="5%">Delete</td></tr>
                <?php foreach($_SESSION['formation'] as $key=>$value){ ?>
                <tr>
                    <?php foreach($json as $val) {
                        if($val['id']==$value['diplome']){
                        ?>
                        <td><?php echo $val['name']; ?></td>
                        <?php } if($val['id']==$value['specialite'] and $val['parent_id']==$value['diplome']){ ?>
                        <td><?php echo $val['name']; ?></td>
                        <?php } ?>
                        <?php } ?>
                    <td><?php echo $value['date']; ?></td>
                    <td><a class="btn btn-danger" href="candidate.php?id=<?php echo $key; ?>">X</a></td>
                </tr>
                <?php } ?>
            </table>
             <?php } ?>


          </div>
          
          <div class="block-form">
            <h4>Experience</h4>
            <hr>
            <!-- RD Mailform-->
            <div class="rd-form rd-mailform form-lg form-corporate" novalidate="novalidate">
            <div class="row row-40">

            <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="date_debut">Your Start date </label>
                    <div class="form-wrap-inner">
                     <input class="form-input form-control-has-validation"  id="date_debut"  required="" type="date" name="date_debut"  placeholder="First Name"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="date_fin">Your end date </label>
                    <div class="form-wrap-inner">
                     <input class="form-input form-control-has-validation"  id="date_fin"  required="" type="date" name="date_fin"  placeholder="First Name"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                    <label for="diplome" class="form-label-outside" >Type :</label>
											<select name="type"  class="selectpicker form-control">
                                                <option>Stage</option>
                                                <option  >Mission</option>
							             </select>
                             </div>

                 <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="entreprise">Your Company </label>
                    <div class="form-wrap-inner">
                     <input class="form-input form-control-has-validation"  id="entreprise"  required="" type="text" name="societe"  placeholder="Your Company"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
                   

                <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="Service">Your Service </label>
                    <div class="form-wrap-inner">
                     <input class="form-input form-control-has-validation"  id="Service"  required="" type="text" name="service"  placeholder="Your Service"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
           
                <div class="col-12">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="resume-description">Description</label>
                    <div class="form-wrap-inner">
                      <textarea placeholder="Please Enter description" class="form-input form-control-has-validation form-control-last-child" id="resume-description"  name="description" ></textarea><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
              
                <div class="col-md-6">
                   <button class="button button-sm button-primary" <?php echo $falag; ?> name="addesperience"><span class="icon mdi mdi-plus"></span>Add experience</button>
                </div>
            </div>
            </div>
            
          </div>
<br>
<?php if(isset($_SESSION['experience'])) {?>
            <table class="table">
                <tr><td>Societe</td><td>Service</td><td>Type</td><td>Date debut</td><td>Date Fin</td><td>Description</td><td width="5%">Delete</td></tr>
                <?php foreach($_SESSION['experience'] as $key=>$value){ ?>
                <tr>
                    <td><?php echo $value['societe'] ?></td>
                    <td><?php echo $value['service'] ?></td>
                    <td><?php echo $value['type'] ?></td>
                    <td><?php echo $value['date_debut'] ?></td>
                    <td><?php echo $value['date_fin'] ?></td>
                    <td><?php echo $value['description'] ?></td>
                    <td><a class="btn btn-danger" href="candidate.php?id_ex=<?php echo $key; ?>">X</a></td>
                </tr>
                <?php } ?>
            </table>
             <?php } ?>

          <div class="block-form">
            <h4>skill</h4>
            <hr>
            <div class="group">
            <div class="row row-40">

                   <div class="col-md-6">
                   <label for="Langue" class="form-label-outside" >Langue :</label>
                                <select name="langue" id="Langue"class="selectpicker form-control">
                                    <option >Français</option>
                                    <option >Anglais</option>
                                    <option >Espagnol</option>
                               </select>
                        </div>

                   <div class="col-md-6">
                   <label for="quality" class="form-label-outside" >Degree :</label>
                                <select name="degree" id="quality"class="selectpicker form-control">
                                    <option >Bon</option>
                                    <option >Moyenne</option>
                                    <option >Notions</option>
                   </select>
                    </div>

            </div>
            <hr>
            <button <?php echo $falag; ?> class="button button-sm button-primary" name="skill"><span class="icon mdi mdi-plus"></span>Add skill</button>
          </div>
          <br>

<?php if(isset($_SESSION['langue'])) {?>
<table class="table">
    <tr><td>Langue</td><td>Degree</td><td width="5%">Delete</td></tr>
    <?php foreach($_SESSION['langue'] as $key=>$value){ ?>
    <tr>
        <td><?php echo $value['langue']; ?></td>
        <td><?php echo $value['degree']; ?></td>
        <td><a class="btn btn-danger" href="candidate.php?id_l=<?php echo $key; ?>">X</a></td>
    </tr>
    <?php } ?>
</table>
 <?php } ?>
      <br>

          <h4>Office</h4>
            <hr>
            <div class="group">
            <div class="row row-40">

                   <div class="col-md-6">
                   <input id="checkbox-1"  class="checkbox-custom" value="word" name="O[]" type="checkbox" >
					<label for="checkbox-1" class="checkbox-custom-label">Word</label>
                        </div>
                        <div class="col-md-6">
                   <input id="checkbox-2" class="checkbox-custom" value="excel" name="O[]" type="checkbox" >
					<label for="checkbox-2" class="checkbox-custom-label">Excel</label>
                        </div>
                        <div class="col-md-6">
                   <input id="checkbox-3"   class="checkbox-custom" value="access" name="O[]" type="checkbox" >
					<label for="checkbox-3" class="checkbox-custom-label">Access</label>
                        </div>
                        <div class="col-md-6">
                   <input id="checkbox-4"    class="checkbox-custom" value="power point" name="O[]" type="checkbox" >
					<label for="checkbox-4" class="checkbox-custom-label">Power Point</label>
                        </div>

            </div>
          </div>
      
      <br>
          <h4>Allowed</h4>
            <hr>
            <div class="group">
            <div class="row row-40">

                   <div class="col-md-6">
                   <input id="checkbox-8"   value="A" class="checkbox-custom" name="P[]" type="checkbox" >
					<label for="checkbox-8" class="checkbox-custom-label">A</label>
                        </div>
                        <div class="col-md-6">
                   <input id="checkbox-9"  value="B" class="checkbox-custom" name="P[]" type="checkbox" >
					<label for="checkbox-9" class="checkbox-custom-label">B</label>
                        </div>
                        <div class="col-md-6">
                   <input id="checkbox-10" value="C" class="checkbox-custom" name="P[]"type="checkbox" >
					<label for="checkbox-10" class="checkbox-custom-label">C</label>
                        </div>
                        <div class="col-md-6">
                   <input id="checkbox-11"   value="D"  class="checkbox-custom" name="P[]" type="checkbox" >
					<label for="checkbox-11" class="checkbox-custom-label">D</label>
                        </div>
                        <div class="col-md-6">
                   <input id="checkbox-5" value="EB"  class="checkbox-custom" name="P[]" type="checkbox" >
					<label for="checkbox-5" class="checkbox-custom-label">EB</label>
                        </div>
                        <div class="col-md-6">
                   <input id="checkbox-6"  value="EC"  class="checkbox-custom" name="P[]" type="checkbox" >
					<label for="checkbox-6" class="checkbox-custom-label">EC</label>
                        </div>
                        <div class="col-md-6">
                   <input id="checkbox-7"  value="ED"  class="checkbox-custom" name="P[]" type="checkbox" >
					<label for="checkbox-7" class="checkbox-custom-label">ED</label>
                        </div>

            </div>
          </div>

          <div class="block-form">
            <h4>Add Files</h4>
            <hr>
            <div class="group">
              <label class="button button-sm button-primary-outline button-icon button-icon-left">
                <input type="file" name="photo" form="submit-resume-form"><span class="icon mdi mdi-account-box"></span>Add Your Photo
              </label>
              <label class="button button-sm button-primary button-icon button-icon-left">
                <input type="file" name="cv" form="submit-resume-form"><span class="icon mdi mdi-attachment" style="transform: rotate(270deg); transform-origin: 37% 27%;"></span>Add Resume File
              </label>
            </div>
            <hr>
            <button name="Create" <?php echo $falag; ?> class="button button-lg button-secondary" type="submit" form="submit-resume-form">Create</button>
          </div>
        </div>
        </form>
      </section>
      <div class="clearfix"></div>

      <!-- ============================ footer ================================== -->
      
                             <?php include'footer.php'; ?>
      <!-- ============================ footer ================================== -->
      
      
      

    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    
    
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery-rating.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/slider-bg.js"></script>
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>

$(document).ready(function(e){

    function get_json_data(id, parent_id) {
        var html_code = '';
        $.getJSON('diplome.json', function(data) {
          ListName = id.substr(0, 1).toUpperCase() + id.substr(1);
          html_code += '<option value="">Select ' + ListName + '</option>';
            $.each(data, function(key, value) {
                  if (value.parent_id == parent_id) {
                      html_code += '<option value="' + value.id + '">' + value.name + '</option>';
                  }
            });
            $('#' + id).html(html_code);
        });

    }
    get_json_data('diplome',0);

    $(document).on('change', '#diplome', function() {
        var diplome_id = $(this).val();
        if (diplome_id != '') {
            get_json_data('specialite', diplome_id);
        } else {
            $('#specialite').html('<option value="">Select specialite</option>');
        }
        $('#product').html('<option value="">Select Product</option>');
    });

    $(document).on('change', '#specialite', function() {
        var specialite_id = $(this).val();
        if (specialite_id != '') {
            get_json_data('product', specialite_id);
        } else {
            $('#product').html('<option value="">Select Variant</option>');
        }
    });


});
</script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->

  </body>

</html>

