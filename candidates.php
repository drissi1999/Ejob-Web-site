<!DOCTYPE html>
<html lang="en">

<?php
include 'connexion.php';
include 'header.php'; 
include 'nav.php';

$sql="";
$page=1;   
if(isset($_GET['page'])) $page=$_GET['page'];
if(isset($_POST['situation'])){
  $_SESSION['situation']=$_POST['situation'];
  $page=1;
}
if(isset($_POST['posted'])){
  $_SESSION['posted']=$_POST['posted'];
  if($_SESSION['posted']==1) $_SESSION['sql']=0;
  if($_SESSION['posted']==24) $_SESSION['sql']=1;
  if($_SESSION['posted']==168) $_SESSION['sql']=24;
  if($_SESSION['posted']==720) $_SESSION['sql']=168;
  $page=1;
}
if(isset($_POST['posted'])){
  $_SESSION['posted']=$_POST['posted'];
  $page=1;
}
if(isset($_POST['ok'])){
  $_SESSION['name']=$_POST['search'];
  $_SESSION['ville']=$_POST['ville'];
  unset($_SESSION['situation']);
  unset($_SESSION['posted']);
}
//// !Search
if(!isset($_SESSION['name'])){
  $sql="SELECT * FROM candidate WHERE etat=0 ";
$result=$db->query($sql) or die('err1');
}
if(!isset($_SESSION['name']) and  isset($_SESSION['posted'])){
  $sql="SELECT * FROM candidate WHERE etat=0 and  (TIMESTAMPDIFF(HOUR,created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']}) ";
  $result=$db->query($sql) or die('err1');
}
if(!isset($_SESSION['name']) and  isset($_SESSION['situation'])){
  $sql="SELECT * FROM candidate WHERE etat=0 and  situation='{$_SESSION['situation']}'";
  $result=$db->query($sql) or die('err1');
}
if(!isset($_SESSION['name']) and  isset($_SESSION['posted']) and  isset($_SESSION['situation'])){
  $sql="SELECT * FROM candidate WHERE etat=0 and  situation='{$_SESSION['situation']}' and  (TIMESTAMPDIFF(HOUR,created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']}) ";
  $result=$db->query($sql) or die('err1');
} 

if(isset($_SESSION['name'])){
  if($_SESSION['ville']!=0)
  $sql="SELECT * FROM candidate WHERE etat=0 and id_ville={$_SESSION['ville']} and (nom_candidate like '{$_SESSION['name']}%' or prenom_candidate like '{$_SESSION['name']}%' or email_candidate like '{$_SESSION['name']}%' or cin like '{$_SESSION['name']}%' or telephone_candidate like '{$_SESSION['name']}%')";
  else $sql="SELECT * FROM candidate WHERE etat=0 and (nom_candidate like '{$_SESSION['name']}%' or prenom_candidate like '{$_SESSION['name']}%' or email_candidate like '{$_SESSION['name']}%' or cin like '{$_SESSION['name']}%' or telephone_candidate like '{$_SESSION['name']}%')";

  $result=$db->query($sql) or die('err1');
}
if(isset($_SESSION['name']) and  isset($_SESSION['posted'])){
  if($_SESSION['ville']!=0)
  $sql="SELECT * FROM candidate WHERE etat=0 and id_ville={$_SESSION['ville']} and   (TIMESTAMPDIFF(HOUR,created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']}) and (nom_candidate like '{$_SESSION['name']}%' or prenom_candidate like '{$_SESSION['name']}%' or email_candidate like '{$_SESSION['name']}%' or cin like '{$_SESSION['name']}%' or telephone_candidate like '{$_SESSION['name']}%') ";
 else $sql="SELECT * FROM candidate WHERE etat=0 and  (TIMESTAMPDIFF(HOUR,created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']}) and (nom_candidate like '{$_SESSION['name']}%' or prenom_candidate like '{$_SESSION['name']}%' or email_candidate like '{$_SESSION['name']}%' or cin like '{$_SESSION['name']}%' or telephone_candidate like '{$_SESSION['name']}%') ";
  $result=$db->query($sql) or die('err1');
}
if(isset($_SESSION['name']) and  isset($_SESSION['situation'])){
  if($_SESSION['ville']!=0)
  $sql="SELECT * FROM candidate WHERE etat=0 and id_ville={$_SESSION['ville']} and   situation='{$_SESSION['situation']}' and (nom_candidate like '{$_SESSION['name']}%' or prenom_candidate like '{$_SESSION['name']}%' or email_candidate like '{$_SESSION['name']}%' or cin like '{$_SESSION['name']}%' or telephone_candidate like '{$_SESSION['name']}%')";
  else $sql="SELECT * FROM candidate WHERE etat=0 and   situation='{$_SESSION['situation']}' and (nom_candidate like '{$_SESSION['name']}%' or prenom_candidate like '{$_SESSION['name']}%' or email_candidate like '{$_SESSION['name']}%' or cin like '{$_SESSION['name']}%' or telephone_candidate like '{$_SESSION['name']}%')";
  $result=$db->query($sql) or die('err1');
}
if(isset($_SESSION['name']) and  isset($_SESSION['posted']) and  isset($_SESSION['situation'])){
  if($_SESSION['ville']!=0)
  $sql="SELECT * FROM candidate WHERE etat=0 and id_ville={$_SESSION['ville']} and   situation='{$_SESSION['situation']}' and  (TIMESTAMPDIFF(HOUR,created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']}) and (nom_candidate like '{$_SESSION['name']}%' or prenom_candidate like '{$_SESSION['name']}%' or email_candidate like '{$_SESSION['name']}%' or cin like '{$_SESSION['name']}%' or telephone_candidate like '{$_SESSION['name']}%')";
else   $sql="SELECT * FROM candidate WHERE etat=0 and  situation='{$_SESSION['situation']}' and  (TIMESTAMPDIFF(HOUR,created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']}) and (nom_candidate like '{$_SESSION['name']}%' or prenom_candidate like '{$_SESSION['name']}%' or email_candidate like '{$_SESSION['name']}%' or cin like '{$_SESSION['name']}%' or telephone_candidate like '{$_SESSION['name']}%')";
  $result=$db->query($sql) or die('err1');
} 

?>

    <body>

        <div id="main-wrapper">

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
                        <h1>Candidate Listing</h1>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- ============================ Hero Banner End ================================== -->

            <form method="post" action="candidates.php?page=1">
                <section class="section section-md">
                    <div class="container">

                        <div class="form-row">
                            <div class="form-group col-md-6  has">
                                <i class="fa fa-key" aria-hidden="true"></i>
                                <input type="text" class="form-control" <?php if(isset($_SESSION[ 'name'])) echo "value=".$_SESSION[ 'name']; ?> id="inputCity" required name="search" placeholder="By Name ">
                            </div>
                            <div class="form-group col-md-4  has">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <select id="lunchBegins" class="selectpicker form-control " data-live-search="true" data-live-search-style="begins" name="ville">
                                    <option value="all">All Regions ...</option>
                                    <?php

      foreach ($json ['ville'] as $key=>$value) {
        if(isset($_SESSION['ville']) and $_SESSION['ville']==$value['id'])
         echo "<option selected value=\"{$value['id']}\">{$value['ville']}</option>";
         else 
      	 	echo "<option value=\"{$value['id']}\">{$value['ville']}</option>";
    	 	}
    	 	?>
                                </select>

                            </div>

                            <div class="form-wrap form-wrap-button col-md-2">
                                <button class="button button button-primary" name="ok" type="submit">Search</button>
                            </div>
                        </div>

                        <br>

                        <div class="row row-50 flex-lg-row-reverse">
                            <div class="col-lg-4 col-xl-3">
                                <div class="row row-30">
                                    <div class="col-sm-6 col-lg-12">
                                        <p class="heading-8">Date posted</p>
                                        <hr>
                                        <ul class="no-ul-list">
                                            <li>
                                                <?php if(isset($_SESSION['posted']) and $_SESSION['posted']=="1"){ ?>
                                                    <input id="checkbox-1" class="checkbox-custom" value="1" onclick="this.form.submit()" checked name="posted" type="radio">
                                                    <?php }else{  ?>
                                                        <input id="checkbox-1" class="checkbox-custom" value="1" onclick="this.form.submit()" name="posted" type="radio">
                                                        <?php } ?>
                                                            <label for="checkbox-1" class="checkbox-custom-label">Last Hour</label>
                                            </li>
                                            <li>
                                                <?php if(isset($_SESSION['posted']) and $_SESSION['posted']=="24"){ ?>
                                                    <input id="checkbox-2" class="checkbox-custom" value="24" onclick="this.form.submit()" checked name="posted" type="radio">
                                                    <?php }else{  ?>
                                                        <input id="checkbox-2" class="checkbox-custom" value="24" onclick="this.form.submit()" name="posted" type="radio">
                                                        <?php } ?>
                                                            <label for="checkbox-2" class="checkbox-custom-label">Last 24 hours</label>
                                            </li>
                                            <li>
                                                <?php if(isset($_SESSION['posted']) and $_SESSION['posted']=="168"){ ?>
                                                    <input id="checkbox-168" class="checkbox-custom" value="168" onclick="this.form.submit()" checked name="posted" type="radio">
                                                    <?php }else{  ?>
                                                        <input id="checkbox-168" class="checkbox-custom" value="168" onclick="this.form.submit()" name="posted" type="radio">
                                                        <?php } ?>
                                                            <label for="checkbox-168" class="checkbox-custom-label">Last 7 days</label>
                                            </li>
                                            <li>
                                                <?php if(isset($_SESSION['posted']) and $_SESSION['posted']=="720"){ ?>
                                                    <input id="checkbox-720" class="checkbox-custom" value="720" onclick="this.form.submit()" checked name="posted" type="radio">
                                                    <?php }else{  ?>
                                                        <input id="checkbox-720" class="checkbox-custom" value="720" onclick="this.form.submit()" name="posted" type="radio">
                                                        <?php } ?>
                                                            <label for="checkbox-720" class="checkbox-custom-label">Last 30 days</label>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-sm-6 col-lg-12">
                                        <p class="heading-8">Situation Familiale</p>
                                        <hr>
                                        <ul class="no-ul-list">
                                            <li>
                                                <?php if(isset($_SESSION['situation']) and $_SESSION['situation']=="Celibataire"){ ?>
                                                    <input id="checkbox-6" class="checkbox-custom" value="Celibataire" onclick="this.form.submit()" checked name="situation" type="radio">
                                                    <?php }else{  ?>
                                                        <input id="checkbox-6" class="checkbox-custom" value="Celibataire" onclick="this.form.submit()" name="situation" type="radio">
                                                        <?php } ?>
                                                            <label for="checkbox-6" class="checkbox-custom-label">Celibataire</label>
                                            </li>
                                            <li>
                                                <?php if(isset($_SESSION['situation']) and $_SESSION['situation']=="Marie(e)"){ ?>
                                                    <input id="checkbox-7" class="checkbox-custom" value="Marie(e)" onclick="this.form.submit()" checked name="situation" type="radio">
                                                    <?php }else{  ?>
                                                        <input id="checkbox-7" class="checkbox-custom" value="Marie(e)" onclick="this.form.submit()" name="situation" type="radio">
                                                        <?php } ?>
                                                            <label for="checkbox-7" class="checkbox-custom-label">Marie(e)</label>
                                            </li>
                                            <li>
                                                <?php if(isset($_SESSION['situation']) and $_SESSION['situation']=="Divorce(e)"){ ?>
                                                    <input id="checkbox-9" class="checkbox-custom" value="Divorce(e)" onclick="this.form.submit()" checked name="situation" type="radio">
                                                    <?php }else{  ?>
                                                        <input id="checkbox-9" class="checkbox-custom" value="Divorce(e)" onclick="this.form.submit()" name="situation" type="radio">
                                                        <?php } ?>
                                                            <label for="checkbox-9" class="checkbox-custom-label">Divorce(e)</label>
                                            </li>

                                            <li>
                                                <?php if(isset($_SESSION['situation']) and $_SESSION['situation']=="Veuf(e)"){ ?>
                                                    <input id="checkbox-8" class="checkbox-custom" value="Veuf(e)" onclick="this.form.submit()" checked name="situation" type="radio">
                                                    <?php }else{  ?>
                                                        <input id="checkbox-8" class="checkbox-custom" value="Veuf(e)" onclick="this.form.submit()" name="situation" type="radio">
                                                        <?php } 
                     $str=file_get_contents('diplome.json');
                    $json=json_decode($str,true); ?>
                                                            <label for="checkbox-8" class="checkbox-custom-label">Veuf(e)</label>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
            </form>

            <style>
                .profile-minimal {
                    padding: 16px;
                    border: 1px solid #e0e0e0;
                }
                
                .profile-minimal-inner {
                    margin-bottom: -16px;
                    margin-left: -16px;
                }
                
                .profile-minimal-inner:empty {
                    margin-bottom: 0;
                    margin-left: 0;
                }
                
                .profile-minimal-inner > * {
                    display: inline-block;
                    margin-top: 0;
                    margin-bottom: 16px;
                    margin-left: 16px;
                }
                
                .profile-minimal-main-outer {
                    flex-grow: 1;
                }
                
                .profile-minimal-main {
                    display: flex;
                    flex-wrap: wrap;
                    align-items: center;
                    margin-bottom: -16px;
                    margin-left: -16px;
                }
                
                .profile-minimal-main:empty {
                    margin-bottom: 0;
                    margin-left: 0;
                }
                
                .profile-minimal-main > * {
                    display: inline-block;
                    margin-top: 0;
                    margin-bottom: 16px;
                    margin-left: 16px;
                }
                
                .profile-minimal-main p {
                    letter-spacing: .025em;
                }
                
                .profile-minimal-image {
                    max-width: 70px;
                    flex-shrink: 0;
                }
                
                .profile-minimal-main-info > * + * {
                    margin-top: 4px;
                }
                
                .profile-minimal-position {
                    color: #1087eb;
                }
                
                p.profile-minimal-position {
                    letter-spacing: .05em;
                }
                
                .profile-minimal-meta {
                    min-width: 30%;
                    letter-spacing: .05em;
                    white-space: nowrap;
                }
                
                .profile-minimal-meta > * {
                    display: inline-block;
                    vertical-align: top;
                    white-space: normal;
                }
                
                .profile-minimal-meta > * + * {
                    margin-left: 4px;
                }
                
                .profile-minimal-meta .icon {
                    position: relative;
                    top: 2px;
                    font-size: 16px;
                    color: #1087eb;
                }
                
                .profile-minimal + .profile-minimal {
                    border-top: 0;
                    margin-top: 0;
                }
                
                * + .profile-minimal-position {
                    margin-top: 0;
                }
                
                @media (min-width: 576px) {
                    .profile-minimal-meta {
                        max-width: 200px;
                    }
                }
                
                @media (min-width: 576px) {
                    .profile-minimal-inner {
                        display: flex;
                        flex-wrap: wrap;
                        align-items: center;
                        justify-content: space-between;
                    }
                }
                
                @media (min-width: 768px) {
                    .profile-minimal-image {
                        min-width: 101px;
                    }
                }
            </style>

            <div class="col-lg-8 col-xl-9">
                <!-- Profile Minimal-->
                <?php 

         if($sql!=""){
                  $total=$result->num_rows;
                  $nbelement=4;
                  $total_pages=ceil($total/$nbelement);
                  $debut=($page-1)*$nbelement;
                  $sql.="LIMIT $debut,$nbelement";
                  $result=$db->query($sql) or die('err2');

                 while( $tab=$result->fetch_array()){
               ?>
                    <article class="profile-minimal">
                        <div class="profile-minimal-inner">
                            <div class="profile-minimal-main-outer">
                                <div class="profile-minimal-main">
                                    <?php if($tab['photo_candidate']==NULL){ ?>
                                        <img class="profile-minimal-image" src="assets/img/user-default.jpg" alt="">
                                        <?php }else{ ?>
                                            <img class="profile-minimal-image" src="assets/photo/<?php echo $tab['photo_candidate']; ?>" alt="">
                                            <?php } ?>
                                                <div class="profile-minimal-main-info">
                                                    <h5 class="profile-minimal-name"><a href="cv.php?id_candidate=<?php echo $tab['id_candidate'] ?>"><?php echo $tab['nom_candidate']." ".$tab['prenom_candidate']; ?></a></h5>
                                                    <p>
                                                        <?php echo $tab['email_candidate'];  ?>
                                                    </p>
                                                    <p>
                                                        <?php echo $tab['telephone_candidate'];  ?>
                                                    </p>

                                                </div>
                                </div>
                            </div>
                            <div class="profile-minimal-meta"> <span class="icon mdi mdi-map-marker"></span><span><?php  echo $tab['adresse_candidate']; ?></span></div>
                        </div>
                    </article>
                    <?php 
                      }}
               ?>
                                       <?php if(isset($total_pages) and $total_pages>1) { ?>
                                    <nav class="pagination-outer text-center" aria-label="Page navigation">
                                        <div class="bs-example">
                                            <ul class="pagination">
                                            <?php
                                              $p=$page-1;
                                              if($p==0) $p=1;
                                                        ?>
                                                <li><a href="candidates.php?page=<?php echo $p; ?>"><i class="ti-arrow-left"></i></a></li>
                                                <?php

                                     for ($i=1; $i<=$total_pages; $i++)  
                                    if($i==$page)
                                    echo $pagLink= "<li><a  style=\"background-color:#0f7dff;color:white;\" href='candidates.php?page=".$i."'>".$i."</a></li>";  
                                    else
                                    echo $pagLink= "<li><a  href='candidates.php?page=".$i."'>".$i."</a></li>";  

                                    $t=$page+1;
                                    if($t==$total_pages+1) $t=$total_pages;
                                       ?>
                                                    <li><a href="candidates.php?page=<?php echo $t; ?>"><i class="ti-arrow-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </nav>
                                    <?php } ?>
            </div>
            </div>
            </div>
            </section>

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

        <script type="text/javascript">
            $(document).ready(function() {
                $('.pagination').pagination({
                    items: <?php echo $total_records;?>,
                    itemsOnPage: <?php echo $limit;?>,
                    cssStyle: 'light-theme',
                    currentPage: <?php echo $page;?>,
                    hrefTextPrefix: 'index.php?page='
                });
            });
        </script>
    </body>

  

</html>