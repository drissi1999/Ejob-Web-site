<!DOCTYPE html>
<html>

<?php 
include'header.php'; 
include'nav.php';
$fla="disabled";
if(isset($_SESSION['id_company']))
$fla="";
if(isset($_POST['ok'])){
  $type=$_POST['Type'];
  $Vacancy=$_POST['Vacancy'];
  $description=$_POST['description'];
  $ville=$_POST['ville'];
  $specialite=$_POST['specialite'];
  $salair=$_POST['Salair'];
  $conaissance=$_POST['conaissance'];
  $id_recruteur=$_SESSION['id_company'];
  $sql="INSERT INTO offre_emploi (id_specialite,salaire,contrat,description_poste,connaissance_technique,Vacancy,id_ville,id_recruteur)
   VALUES ($specialite,$salair,'$type','$description', '$conaissance','$Vacancy',$ville,$id_recruteur)";
   $db->query($sql) or die("err");

?>
    <script type='text/javascript'>
        swal('Sent', 'OK!', 'You are create');
    </script>
    <?php } ?>

        <body>
            <style>
                .header-nav-bar .navbar-nav .nav-link {
                    padding: 35px 15px;
                    color: rgba(0, 0, 0, 0.7);
                }
                
                .button-primary,
                .button-primary:focus {
                    color: #fff;
                    background-color: #1087eb;
                    border-color: #1087eb;
                }
                
                .header-nav-bar .navbar-nav .nav-item:hover .nav-link,
                .header-nav-bar .navbar-nav .nav-item:focus .nav-link,
                .header-nav-bar .navbar-nav .nav-item.active .nav-link {
                    color: #000;
                }
            </style>
            <div class="page-title pt-img-bg" style="background-color: #0f7dff; height:200px;">
                <div class="page-title pt-img-bg" style="background-color:white; height:150px;">
                </div>
                <div class="container">
                    <div class="col-lg-12 col-md-12 align-middle">
                        <h1>Post a Job</h1>
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
                            <li class="active">FOR EMPLOYES</li>
                            <li class="active">post a job</li>
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
                    
                    . .form-input,
                    . .select2-container--default .select2-selection--single {
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
                    
                    .form-label-outside+.form-wrap-inner .form-label,
                    .form-label-outside+.form-wrap-inner .form-input,
                    .form-label-outside+.form-wrap-inner .select2-selection--single .select2-selection__rendered {
                        color: #9a9a9a;
                    }
                    
                    .form-lg .form-input {
                        min-height: 60px;
                    }
                    
                    .form-lg .form-input,
                    .form-lg .select2-selection.select2-selection--single .select2-selection__rendered {
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
                    
                    input,
                    button,
                    select,
                    textarea {
                        outline: none;
                    }
                </style>

                <section class="section section-md">
                    <div class="container">
                        <?php if(!isset($_SESSION['id_company'])){ ?>
                            <div class="alert alert-info alert-type-1" role="alert">
                                <div class="alert-inner">
                                    <div class="alert-main">
                                        <p>Have an account? If you don’t have an account you can create one below by entering your email address. A password will be automatically emailed to you.</p>
                                    </div>
                                    <div class="alert-aside"><a class="button button-xs button-primary button-icon button-icon-left" href="inscription.php"><span class="icon mdi mdi-account-outline"></span>Sign Up</a></div>
                                </div>
                            </div>
                            <?php } ?>
                                <div class="block-form">
                                    <form class="rd-mailform" id="post-a-job-form" method="post">
                                        <h4>General Information</h4>
                                        <hr>
                                        <!-- RD Mailform-->
                                        <div class="rd-form rd-mailform form-lg" novalidate="novalidate">
                                            <div class="row row-40">

                                                <div class="col-md-6">
                                                    <label class="form-label-outside" for="Type">Your Contrat Type</label>
                                                    <select id="Type" class="selectpicker form-control" name="Type">
                                                        <option selected>Your Contrat Type</option>
                                                        <option>CDI</option>
                                                        <option>CDD</option>
                                                        <option>CTT</option>
                                                        <option>CUI</option>
                                                    </select>

                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label-outside" for="Vacancy">Your Vacancy Type</label>
                                                    <select id="Vacancy" class="selectpicker form-control" name="Vacancy">
                                                        <option selected>Your Vacancy Type </option> 
                                                        <option>Freelance</option>
                                                        <option>Full Time</option>
                                                        <option>Part Time</option>
                                                        <option>Internship</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label-outside" for="ville">Your City</label>
                                                    <select id="ville" class="selectpicker form-control" name="ville">
                                                    <option selected>Choose Your City</option>
                                                        <?php
                                                        foreach ($json ['ville'] as $key=>$value) {
                                                             echo "<option  value=\"{$value['id']}\">{$value['ville']}</option>";
                                                                     }
    	 	                                                    ?>
                                                    </select>

                                                </div>
                                                <?php 
                                                     $str=file_get_contents('diplome.json');
                                                        $json=json_decode($str,true);
                                                                     ?>
                                                    <div class="col-md-6">
                                                        <label class="form-label-outside" for="ville">Your Speciality</label>
                                                        <select id="specialite" class="selectpicker form-control" name="specialite">
                                                        <option selected>Choose Your Speciality</option>
                                                            <?php
                                                 foreach ($json as $key=>$value) {
                                            if($value['parent_id']!=0)
                                                      echo "<option  value=\"{$value['id']}\">{$value['name']}</option>";
                                                                }
    	 	                                                  ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-wrap">
                                                            <label class="form-label-outside" for="Salair">Your Salair</label>
                                                            <div class="form-wrap-inner">
                                                                <input class="form-input form-control-has-validation" id="Salair" required="" min="1" type="number" name="Salair" placeholder="Your Salair"><span class="form-validation"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-wrap">
                                                            <label class="form-label-outside" for="resume-Knowledge"> Knowledge</label>
                                                            <div class="form-wrap-inner">

                                                                <textarea required placeholder="Please Enter Knowledge" class="form-input form-control-has-validation form-control-last-child" id="resume-Knowledge" name="conaissance"></textarea><span class="form-validation"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-wrap">
                                                            <label class="form-label-outside" for="resume-content">Description</label>
                                                            <div class="form-wrap-inner">

                                                                <textarea required placeholder="Please Enter Description" class="form-input form-control-has-validation form-control-last-child" id="resume-content" name="description"></textarea><span class="form-validation"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="block-form">
                                                        <hr>
                                                        <button class="button button-secondary" <?php echo $fla; ?> name="ok" type="submit" >Create</button>
                                                    </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>

                    </div>
                </section>
                <div class="clearfix"></div>

                <!-- ============================ footer ================================== -->

                <?php include'footer.php'; ?>
                    <!-- ============================ footer ================================== -->

            </div>
         
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