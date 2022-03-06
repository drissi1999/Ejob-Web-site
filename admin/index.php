<?php 
if(isset($_SESSION['admin']))
        header('location:home.php');
else header('location:login.php');
?>