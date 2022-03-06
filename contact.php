<!DOCTYPE html>
<html lang="en">
<head>
 
</head>
<?php include'header.php';

	if(isset($_POST['ok']) )
       if(!empty($_POST['nom']) || !empty($_POST['email']) || !empty($_POST['subj']) || !empty($_POST['comnt']))
        {
        	include'connexion.php';
			$nom=mysqli_real_escape_string($db,$_POST['nom']);
			$email=$_POST['email'];
			$subj=mysqli_real_escape_string($db,$_POST['subj']);
			$comnt=mysqli_real_escape_string($db,$_POST['comnt']);
		        $req="INSERT INTO contact set nom='$nom',email='$email',subj='$subj',comnt='$comnt' ";
			$reslt=$db->query($req);
                        
			if($reslt){
                    
				echo '<script type="text/javascript">';
			echo 'setTimeout(function () { swal("WOW!","Your Message has been sent !","success");';
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
        <div id="main-wrapper">
			<?php include 'nav.php'  ?>
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
							<h1>Contact Us</h1>
					</div>
				</div>
			</div>
            
            
	
            
            
			<div class="clearfix"></div>
			<section>
				<div class="container">
					
					<div class="row">
						
						<div class="col-lg-5 col-md-5 bg-primary">
							<div class="contact-address light-text">
								<div class="add-box">
									<div class="add-icon-box">
										<i class="ti-home"></i>
									</div>
									<div class="add-text-box">
										<h4>Virasat Limited</h4>
										CEO: Drissi El houcine & youness Bibaoui<br>
										
									</div>
								</div>
								
								<div class="add-box">
									<div class="add-icon-box">
										<i class="ti-map-alt"></i>
									</div>
									<div class="add-text-box">
										<h4>Head Offices</h4>
										 BTS,<br>
										Ouarzazet , MAROC
									</div>
								</div>
								
								<div class="add-box">
									<div class="add-icon-box">
										<i class="ti-email"></i>
									</div>
									<div class="add-text-box">
										<h4>Emails</h4>
										hcnidrissi16@mail.com<br>
									
									</div>
								</div>
								<div class="add-box">
									<div class="add-icon-box">
										<i class="ti-headphone"></i>
									</div>
									<div class="add-text-box">
										<h4>Calls</h4>
										212+ 641 824 783<br>
										
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-7 col-md-7">
							<div class="contact-form">
								<form method="post">
									<div class="form-row">
										<div class="form-group col-md-6">
										  <label>Name</label>
										  <input type="text" class="form-control" placeholder="Name" name="nom" required="">
										</div>
										<div class="form-group col-md-6">
										  <label>Email</label>
										  <input type="email" class="form-control" placeholder="Email" name="email" required="">
										</div>
									</div>
									<div class="form-group">
										<label>Subject</label>
										<input type="text" class="form-control" placeholder="Subject" name="subj" required="">
									</div>
									<div class="form-group">
										<label>Message</label>
										<textarea class="form-control" placeholder="Type Here..." name="comnt" required=""></textarea>
									</div>
									<button type="submit" class="btn btn-primary" name="ok">Send Request</button>
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