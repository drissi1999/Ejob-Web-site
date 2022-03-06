<?php 
include 'connexion.php';
include'nav.php'; 
$str=file_get_contents('jsonfile/ville.json');
$json=json_decode($str,true);
$nom=$prenom=$email=$adresse=$ville=$paw1=$pw1=$date_naissance=$secteur=$url=$description=$telephone=$raison="";
if(isset($_SESSION['id_candidate']) or isset($_SESSION['id_company']))
header('location:index.php');
else{

if(isset($_POST['candidate'])){
  $nom= $db->real_escape_string($_POST['nom']);
  $prenom= $db->real_escape_string($_POST['nom2']);
  $email= $db->real_escape_string($_POST['mail']);
  $adresse= $db->real_escape_string($_POST['adresse']);
  $telephone= $db->real_escape_string($_POST['telephone']);
     $ville=$_POST['ville'];
     $paw1=$_POST['pw1'];
     $paw2=$_POST['pw2'];
     $date_naissance=$_POST['date_naissance'];
     if($ville!="ville"){
    if($paw1==$paw2){
     $sql="INSERT INTO candidate 
        set
         nom_candidate='$nom'
         ,prenom_candidate='$prenom'
         ,email_candidate='$email'
         ,password='$paw1'
         ,telephone_candidate='$telephone',
         adresse_candidate='$adresse',
         id_ville=$ville,
         date_naissance='$date_naissance'
         ";
       @$db->query($sql);
        $_SESSION['id_candidate']=$db->insert_id;
        $_SESSION['flage']=$nom;
        echo "vous êtes inscire";
        unset($_POST['candidate']);
        header('location:index.php');
    }else{
      echo "<style>
      #password1{
      border: 1px solid red;
      }
      #password2{
      border: 1px solid red;
      }
      </style>";
    }}else{
      echo "<style>
      #ville{
      border: 1px solid red;
      }
      </style>";
    }
}


if(isset($_POST['Company'])){
  $raison= $db->real_escape_string($_POST['raison']);
  $nom= $db->real_escape_string($_POST['nom2']);
  $email= $db->real_escape_string($_POST['mail']);
  $secteur= $db->real_escape_string($_POST['secteur']);
  $telephone= $db->real_escape_string($_POST['telephone']);
  $description= $db->real_escape_string($_POST['description']);
  $url=$_POST['url'];
  $adresse=$_POST['adresse'];
  $ville=$_POST['ville'];
  $pw1=$_POST['pw1'];
  $pw2=$_POST['pw2'];
  if($ville!="ville"){
  if($pw1==$pw2){
    $dossier = 'assets/logo/';
    $fichier = basename($_FILES['photo']['name']);    
    move_uploaded_file($_FILES['photo']['tmp_name'],$dossier.$fichier);
    $logo=$fichier;
   echo  $sql="INSERT INTO recruteur 
    set
      nom_recruteur='$nom'
     ,secteur_recruteur='$secteur'
     ,email_contact='$email'
     ,password='$pw1'
     ,telephone='$telephone',
     adresse_recruteur='$adresse',
     raison_social='$raison',
     id_ville=$ville,
     description_societe='$description',
     url='$url',logo='$logo'
     ";
          @$db->query($sql);
          $_SESSION['id_company']=$db->insert_id;
          $_SESSION['flage']=$nom;
          echo "vous êtes inscire";
          unset($_POST['Company']);
          header('location:index.php');
  }else{
    echo "<style>
    #password3{
    border: 1px solid red;
    }
    #password4{
    border: 1px solid red;
    }
    </style>";
  }}else{
    echo "<style>
    #ville{
    border: 1px solid red;
    }
    </style>";
  }
}

?>

<!DOCTYPE html>
<html >
  
<?php include'header.php'; ?>

  
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
							<h1>Inscription</h1>
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
              <li>Inscription</li>
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
					<div class="row mb-5">
						<!-- Nav tabs -->
						<div class="col-lg-12 col-md-12">
							<div class="tab" role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs nav justify-content-center" role="tablist">
									<li role="presentation" class="active"><a href="#Section1" role="tab" data-toggle="tab">Candidate</a></li>
									<li role="presentation"><a href="#Section2" role="tab" data-toggle="tab">Company</a></li>
								</ul>
								<!-- Tab panes -->
								<div class="tab-content tabs">
									<div role="tabpanel" class="tab-pane fade in active" id="Section1">
           <form class="rd-mailform" id="submit-resume-form" method="post"  >
            <h4>General Information For Candidate</h4>
            <hr>
            <!-- RD Mailform-->
            <div class="rd-form rd-mailform form-lg">
              <div class="row row-40">
                <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="name">Your First Name</label>
                    <div class="form-wrap-inner">
                      <input class="form-input form-control-has-validation" value="<?php echo $nom; ?>" id="name"  required="" type="text" name="nom"  placeholder="First Name"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="Second">Your Second Name</label>
                    <div class="form-wrap-inner">
                      <input class="form-input form-control-has-validation" value="<?php echo $prenom; ?>" id="Second"  required="" type="text" name="nom2"  placeholder="Second Name"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="Phone">Your Phone</label>
                    <div class="form-wrap-inner">
                      <input class="form-input form-control-has-validation" id="Phone" value="<?php echo $telephone; ?>"  required=""  name="telephone"   placeholder="06XXXXXXXX"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="email">Your Email</label>
                    <div class="form-wrap-inner">
                      <input class="form-input form-control-has-validation" id="email"  required="" value="<?php echo $email; ?>" type="email" name="mail"  placeholder="xxxxx@gmail.com"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                <label class="form-label-outside" for="ville">Your City</label>
    	         <select id="ville" class="selectpicker form-control"   name="ville"  >
               <option selected value="ville">All City </option>
               <?php
               if($ville!="")
               foreach ($json ['ville'] as $key=>$value) {
                 if($ville==$value['id'])
                  echo "<option selected value=\"{$value['id']}\">{$value['ville']}</option>";
                  else
                  echo "<option  value=\"{$value['id']}\">{$value['ville']}</option>";
                   }
                else
                foreach ($json ['ville'] as $key=>$value) {
                   echo "<option  value=\"{$value['id']}\">{$value['ville']}</option>";
                    }
    	 	        ?>
                </select>
    	
                </div>
                <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="date_naissance">Your Date of birth</label>
                    <div class="form-wrap-inner">
                      <input class="form-input form-control-has-validation" id="date_naissance"  required="" value="<?php echo $date_naissance; ?>" type="date" name="date_naissance"   placeholder="info@demolink.org"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
                
                <div class="col-12">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="resume-content">Adresse</label>
                    <div class="form-wrap-inner">
                     
                      <textarea placeholder="Please Enter Adresse" class="form-input form-control-has-validation form-control-last-child" id="resume-content"  name="adresse" ><?php echo $adresse; ?></textarea><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="password1">Your Password</label>
                    <div class="form-wrap-inner">
                      <input class="form-input form-control-has-validation" id="password1"  required="" type="password" name="pw1"  placeholder="Enter Password"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="password2"> Confirme Your Password</label>
                    <div class="form-wrap-inner">
                      <input class="form-input form-control-has-validation" id="password2"  required="" type="password" name="pw2"  placeholder="Enter  Confirme  Password"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-wrap">
                    <div class="form-wrap-inner">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-wrap">
                    <div class="form-wrap-inner">
                      <input class="btn btn-primary" value="S'inscrire"  type="submit" name="candidate"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            </form>	
									</div>
									<div role="tabpanel" class="tab-pane fade" id="Section2">
       <form class="rd-mailform" id="submit-resume-form"  method="post" enctype="multipart/form-data"  >
            <h4>General Information For Company</h4>
            <hr>
            <!-- RD Mailform-->
            <div class="rd-form rd-mailform form-lg" novalidate="novalidate">
              <div class="row row-40">
         
                <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="Reason">Your Social Reason</label>
                    <div class="form-wrap-inner">
                      <input class="form-input form-control-has-validation" id="Reason" value="<?php echo $raison; ?>"  required="" type="text" name="raison"   placeholder="Enter Social Sector"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="Sector">Your Social Sector</label>
                    <div class="form-wrap-inner">
                      <input class="form-input form-control-has-validation" id="Sector" value="<?php echo $secteur; ?>" required="" type="text" name="secteur"   placeholder="Enter Social Sector"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="ur">Your Social Url</label>
                    <div class="form-wrap-inner">
                      <input class="form-input form-control-has-validation" id="ur"  required="" value="<?php echo $url; if(isset($url)) echo "http://www."; ?>" type="url" name="url"   placeholder="Enter Social Url"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
             
                <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="Phone">Your Phone</label>
                    <div class="form-wrap-inner">
                      <input class="form-input form-control-has-validation" id="Phone" value="<?php echo $telephone; ?>" required="" type="text" name="telephone"   placeholder="Enter Phone"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
               
         
                <div class="col-12">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="resume-social Adresse">Adresse</label>
                    <div class="form-wrap-inner">
                     
                      <textarea placeholder="Please Enter Adresse" class="form-input form-control-has-validation form-control-last-child" id="resume-social description"  name="adresse" ><?php echo $telephone; ?></textarea><span class="form-validation"></span>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="name">Your Email</label>
                    <div class="form-wrap-inner">
                      <input class="form-input form-control-has-validation" id="name"  required="" value="<?php echo $email; ?>" type="email" name="mail"   placeholder="info@demolink.org"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                <label class="form-label-outside" for="City">Your City</label>
    	         <select id="lunchBegins" class="selectpicker form-control"  id="City"  name="ville"  >
              <option selected value="ville">All City </option>
              <?php
               if($ville!="")
               foreach ($json ['ville'] as $key=>$value) {
                 if($ville==$value['id'])
                  echo "<option selected value=\"{$value['id']}\">{$value['ville']}</option>";
                  else
                  echo "<option  value=\"{$value['id']}\">{$value['ville']}</option>";
                   }
                else
                foreach ($json ['ville'] as $key=>$value) {
                   echo "<option  value=\"{$value['id']}\">{$value['ville']}</option>";
                    }
    	 	        ?>
                </select>
    	
                </div>
                <div class="col-12">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="resume-social description">Social Description</label>
                    <div class="form-wrap-inner">
                     
                      <textarea placeholder="Please Enter Social Description" class="form-input form-control-has-validation form-control-last-child" id="resume-social description"  name="description" ><?php echo $description; ?></textarea><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="nom2">Your Recruiter name</label>
                    <div class="form-wrap-inner">
                      <input class="form-input form-control-has-validation" id="nom2"  required="" value="<?php echo $nom; ?>"  name="nom2"   placeholder="Recruiter name"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="password3">Your Password</label>
                    <div class="form-wrap-inner">
                      <input class="form-input form-control-has-validation" id="password3" placeholder="Password"  required="" type="password" name="pw1" data-constraints="@Email @Required"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
                       
                <div class="col-md-6">
                  <div class="form-wrap">
                    <label class="form-label-outside" for="password4">Confirme Your Password</label>
                    <div class="form-wrap-inner">
                      <input class="form-input form-control-has-validation" id="password4"  required="" type="password" name="pw2" placeholder="Confirme Password" ><span class="form-validation"></span>
                    </div>
                  </div>
                </div>
                
                <div class="col-md-6">
                <div class="form-wrap">
                <h4>Add Logo</h4>
            <hr>
            <div class="group">
              <label class="button button-sm button-primary-outline button-icon button-icon-left">
                <input type="file" name="photo" ><span class="icon mdi mdi-account-box"></span>Add Your Logo
              </label>
            </div>
                </div>
              </div>

                <div class="col-md-4">
                  <div class="form-wrap">
                    <div class="form-wrap-inner">
                      <input class="btn btn-primary" value="S'inscrire"  type="submit" name="Company"><span class="form-validation"></span>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            </form>
									</div>
								</div>
							</div>
						</div>
						<!-- End Nav tabs -->
					
						
					</div>

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
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->

  </body>

</html>
<?php }  ?>
