<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard | Modern Admin</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'layout/';?>css/960.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'layout/';?>css/reset.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'layout/';?>css/text.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'layout/';?>css/blue.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />  
    <script type="text/javascript" src="<?php echo base_url().'layout/';?>/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'layout/';?>js/blend/jquery.blend.js"></script>
	<script type="text/javascript" src="<?php echo base_url().'layout/';?>js/ui.core.js"></script>
	<script type="text/javascript" src="<?php echo base_url().'layout/';?>js/ui.sortable.js"></script>    
    <script type="text/javascript" src="<?php echo base_url().'layout/';?>js/ui.dialog.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'layout/';?>js/ui.datepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'layout/';?>js/effects.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'layout/';?>js/flot/jquery.flot.pack.js"></script>
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
    <script id="source" language="javascript" type="text/javascript" src="js/graphs.js"></script>

</head>

<body>
<!-- WRAPPER START -->
<div class="container_16" id="wrapper">	
<!-- HIDDEN COLOR CHANGER -->      
      <div style="position:relative;">
      	<div id="colorchanger">
        	<a href="dashboard_red.html"><span class="redtheme">Red Theme</span></a>
            <a href="dashboard.html"><span class="bluetheme">Blue Theme</span></a>
            <a href="dashboard_green.html"><span class="greentheme">Green Theme</span></a>
        </div>
      </div>
  	<!--LOGO-->
	<div class="grid_8" id="logo">Skookum Admin - Website Administration</div>
    <div class="grid_8">
<!-- USER TOOLS START -->
      <div id="user_tools"><span><a href="#" class="mail">(1)</a> Welcome <a href="#"><?php echo $user_detail[0]->first_name;?> <?php echo $user_detail[0]->last_name;?></a>  |  <a class="dropdown" href="#">Change Theme</a>  |  <a href="<?php echo base_url().'home/logout';?>">Logout</a></span></div>
    </div>
<!-- USER TOOLS END -->    
<div class="grid_16" id="header">
<!-- MENU START -->
<div id="menu">
	<ul class="group" id="menu_group_main">
		<li class="item first" id="one"><a href="<?php echo base_url().'home';?>" class="main current"><span class="outer"><span class="inner dashboard">Dashboard</span></span></a></li>
        <li class="item middle" id="two"><a href="forms.html" class="main"><span class="outer"><span class="inner content">Content</span></span></a></li>
        <li class="item middle" id="three"><a href="#"><span class="outer"><span class="inner reports png">Reports</span></span></a></li>
        <li class="item middle" id="four"><a href="#" class="main"><span class="outer"><span class="inner users">Users</span></span></a></li>
		<li class="item middle" id="five"><a href="#" class="main"><span class="outer"><span class="inner media_library">Media Library</span></span></a></li>        
		<li class="item middle" id="six"><a href="#" class="main"><span class="outer"><span class="inner event_manager">Event Manager</span></span></a></li>        
		<li class="item middle" id="seven"><a href="#" class="main"><span class="outer"><span class="inner newsletter">Newsletter</span></span></a></li>        
		<li class="item last" id="eight"><a href="#" class="main"><span class="outer"><span class="inner settings">Settings</span></span></a></li>        
    </ul>
</div>
<!-- MENU END -->
</div>
<div class="grid_16">
<!-- TABS START -->
    <div id="tabs">
         <div class="container">
            <ul>
                      <li><a href="#" class="current"><span>Dashboard elements</span></a></li>
                      <li><a href="forms.html"><span>Content Editing</span></a></li>
                      <li><a href="#"><span>Submenu Link 3</span></a></li>
                      <li><a href="#"><span>Submenu Link 4</span></a></li>
                      <li><a href="#"><span>Submenu Link 5</span></a></li>
                      <li><a href="#"><span>Submenu Link 6</span></a></li>
                      <li><a href="#" class="more"><span>More Submenus</span></a></li>            
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
 