<!DOCTYPE html>
<html lang="en">

<?php 
include'header.php'; 
include'nav.php';
$sql="";
$page=1;   
if(isset($_GET['page'])) $page=$_GET['page'];

if(isset($_POST['Vacancy'])){
  $_SESSION['Vacancy']=$_POST['Vacancy'];
  $page=1;
}
if(isset($_POST['specialite'])){
  $_SESSION['specialite']=$_POST['specialite'];
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
if(isset($_POST['Salary'])){
  $_SESSION['Salary']=$_POST['Salary'];
  if($_SESSION['Salary']==1000) $_SESSION['sql_Salary']=0;
  if($_SESSION['Salary']==5000) $_SESSION['sql_Salary']=1000;
  if($_SESSION['Salary']==50000) $_SESSION['sql_Salary']=50000;
  $page=1;
}
if(isset($_POST['ok'])){
  $_SESSION['search']=$_POST['search'];
  $_SESSION['ville']=$_POST['ville'];
  unset($_SESSION['posted']);
  unset($_SESSION['Vacancy']);
  unset($_SESSION['Salary']);
  unset($_SESSION['sql_Salary']);
  unset($_SESSION['sql']);
  unset($_SESSION['specialite']);
}
//unset($_SESSION['search']);
//session_destroy();
//// !Search
if(!isset($_SESSION['search'])){
    $sql="SELECT *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur WHERE o.etat=1";
  $result=$db->query($sql) or die('err1');
}
//// !Search and posted
if(!isset($_SESSION['search']) and isset($_SESSION['posted'])){
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur
   WHERE o.etat=1 and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']}) ";
$result=$db->query($sql) or die('err2');
}
//// !Search and Vacancy
if(!isset($_SESSION['search']) and isset($_SESSION['Vacancy'])){
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and  Vacancy='{$_SESSION['Vacancy']}'";
  $result=$db->query($sql) or die('err3');
}
//// !Search and Vacancy and posted
if(!isset($_SESSION['search']) and isset($_SESSION['Vacancy']) and  isset($_SESSION['posted'])){
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and  Vacancy='{$_SESSION['Vacancy']}' and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']} )";
  $result=$db->query($sql) or die('err4');
}
//// !Search and Salary
if(!isset($_SESSION['search']) and isset($_SESSION['Salary'])){
  if($_SESSION['Salary']==60000)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and salaire >={$_SESSION['Salary']} ";
   else
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']} )";
$result=$db->query($sql) or die('err5');
}
//// !Search and Salary and posted
if(!isset($_SESSION['search']) and isset($_SESSION['Salary']) and isset($_SESSION['posted']) ){
  if($_SESSION['Salary']==60000)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and salaire >={$_SESSION['Salary']} and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']}) ";
   else
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']})  and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']})";
$result=$db->query($sql) or die('err6');
}
//// !Search and Salary and Vacancy
if(!isset($_SESSION['search']) and isset($_SESSION['Salary']) and isset($_SESSION['Vacancy'])){
  if($_SESSION['Salary']==60000)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and salaire >={$_SESSION['Salary']}  and Vacancy='{$_SESSION['Vacancy']}'";
   else
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE  o.etat=1 and Vacancy='{$_SESSION['Vacancy']}' and (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']}) ";
$result=$db->query($sql) or die('err7');
}
//// !Search and Salary and Vacancy and posted
if(!isset($_SESSION['search']) and isset($_SESSION['Salary']) and isset($_SESSION['Vacancy']) and isset($_SESSION['posted'])){
  if($_SESSION['Salary']==60000)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur
   WHERE o.etat=1 and salaire >={$_SESSION['Salary']}  and Vacancy='{$_SESSION['Vacancy']}' and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']})";
   else
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and  (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']}) and Vacancy='{$_SESSION['Vacancy']}' and (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']}) ";
$result=$db->query($sql) or die('err8');
}
//// !Search and specialite
if(!isset($_SESSION['search']) and isset($_SESSION['specialite'])){
$sql="SELECT *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
WHERE o.etat=1 and id_specialite={$_SESSION['specialite']}";
$result=$db->query($sql) or die('err9');
}
//// !Search and specialite and posted
if(!isset($_SESSION['search']) and isset($_SESSION['specialite']) and isset($_SESSION['posted'])){
  $sql="SELECT *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur
   WHERE  o.etat=1 and id_specialite={$_SESSION['specialite']} and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']}) ";
  $result=$db->query($sql) or die('err10');
  }
  //// !Search and specialite  and Vacancy
if(!isset($_SESSION['search']) and isset($_SESSION['specialite']) and isset($_SESSION['Vacancy'])){
  $sql="SELECT *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE  o.etat=1 and id_specialite={$_SESSION['specialite']}  and  Vacancy='{$_SESSION['Vacancy']}' ";
  $result=$db->query($sql) or die('err11');
  }
 //// !Search and specialite and posted and Vacancy
if(!isset($_SESSION['search']) and isset($_SESSION['specialite']) and isset($_SESSION['posted']) and isset($_SESSION['Vacancy'])){
  $sql="SELECT *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and id_specialite={$_SESSION['specialite']} and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']}) and  Vacancy='{$_SESSION['Vacancy']}'";
  $result=$db->query($sql) or die('err12');
  }
//// !Search and Salary and specialite
if(!isset($_SESSION['search']) and isset($_SESSION['Salary']) and isset($_SESSION['specialite'])){
  if($_SESSION['Salary']==60000)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE  o.etat=1 and id_specialite={$_SESSION['specialite']}  and  salaire >={$_SESSION['Salary']} ";
   else
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and id_specialite={$_SESSION['specialite']}  and (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']}) ";
$result=$db->query($sql) or die('err13');
} 
//// !Search and Salary and specialite and posted
if(!isset($_SESSION['search']) and isset($_SESSION['posted']) and isset($_SESSION['Salary']) and isset($_SESSION['specialite'])){
  if($_SESSION['Salary']==60000)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and id_specialite={$_SESSION['specialite']}  and  salaire >={$_SESSION['Salary']} and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']})";
   else
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and id_specialite={$_SESSION['specialite']}  and (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']}) and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']})";
$result=$db->query($sql) or die('err14');
}   
//// !Search and Salary and specialite and Vacancy
if(!isset($_SESSION['search']) and isset($_SESSION['Vacancy']) and isset($_SESSION['Salary']) and isset($_SESSION['specialite'])){
  if($_SESSION['Salary']==60000)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and id_specialite={$_SESSION['specialite']}  and  salaire >={$_SESSION['Salary']} and   Vacancy='{$_SESSION['Vacancy']}'";
   else
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and id_specialite={$_SESSION['specialite']}  and (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']})  and  Vacancy='{$_SESSION['Vacancy']}'";
$result=$db->query($sql) or die('err15');
} 
//// !Search and Salary and specialite and Vacancy and posted
if(!isset($_SESSION['search']) and isset($_SESSION['Vacancy']) and isset($_SESSION['posted']) and isset($_SESSION['Salary']) and isset($_SESSION['specialite'])){
  if($_SESSION['Salary']==60000)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE  o.etat=1 and id_specialite={$_SESSION['specialite']}  and  salaire >={$_SESSION['Salary']} and   Vacancy='{$_SESSION['Vacancy']}' and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']})";
   else
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and id_specialite={$_SESSION['specialite']}  and (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']})  and  Vacancy='{$_SESSION['Vacancy']}' and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']})";
$result=$db->query($sql) or die('err16');
} 

/// isset session search
if(isset($_SESSION['search'])){
  if($_SESSION['ville']!=0)
  $sql="SELECT *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur
   WHERE o.etat=1 and  o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
   or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%')";
   else 
   $sql="SELECT *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur
   WHERE o.etat=1 and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
   or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%')";
  $result=$db->query($sql) or die('err17');
}
//// !Search and posted
if(isset($_SESSION['search']) and isset($_SESSION['posted'])){
  if($_SESSION['ville']!=0)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur
   WHERE o.etat=1 and o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
   or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') 
   and (TIMESTAMPDIFF(HOUR,o.created_at,now() between {$_SESSION['sql']}) and {$_SESSION['posted']})  ";
   else
   $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur
   WHERE o.etat=1 and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
   or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') 
   and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']})  ";
$result=$db->query($sql) or die('err18');
}
//// !Search and Vacancy
if(isset($_SESSION['search']) and isset($_SESSION['Vacancy'])){
  if($_SESSION['ville']!=0)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' 
  or nom_recruteur like '{$_SESSION['search']}%' or raison_social like '{$_SESSION['search']}%' 
  or secteur_recruteur like '{$_SESSION['search']}%')
   and Vacancy='{$_SESSION['Vacancy']}'";
   else  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
   WHERE o.etat=1 and (contrat like '{$_SESSION['search']}%' 
   or nom_recruteur like '{$_SESSION['search']}%' or raison_social like '{$_SESSION['search']}%' 
   or secteur_recruteur like '{$_SESSION['search']}%')
    and Vacancy='{$_SESSION['Vacancy']}'";

  $result=$db->query($sql) or die('err19');
}
//// !Search and Vacancy and posted
if(isset($_SESSION['search']) and isset($_SESSION['Vacancy']) and  isset($_SESSION['posted'])){
  if($_SESSION['ville']!=0)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and  o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
  or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
  Vacancy='{$_SESSION['Vacancy']}' and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} 
  and {$_SESSION['posted']}) ";
  else $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and  (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
  or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
  Vacancy='{$_SESSION['Vacancy']}' and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} 
  and {$_SESSION['posted']}) ";
  $result=$db->query($sql) or die('err20');
}
//// !Search and Salary
if(isset($_SESSION['search']) and isset($_SESSION['Salary'])){
  if($_SESSION['Salary']==60000){
    if($_SESSION['ville']!=0)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE  o.etat=1 and o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
  or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and salaire >={$_SESSION['Salary']} ";
  else
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
  or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and salaire >={$_SESSION['Salary']} ";
   }else{
    if($_SESSION['ville']!=0)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
  or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%' )
  and (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']}) ";
  else $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
  or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%' )
  and (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']}) ";

}
$result=$db->query($sql) or die('err21');
}
//// !Search and Salary and posted
if(isset($_SESSION['search']) and isset($_SESSION['Salary']) and isset($_SESSION['posted']) ){
  if($_SESSION['Salary']==60000){
    if($_SESSION['ville']!=0)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
  or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
   salaire >={$_SESSION['Salary']} and 
  (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']}) ";
  else  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and  (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
  or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
   salaire >={$_SESSION['Salary']} and 
  (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']}) ";

  }else{
    if($_SESSION['ville']!=0)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%'
   or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
  (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']} ) 
  and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']})";
  else $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and  (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%'
   or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
  (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']} ) 
  and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']})";
}
$result=$db->query($sql) or die('err22');
}
//// !Search and Salary and Vacancy
if(isset($_SESSION['search']) and isset($_SESSION['Salary']) and isset($_SESSION['Vacancy'])){
  if($_SESSION['Salary']==60000){
    if($_SESSION['ville']!=0)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
  or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') 
  and salaire >={$_SESSION['Salary']}  and Vacancy='{$_SESSION['Vacancy']}'";
  else  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and  (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
  or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') 
  and salaire >={$_SESSION['Salary']}  and Vacancy='{$_SESSION['Vacancy']}'";
  }else{
    if($_SESSION['ville']!=0)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
  or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
  Vacancy='{$_SESSION['Vacancy']}' and (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']}) ";
  else $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and  (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
  or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
  Vacancy='{$_SESSION['Vacancy']}' and (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']}) ";
  }
$result=$db->query($sql) or die('err23');
}
//// !Search and Salary and Vacancy and posted
if(isset($_SESSION['search']) and isset($_SESSION['Salary']) and isset($_SESSION['Vacancy']) and isset($_SESSION['posted'])){
  if($_SESSION['Salary']==60000){
    if($_SESSION['ville']!=0)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur
   WHERE o.etat=1 and o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
   or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%' )
   and salaire >={$_SESSION['Salary']}  and Vacancy='{$_SESSION['Vacancy']}' 
   and  (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']})";
   else  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur
   WHERE o.etat=1 and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
   or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%' )
   and salaire >={$_SESSION['Salary']}  and Vacancy='{$_SESSION['Vacancy']}' 
   and  (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']})";
  }else{
    if($_SESSION['ville']!=0)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and  o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
  or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
  (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']} )
  and Vacancy='{$_SESSION['Vacancy']}' and (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']}) ";
  else  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and  (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
  or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
  (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']} )
  and Vacancy='{$_SESSION['Vacancy']}' and (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']}) ";

}
$result=$db->query($sql) or die('err24');
}
//// !Search and specialite
if(isset($_SESSION['search']) and isset($_SESSION['specialite'])){
  if($_SESSION['ville']!=0)
 $sql="SELECT *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
WHERE o.etat=1 and o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and id_specialite={$_SESSION['specialite']}";
else $sql="SELECT *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
WHERE o.etat=1 and  (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and id_specialite={$_SESSION['specialite']}";
$result=$db->query($sql) or die('err25');
}
//// !Search and specialite and posted
if(isset($_SESSION['search']) and isset($_SESSION['specialite']) and isset($_SESSION['posted'])){
  if($_SESSION['ville']!=0)
  $sql="SELECT *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur
   WHERE o.etat=1 and o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
   or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
   id_specialite={$_SESSION['specialite']} and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']}) ";
   else $sql="SELECT *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur
   WHERE o.etat=1 and  (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
   or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
   id_specialite={$_SESSION['specialite']} and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']}) ";
  $result=$db->query($sql) or die('err26');
  }
  //// !Search and specialite  and Vacancy
if(isset($_SESSION['search']) and isset($_SESSION['specialite']) and isset($_SESSION['Vacancy'])){
  if($_SESSION['ville']!=0)
  $sql="SELECT *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE  o.etat=1 and o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%'
   or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and id_specialite={$_SESSION['specialite']}  and  Vacancy='{$_SESSION['Vacancy']}' ";
   else  $sql="SELECT *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
   WHERE o.etat=1 and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%'
    or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and id_specialite={$_SESSION['specialite']}  and  Vacancy='{$_SESSION['Vacancy']}' ";
  $result=$db->query($sql) or die('err27');
  }
 //// !Search and specialite and posted and Vacancy
if(isset($_SESSION['search']) and isset($_SESSION['specialite']) and isset($_SESSION['posted']) and isset($_SESSION['Vacancy'])){
  if($_SESSION['ville']!=0)
  $sql="SELECT *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and o.id_ville={$_SESSION['ville']} and contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
  or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%' and
  id_specialite={$_SESSION['specialite']} and TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']} 
  and  Vacancy='{$_SESSION['Vacancy']}'";
  else   $sql="SELECT *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and  contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
  or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%' and
  id_specialite={$_SESSION['specialite']} and TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']} 
  and  Vacancy='{$_SESSION['Vacancy']}'";
  $result=$db->query($sql) or die('err28');
  }
//// !Search and Salary and specialite
if(isset($_SESSION['search']) and isset($_SESSION['Salary']) and isset($_SESSION['specialite'])){
  if($_SESSION['Salary']==60000){
    if($_SESSION['ville']!=0)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
  or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
   id_specialite={$_SESSION['specialite']}  and  salaire >={$_SESSION['Salary']} ";
   else   $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
   WHERE o.etat=1 and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
   or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
    id_specialite={$_SESSION['specialite']}  and  salaire >={$_SESSION['Salary']} ";
   }else{
    if($_SESSION['ville']!=0)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
  or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%' )and
    id_specialite={$_SESSION['specialite']}  and (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']} )";
    else   $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
    WHERE o.etat=1 and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
    or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%' )and
      id_specialite={$_SESSION['specialite']}  and (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']} )";
    }
$result=$db->query($sql) or die('err29');
} 
//// !Search and Salary and specialite and posted
if(isset($_SESSION['search']) and isset($_SESSION['posted']) and isset($_SESSION['Salary']) and isset($_SESSION['specialite'])){
  if($_SESSION['Salary']==60000){
  if($_SESSION['ville']!=0)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and  o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
  or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
  id_specialite={$_SESSION['specialite']}  and  salaire >={$_SESSION['Salary']} and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']})";
else   $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
WHERE  o.etat=1 and  (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
id_specialite={$_SESSION['specialite']}  and  salaire >={$_SESSION['Salary']} and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']})"; 
}else{
  if($_SESSION['ville']!=0)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and  o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
  or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
  id_specialite={$_SESSION['specialite']}  and (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']}) and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']})";
 else
 $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
 WHERE o.etat=1 and  (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
 or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
 id_specialite={$_SESSION['specialite']}  and (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']}) and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']})";
}
$result=$db->query($sql) or die('err30');
}   
//// !Search and Salary and specialite and Vacancy
if(isset($_SESSION['search']) and isset($_SESSION['Vacancy']) and isset($_SESSION['Salary']) and isset($_SESSION['specialite'])){
  if($_SESSION['Salary']==60000){
    if($_SESSION['ville']!=0)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE  o.etat=1 and o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%'
   or raison_social like '{$_SESSION['search']}%' 
  or secteur_recruteur like '{$_SESSION['search']}%') and
  id_specialite={$_SESSION['specialite']}  and  salaire >={$_SESSION['Salary']} and   Vacancy='{$_SESSION['Vacancy']}'";
  else   $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%'
   or raison_social like '{$_SESSION['search']}%' 
  or secteur_recruteur like '{$_SESSION['search']}%') and
  id_specialite={$_SESSION['specialite']}  and  salaire >={$_SESSION['Salary']} and   Vacancy='{$_SESSION['Vacancy']}'";
  }else{
    if($_SESSION['ville']!=0)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE  o.etat=1 and o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
  or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
   id_specialite={$_SESSION['specialite']}  and (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']})  and
     Vacancy='{$_SESSION['Vacancy']}'";
     else $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
     WHERE o.etat=1 and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
     or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
      id_specialite={$_SESSION['specialite']}  and (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']})  and
        Vacancy='{$_SESSION['Vacancy']}'";
  }
$result=$db->query($sql) or die('err31');
} 
//// !Search and Salary and specialite and Vacancy and posted
if(isset($_SESSION['search']) and isset($_SESSION['Vacancy']) and isset($_SESSION['posted']) and isset($_SESSION['Salary']) and isset($_SESSION['specialite'])){
  if($_SESSION['Salary']==60000){
    if($_SESSION['ville']!=0)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' or
   raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
  id_specialite={$_SESSION['specialite']}  and  salaire >={$_SESSION['Salary']} and 
    Vacancy='{$_SESSION['Vacancy']}' and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']})";
    else $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
    WHERE o.etat=1 and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' or
     raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
    id_specialite={$_SESSION['specialite']}  and  salaire >={$_SESSION['Salary']} and 
      Vacancy='{$_SESSION['Vacancy']}' and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']})";

  }else{
    if($_SESSION['ville']!=0)
  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
  WHERE o.etat=1 and o.id_ville={$_SESSION['ville']} and (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
  or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
  id_specialite={$_SESSION['specialite']}  and (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']}) 
   and  Vacancy='{$_SESSION['Vacancy']}' and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']})";
   else  $sql="SELECT  *,day(o.created_at) as date FROM offre_emploi o inner join recruteur r on o.id_recruteur=r.id_recruteur 
   WHERE o.etat=1 and  (contrat like '{$_SESSION['search']}%' or nom_recruteur like '{$_SESSION['search']}%' 
   or raison_social like '{$_SESSION['search']}%' or secteur_recruteur like '{$_SESSION['search']}%') and
   id_specialite={$_SESSION['specialite']}  and (salaire between {$_SESSION['sql_Salary']} and {$_SESSION['Salary']}) 
    and  Vacancy='{$_SESSION['Vacancy']}' and (TIMESTAMPDIFF(HOUR,o.created_at,now()) between {$_SESSION['sql']} and {$_SESSION['posted']})";

  }
$result=$db->query($sql) or die('err32');
} 
if($sql!=""){
  $total=$result->num_rows;
  $nbelement=5;
  $total_pages=ceil($total/$nbelement);
  $debut=($page-1)*$nbelement;
  $sql.=" LIMIT $debut,$nbelement";
 $result=$db->query($sql) or die('err2');
}
?>

    <body>

        <div id="main-wrapper">

            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->

            <div class="clearfix"></div>
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->

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
                        <h1>Job Listing</h1>
                    </div>
                </div>
            </div>
            <!-- ============================ Hero Banner  Start================================== -->

            <div class="clearfix"></div>
            <!-- ============================ Hero Banner End ================================== -->

            <form method="post">
                <section class="section section-md">
                    <div class="container">

                        <div class="form-row">
                            <div class="form-group col-md-6  has">
                                <i class="fa fa-key" aria-hidden="true"></i>
                                <input type="text" class="form-control" name="search" id="inputCity" required placeholder="keywords " <?php if(isset($_SESSION[ 'search'])) echo "value=". "{$_SESSION['search']}"; ?> >
                            </div>
                            <div class="form-group col-md-4  has">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <select id="lunchBegins" class="selectpicker form-control " data-live-search="true" data-live-search-style="begins" name="ville">
                                    <option value="0">All Regions ...</option>
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
                                        <p class="heading-8">Vacancy Type</p>
                                        <hr>
                                        <ul class="no-ul-list">
                                            <li>
                                                <?php if(isset($_SESSION['Vacancy']) and $_SESSION['Vacancy']=="Freelance"){ ?>
                                                    <input id="checkbox-6" class="checkbox-custom" value="Freelance" onclick="this.form.submit()" checked name="Vacancy" type="radio">
                                                    <?php }else{  ?>
                                                        <input id="checkbox-6" class="checkbox-custom" value="Freelance" onclick="this.form.submit()" name="Vacancy" type="radio">
                                                        <?php } ?>
                                                            <label for="checkbox-6" class="checkbox-custom-label">Freelance</label>
                                            </li>
                                            <li>
                                                <?php if(isset($_SESSION['Vacancy']) and $_SESSION['Vacancy']=="Full Time"){ ?>
                                                    <input id="checkbox-7" class="checkbox-custom" value="Full Time" onclick="this.form.submit()" checked name="Vacancy" type="radio">
                                                    <?php }else{  ?>
                                                        <input id="checkbox-7" class="checkbox-custom" value="Full Time" onclick="this.form.submit()" name="Vacancy" type="radio">
                                                        <?php } ?>
                                                            <label for="checkbox-7" class="checkbox-custom-label">Full Time</label>
                                            </li>
                                            <li>
                                                <?php if(isset($_SESSION['Vacancy']) and $_SESSION['Vacancy']=="Part Time"){ ?>
                                                    <input id="checkbox-9" class="checkbox-custom" value="Part Time" onclick="this.form.submit()" checked name="Vacancy" type="radio">
                                                    <?php }else{  ?>
                                                        <input id="checkbox-9" class="checkbox-custom" value="Part Time" onclick="this.form.submit()" name="Vacancy" type="radio">
                                                        <?php } ?>
                                                            <label for="checkbox-9" class="checkbox-custom-label">Part Time</label>
                                            </li>

                                            <li>
                                                <?php if(isset($_SESSION['Vacancy']) and $_SESSION['Vacancy']=="Internship"){ ?>
                                                    <input id="checkbox-8" class="checkbox-custom" value="Internship" onclick="this.form.submit()" checked name="Vacancy" type="radio">
                                                    <?php }else{  ?>
                                                        <input id="checkbox-8" class="checkbox-custom" value="Internship" onclick="this.form.submit()" name="Vacancy" type="radio">
                                                        <?php } 
                      ?>
                                                            <label for="checkbox-8" class="checkbox-custom-label">Internship</label>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-sm-6 col-lg-12">
                                        <p class="heading-8">Filter by Salary</p>
                                        <hr>
                                        <ul class="no-ul-list">
                                            <li>
                                                <?php if(isset($_SESSION['Salary']) and $_SESSION['Salary']=="1000"){ ?>
                                                    <input id="checkbox-55" class="checkbox-custom" value="1000" onclick="this.form.submit()" checked name="Salary" type="radio">
                                                    <?php }else{  ?>
                                                        <input id="checkbox-55" class="checkbox-custom" value="1000" onclick="this.form.submit()" name="Salary" type="radio">
                                                        <?php } ?>
                                                            <label for="checkbox-55" class="checkbox-custom-label">0 DH - 1000 DH</label>
                                            </li>
                                            <li>
                                                <?php if(isset($_SESSION['Salary']) and $_SESSION['Salary']=="5000"){ ?>
                                                    <input id="checkbox-33" class="checkbox-custom" value="5000" onclick="this.form.submit()" checked name="Salary" type="radio">
                                                    <?php }else{  ?>
                                                        <input id="checkbox-33" class="checkbox-custom" value="5000" onclick="this.form.submit()" name="Salary" type="radio">
                                                        <?php } ?>
                                                            <label for="checkbox-33" class="checkbox-custom-label">1000 DH - 5000 DH</label>
                                            </li>
                                            <li>
                                                <?php if(isset($_SESSION['Salary']) and $_SESSION['Salary']=="50000"){ ?>
                                                    <input id="checkbox-68" class="checkbox-custom" value="50000" onclick="this.form.submit()" checked name="Salary" type="radio">
                                                    <?php }else{  ?>
                                                        <input id="checkbox-68" class="checkbox-custom" value="50000" onclick="this.form.submit()" name="Salary" type="radio">
                                                        <?php } ?>
                                                            <label for="checkbox-68" class="checkbox-custom-label">5000 DH - 50000 DH</label>
                                            </li>
                                            <li>
                                                <?php if(isset($_SESSION['Salary']) and $_SESSION['Salary']=="60000"){ ?>
                                                    <input id="checkbox-72" class="checkbox-custom" value="60000" onclick="this.form.submit()" checked name="Salary" type="radio">
                                                    <?php }else{  ?>
                                                        <input id="checkbox-72" class="checkbox-custom" value="60000" onclick="this.form.submit()" name="Salary" type="radio">
                                                        <?php } ?>
                                                            <label for="checkbox-72" class="checkbox-custom-label">60000+ DH</label>
                                            </li>
                                        </ul>
                                    </div>

                                    <?php 
          $str=file_get_contents('diplome.json');
          $json_d=json_decode($str,true);
             ?>
                                        <div class="col-sm-6 col-lg-12">
                                            <p class="heading-8">Speciality</p>
                                            <hr>
                                            <ul class="no-ul-list">
                                                <?php
                    foreach($json_d as $key=>$val){
                    if($val['parent_id']==49){
                    ?>
                                                    <li>
                                                        <?php if(isset($_SESSION['specialite']) and $_SESSION['specialite']==$val['id']){ ?>
                                                            <input id="checkbox-<?php echo $key; ?>" class="checkbox-custom" value="<?php echo $val['id']; ?>" onclick="this.form.submit()" checked name="specialite" type="radio">
                                                            <?php }else{  ?>
                                                                <input id="checkbox-<?php echo $key; ?>" class="checkbox-custom" value="<?php echo $val['id']; ?>" onclick="this.form.submit()" name="specialite" type="radio">
                                                                <?php } ?>
                                                                    <label for="checkbox-<?php echo $key; ?>" class="checkbox-custom-label">
                                                                        <?php echo $val['name']; ?>
                                                                    </label>
                                                    </li>
                                                    <?php } } ?>

                                            </ul>
                                        </div>

                                </div>
                            </div>
                            <div class="col-lg-8 col-xl-9">
                                <table class="table-job-listing table-responsive">
                                    <tbody>

                                        <?php 
             if(isset($result))
              while( $tab=$result->fetch_array()){
                ?>

                                            <tr>
                                                <td class="table-job-listing-main">
                                                    <!-- Company Minimal-->
                                                    <?php
                        $sq="SELECT * FROM recruteur WHERE id_recruteur={$tab['id_recruteur']}";
                        $p=$db->query($sq);
                        $t=$p->fetch_array();
                        ?>
                                                        <article class="company-minimal">
                                                            <figure class="company-minimal-figure"><img class="company-minimal-image" src="assets/logo/<?php echo $t['logo']; ?>" alt="">
                                                            </figure>
                                                            <div class="company-minimal-main">

                                                                <h5 class="company-minimal-title"><a href="job_details.php?id_offre=<?php echo $tab['id_offre_emploi']; ?>"><?php echo $t['raison_social']; ?></a></h5>
                                                                <p>
                                                                    <?php echo $t['adresse_recruteur']; ?>,

                                                                        <?php 
                         foreach ($json ['ville'] as $key=>$value) 
                          if( $t['id_ville']==$value['id'])
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
                                <!-- Bootstrap Pagination-->
                              
                                <?php if(isset($total_pages) and $total_pages>1) { ?>
                                    <nav class="pagination-outer text-center" aria-label="Page navigation">
                                        <div class="bs-example">
                                            <ul class="pagination">
                                            <?php
                                              $p=$page-1;
                                              if($p==0) $p=1;
                                                        ?>
                                                <li><a href="Job_Listing.php?page=<?php echo $p; ?>"><i class="ti-arrow-left"></i></a></li>
                                                <?php

                                     for ($i=1; $i<=$total_pages; $i++)  
                                    if($i==$page)
                                    echo $pagLink= "<li><a  style=\"background-color:#0f7dff;color:white;\" href='Job_Listing.php?page=".$i."'>".$i."</a></li>";  
                                    else
                                    echo $pagLink= "<li><a  href='Job_Listing.php?page=".$i."'>".$i."</a></li>";  

                                    $t=$page+1;
                                    if($t==$total_pages+1) $t=$total_pages;
                                       ?>
                                                    <li><a href="Job_Listing.php?page=<?php echo $t; ?>"><i class="ti-arrow-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </nav>
                                    <?php } ?>


                            </div>
                        </div>
                    </div>
                </section>
            </form>

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