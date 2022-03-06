<!DOCTYPE html>
<html>

<?php 
$disabled="";
if(isset($_GET['id_offre'])){
    $id_o=$_GET['id_offre'];
}else header('location:job_details.php');

include'header.php'; 
include'nav.php';
if(isset($_POST['ok']) and !isset($_SESSION['id_candidate'])){
    echo '<script type="text/javascript">';
	echo 'setTimeout(function () { swal("","Il faut d\'abord itentifier!","error");';
    echo '}, 1000);</script>';

}

if(isset($_POST['ok']) and isset($_SESSION['id_candidate'])){
    $sql="INSERT INTO `postulation`(`id_offre_emploi`, `id_candidate`) VALUES ($id_o,{$_SESSION['id_candidate']})";
    $db->query($sql);
    echo '<script type="text/javascript">';
			echo 'setTimeout(function () { swal("WOW!","Postulation success","success");';
            echo '}, 1000);</script>';
            $disabled="disabled";
}

?>

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
        <!-- ============================ Hero Banner  Start================================== -->
        <div class="page-title pt-img-bg" style="background-color: #0f7dff; height:200px;">
            <div class="page-title pt-img-bg" style="background-color:white; height:150px;">
            </div>
            <div class="container">
                <div class="col-lg-12 col-md-12 align-middle">
                    <h1>Job Details</h1>
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
                        <li><a href="index.html">Home</a></li>
                        <li class="active">For Candidates</li>
                        <li class="active">Job Details</li>
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
                
                ul li,
                ol li {
                    display: block;
                }
                
                *,
                ::before,
                ::after {
                    box-sizing: border-box;
                }
                
                ul,
                ol {
                    list-style: none;
                }
                
                list-marked-3 > li::before {
                    content: '';
                    position: absolute;
                    top: .65em;
                    left: 0;
                    display: inline-block;
                    width: 18px;
                    height: 3px;
                    vertical-align: middle;
                    background: #1087eb;
                }
                
                *,
                ::before,
                ::after {
                    box-sizing: border-box;
                }
                
                .list-marked-3 > li {
                    letter-spacing: .025em;
                }
                
                .list-marked-3 {
                    color: #151515;
                }
                
                ul,
                ol {
                    list-style: none;
                }
                
                .message-bubble-inner {
                    position: relative;
                    display: flex;
                    padding: 10px 15px;
                    border: 1px solid #e0e0e0;
                    border-top-color: rgb(224, 224, 224);
                    border-top-style: solid;
                    border-top-width: 1px;
                    border-top: 0;
                    margin-top: 12px;
                    letter-spacing: .025em;
                }
                
                *,
                ::before,
                ::after {
                    box-sizing: border-box;
                }
                
                .message-bubble {
                    color: #151515;
                }
                
                html .text-primary {
                    color: #1087eb;
                }
                
                .icon-sm {
                    font-size: 19px;
                }
                
                .icon {
                    display: inline-block;
                    line-height: 1.1;
                }
                
                .mdi {
                    display: inline-block;
                    font: normal normal normal 24px/1 "Material Design Icons";
                    font-size: 24px;
                    line-height: 1;
                    font-size: inherit;
                    text-rendering: auto;
                    -webkit-font-smoothing: antialiased;
                    -moz-osx-font-smoothing: grayscale;
                    transform: translate(0, 0);
                }
                
                *,
                ::before,
                ::after {
                    box-sizing: border-box;
                }
                
                .message-bubble-inner > * + * {
                    margin-left: 5px;
                }
                
                *,
                ::before,
                ::after {
                    box-sizing: border-box;
                }
                
                .message-bubble-inner {
                    letter-spacing: .025em;
                }
                
                .message-bubble {
                    color: #151515;
                }
                
                p {
                    margin: 0;
                }
                
                p {
                    margin-top: 0;
                    margin-bottom: 1rem;
                }
                
                *,
                ::before,
                ::after {
                    box-sizing: border-box;
                }
                
                .message-bubble-inner {
                    letter-spacing: .025em;
                }
                
                .message-bubble {
                    color: #151515;
                }
                
                .layout-1-inner {
                    display: flex;
                    flex-wrap: wrap;
                    align-items: center;
                    justify-content: space-between;
                    margin-bottom: -15px;
                    margin-left: -15px;
                }
                
                *,
                ::before,
                ::after {
                    box-sizing: border-box;
                }
                
                .layout-1-inner > * {
                    display: inline-block;
                    margin-top: 0;
                    margin-bottom: 15px;
                    margin-left: 15px;
                }
                
                p {
                    margin: 0;
                    margin-top: 0px;
                    margin-bottom: 0px;
                    margin-left: 0px;
                }
                
                p {
                    margin-top: 0;
                    margin-bottom: 1rem;
                }
                
                *,
                ::before,
                ::after {
                    box-sizing: border-box;
                }
                
                .layout-1-inner > * + * {
                    margin-top: 0;
                }
                
                .layout-1-inner > * {
                    display: inline-block;
                    margin-top: 0;
                    margin-bottom: 15px;
                    margin-left: 15px;
                }
                
                *,
                ::before,
                ::after {
                    box-sizing: border-box;
                }
                
                .list-marked-3 li {}
            </style>
            <?php 
$sql="SELECT * FROM offre_emploi o INNER join recruteur r on o.id_recruteur=r.id_recruteur WHERE id_offre_emploi={$id_o} ";
$tab=$db->query($sql) or die('err');
$h=$tab->fetch_array();
?>
                <section class="section section-md">
                    <div class="container">
                        <div class="row row-50">
                            <div class="col-lg-8">
                                <div class="layout-details">
                                    <article class="company-light company-light_1">
                                        <figure class="company-light-logo"><img class="company-light-logo-image" src="assets/logo/<?php echo $h['logo']; ?>" width="48" height="44" alt="">
                                        </figure>
                                        <div class="company-light-main">
                                            <h5 class="company-light-title"><?php echo $h['raison_social']; ?></h5>
                                            <div class="company-light-info">
                                                <div class="row row-15 row-bordered">
                                                    <div class="col-sm-6">
                                                        <ul class="list list-xs">
                                                            <li>
                                                                <p class="object-inline object-inline_sm"><span class="icon icon-1 text-primary mdi mdi-map-marker"></span><span><?php echo $h['adresse_recruteur']; ?>, 
                            <?php  foreach ($json ['ville'] as $key=>$value) 
                          if( $h['id_ville']==$value['id'])
                           echo "{$value['ville']}"; ?></span></p>
                                                            </li>
                                                            <li>
                                                                <p class="object-inline object-inline_sm"><span class="icon icon-default text-primary mdi mdi-clock"></span><span>Post Date: <?php echo $h['created_at']; ?></span></p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <ul class="list list-xs">
                                                            <li>
                                                                <p class="object-inline object-inline_sm"><span class="icon icon-sm text-primary mdi mdi-cash"></span><span>Salary: <?php echo $h['salaire']; ?> DH</span></p>
                                                            </li>
                                                            <li>
                                                                <p class="object-inline object-inline_sm"><span class="icon icon-1 text-primary mdi mdi-web"></span><span><a href="<?php echo $h['url']; ?>"><?php echo $h['url']; ?></a></span></p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <br>
                                <h4> Description Poste</h4>
                                <p class="text-style-1">
                                    <?php echo $h['description_poste']; ?>
                                </p>
                                <div class="row row-30">
                                    <div class="col-md-6">
                                        <h4>	Connaissance Technique</h4>
                                        <p class="text-style-1">
                                            <?php echo $h['connaissance_technique']; ?>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Other information</h4>
                                        <ul class="list-marked-3">
                                            <li>
                                                <p class="object-inline object-inline_sm"><i class="mdi mdi-chevron-double-right"></i><span>Vacancy</span> :
                                                    <?php echo $h['Vacancy']; ?>
                                                </p>
                                            </li>
                                            <li>
                                                <p class="object-inline object-inline_sm"><i class="mdi mdi-chevron-double-right"></i><span>Contrat</span> :
                                                    <?php echo $h['contrat']; ?>
                                                </p>
                                            </li>
                                            <li>
                                                <p class="object-inline object-inline_sm"><i class="mdi mdi-chevron-double-right"></i><span>Secteur Activity</span> :
                                                    <?php echo $h['secteur_recruteur']; ?>
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="block offset-top-2">
                                    <h4>Related Jobs</h4>
                                    <table class="table-job-listing table-responsive">
                                        <tbody>
                                            <?php
                     $sq="SELECT *,day(o.created_at) as date FROM offre_emploi o INNER join recruteur r on o.id_recruteur=r.id_recruteur  WHERE o.id_recruteur={$h['id_recruteur']} and o.etat=1 and id_offre_emploi<>{$_GET['id_offre']} Limit 3";
                        $p=$db->query($sq)or die("");

                        while($tab=$p->fetch_array()){
                        ?>
                                                <tr>
                                                    <td class="table-job-listing-main">
                                                        <article class="company-minimal">
                                                            <figure class="company-minimal-figure"><img class="company-minimal-image" src="assets/logo/<?php echo $tab['logo']; ?>" alt="">
                                                            </figure>
                                                            <div class="company-minimal-main">

                                                                <h5 class="company-minimal-title"><a href="job_details.php?id_offre=<?php echo $tab['id_offre_emploi']; ?>"><?php echo $tab['raison_social']; ?></a></h5>
                                                                <p>
                                                                    <?php echo $tab['adresse_recruteur']; ?>,

                                                                        <?php 
                         foreach ($json ['ville'] as $key=>$value) 
                          if( $tab['id_ville']==$value['id'])
                           echo "{$value['ville']}";
                        ?>

                                                                </p>
                                                            </div>
                                                        </article>
                                                    </td>
                                                    <td class="table-job-listing-date"><span><?php  echo date("d")-$tab['date'];?> day ago</span></td>
                                                    <td class="table-job-listing-badge">
                                                        <?php
                     if($tab['Vacancy']=="Full Time") 
                  echo "<span class='badge'>{$tab['Vacancy']}</span>";

                  if($tab['Vacancy']=="Part Time") 
                  echo "<span class='badge badge-secondary'>{$tab['Vacancy']}</span>";

                  if($tab['Vacancy']=="Freelance") 
                  echo "<span class='badge badge-tertiary'>{$tab['Vacancy']}</span>";

                  if($tab['Vacancy']=="Internship") 
                  echo "<span class='badge badge-blue-11'>{$tab['Vacancy']}</span>";

                 ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="row row-30 row-lg-50">
                                    <div class="col-md-6 col-lg-12">
                                        <!-- RD Mailform-->
                                        <form class="rd-mailform form-corporate form-spacing-small form-corporate_sm" method="post">
                                            <h4>Postulation </h4>
                                            <div class="form-wrap">
                                                <button class="button button-block button-primary" <?php echo $disabled; ?> name="ok" type="submit">Postuler</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
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
        <!-- ============================================================== -->
        <!-- This page plugins -->
        <!-- ============================================================== -->

    </body>

</html>