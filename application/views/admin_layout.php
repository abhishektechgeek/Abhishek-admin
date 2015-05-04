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
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- start: Meta -->
        <meta charset="utf-8">
        <title>Admin Panel</title>
        <meta name="description" content="Login">
        <meta name="author" content="Admin Login">
        <meta name="keyword" content="ADMIN">
        <!-- end: Meta -->

        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- end: Mobile Specific -->

        <!-- start: CSS -->
        
<!--<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />  -->
    <script type="text/javascript" src="<?php echo ASSETS_URL_JS ?>jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS_URL_JS ?>blend/jquery.blend.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL_JS ?>ui.core.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL_JS ?>ui.sortable.js"></script>    
    <script type="text/javascript" src="<?php echo ASSETS_URL_JS ?>ui.dialog.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS_URL_JS ?>ui.datepicker.js"></script>
   <script type="text/javascript" src="<?php echo ASSETS_URL_JS ?>flot/jquery.flot.pack.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS_URL_JS ?>jquery.colorbox.js"></script>
    <script type="text/javascript" src="<?php echo ASSETS_URL_JS ?>editor/htmlbox.colors.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL_JS ?>editor/htmlbox.styles.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL_JS ?>editor/htmlbox.syntax.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL_JS ?>editor/htmlbox.undoredomanager.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS_URL_JS ?>editor/htmlbox.min.js"></script>
        
        
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
        
        
        
        
        
        
        
        
        
        
        
        
        <link id="bootstrap-style" href="<?php echo ASSETS_URL_CSS ?>bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo ASSETS_URL_CSS ?>bootstrap-responsive.min.css" rel="stylesheet">
        <link id="base-style" href="<?php echo ASSETS_URL_CSS ?>style.css" rel="stylesheet">
        <link id="base-style-responsive" href="<?php echo ASSETS_URL_CSS ?>style-responsive.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>

        <link rel="shortcut icon" href="<?php echo ASSETS_URL_IMAGES ?>favicon.ico">
        <style type="text/css">

            body { background: url(<?php echo ASSETS_URL_IMAGES ?>bg-login.jpg) !important; }
        </style>
        

<body>
    <!-- start: Header -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="#"><span>Metro</span></a>

                <!-- start: Header Menu -->
                <div class="nav-no-collapse header-nav">
                    <ul class="nav pull-right">
                        <li class="dropdown hidden-phone">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="halflings-icon white warning-sign"></i>
                            </a>
                            <ul class="dropdown-menu notifications">
                                <li class="dropdown-menu-title">
                                    <span>You have 11 notifications</span>
                                    <a href="#refresh"><i class="icon-repeat"></i></a>
                                </li>	
                                <li>
                                    <a href="#">
                                        <span class="icon blue"><i class="icon-user"></i></span>
                                        <span class="message">New user registration</span>
                                        <span class="time">1 min</span> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon green"><i class="icon-comment-alt"></i></span>
                                        <span class="message">New comment</span>
                                        <span class="time">7 min</span> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon green"><i class="icon-comment-alt"></i></span>
                                        <span class="message">New comment</span>
                                        <span class="time">8 min</span> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon green"><i class="icon-comment-alt"></i></span>
                                        <span class="message">New comment</span>
                                        <span class="time">16 min</span> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon blue"><i class="icon-user"></i></span>
                                        <span class="message">New user registration</span>
                                        <span class="time">36 min</span> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon yellow"><i class="icon-shopping-cart"></i></span>
                                        <span class="message">2 items sold</span>
                                        <span class="time">1 hour</span> 
                                    </a>
                                </li>
                                <li class="warning">
                                    <a href="#">
                                        <span class="icon red"><i class="icon-user"></i></span>
                                        <span class="message">User deleted account</span>
                                        <span class="time">2 hour</span> 
                                    </a>
                                </li>
                                <li class="warning">
                                    <a href="#">
                                        <span class="icon red"><i class="icon-shopping-cart"></i></span>
                                        <span class="message">New comment</span>
                                        <span class="time">6 hour</span> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon green"><i class="icon-comment-alt"></i></span>
                                        <span class="message">New comment</span>
                                        <span class="time">yesterday</span> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon blue"><i class="icon-user"></i></span>
                                        <span class="message">New user registration</span>
                                        <span class="time">yesterday</span> 
                                    </a>
                                </li>
                                <li class="dropdown-menu-sub-footer">
                                    <a>View all notifications</a>
                                </li>	
                            </ul>
                        </li>
                        <!-- start: Notifications Dropdown -->
                        <li class="dropdown hidden-phone">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="halflings-icon white tasks"></i>
                            </a>
                            <ul class="dropdown-menu tasks">
                                <li class="dropdown-menu-title">
                                    <span>You have 17 tasks in progress</span>
                                    <a href="#refresh"><i class="icon-repeat"></i></a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="header">
                                            <span class="title">iOS Development</span>
                                            <span class="percent"></span>
                                        </span>
                                        <div class="taskProgress progressSlim red">80</div> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="header">
                                            <span class="title">Android Development</span>
                                            <span class="percent"></span>
                                        </span>
                                        <div class="taskProgress progressSlim green">47</div> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="header">
                                            <span class="title">ARM Development</span>
                                            <span class="percent"></span>
                                        </span>
                                        <div class="taskProgress progressSlim yellow">32</div> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="header">
                                            <span class="title">ARM Development</span>
                                            <span class="percent"></span>
                                        </span>
                                        <div class="taskProgress progressSlim greenLight">63</div> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="header">
                                            <span class="title">ARM Development</span>
                                            <span class="percent"></span>
                                        </span>
                                        <div class="taskProgress progressSlim orange">80</div> 
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-menu-sub-footer">View all tasks</a>
                                </li>	
                            </ul>
                        </li>
                        <!-- end: Notifications Dropdown -->
                        <!-- start: Message Dropdown -->
                        <li class="dropdown hidden-phone">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="halflings-icon white envelope"></i>
                            </a>
                            <ul class="dropdown-menu messages">
                                <li class="dropdown-menu-title">
                                    <span>You have 9 messages</span>
                                    <a href="#refresh"><i class="icon-repeat"></i></a>
                                </li>	
                                <li>
                                    <a href="#">
                                        <span class="avatar"><img src="<?php echo ASSETS_URL_IMAGES ?>avatar.jpg" alt="Avatar"></span>
                                        <span class="header">
                                            <span class="from">
                                                Dennis Ji
                                            </span>
                                            <span class="time">
                                                6 min
                                            </span>
                                        </span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="avatar"><img src="<?php echo ASSETS_URL_IMAGES ?>avatar.jpg" alt="Avatar"></span>
                                        <span class="header">
                                            <span class="from">
                                                Admin
                                            </span>
                                            <span class="time">
                                                56 min
                                            </span>
                                        </span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="avatar"><img src="<?php echo ASSETS_URL_IMAGES ?>avatar.jpg" alt="Avatar"></span>
                                        <span class="header">
                                            <span class="from">
                                                Dennis Ji
                                            </span>
                                            <span class="time">
                                                3 hours
                                            </span>
                                        </span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="avatar"><img src="<?php echo ASSETS_URL_IMAGES ?>avatar.jpg" alt="Avatar"></span>
                                        <span class="header">
                                            <span class="from">
                                                Dennis Ji
                                            </span>
                                            <span class="time">
                                                yesterday
                                            </span>
                                        </span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="avatar"><img src="<?php echo ASSETS_URL_IMAGES ?>avatar.jpg" alt="Avatar"></span>
                                        <span class="header">
                                            <span class="from">
                                                Dennis Ji
                                            </span>
                                            <span class="time">
                                                Jul 25, 2012
                                            </span>
                                        </span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-menu-sub-footer">View all messages</a>
                                </li>	
                            </ul>
                        </li>
                        <!-- end: Message Dropdown -->
                        <li>
                            <a class="btn" href="#">
                                <i class="halflings-icon white wrench"></i>
                            </a>
                        </li>
                        <!-- start: User Dropdown -->
                        <li class="dropdown">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="halflings-icon white user"></i> Admin
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-menu-title">
                                    <span>Account Settings</span>
                                </li>
                                <li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
                                <li><a href="<?php echo base_url() ?>index.php/home/logout"><i class="halflings-icon off"></i> Logout</a></li>
                            </ul>
                        </li>
                        <!-- end: User Dropdown -->
                    </ul>
                </div>
                <!-- end: Header Menu -->

            </div>
        </div>
    </div>
    <!-- start: Header -->

    <div class="container-fluid-full">
        <div class="row-fluid">

            <!-- start: Main Menu -->
            <div id="sidebar-left" class="span2">
                <div class="nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <li><a href="<?php echo base_url() ?>index.php/home/"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
                        <li><a href="<?php echo base_url() ?>index.php/category/"><i class="icon-bar-chart"></i><span class="hidden-tablet">Skills</span></a></li>	

                        <li>
							<a class="dropmenu" href="#"><i class="icon-tasks"></i><span class="hidden-tablet"> Control Panel</span><span class="label label-important"> 8 </span></a>
							<ul>
								<li><a class="submenu" href="<?php echo base_url() ?>index.php/home/users"><i class="icon-file-alt"></i><span class="hidden-tablet"> Users</span></a></li>
								<li><a class="submenu" href="<?php echo base_url() ?>index.php/home/con_countries"><i class="icon-file-alt"></i><span class="hidden-tablet"> Countries</span></a></li>
								<li><a class="submenu" href="<?php echo base_url() ?>index.php/home/con_proterm"><i class="icon-file-alt"></i><span class="hidden-tablet"> Provider Terms</span></a></li>
								<li><a class="submenu" href="<?php echo base_url() ?>index.php/home/con_termofuse"><i class="icon-file-alt"></i><span class="hidden-tablet"> Terms of Use</span></a></li>
								<li><a class="submenu" href="<?php echo base_url() ?>index.php/home/con_privacy"><i class="icon-file-alt"></i><span class="hidden-tablet"> Privacy Policy</span></a></li>
								<li><a class="submenu" href="<?php echo base_url() ?>index.php/home/con_help"><i class="icon-file-alt"></i><span class="hidden-tablet"> Help</span></a></li>
								<li><a class="submenu" href="<?php echo base_url() ?>index.php/home/con_pricing"><i class="icon-file-alt"></i><span class="hidden-tablet"> Pricing</span></a></li>
								<li><a class="submenu" href="<?php echo base_url() ?>index.php/home/con_prostatus"><i class="icon-file-alt"></i><span class="hidden-tablet"> Provider Favo Status</span></a></li>
							</ul>	
						</li>
                                                
                                                <li>
							<a class="dropmenu" href="#"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Reports</span><span class="label label-important"> 2 </span></a>
							<ul>
								<li><a class="submenu" href="<?php echo base_url() ?>index.php/home/pro_snapshot"><i class="icon-file-alt"></i><span class="hidden-tablet"> Provider Snapshot</span></a></li>
								<li><a class="submenu" href="<?php echo base_url() ?>index.php/home/favo_status"><i class="icon-file-alt"></i><span class="hidden-tablet"> Favo Status</span></a></li>
							</ul>	
						</li>

                        
                        <!--                       <li>
                            <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Dropdown</span><span class="label label-important"> 3 </span></a>
                            <ul>
                                <li><a class="submenu" href="submenu.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 1</span></a></li>
                                <li><a class="submenu" href="submenu2.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 2</span></a></li>
                                <li><a class="submenu" href="submenu3.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Sub Menu 3</span></a></li>
                            </ul>	
                        </li>-->
                         </ul>
                </div>
            </div>
            <!-- end: Main Menu -->

            <noscript>
            <div class="alert alert-block span10">
                <h4 class="alert-heading">Warning!</h4>
                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
            </div>
            </noscript>

            <!-- start: Content -->
            <div id="content" class="span10">


                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="index.html">Home</a> 
                        <i class="icon-angle-right"></i>
                    </li>
                    <li><a href="#">Dashboard</a></li>
                </ul>
<?php
//echo "<pre>"; print_r($skillslist_detail->result_array()); die;

//$this->load->view($viewpage . '.php');
?> 
