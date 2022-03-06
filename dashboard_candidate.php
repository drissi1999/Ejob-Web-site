
<?php 
include 'nav.php';
if(!isset($_SESSION['id_candidate'])) header('location:index.php');
else{
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
 
</head>

<?php 
include'header.php';

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
							<h1>Dashbord</h1>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
            <br>
            <h2 class="text-center">Affiche les etats des demandes</h2>
            <section class="section section-md text-center">
        <div class="container">
          <table class="table table-bordered table-responsive-md"  id="dataTable"  cellspacing="0">
            <thead>
              <tr class="table-primary" >
                <th>Raison sociale</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Date</th>
                <th width="2%">Etat</th>
              </tr>
            </thead>
            <tbody>
<?php 
$sql="SELECT *,o.id_offre_emploi ido,p.etat etatp FROM   postulation p inner join offre_emploi o on p.id_offre_emploi=o.id_offre_emploi
inner join recruteur r on o.id_recruteur=r.id_recruteur
 WHERE p.id_candidate={$_SESSION['id_candidate']}";
$res=$db->query($sql) or die('err');
if($res->num_rows>0){
  while($tab=$res->fetch_array()){
?>


              <tr>
                <td><a href="job_details.php?id_offre=<?php echo $tab['ido']; ?>" ><?php echo $tab['raison_social']; ?></a></td>
                <td><?php echo $tab['email_contact']; ?></td>
                <td><?php echo $tab['telephone']; ?></td>
                <td><?php echo $tab['date_postulation']; ?></td>
                <td width="2%" >  
                <?php
                if($tab['etatp']==0) echo "<font color=\"warning\"> Encours </font>";
                elseif($tab['etatp']==1) echo "<font color=\"primary\">Accepte </font>";
                elseif($tab['etatp']==2) echo "<font color=\"danger\">Refuser </font>";
                ?>
                </td>
              </tr>


<?php }} ?>            
            </tbody>
            <tfoot>
            <tr class="table-primary" >
                <th>Raison sociale</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Date</th>
                <th width="2%">Etat</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </section>



      <style type="text/css">
                        input.largerCheckbox {
                            width: 30px;
                            height: 30px;
                        }
                    </style>












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
         
        
        <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="admin/js/demo/datatables-demo.js"></script>

	</body>


</html>
<?php } ?>