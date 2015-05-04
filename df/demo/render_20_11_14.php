<?php

$conn = mysql_connect("localhost","gofavo_v1","version1");
mysql_select_db("gofavo_version1",$conn) or die('no database connection');


function isUserExistsInContactList($id){
              $query2 = "SELECT `id` FROM `custumer_form_data` WHERE s_id = '".$id."' "; 
              $result = mysql_query($query2);
              $num_rows = mysql_num_rows($result);
               
		if($num_rows)return true;
		return false;
	}




require '../loaders/php/formLoader.php';

session_start();

$form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : FALSE;
unset($_SESSION['form_data']);

if( !$form_data ) {
	header( 'Location: /' ) ;
}

//
//$s_id = $_SESSION['skill_id'];
 $s_id = $_GET['skill_id'];
 $e_id = $_GET['edit_id'];
//echo $form_data ;


     //isUserExistsInContactList($s_id)
      if($s_id!=0){
          $id=$s_id;
        $query2 = "update custumer_form_data set form_data= '$form_data' where s_id = $s_id "; 
         $result = mysql_query($query2);
        }else{
            $id= $e_id;
        $query2 = "insert into custumer_form_data (s_id ,form_data) values($e_id,'$form_data')"; 
         $result = mysql_query($query2);
        }
   
//echo "<script>window.close();</script>";
        echo '<script type="text/javascript">self.close(); opener.location.href = "http://gofavo.com/api/admin/service/customerFormList/'.$id.'";</script>';


//$loader = new formLoader($form_data, 'submit.php');

?>

<html>
<head>
	<title>Render</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
</head>
<body>
	<div class="container">
		<div class="col-sm-6 col-sm-offset-3">
			<?php
                        $loader = new formLoader($form_data,'submit.php' );
                       $loader->render_form();  ?>
		</div>
	</div>
</body>
</html>

