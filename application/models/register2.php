<?php
header('Content-type: application/json');
if(count($_REQUEST)>0) {

include 'config.php';

$query="SELECT * FROM users WHERE email='".mysql_escape_string($_REQUEST['email'])."'"; 

$result=mysql_query($query);

//count no of rows

$count=mysql_num_rows($result);
if($count>0){
echo '{"success":0,"error_message":"Email Allready Exists."}';
}else{
 

$query = "INSERT INTO `users`(`first_name`, `last_name`, `gender`, `email`, `birthday`, `password`, `last_user_login`, `user_created_on`) VALUES ('".mysql_escape_string($_REQUEST['first_name'])."','".mysql_escape_string($_REQUEST['last_name'])."','".mysql_escape_string($_REQUEST['gender'])."','".mysql_escape_string($_REQUEST['email'])."','".mysql_escape_string($_REQUEST['birthday'])."','".mysql_escape_string($_REQUEST['password'])."','',now())"; 

$result = mysql_query($query);
 
if($result) {
echo '{"success":1}';
} else {
echo '{"success":0,"error_message":"Invalid Data."}';
}

}
}
 
?>
