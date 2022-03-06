<?php 
include 'nav.php';
if(!isset($_SESSION['id_company'])) header('location:index.php');
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
 
</head>

<?php 
include 'header.php';
if(isset($_POST['ok'])){
    if(isset($_POST['Action']))
        foreach($_POST['Action'] as $value){
            $sql="UPDATE postulation set etat=1 WHERE id_postulation=$value ";
            $db->query($sql);
        }
}
if(isset($_POST['no'])){
    if(isset($_POST['Action']))
        foreach($_POST['Action'] as $value){
            $sql="UPDATE postulation set etat=2 WHERE id_postulation=$value ";
            $db->query($sql);
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
							<h1>Dashbord</h1>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
            <br>
            <h2 class="text-center">Postulations</h2>
            <section class="section section-md text-center">
        <div class="container">
            <form method="post" >
          <table class="table table-bordered table-responsive-md"  id="dataTable"  cellspacing="0">
            <thead>
              <tr class="table-primary" >
                <th>Nom & prenom</th>
                <th>Post</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Date</th>
                <th width="2%"></th>
              </tr>
            </thead>
            <tbody>
<?php 
$sql="SELECT *,o.id_offre_emploi ido FROM   offre_emploi  o inner join postulation p on o.id_offre_emploi=p.id_offre_emploi
inner join candidate ca on p.id_candidate=ca.id_candidate
 WHERE o.id_recruteur={$_SESSION['id_company']} and p.etat=0";
$res=$db->query($sql) or die('err');
if($res->num_rows>0){
  while($tab=$res->fetch_array()){
?>


              <tr>
                <td><a href="cv.php?id_candidate=<?php echo $tab['id_candidate']; ?>" ><?php echo $tab['nom_candidate']." ".$tab['prenom_candidate']; ?></a></td>
                <td><?php echo $tab['description_poste']; ?></td>
                <td><?php echo $tab['email_candidate']; ?></td>
                <td><?php echo $tab['telephone_candidate']; ?></td>
                <td><?php echo $tab['date_postulation']; ?></td>
                <td width="2%" >  
               <input type="checkbox" name="Action[]" value="<?php echo $tab['id_postulation']; ?>" class="largerCheckbox" />
                </td>
              </tr>


<?php }} ?>            
            </tbody>
            <tfoot>
            <tr class="table-primary" >
                <th>Nom & prenom</th>
                <th>Post</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Date</th>
                <th width="2%"></th>
              </tr>
            </tfoot>
          </table>
          <input type="submit" value="Accepte" class="btn btn-success" name="ok" />
          <input type="submit" value="Refuser" class="btn btn-danger" name="no" />
            </form>
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