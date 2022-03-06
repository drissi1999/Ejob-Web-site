
<!DOCTYPE html>
<html lang="en">
  
<?php 
include'nav.php'; 
$nom=$prenom=$email=$photo="";
if(isset($_SESSION['id_candidate']))
  $id_candidate=$_SESSION['id_candidate'];
  else if(isset($_GET['id_candidate']))
  $id_candidate=$_GET['id_candidate'];
else header('location:index.php');

  $sql="SELECT *,YEAR(date_naissance) date FROM `experience` NATURAL JOIN candidate NATURAL JOIN formation WHERE id_candidate='$id_candidate'  GROUP BY id_candidate";
  $result=$db->query($sql);
  $num = $result->num_rows;
  if($num==1){
    $tab=$result->fetch_array(MYSQLI_ASSOC);
    $photo=$tab['photo_candidate'];
    $cv_pdf=$tab['cv_pdf'];
    $email=$tab['email_candidate'];
    $nom=$tab['nom_candidate'];
    $prenom=$tab['prenom_candidate'];
    $ville=$tab['id_ville'];
    $tel=$tab['telephone_candidate'];
    $cin=$tab['cin'];
    $adresse=$tab['adresse_candidate'];
    $situation=$tab['situation'];
    $age=date("Y")-$tab['date'];
  }else header('location:index.php');
if(isset($ville))
foreach($json['ville'] as $val)
if($ville==$val['id'])
$villes=$val['ville'];

include'header.php'; 

?>
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
<link href="style2.css" rel="stylesheet">
    <body>
 
        <div id="main-wrapper">
    
      <div class="page-title pt-img-bg" style="background-color:white; height:115px;" >
    		</div>


<section class="section section-sm bg-primary" >
        <div class="container" >
          <div class="container" >
        <div class="col-lg-12 col-md-12 align-middle" >
    						<h1>Submit Resume</h1>
					</div>
        <br>
    <br>
    	<div class="page-title"  style="background-color:#007bff!important;">
          <div class="layout-2">
            <div class="layout-2-item layout-2-item-main" >
              <!-- Profile Light-->
<article class="profile-light">
 
  <?php if($photo==NULL){ ?>
    <img class="profile-light-image" src="assets/img/user-default.jpg"  alt="">
    <?php }else{?> 
      <img class="profile-light-image"  src="assets/photo/<?php echo $photo; ?>" alt="">
    <?php } ?>
  <div class="profile-light-main">
                  <h4 class="profile-light-name"><?php echo $nom; ?></h4>
                  <h6 class="profile-light-position"><?php echo $prenom; ?></h6>
                  <ul class="profile-light-list">
                    <li><span class="icon icon-sm mdi mdi-email"></span><span><?php echo $email; ?></span></li>
                    <li><span class="icon icon-sm mdi mdi-google-maps"></span><span><?php echo $villes; ?></span></li>
                    <li><span class="icon icon-sm mdi mdi-cellphone"></span><span><?php echo $tel; ?></span></li>
                    <li><span class="icon icon-sm mdi mdi-file-presentation-box"></span><span><?php echo $cin; ?></span></li>
                    <li><span class="icon icon-sm mdi mdi-timetable"></span><span><?php echo $age; ?> years</span></li>
                    <li><span class="icon icon-sm mdi mdi-home"></span><span><?php echo $situation; ?></span></li>
                  </ul>
                </div>
              </article>
            </div>
            <div class="layout-2-item text-center text-lg-left">
              <div>
                <div class="group group-xl group-middle">
                  <div>
                    <ul class="list-inline list-inline-xs">
                      <li><a class="icon icon-xxs icon-filled icon-filled-brand icon-circle fa fa-facebook" href="#"></a></li>
                      <li><a class="icon icon-xxs icon-filled icon-filled-brand icon-circle fa fa-google-plus" href="#"></a></li>
                      <li><a class="icon icon-xxs icon-filled icon-filled-brand icon-circle fa fa-twitter" href="#"></a></li>
                    </ul>
                  </div><a class="button button-lg button-primary-outline" href="assets/cv_pdf/<?php echo $cv_pdf; ?>">Download CV</a>
                </div>
              </div>
            </div>
          </div></div>
        </div>
      </section>
      <div class="clearfix"></div>

     <section class="section section-md">
        <div class="container">
          <div class="row row-50">
            <div class="col-lg-8">
              <div class="row row-50">
                <div class="col-12">
                  <p class="heading-9">Adresse</p>
                  <hr>
                  <p class="text-style-1"><?php echo $adresse; ?>.</p>
                </div>

<?php
$str=file_get_contents('diplome.json');
$json=json_decode($str,true);
$sql="SELECT * FROM formation WHERE id_candidate='$id_candidate'";
$result=$db->query($sql);
$num = $result->num_rows;

?>
                


                <div class="col-12">
                  <p class="heading-9">Education</p>
                  <hr>
                  <div class="timeline-classic">

                  <?php if($num>0){
                   while($tab=$result->fetch_array()){
                   ?>
                       
                    <div class="timeline-classic-item">
                      <div class="timeline-classic-period"><span><?php echo $tab['date_obtention']; ?></span></div>
                      <div class="timeline-classic-main">

                      <?php foreach($json as $val) {
                        if($val['id']==$tab['diplome']){
                        ?>
                        <h5 class="timeline-classic-title"><?php echo $val['name']; ?></h5>
                        <?php } if($val['id']==$tab['specialite'] and $val['parent_id']==$tab['diplome']){ ?>
                        <p><?php echo $val['name']; ?>.</p>
                        <?php } ?>
                        <?php } ?>

                        

                      </div>
                    </div>
                    <?php   
                } }  ?>
                
            
                  </div>
                </div>


<?php
$sql="SELECT *,YEAR(date_fin) df,YEAR(date_debut) dd FROM experience WHERE id_candidate='$id_candidate'";
$result=$db->query($sql);
$num = $result->num_rows;

?>



                <div class="col-12">
                  <p class="heading-9">Work Experience</p>
                  <hr>
                  <div class="timeline-classic">
                  <?php if($num>0){
                   while($tab=$result->fetch_array()){
                   ?>
 
                    <div class="timeline-classic-item">
                      <div class="timeline-classic-period"><span><?php echo $tab['dd'];  ?>–<?php echo $tab['df'];  ?></span></div>
                      <div class="timeline-classic-main">
                        <h5 class="timeline-classic-title"><?php echo $tab['type'];  ?> Within <?php echo $tab['entreprise'];  ?>on duty <?php echo $tab['service'];  ?></h5>
                        <p><?php echo $tab['description'];  ?>	.</p>
                      </div>
                    </div>
               <?php   
                } }  ?>
                

               
                  </div>
                </div>




  <?php
$sql="SELECT * FROM langue WHERE id_candidate='$id_candidate'";
$result=$db->query($sql);
$num = $result->num_rows;

?>


                <div class="col-12">
                  <p class="heading-9">Professional skills</p>
                  <hr>
                  <div class="row row-20" style=" margin-top: 25px;">
                  <?php if($num>0){
                   while($tab=$result->fetch_array()){
                   ?>

                    <div class="col-md-6">
                      <article class="progress-linear animated-first">
                       <?php   if($tab['degree']=="Bon") $p=90;else if($tab['degree']=="Moyenne") $p=50;else if($tab['degree']=="Notions") $p=20; ?>
                        <div class="progress-header">
                          <p class="progress-title"><?php  echo $tab['langue']; ?></p><span class="progress-value"><?php echo $p; ?></span>
                        </div>
                        <div class="progress-bar-linear-wrap">
                          <div class="progress-bar-linear" style="<?php echo "width:".$p."%"; ?>;"></div>
                        </div>
                       
                
                      </article>
                    </div>
                    <?php   
                          } }  ?>

                  </div>
                </div>

  <?php
$sql="SELECT * FROM office WHERE id_candidate='$id_candidate'";
$result=$db->query($sql);
$num = $result->num_rows;

?>
                <div class="col-12">
                  <p class="heading-9">Office</p>
                  <hr>
                  <div class="row row-20" style=" margin-top: 25px;">
                  <?php if($num>0){
                   while($tab=$result->fetch_array()){
                   ?>
                  <div class="col-md-6">
                  <h5 class="timeline-classic-title"><?php echo ucwords($tab['office']); ?></h5>
                  </div>
                   <?php }} ?>
                  </div>
                </div>
 
  <?php
$sql="SELECT * FROM permis WHERE id_candidate='$id_candidate'";
$result=$db->query($sql);
$num = $result->num_rows;

?>
                <div class="col-12">
                  <p class="heading-9">Allowed</p>
                  <hr>
                  <div class="row row-20" style=" margin-top: 25px;">
                  <?php if($num>0){
                   while($tab=$result->fetch_array()){
                   ?>
                  <div class="col-md-6">
                  <h5 class="timeline-classic-title"><?php echo $tab['permis']; ?></h5>
                  </div>
                   <?php }} ?>
                  </div>
                </div>
              </div>
            </div>
            <style type="text/css">
            
              .comment-box *+.rd-mailform {
                margin-top: 20px
                 }
              
.form-corporate {
    padding: 30px 20px;
    background: #f3f4f9
}

.form-corporate textarea.form-input {
    height: 125px
}

@media(min-width:768px) {
    .form-corporate {
        padding: 30px
    }
}

@media(min-width:768px) {
    .form-corporate_sm {
        padding: 20px 15px
    }
}

@media(min-width:1200px) {
    .form-corporate {
        padding: 35px 30px 50px
    }
    .form-corporate h4+.form-wrap {
        margin-top: 30px
    }
    .form-corporate_sm {
        padding: 35px 35px 50px
    }
}

            </style>
            <div class="col-lg-4">
              <div class="row row-30 row-lg-50">
                <div class="col-md-6 col-lg-12">
                  <!-- RD Mailform-->
       
  <form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
   <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control"  rows="3"></textarea>
  </div>
  <button type="submit" name="envoyer" class="btn btn-block btn-primary">Submit</button>
</form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
<style type="text/css">
  .row-50>* {
    margin-bottom: 50px;
}
.heading-9 {
    font-size: 13px;
    line-height: 1.2;
    letter-spacing: .1em;
    font-weight: 600;
    text-transform: uppercase;
}
hr+.text-style-1 {
    margin-top: 24px;
}
.text-style-1 {
    letter-spacing: .025em;
    color: #151515;
}
.row-20>* {
    margin-bottom: 20px;
}

element.style {
}

p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}
.progress-linear {
    position: relative;
    text-align: left
}

.progress-linear .progress-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    transform: translate3d(0, -10px, 0);
    margin-bottom: -10px;
    margin-left: -5px;
    margin-right: -5px
}

.progress-linear .progress-header>* {
    margin-top: 10px;
    padding-left: 5px;
    padding-right: 5px
}

.progress-linear .progress-title {
    color: #0d0d0d
}

.progress-linear .progress-bar-linear-wrap {
    height: 3px;
    background: #e0e0e0
}

.progress-linear .progress-bar-linear {
    position: relative;
    width: 0;
    height: inherit;
    background: #1087eb;
    transition: .5s all ease-in-out
}

.progress-linear .progress-bar-linear::after {
    content: '';
    position: absolute;
    display: block;
    right: -8px;
    top: -3px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: inherit
}

.progress-linear .progress-value {
    display: none;
    font-weight: 700;
    color: #0d0d0d
}

.progress-linear .progress-value::after {
    content: "%"
}

*+.progress-bar-linear-wrap {
    margin-top: 5px
}

.progress-linear+.progress-linear {
    margin-top: 15px
}

.progress-bar-color-1 .progress-bar-linear {
    background: #437685
}

.progress-bar-secondary .progress-bar-linear {
    background: #ca5217
}

.progress-bar-tertiary .progress-bar-linear {
    background: #7959b6
}

@media(min-width:992px) {
    .progress-linear+.progress-linear {
        margin-top: 25px
    }
}

.progress-bar-circle {
    display: inline-block;
    position: relative;
    text-align: center;
    line-height: 1.2
}

.progress-bar-circle canvas {
    vertical-align: middle
}

.progress-bar-circle span {
    position: absolute;
    top: 50%;
    left: 51%;
    font-family: ubuntu, -apple-system, BlinkMacSystemFont, segoe ui, Roboto, helvetica neue, Arial, sans-serif;
    font-size: 40px;
    line-height: 1;
    font-weight: 300;
    transform: translate(-50%, -50%);
    color: #151515
}

.progress-bar-circle span::after {
    content: "%"
}

.progress-bar-circle-title {
    font-size: 14px;
    letter-spacing: .05em;
    text-transform: uppercase
}

*+.progress-bar-circle-title {
    margin-top: 14px
}

.timeline-classic p {
    letter-spacing: .025em
}

.timeline-classic-period {
    padding-right: 20px;
    white-space: nowrap;
    letter-spacing: .025em
}

.timeline-classic-title {
    position: relative;
    padding-left: 35px
}

.timeline-classic-title::before {
    content: '';
    position: absolute;
    left: 0;
    top: .65em;
    display: inline-block;
    width: 25px;
    height: 2px;
    vertical-align: middle;
    background: #1087eb
}

.timeline-classic-main {
    position: relative;
    padding: 10px 0 30px 20px
}

.timeline-classic-main::before,
.timeline-classic-main::after {
    content: '';
    position: absolute;
    pointer-events: none
}

.timeline-classic-main::before {
    left: 0;
    top: 0;
    bottom: 0;
    border-left: 1px solid #e0e0e0
}

.timeline-classic-main *+p {
    margin-top: 10px
}

.timeline-classic-item:last-child .timeline-classic-main {
    padding-bottom: 0
}

.timeline-classic-item:last-child .timeline-classic-main::before {
    bottom: 20px
}

*+.timeline-classic {
    margin-top: 30px
}

@media(max-width:767.98px) {
    .timeline-classic-period {
        margin-left: -2px
    }
}

@media(min-width:768px) {
    .timeline-classic {
        display: table
    }
    .timeline-classic-item {
        display: table-row
    }
    .timeline-classic-item>* {
        display: table-cell
    }
    .timeline-classic-main {
        padding-bottom: 20px
    }
    .timeline-classic-main::after {
        top: 18px;
        left: -4px;
        width: 9px;
        height: 9px;
        background: #e0e0e0;
        border-radius: 50%
    }
}


.thumbnail-classic {
    position: relative;
    overflow: hidden;
    display: flex
}

.thumbnail-classic-dummy,
.thumbnail-classic-caption {
    width: 100%;
    flex-shrink: 0
}

.thumbnail-classic-dummy {
    visibility: hidden;
    opacity: 0
}

.thumbnail-classic-dummy::before {
    content: '';
    display: block;
    padding-bottom: 72.01087%
}

.thumbnail-classic-figure {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0
}

.thumbnail-classic-image {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    min-height: 100%;
    min-width: 100%;
    width: auto;
    height: auto;
    max-width: none
}

@supports(object-fit:cover) {
    .thumbnail-classic-image {
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        transform: none;
        object-fit: cover;
        object-position: center center
    }
}

.thumbnail-classic-caption {
    position: relative;
    z-index: 1;
    align-self: flex-end;
    padding: 20px;
    text-align: center;
    background: rgba(16, 135, 235, .53)
}

.thumbnail-classic-title {
    color: #fff
}

@media(max-width:575.98px) {
    .thumbnail-classic {
        max-width: 370px;
        margin-left: auto;
        margin-right: auto
    }
}

html:not(.tablet):not(.mobile) .thumbnail-classic-figure {
    transition: .44s
}

html:not(.tablet):not(.mobile) .thumbnail-classic-caption {
    align-self: stretch;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transition: .22s
}

html:not(.tablet):not(.mobile) .thumbnail-classic:hover .thumbnail-classic-figure {
    transform: scale3d(1.03, 1.03, 1.03)
}

html:not(.tablet):not(.mobile) .thumbnail-classic:hover .thumbnail-classic-caption {
    opacity: 1;
    visibility: visible
}

</style>
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

