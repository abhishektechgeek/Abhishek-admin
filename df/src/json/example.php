<?php
session_start();
function jsondata(){


//$s_id = $_SESSION['skill_id'];
$s_id = $_GET['skill_id'];
//$conn = mysql_connect("localhost","root","");
$conn = mysql_connect("localhost","gofavo_v1","version1");
mysql_select_db("gofavo_version1",$conn) or die('no database connection');
//mysql_select_db("skookummob",$conn) or die('no database connection'); 
 if($s_id!=0){
      $query = "SELECT * FROM `custumer_form_data` WHERE s_id = $s_id ";

 }else{
     $query = "SELECT * FROM `custumer_form_data` WHERE s_id = '0' "; 
 }
 
  $result = mysql_query($query);
//$url_enc= "http://".$_SERVER['HTTP_HOST']."/data/jdcards/".$enc_mob;
if($result) {

$json = array();
 while($row = mysql_fetch_array ($result))     
{
    $bus = array(
		'form_data' => $row['form_data']
		
     );
    array_push($json, $bus);
}
}
//print_r($json);
return $bus['form_data'];
}
echo jsondata();

//echo '{"title":"My Form","description":"This is my form.","fields":[{"title":"First Name","type":"element-single-line-text","required":true,"position":1},{"title":"Last Name","type":"element-single-line-text","required":true,"position":2},{"title":"Email","type":"element-single-line-text","required":true,"position":3}]}';
?>

