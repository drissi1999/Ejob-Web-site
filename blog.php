<!DOCTYPE html>
<html lang="en">
<head>
 
</head>

<?php 

include 'header.php';
include 'nav.php';
if(isset($_SESSION['id_candidate']))
	if(isset($_POST['post']))
	{
		include"connexion.php";
		$id_can=$_SESSION['id_candidate'];
		$name=$_POST['name'];
		$title=$_POST['title'];
		$cont=$_POST['cont'];
		$path = 'assets/blog/';
   		$file = basename($_FILES['photo']['name']);    
   		 move_uploaded_file($_FILES['photo']['tmp_name'],$path.$file);
    	$img=$file;
		$sql="INSERT INTO `blog`(`id_post`, `auteur`, `title`, `content`,`photo_blog`,`post_date`, `id_candidate`) VALUES ('','$name','$title','$cont','$img',NOW(),'$id_can')";
		$req=$db->query($sql) or die ("error");
		if($req)
		{
			echo '<script type="text/javascript">';
			echo 'setTimeout(function () { swal("WOW!","Your Post has been posted !","success");';
			echo '}, 1000);</script>';
		}
		else
		{
			echo '<script type="text/javascript">';
			echo 'setTimeout(function () { swal("Oh!","Sorry Try Again!","error");';
			echo '}, 1000);</script>';
		}

	}
	
?>
    <body>
    	<style type="text/css">
    		
    	</style>
        <div id="main-wrapper">
	
			<div class="clearfix"></div>
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
							<h1>Our Blog</h1>
					</div>
				</div>
			</div>
            
            
		
            
			<div class="clearfix"></div>
			<section>
				<div class="container">
					<div class="row justify-content-center align-items-center ">
					
						<div class="col-lg-7 col-md-7">
							<div class="contact-form" id="aa">
								<form method="post" enctype="multipart/form-data">
									<div class="form-row" >
										<div class="form-group col-md-6">
										  <label>Full Name</label>
										  <input type="text" class="form-control" placeholder="Name" name="name" required="">
										</div>
										 <div class="form-group col-md-6">
										<label>Title</label>
										<input type="text" class="form-control" placeholder="title" name="title" required="">
											</div>
									</div>
									
									<div class="form-group">
										<label>Content</label>
										<textarea class="form-control" placeholder="Type Here..." name="cont" required=""></textarea>
									</div>
									<div class="group">
              							<label class="button button-md button-primary-outline button-icon button-icon-left">
             				  			 <input type="file" name="photo" ><span class="icon mdi mdi-account-box"></span>Add A PHOTO
             				 		</label>
           					 		</div>
									<button type="submit" class="btn btn-primary" name="post">Post</button>
								</form>
							</div>
						</div>
						
					</div>
				
				</div>
			</section>
			<div class="clearfix"></div>
                             <?php include'footer.php'; ?>

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
		

	</body>


</html>