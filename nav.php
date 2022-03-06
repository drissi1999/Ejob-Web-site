<?php 
session_start();
$str=file_get_contents('jsonfile/ville.json');
$json=json_decode($str,true);
$url=explode("/",$_SERVER['PHP_SELF'])[2];
if(isset($_GET['id'])){
	array_splice($_SESSION['formation'],$_GET['id'],1);
	header('location:candidate.php');
}
if(isset($_GET['id_ex'])){
	array_splice($_SESSION['experience'],$_GET['id_ex'],1);
	header('location:candidate.php');
}
if(isset($_GET['id_l'])){
	array_splice($_SESSION['langue'],$_GET['id_l'],1);
	header('location:candidate.php');
}
include 'connexion.php';
 
//session_unset();
            $flag=true;
						if(isset($_POST['login'])){
				    	$email=$_POST['email'];
							$password=$_POST['password'];
							$sql="SELECT * FROM candidate WHERE email_candidate='$email' and 	password='$password' and etat=0 ";
							$result=$db->query($sql) or die("er1");
							$row = $result->num_rows;
              if($row>0){
								$tab=$result->fetch_array(MYSQLI_ASSOC);
								$_SESSION['id_candidate']=$tab['id_candidate'];
								$_SESSION['flage']=$tab['nom_candidate'];
								$flag=false;
							}
							else
							{
								$sql="SELECT * FROM candidate WHERE email_candidate='$email' and 	password='$password' and etat=1 ";
								$result=$db->query($sql) or die("er1");
								$row = $result->num_rows;
								if($row>0){
									echo '<script type="text/javascript">';
									echo 'setTimeout(function () { swal("Votre Compt est bloqué contacter admin","","error");';
									echo '}, 1000);</script>';
							  	$flag=false;
									}
							}
							
							if(!isset($_SESSION['id_candidate']) or !isset($_COOKIE['id_candidate'])){
								$sql="SELECT * FROM recruteur WHERE email_contact='$email' and 	password='$password' and etat=0 ";
								$result=$db->query($sql) or die("er2");
								$row = $result->num_rows;
								if($row==1){
									$tab=$result->fetch_array(MYSQLI_ASSOC);
									$_SESSION['id_company']=$tab['id_recruteur'];
									$_SESSION['flage']=$tab['nom_recruteur'];
									$flag=false;
								}else
								{
									$sql="SELECT * FROM recruteur WHERE email_contact='$email' and 	password='$password' and etat=1 ";
									$result=$db->query($sql) or die("er2");
									$row = $result->num_rows;
									if($row>0){
										echo '<script type="text/javascript">';
										echo 'setTimeout(function () { swal("Votre Compt est bloqué contacter admin","","error");';
										echo '}, 1000);</script>';
										$flag=false;
									}
								}
							}
							if($flag==true){
								echo '<script type="text/javascript">';
								echo 'setTimeout(function () { swal("error login or Password!","","error");';
								echo '}, 1000);</script>';
								$flag=false;
							  }
						}
						
						if(isset($_GET['unset'])){
					   	session_unset();
							header('location:'.$url);
						}
		
?>

<div class="topbar m-top-light-shadow" id="top">
                <div class="header">
                    <div class="container po-relative">
                        <nav class="navbar navbar-expand-lg header-nav-bar">
                            <a href="index.php" class="navbar-brand"><img src="assets/img/logo.png" alt="Khdemti"></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation"><span class="ti-align-right"></span></button>
                            <div class="collapse navbar-collapse hover-dropdown font-14 ml-auto" id="navigation">
                                <ul class="navbar-nav ml-auto">
                                   
									 <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">FOR CANDIDATS<i class="fa fa-angle-down m-l-5"></i></a>
                    <ul class="b-none dropdown-menu font-14 animated fadeInUp">
                                                                 <li><a class="dropdown-item" href="candidate.php">Submit Resume</a></li>
							
									<?php
								if(isset($_SESSION['id_candidate'])){ 
								?>	<li><a class="dropdown-item" href="cv.php">Resume page</a></li>
									<li><a class="dropdown-item" href="dashboard_candidate.php">Dashboard</a></li>
								<?php } ?>
								
                    </ul>
                  </li>
									<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">FOR EMPLOYES<i class="fa fa-angle-down m-l-5"></i></a>
										<ul class="b-none dropdown-menu font-14 animated fadeInUp">
											<li><a class="dropdown-item" href="Job_Listing.php">Job list</a></li>
											<li><a class="dropdown-item" href="candidates.php">Candidate list</a></li>
											<li><a class="dropdown-item" href="post_job.php">Post job</a></li>
											
											<?php
								if(isset($_SESSION['id_company'])){ ?>	
									<li><a class="dropdown-item" href="dashboard_campany.php">Dashboard </a></li>
								<?php } ?>
										
								
										</ul>
								
									<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="about.php" >ABOUT US</a>
                  </li>
                  <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="contact.php" >CONTACT US</a>
                  </li>
									</li>
									
									<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="blog.php">BLOG</a>
									</li>

									
							
								<?php
								if(!isset($_SESSION['flage'])){ 
								?>
								  </ul>
								<div class="act-buttons">
                <a id="btn1"  class="button button-xs button-primary font-14" href="javascript:void(0)"  data-toggle="modal" data-target="#getstarted"><i class="fa fa-lock" aria-hidden="true"></i> Login</a>
								</div>
								<?php }else{ ?>
									<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo strtoupper($_SESSION['flage']);?><i class="fa fa-angle-down m-l-5"></i></a>
										<ul class="b-none dropdown-menu font-14 animated fadeInUp">
											<li><a class="dropdown-item" href="profile.php">Profile</a></li>
											<li><a class="dropdown-item" href="logout.php">Déconxion</a></li>
										</ul>
									</li>
	                </ul>
								<?php } ?>
							
							</div>
						</nav>
					</div>
				</div>
			</div>
