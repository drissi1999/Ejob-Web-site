<!DOCTYPE html>
<html lang="en">

<?php include'header.php'; 

$str=file_get_contents('jsonfile/region.json');
$json=json_decode($str,true);
?>
    <style type="text/css">
        #btn1:hover {
            color: #fff;
            background-color: #ca5217;
            border-color: #ca5217
        }
        
        #btn1 {
            color: #fff;
            background-color: #1670bf;
            border-color: #1670bf;
        }
    </style>

    <body>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader" style="display: none;">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">Rachidi</p>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">

            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->
            <?php include 'nav.php'  ?>
                <div class="clearfix"></div>
                <!-- ============================================================== -->
                <!-- Top header  -->
                <!-- ============================================================== -->

                <!-- ============================ Hero Banner  Start================================== -->
                <div class="hero-header simple-banner dark-text digital-mark" style="background: #f9fafe url(assets/img/banner-iclips-color.png);">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="hero-content">
                                    <h1 style="font-family: 'Roboto Regular',arial;font-size: 3em;color: black;font-weight :normal;">Start Building Your<br> Own Career Now</h1>
                                    <p class="lead-i">
                                        <form method="post" action="Job_Listing.php">
                                            <div class="form-row">
                                                <div class="form-group col-md-6  has">
                                                    <i class="fa fa-key" aria-hidden="true"></i>
                                                    <input type="text" class="form-control" <?php if(isset($_SESSION[ 'search'])) echo "value=".$_SESSION[ 'search']; ?> name="search" id="inputCity" id="inputCity" placeholder="keywords ">
                                                </div>
                                                <div class="form-group col-md-4  has">
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    <select id="lunchBegins" name="ville" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" title="" placeholder="">
                                                        <option selected value="0">All City </option>
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
                                                <div class="form-group col-md-2">
                                                    <button type="sunmit" name="ok" class="btn btn-primary btn-lg"><span class="fa fa-search form-control-feedback"></span></button>
                                                </div>
                                                <?php 
		$s="SELECT count(id_offre_emploi) nb FROM offre_emploi WHERE etat=1 ";
		$requte=$db->query($s);
		$tabl=$requte->fetch_array();
		?>
                                                    <div class="form-group col-md-8" style="color: black;">We offer<b style="color: blue;"> <?php echo $tabl['nb']; ?> job vacancies</b> right now!</div>
                                            </div>
                                        </form>
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-5 hidden-xs">
                                <div class="hero-content">
                                    <img src="assets/img/info-1.png" class="img-responsive" alt="" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <!-- ============================ Hero Banner End ================================== -->

                <style type="text/css">
                    .list {
                        background-color: #e3e3e3;
                        padding: 30px;
                    }
                    
                    .list:hover {
                        box-shadow: 5px 10px 18px gray;
                    }
                </style>

                <section class="section section-md bg-default text-center">
                    <div class="container">
                        <center>
                            <h1>Popular Categories</h1></center>
                        <br>
                        <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
                            <div class="carousel-inner row w-100 mx-auto" role="listbox">
                                <div class="carousel-item col-md-3 active">
                                    <div class="list">
                                        <i class="fa fa-globe" aria-hidden="true" style="font-size:50px"></i>

                                        <center>
                                            <p><b>Accounting & Finace</b>
                                                <br>2590 option positions</p>
                                        </center>
                                    </div>
                                </div>
                                <div class="carousel-item col-md-3">
                                    <div class="list">
                                        <i class="fa fa-paint-brush" aria-hidden="true" style="font-size:50px"></i>
                                        <center>
                                            <p><b>Accounting & Finace</b>
                                                <br>2590 option positions</p>
                                        </center>
                                    </div>
                                </div>
                                <div class="carousel-item col-md-3">
                                    <div class="list">
                                        <i class="fa fa-medkit" aria-hidden="true" style="font-size:50px"></i>
                                        <center>
                                            <p><b>Accounting & Finace</b>
                                                <br>2590 option positions</p>
                                        </center>
                                    </div>
                                </div>
                                <div class="carousel-item col-md-3">
                                    <div class="list">
                                        <i class="fa fa-medkit" aria-hidden="true" style="font-size:50px"></i>
                                        <center>
                                            <p><b>Accounting & Finace</b>
                                                <br>2590 option positions</p>
                                        </center>
                                    </div>
                                </div>
                                <div class="carousel-item col-md-3">
                                    <div class="list">
                                        <i class="fa fa-globe" aria-hidden="true" style="font-size:50px"></i>
                                        <center>
                                            <p><b>Accounting & Finace</b>
                                                <br>2590 option positions</p>
                                        </center>
                                    </div>
                                </div>
                                <div class="carousel-item col-md-3">
                                    <div class="list">
                                        <i class="fa fa-globe" aria-hidden="true" style="font-size:50px"></i>
                                        <center>
                                            <p><b>Accounting & Finace</b>
                                                <br>2590 option positions</p>
                                        </center>
                                    </div>
                                </div>
                                <div class="carousel-item col-md-3">
                                    <div class="list">
                                        <i class="fa fa-medkit" aria-hidden="true" style="font-size:50px"></i>
                                        <center>
                                            <p><b>Accounting & Finace</b>
                                                <br>2590 option positions</p>
                                        </center>
                                    </div>
                                </div>
                                <div class="carousel-item col-md-3">
                                    <div class="list">
                                        <i class="fa fa-paint-brush" aria-hidden="true" style="font-size:50px"></i>
                                        <center>
                                            <p><b>Accounting & Finace</b>
                                                <br>2590 option positions</p>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                                <i class="fa fa-chevron-left fa-lg text-muted"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
                                <i class="fa fa-chevron-right fa-lg text-muted"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </section>

                <div style="background-color:#E8E8E8;">
                    <div class="container ">
                        <div class="row row-40">
                            <div class="col-12 text-center">
                                <h3 style="font-size: 36px; margin-top:50px;">Recent Jobs</h3>
                            </div>
                            <div class="col-12">
                                <div class="table-job-offers-outer">
                                    <table class="table-job-offers table-responsive">
                                        <tbody>
                                            <?php
                     $sq="SELECT *,day(o.created_at) as date FROM offre_emploi o INNER join recruteur r on o.id_recruteur=r.id_recruteur WHERE o.etat=1  Limit 4";
                        $p=$db->query($sq) or die('err');
                        while($tab=$p->fetch_array()){
                        ?>

                                                <tr>
                                                    <td class="table-job-offers-date"><span><?php  echo date("d")-$tab['date'];?> day ago</span></td>
                                                    <td class="table-job-offers-main">
                                                        <!-- Company Light-->
                                                        <article class="company-light">
                                                            <figure class="company-light-figure"><img class="company-light-image" src="assets/logo/<?php echo $tab['logo']; ?>" width="48" height="44" alt="">
                                                            </figure>
                                                            <div class="company-light-main">
                                                                <h5 class="company-light-title"><a href="job_details.php?id_offre=<?php echo $tab['id_offre_emploi']; ?>"><?php echo $tab['raison_social']; ?></a></h5>
                                                                <p class="text-color-default">
                                                                    <?php echo $tab['email_contact']; ?>
                                                                </p>
                                                            </div>
                                                        </article>
                                                    </td>
                                                    <td class="table-job-offers-meta">
                                                        <div class="object-inline"><span class="icon icon-sm text-primary mdi mdi-cash"></span><span><?php echo $tab['salaire']; ?> \ Month</span></div>
                                                    </td>
                                                    <td class="table-job-offers-meta">
                                                        <div class="object-inline"><span class="icon icon-1 text-primary mdi mdi-map-marker"></span><span>  
                        <?php 
                         foreach ($json ['ville'] as $key=>$value) 
                          if( $tab['id_ville']==$value['id'])
                           echo "{$value['ville']}";
                        ?></span></div>
                                                    </td>
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
                            <div class="col-12 text-center" style="padding-bottom:50px;"><a class="button button-lg button-primary-outline" href="Job_Listing.php">Show More Jobs</a></div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <!-- ============================ Our Testimonial Start ================================== -->
                <section>
                    <div class="container">

                        <div class="row">
                            <div class="col text-center">
                                <div class="sec-heading mx-auto">
                                    <h2>New Candidats</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="owl-carousel" id="testimonials">

                                <?php 
		 $sql="SELECT * FROM formation f inner join candidate c on f.id_candidate=c.id_candidate inner join experience ex on c.id_candidate=ex.id_candidate WHERE etat=0 GROUP BY c.id_candidate limit 6";
		 $re=$db->query($sql);
		 while($tab=$re->fetch_array()){
		 ?>

                                    <!-- Single Testimonials -->
                                    <div class="item">
                                        <div class="testimonial-box">
                                            <i class="fa fa-quote-left"></i>
                                            <p>
                                                <?php echo $tab['email_candidate'];?>
                                            </p>
                                            <p>
                                                <?php echo $tab['adresse_candidate'];?>
                                            </p>
                                            <div class="client-thumb-box">
                                                <div class="client-thumb-content">
                                                    <div class="client-thumb">
                                                        <img src="assets/photo/<?php echo $tab['photo_candidate'];?>" class="img-responsive img-circle" alt="">
                                                    </div>
                                                    <h5 class="mb-0"><?php echo $tab['nom_candidate']." ".$tab['prenom_candidate'];  ?></h5>
                                                    <!--	<span class="small-font">Founder Of Apple</span>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php } ?>

                            </div>

                        </div>

                    </div>

                </section>

                <div class="clearfix"></div>

                <!-- ============================ Latest News Start ================================== -->
                <section class="gray">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <div class="sec-heading mx-auto">
                                    <h2>Latest Posts</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <?php
					$sql="SELECT * FROM  blog WHERE etat=1 order by post_date  desc limit 3";
					$REQUEST=$db->query($sql);
					while($t=$REQUEST->fetch_array()){
					?>
                                <div class="col-lg-4 col-md-4">
                                    <div class="grid-blog-box mb-4" data-aos="fade-up" data-aos-duration="1200" style="box-shadow: 4px 4px 4px  #c0c0c0;">
                                        <a href="blog-detail.php"><img  src="assets/blog/<?php echo $t['photo_blog'] ?>" class="img-responsives" alt="" /></a>
                                        <div class="cnt-gb-box">
                                            <h4 class="cnt-gb-title"><a href="blog-detail.php"><?php echo $t['title'] ?>.</a></h4>
                                            <p>
                                                <?php echo $t['content'] ?>
                                            </p>
                                        </div>
                                        <div class="gb-info-box">
                                            <div class="gb-info-author">
                                                <p><strong>In </strong>
                                                    <?php echo $t['post_date'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

                        </div>
                    </div>
                </section>
                <div class="clearfix"></div>
                <!-- ============================ Latest News End ================================== -->

                <section class="cta" style="font-family:'Roboto Regular',arial; ">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-md-10">
                                <div class="cta-sec text-center">
                                    <h2 style="color: black;">Get Job App For Your Mobile</h2>
                                    <p style="color: black;">Searching for jobs has never been that easy. Now you can find job matched your career expectation,apply for jobs and receive feedback right on your mobile. Start your job search now! </p>
                                    <button style="width: 30%;padding: 3%;" type="button" class="btn btn-primary btn-lg"><img src="assets/img/google-play-download-138x35.png" style="width: 100%;" alt=""> </button>&ensp;&ensp;&ensp;
                                    <button style="width: 30%;padding: 3%;" type="button" class="btn btn-primary btn-lg"><img src="assets/img/appstore.svg" style="width: 100%;" alt=""> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="clearfix"></div>
                <!-- ============================ Our Testimonial End ================================== -->

                <!-- ============================ Footer ================================== -->
                <?php  include'footer.php'; ?>
                    <!-- ============================ Footer ================================== -->

        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
        <!--	 ============================================================== -->
        <!-- This page plugins -->
        <!-- ============================================================== -->
        <script type="text/javascript">
            $('#carouselExample').on('slide.bs.carousel', function(e) {

                var $e = $(e.relatedTarget);
                var idx = $e.index();
                var itemsPerSlide = 4;
                var totalItems = $('.carousel-item').length;

                if (idx >= totalItems - (itemsPerSlide - 1)) {
                    var it = itemsPerSlide - (totalItems - idx);
                    for (var i = 0; i < it; i++) {
                        // append slides to end
                        if (e.direction == "left") {
                            $('.carousel-item').eq(i).appendTo('.carousel-inner');
                        } else {
                            $('.carousel-item').eq(0).appendTo('.carousel-inner');
                        }
                    }
                }
            });
        </script>
        <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5eb4ac0e81d25c0e5849df37/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

    </body>

</html>