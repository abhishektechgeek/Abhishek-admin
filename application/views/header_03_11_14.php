<?php
error_reporting(0);
 $class = '';
$seg = $this->uri->segment(1); 
 
if($seg == 'home'){
  $home = 'current';
  $this->session->set_userdata(array('menu_id' => 1));
  }
else 
 $home = '';
 
 if($seg == 'user'){
  $user = 'current';
  $this->session->set_userdata(array('menu_id' => 2));
  }
else 
 $user = '';
 
 if($seg == 'category' or $seg == 'segment' or $seg == 'service'or $seg == 'serviceupgrade'){
  $category1 = 'current';
  $this->session->set_userdata(array('menu_id' => 3));
   }
else 
 $category1 = '';
 
  if($seg == 'category'){
    $category = 'current';
   }
  else 
    $category = '';
	
	 if($seg == 'segment'){
    $segment = 'current';
   }
  else 
    $segment = '';
	
	 if($seg == 'service'){
    $service = 'current';
   }
  else 
    $service = '';
	
	 if($seg == 'serviceupgrade'){
    $serviceupgrade = 'current';
   }
  else 
    $serviceupgrade = '';
	
	if($seg == 'serviceplan'){
    $serviceplan = 'current';
	$this->session->set_userdata(array('menu_id' => 4));
  }
  else 
    $serviceplan = '';
	
 
 if($seg == 'admins' or $seg == 'group'){
    $admins1 = 'current';
	$this->session->set_userdata(array('menu_id' => 5));
  }
  else 
    $admins1 = '';
	
	if($seg == 'admins')
    $admins = 'current';
  else 
    $admins = '';
	
	if($seg == 'group')
    $group = 'current';
  else 
    $group = '';
	
	if($seg == 'bids' or $seg == 'notification' or $seg == 'response'){
    $bids1 = 'current';
	$this->session->set_userdata(array('menu_id' => 6));
  }
  else 
    $bids1 = '';
	
	
	if($seg == 'bids')
    $bids = 'current';
  else 
    $bids = '';
	
	if($seg == 'notification')
    $notification = 'current';
  else 
    $notification = '';
	
	if($seg == 'response')
    $response = 'current';
  else 
    $response = '';
	
	
	if($seg == 'newsletter'){
    $newsletter = 'current';
	$this->session->set_userdata(array('menu_id' => 7)); 
  }
  else 
    $newsletter = '';
	
  	if($seg == 'coupon'){
    $coupon = 'current';
	$this->session->set_userdata(array('menu_id' => 8)); 
  }
  else 
    $coupon = '';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard | Modern Admin</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'layout/';?>css/960.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'layout/';?>css/reset.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'layout/';?>css/text.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'layout/';?>css/blue.css" />
<!--<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />  -->
    <script type="text/javascript" src="<?php echo base_url().'layout/';?>js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'layout/';?>js/jquery.validate.js"></script>
 <!--   <script type="text/javascript" src="<?php echo base_url().'layout/';?>js/jquery-ui.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url().'layout/';?>js/blend/jquery.blend.js"></script>
	<script type="text/javascript" src="<?php echo base_url().'layout/';?>js/ui.core.js"></script>
	<script type="text/javascript" src="<?php echo base_url().'layout/';?>js/ui.sortable.js"></script>    
    <script type="text/javascript" src="<?php echo base_url().'layout/';?>js/ui.dialog.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'layout/';?>js/ui.datepicker.js"></script>
    <!--<script type="text/javascript" src="<?php echo base_url().'layout/';?>js/effects.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url().'layout/';?>js/flot/jquery.flot.pack.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'layout/';?>js/jquery.colorbox.js"></script>
    
    <!-- <script type="text/javascript" src="<?php echo base_url().'layout/';?>js/editor/jquery.codify.min.js"></script> -->
	<script type="text/javascript" src="<?php echo base_url().'layout/';?>js/editor/htmlbox.colors.js"></script>
	<script type="text/javascript" src="<?php echo base_url().'layout/';?>js/editor/htmlbox.styles.js"></script>
	<script type="text/javascript" src="<?php echo base_url().'layout/';?>js/editor/htmlbox.syntax.js"></script>
	<script type="text/javascript" src="<?php echo base_url().'layout/';?>js/editor/htmlbox.undoredomanager.js"></script>
	<script type="text/javascript" src="<?php echo base_url().'layout/';?>js/editor/htmlbox.min.js"></script>
    <!--[if IE]>
    <script language="javascript" type="text/javascript" src="js/flot/excanvas.pack.js"></script>
    <![endif]-->
	<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="css/iefix.css" />
	<script src="js/pngfix.js"></script>
    <script>
        DD_belatedPNG.fix('#menu ul li a span span');
    </script>        
    <![endif]-->
 <!--   <script id="source" language="javascript" type="text/javascript" src="js/graphs.js"></script> -->
    <style>
    a.edit_inline {
    background-color: #397CAE;
    border-radius: 4px 4px 4px 4px;
    color: #FFFFFF !important;
    padding: 0 15px;
    }
	
	
	.delete_inline {
		background-color: #E63C3C;
		border: medium none;
		border-radius: 4px 4px 4px 4px;
		color: #FFFFFF !important;
		cursor: pointer;
		padding-left: 15px;
	}
	
    </style>

</head>

<body>
<!-- WRAPPER START -->
<div class="container_16" id="wrapper">	
<!-- HIDDEN COLOR CHANGER -->      
      <div style="position:relative;">
      	<!--<div id="colorchanger">
        	<a href="dashboard_red.html"><span class="redtheme">Red Theme</span></a>
            <a href="dashboard.html"><span class="bluetheme">Blue Theme</span></a>
            <a href="dashboard_green.html"><span class="greentheme">Green Theme</span></a>
        </div>-->
      </div>
  	<!--LOGO-->
	<div class="grid_8" id="logo"><img src="<?php echo base_url().'layout/';?>images/logo.png"></div>
    <div class="grid_8">
<!-- USER TOOLS START -->
      <div id="user_tools"><span><a href="#" class="mail">(1)</a> Welcome <a href="#"><?php echo $user_detail[0]->first_name;?> <?php echo $user_detail[0]->last_name;?></a>  |  <!--<a class="dropdown" href="#">Change Theme</a>-->  |  <a href="<?php echo base_url().'home/logout';?>">Logout</a></span></div>
    </div>
<!-- USER TOOLS END -->    
<div class="grid_16" id="header">
<!-- MENU START -->
<div id="menu">
   <ul class="group" id="menu_group_main">
<?php //echo $user_detail[0]->id; 

 	 $group_id= $this->session->userdata('group_id');
	 $query3 = $this->db->query("SELECT menu_id,title FROM `menu` ");
	 $row3 = $query3->result_array();
 	
	 $access_permission = array();
	 $modify_permission = array();
 
	 $access_permission = $this->adminmodel->getAccessMenuList();
	 $modify_permission = $this->adminmodel->is_modify_permission();
	 
	 
	foreach($row3 as $key=>$value ){
	if($value['title'] == 'Dashboard' and in_array($value['menu_id'],$access_permission) ){
	  ?>
	  <li class="item first" id="one"><a href="<?php echo base_url().'home';?>" class="main <?php echo $home;?>"><span class="outer"><span class="inner dashboard">Dashboard</span></span></a></li>
      
      <?php }
	  
	  if($value['title'] == 'Users' and in_array($value['menu_id'],$access_permission)){
	  ?>
	 <li class="item middle" id="four"><a href="<?php echo base_url().'user/userlist';?>" class="main <?php echo $user;?>"><span class="outer"><span class="inner users">Users</span></span></a></li>
      
      <?php }  
	
	 if($value['title'] == 'Service Plans' and in_array($value['menu_id'],$access_permission)){
	  ?>
	 <li class="item middle" id="eight"><a href="<?php echo base_url().'serviceplan/';?>" class="main <?php echo $serviceplan;?>"><span class="outer"><span class="inner event_manager">Service Plans</span></span></a></li>
      
      <?php } 
	  
	  if($value['title'] == 'Skills' and in_array($value['menu_id'],$access_permission)){
	  ?>
	<li class="item middle" id="eight"><a href="<?php echo base_url().'category/';?>" class="main <?php echo $category1;?>"><span class="outer"><span class="inner skills">Skills</span></span></a></li>  
      
      <?php } 
	  
	  
	  if($value['title'] == 'Admins' and in_array($value['menu_id'],$access_permission)){
	  ?>
	<li class="item middle" id="eight"><a href="<?php echo base_url().'admins/';?>" class="main <?php echo $admins1;?>"><span class="outer"><span class="inner skills">Admins</span></span></a></li>
      
      <?php } 
	  
	   if($value['title'] == 'Bids' and in_array($value['menu_id'],$access_permission) and $this->session->userdata('level') == 0){
	  ?>
	<li class="item middle" id="eight"><a href="<?php echo base_url().'bids/';?>" class="main <?php echo $bids1;?>"><span class="outer"><span class="inner skills">Bids</span></span></a></li>
      
      <?php } 
	  
	   if($value['title'] == 'Email Newsletter' and in_array($value['menu_id'],$access_permission)){
	  ?>
	<li class="item middle" id="eight"><a href="<?php echo base_url().'newsletter/';?>" class="main <?php echo $newsletter ;?>"><span class="outer"><span class="inner skills">Email Newsletter</span></span></a></li>
      
      <?php } 
	  
	   if($value['title'] == 'Coupon' and in_array($value['menu_id'],$access_permission)){
	  ?>
	<li class="item last" id="eight"><a href="<?php echo base_url().'coupon/';?>" class="main <?php echo $coupon ;?>"><span class="outer"><span class="inner skills">Coupon</span></span></a></li>
      
      <?php } 
	 
	}
	 

?>
	 
		<!--<li class="item first" id="one"><a href="<?php echo base_url().'home';?>" class="main <?php echo $home;?>"><span class="outer"><span class="inner dashboard">Dashboard</span></span></a></li>
        
        <li class="item middle" id="four"><a href="<?php echo base_url().'user/userlist';?>" class="main <?php echo $user;?>"><span class="outer"><span class="inner users">Users</span></span></a></li>
	 
         <li class="item middle" id="eight"><a href="<?php echo base_url().'serviceplan/';?>" class="main <?php echo $serviceplan;?>"><span class="outer"><span class="inner event_manager">Service Plans</span></span></a></li>     
		<li class="item last" id="eight"><a href="<?php echo base_url().'category/';?>" class="main <?php echo $category1;?>"><span class="outer"><span class="inner skills">Skills</span></span></a></li>-->  
        
            
    </ul>
</div>
<!-- MENU END -->
</div>
<div class="grid_16">
<!-- TABS START -->
    <div id="tabs">
         <div class="container">
            <ul>
			  <?php  
              if($seg == 'category' or $seg == 'segment' or $seg == 'service' or $seg == 'serviceupgrade' ){ ?>
              <li><a href="<?php echo base_url().'category/';?>" class="<?php echo $category;?>"><span>Category</span></a></li>
              <li><a href="<?php echo base_url().'segment/';?>" class="<?php echo $segment;?>"><span>Segment</span></a></li>
              <li><a href="<?php echo base_url().'service/';?>" class="<?php echo $service;?>"><span>Services</span></a></li>
              <li><a href="<?php echo base_url().'serviceupgrade/';?>" class="<?php echo $serviceupgrade;?>"><span>Services Upgrade</span></a></li>
              <li><a href="<?php echo base_url().'servicetimeslot/';?>" class="<?php echo $serviceupgrade;?>"><span>Services Time Slot</span></a></li>
             <?php  } else if($seg == 'user'){ ?>
			  <li><a href="<?php echo base_url().'user/';?>"  class="<?php echo $user;?>"><span>User List</span></a></li>
			 <?php }
			  else if($seg == 'serviceplan'){ ?>
			  <li><a href="<?php echo base_url().'serviceplan/';?>" class="<?php echo $serviceplan;?>"><span>Service Plan List</span></a></li>
			 <?php }
			  else if($seg == 'admins' or $seg == 'group'){ ?>
			  <li><a href="<?php echo base_url().'admins/';?>" class="<?php echo $admins;?>"><span>Admins</span></a></li>
               <li><a href="<?php echo base_url().'group/';?>" class="<?php echo $group;?>"><span>Group</span></a></li>
			 <?php }
			 
			  else if($seg == 'bids' or $seg == 'notification' or $seg == 'response'){ ?>
			  <li><a href="<?php echo base_url().'bids/';?>" class="<?php echo $bids;?>"><span>Bids</span></a></li>
               <li><a href="<?php echo base_url().'notification/';?>" class="<?php echo $notification;?>"><span>Notification</span></a></li>
               <li><a href="<?php echo base_url().'response/';?>" class="<?php echo $response;?>"><span>Response</span></a></li>
			 <?php }
			 else{?>
              <li><a href="<?php echo base_url().'home/';?>" class="<?php echo $home;?>"> <span>Dashboard Element</span></a></li>
              <?php }?>  
                      <!--<li><a href="#"><span>Submenu Link 3</span></a></li>
                      <li><a href="#"><span>Submenu Link 4</span></a></li>
                      <li><a href="#"><span>Submenu Link 5</span></a></li>
                      <li><a href="#"><span>Submenu Link 6</span></a></li>
                      <li><a href="#" class="more"><span>More Submenus</span></a></li>  -->          
           </ul>
        </div>
    </div>
<!-- TABS END -->    
</div>
<!-- HIDDEN SUBMENU START -->
<div class="grid_16" id="hidden_submenu">
	  <ul class="more_menu">
		<li><a href="#">More link 1</a></li>
		<li><a href="#">More link 2</a></li>  
	    <li><a href="#">More link 3</a></li>    
        <li><a href="#">More link 4</a></li>                               
      </ul>
	  <ul class="more_menu">
		<li><a href="#">More link 5</a></li>
		<li><a href="#">More link 6</a></li>  
	    <li><a href="#">More link 7</a></li> 
        <li><a href="#">More link 8</a></li>                                  
      </ul>
	  <ul class="more_menu">
		<li><a href="#">More link 9</a></li>
		<li><a href="#">More link 10</a></li>  
	    <li><a href="#">More link 11</a></li>  
        <li><a href="#">More link 12</a></li>                                 
      </ul>            
  </div>
<!-- HIDDEN SUBMENU END -->  
<!--<table width="100%" border="0" style="border:1px solid #B6CFE6;" >
    <tr>
        <td align="center" colspan="4">
            <h1> Welcome <?php echo $user_detail[0]->first_name;?> <?php echo $user_detail[0]->last_name;?> </h1>
            <img src="<?php echo base_url().'layout/';?>images/line.gif">
        </td>
    </tr>
    <tr style="background-color:#5089BE; color:#FFFFFF; text-align:left;">
        <td colspan="4">
            <table width="100%"  border="0" cellspacing="0" cellpadding="0">          
                <tr>			
                    <td align="left" style="padding-left:5px; padding-bottom:5px">
                        <table cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td valign="middle" style="padding-bottom:5px; padding-top:5px">
                                    <DIV align="left" style="padding-left:0px">	
                                         
                                        	
										<SCRIPT type="text/javascript">at_attach("menu_users1", "menu_users_child1", "hover", "y", "pointer");</SCRIPT>
								<A class="MenuItems" id="menu_users2"  href="<?php echo base_url().'seller';?>">Saller List </A><font color="#FFFFFF"> | </font>  
                                <A class="MenuItems" id="menu_users2"  href="<?php echo base_url().'user';?>">User List </A><font color="#FFFFFF"> | </font>  
								<A class="MenuItems" id="menu_users3"  href="#">Tab Three</A><font color="#FFFFFF"> | </font>  								
								<A class="MenuItems" id="menu_users4" href="#">Tab Four </A><font color="#FFFFFF"> | </font>
								<A class="MenuItems" id="menu_users5" href="#">Tab Five </A><font color="#FFFFFF"> | </font>
                                           
                  
                                            <!--<A class="MenuItems" id="menu_users6" href="#">Shopping Product </A><font color="#FFFFFF"> | </font>
                                            <DIV class="drob_down_menu" id="menu_users_child6">
                                            <DIV id="info-2">
                                                <DIV class="xboxcontent-2">                                            
                                                    <DIV class="pop-links-top" nowrap="nowrap"><A class="submenu_link" href="#">Product Category</A></DIV>
                                                    <DIV class="pop-links-top" nowrap="nowrap"><A class="submenu_link" href="#">Product</A></DIV>											
                                                </DIV>
                                            <B class="xbottom-2">
                                            <B class="xb4-2"></B>
                                            <B class="xb3-2"></B>
                                            <B class="xb2-2"></B>
                                            <B class="xb1-2"></B>
                                            </B>
                                            </DIV>
                                        </DIV>	
                                        <SCRIPT type="text/javascript">at_attach("menu_users6", "menu_users_child6", "hover", "y", "pointer");</SCRIPT>-->
                                       
                                        
                                    <!--</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td align="right">
                        <table cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td align="right" valign="bottom" style="padding-right:10px;" >
                                    <A class="MenuItemsSmall" href="<?php echo base_url().'home';?>">Home</A><font color="#FFFFFF"> | </font>
                                    <A class="MenuItemsSmall" href="<?php echo base_url().'home/changePassword';?>">Change Password</A> <font color="#FFFFFF"> | </font>
                                    <A class="MenuItemsSmall" href="<?php echo base_url().'home/logout';?>">Logout</A>
                                </td>				
                            </tr>				
                        </table>
                    </td>
                </tr>
            </table>
    </td>
    </tr>
     <tr>
        <td colspan="4">-->
 