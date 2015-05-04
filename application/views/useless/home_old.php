
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>	
		<title><?php echo $title;?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'layout/';?>css/style.css" />	
		<script type="text/javascript" src="<?php echo base_url().'layout/js/jquery-1.8.2.min.js';?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'layout/js/jquery.validate.js';?>"></script>
</head>

  
<body>
<div id="container">
	<h1>Welcome Administrator</h1>
	<div id="body">
		<div></div>		
	</div>
		<div>
			<span> Home page for Administrator</span>			
			<span><a href="<?php echo base_url();?>home/logout">Logout</a></span>
			<span><a href="<?php echo base_url();?>home/changepassword">Change Password</a></span>
		</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
</body>
</html>