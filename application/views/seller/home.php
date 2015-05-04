<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>	
		<title><?php echo $title;?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'layout/';?>css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'layout/';?>css/tabber.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'layout/';?>css/dhtmlgoodies_calendar.css" />
		<script type="text/javascript" src="<?php echo base_url().'layout/js/tabber.js';?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'layout/js/jquery-1.8.2.min.js';?>"></script>
		<script type="text/javascript" src="<?php echo base_url().'layout/js/jquery.validate.js';?>"></script>
</head>
  
<body>

<div id="container">
<div style="width:100%;padding: 0px 0px 25px 0px; border-bottom: 1px solid #D0D0D0;">
	<div style="width:70%; float:left;font-size: 16px;">Welcome <?php print_r($seller_detail[0]['first_name']);?> <?php print_r($seller_detail[0]['last_name']);?></div>
	<div style=" width:auto; float:left; margin-right:10px;"><a href="<?php echo base_url()."seller/home";?>">Home</a></div>
	<div style=" width:auto; float:left; margin-right:10px;"><a href="<?php echo base_url()."seller/edit_profile";?>">Edit Profile</a></div>
	<div style="widows:auto; float:left; margin-right:10px;"><a href="<?php echo base_url()."seller/changepassword";?>">Change Password</a></div>
	<div style="widows:auto; float:right; margin-right:25px;"><a href="<?php echo base_url()."seller/logout";?>">Log Out</a></div>	
</div>

	<div id="body" style="margin: 20px 10px;">	
		<div><?php print_r($seller_detail[0]['first_name']);?></div>
		
	</div>
	

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>