<?php 
 //if(in_array(3,$edit_data[0])){echo 'cdf'; }
//echo "<pre>";print_r($edit_data[0]['menus']);die;?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
<script src="<?php echo base_url().'layout/';?>js/editor/jquery.wysiwyg.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url().'layout/';?>js/editor/src/dialogs/default.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url().'layout/';?>js/editor/controls/wysiwyg.image.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url().'layout/';?>js/jquery.colorbox.js" type="text/javascript"></script>
<style>
.tem_area{dispay:none}

.wysiwyg{width:323px!important}
</style>
<script type="text/javascript" charset="utf-8">
	//<![CDATA[
		$(document).ready(function(){
            jQuery('a.gallery').colorbox();
			
			jQuery('.tem_area').hide();
			
 			$('#message').wysiwyg({
				controls:"bold,italic,|,undo,redo,image"
			});
			
			$('#offers').wysiwyg({
				controls:"bold,italic,|,undo,redo,image"
			});
			
			$('#side_content').wysiwyg({
				controls:"bold,italic,|,undo,redo,image"
			});
			
			$('#main_content').wysiwyg({
				controls:"bold,italic,|,undo,redo,image"
			});
			
			$('[name="template"]').change(function() {
			var tem_option = $('[name="template"]').val();
			if(tem_option >0){
			   $('#message_area').hide();
			    $('#view_link').show();
				jQuery('.tem_area').show();
			  }else{
			  
			  $('#message_area').show();
			    $('#view_link').hide();
				jQuery('.tem_area').hide();
			  }
 			});
				
			 
		});
	//]]>
	</script>
	<link rel="stylesheet" href="<?php echo base_url().'layout/';?>js/editor/jquery.wysiwyg.css" type="text/css" media="screen" charset="utf-8" />
	<!--<link rel="stylesheet" href="../src/dialogs/default.css" type="text/css" media="screen" charset="utf-8" />-->
	<style type="text/css" media="screen">
		#container{ width:900px; }
	</style>

<?php //include 'header.php';?>
<script type="text/javascript">
	$(document).ready(function() {
		$("#edit_profile").validate({
			rules: {
				first_name : "required",
				last_name : "required",
				gender : "required",
 				email: {
						required: true,
						email: true
						},
				password : {
				            required:true,
 							minlength: 5,
							maxlength: 9							
							}, 	
				confirm_password:{
							required : true,
							equalTo : "#password"
							},		
 				birthday : "required"			
 			} ,
			messages: {
			first_name: "Please enter  first name",
			first_name: "Please enter  last name",
			gender: "Please enter gender",
			city : "Please enter city",
 			email: {
						required: "Please enter email address",
						email: "Invalide email address"
					},
			password :{
						required: "Please enter password",
						minlength: "Minimum length is 5",
						maxlength: "Maximum lenght is 9"					
					},			
			
			birthday :"Please enter birthday",
 		},
			
		});
	});
</script>


 
<?php
$from = 0;
$query2 = $this->db->query("SELECT * FROM `admin` WHERE id = '".$edit_data[0]['id']."'");
$row2 = $query2->row();

  
 $query3 = $this->db->query("SELECT type FROM `users_level` WHERE user_id = '".$edit_data[0]['id']."'");
 $row3 = $query3->row();
 //echo "<pre>";print_r( $row3);die;
 
   $query = $this->db->query("SELECT group_id,group_name FROM `group` ");
  
foreach ($query->result_object() as $row){
   $group_option[$row->group_id] = $row->group_name;
 }

$attributes = array('class' => '', 'id' => 'edit_profile','name' => 'edit_profile');

 
 #########################################
 

$gender_option = array(
'm'=>'Male',
'f'=>'Female',
);

$template_option = array(
'0'=>'Select Tempale',
'1'=>'Chirstmas Tempale',
'2'=>'New Year'
);

$from_option = array(
0=>'Default'
);

$to_option = array(
1=>'All Customers',
2=>'All Service Providers',
3=>'Both',
);


$subject=array(
			'name'	=>	'Subject',
			'id'	=>	'Subject',
			'maxlength'=>'100',
			'size'=>'50',
			'value'=>''
 			);
			
$title=array(
			'name'	=>	'title',
			'id'	=>	'title',
			'maxlength'=>'100',
			'size'=>'50',
			'value'=>''
 			);
			

 			
 
 					
$submit=array(
			'name'	=>	'submit',
			'id'	=>	'submit',
			'value'	=>	'Send'
 			  );

 



#################################################################
?>
  
<!-- CONTENT START -->
<!--<div id="container">
		<textarea id="editor" style="width:800px;"></textarea>
	</div> -->
    <div class="grid_16" id="content">
    <!--  TITLE START  --> 
    <div class="grid_9">
    <h1 class="users"> 
    Newsletter
    </h1>
    </div>
    <!--RIGHT TEXT/CALENDAR-->
    <div class="grid_6" id="eventbox"><a  href="http://skookumconcierge.com/skookummobile/festive_mail_preview.php" class="inline_calendar">view Email Template</a>
    	<div class="hidden_calendar"></div>
    </div>
    <!--RIGHT TEXT/CALENDAR END-->
    <div class="clear">
    </div>
    <!--  TITLE END  -->    
    <!-- #PORTLETS START -->
    <div id="portlets">
    <!-- FIRST SORTABLE COLUMN START -->
      <div class="column" id="left">
      <!--THIS IS A PORTLET-->
		<div class="portlet">
            <!--<div class="portlet-header"><img src="<?php echo base_url().'layout/';?>images/icons/chart_bar.gif" width="16" height="16" alt="Reports" /> Visitors - Last 30 days</div>-->
            <!--<div class="portlet-content">-->
            <!--THIS IS A PLACEHOLDER FOR FLOT - Report & Graphs -->
           <!-- <div id="placeholder" style="width:auto; height:0px;"></div>
            </div>-->
        </div>      
      <!--THIS IS A PORTLET-->
        <div class="portlet">
		<!--<div class="portlet-header">Anything  (no icon too if you like it better)</div>-->

		<!--<div class="portlet-content">
		  <p>This can be any content you want. I placed a basic form here with text editor so you can see the functionality of the forms too.</p>
		  <h3>This is a form</h3>
		  <form id="form1" name="form1" method="post" action="">
		    <label>Some title</label>
		     <input type="text" name="textfield" id="textfield" class="smallInput" />
			<label>Large input box</label>
            <input type="text" name="textfield2" id="textfield2" class="largeInput" />
            <label>This is a textarea</label>
		    <textarea name="textarea" cols="45" rows="3" class="smallInput" id="textarea"></textarea>
            <a class="button"><span>Submit in blue</span></a>
            <a class="button_grey"><span>Submit this form</span></a>
		  </form>
		  <p>&nbsp;</p>
		</div>-->
        </div>
      </div>
      <!-- FIRST SORTABLE COLUMN END -->
      <!-- SECOND SORTABLE COLUMN START -->
      <div class="column">
      <!--THIS IS A PORTLET-->        
      <!--<div class="portlet">
		<div class="portlet-header"><img src="<?php echo base_url().'layout/';?>images/icons/comments.gif" width="16" height="16" alt="Comments" />Latest Comments</div>

		<div class="portlet-content">
         <p class="info" id="success"><span class="info_inner">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</span></p>
    <p class="info" id="error"><span class="info_inner">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</span></p>
    <p class="info" id="warning"><span class="info_inner">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</span></p>
<p class="info" id="info"><span class="info_inner">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</span></p>
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
       </div>-->    
      <!--THIS IS A PORTLET--> 
      <div class="portlet">
		<!--<div class="portlet-header"><img src="<?php echo base_url().'layout/';?>images/icons/feed.gif" width="16" height="16" alt="Feeds" />Your selected News source					</div>-->
		<!--<div class="portlet-content">
        <ul class="news_items">
        	<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean  adipiscing massa quis arcu interdum scelerisque. Duis vitae nunc nisi.  Quisque eget leo a nibh gravida vulputate ut sed nulla. <a href="#">Donec quis  lectus turpis, sed mollis nibh</a>. Donec ut mi eu metus ultrices  porttitor. Phasellus nec elit in nisi</li>
            <li>Nunc convallis, enim quis tincidunt dictum, ante ipsum  interdum massa, consequat sodales arcu magna nec eros.<a href="#"> Vivamus nec  placerat odio.</a> Sed nec mi sed orci mattis feugiat. Etiam est dui,  rutrum nec dictum vel, accumsan id sem. </li>
            <li>Nunc convallis, enim quis tincidunt dictum, ante ipsum  interdum massa, consequat sodales arcu magna nec eros.<a href="#"> Vivamus nec  placerat odio.</a> Sed nec mi sed orci mattis feugiat. Etiam est dui,  rutrum nec dictum vel, accumsan id sem. </li>
            <li>Nunc convallis, enim quis tincidunt dictum, ante ipsum  interdum massa, consequat sodales arcu magna nec eros.<a href="#"> Vivamus nec  placerat odio.</a> Sed nec mi sed orci mattis feugiat. Etiam est dui,  rutrum nec dictum vel, accumsan id sem. </li>
            <li>Nunc convallis, enim quis tincidunt dictum, ante ipsum  interdum massa, consequat sodales arcu magna nec eros.<a href="#"> Vivamus nec  placerat odio.</a> Sed nec mi sed orci mattis feugiat. </li>
        </ul>
        <a href="#">&raquo; View all news items</a>
        </div>-->
       </div>                         
    </div>
	<!--  SECOND SORTABLE COLUMN END -->
    <div class="clear"></div>
    <!--THIS IS A WIDE PORTLET-->
    <?php //echo "<pre>";print_r($user_listing);die;?>
    <div class="portlet">
     <div class="portlet-header fixed error">
        
        </div>
        
        <div class="portlet-header fixed success">
        <?php echo $this->session->flashdata('success');?> 
        </div>
        <div class="portlet-header fixed"><img src="<?php echo base_url().'layout/';?>images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /> Last Registered users Table Example</div>
		<div class="portlet-content nopadding">
         <?php echo form_open('newsletter/send',$attributes);?>
 
           <div class="form-element">
			<span id="text_name">From</span>
			<span id="text_name"> : </span>
			<span><?php echo form_dropdown('from', $from_option, $from); ?></span>
		 </div>
         
         <div class="form-element">
			<span id="text_name">To</span>
			<span id="text_name"> : </span>
			<span><?php echo form_dropdown('to', $to_option); ?></span>
		 </div>
         
          <div class="form-element">
			<span id="text_name">Email Template</span>
			<span id="text_name"> : </span>
			<span><?php echo form_dropdown('template', $template_option ,0); ?></span>
		 </div>
         
         <div class="form-element">
			<span id="text_name">Subject</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($subject); ?></span>
		 </div>
         
         <div class="form-element">
			<span id="text_name">Title</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($title); ?></span>
		 </div>
         
         <div class="form-element tem_area" id="main_content_area" >
			<span id="text_name">Main Content</span>
			<span id="text_name"> : </span>
			<span>
            <textarea id="main_content"  name="main_content"></textarea>
            </span>
		 </div>
         
          <div class="form-element tem_area" id="side_content_area" >
			<span id="text_name">Side Content</span>
			<span id="text_name"> : </span>
			<span>
            <textarea id="side_content"  name="side_content" ></textarea>
            </span>
		 </div>
         
         
         <div class="form-element tem_area" id="offers_area" >
			<span id="text_name">Offers</span>
			<span id="text_name"> : </span>
			<span>
            <textarea id="offers"  name="offers" ></textarea>
            </span>
		 </div>
         
         <div class="form-element" id="message_area">
			<span id="text_name">Message</span>
			<span id="text_name"> : </span>
			<span>
            <textarea id="message"  name="message" ></textarea>
            </span>
		 </div>
         <div class="form-element">
  			<span><?php echo form_submit($submit); ?></span>
   	    </div>
 
<?php echo form_close();?>
		</div>
      </div>
<!--  END #PORTLETS -->  
   </div>
    <div class="clear"> </div>
<!-- END CONTENT-->    
  </div>
<div class="clear"> </div>

		<!-- This contains the hidden content for modal box calls -->
		<div class='hidden'>
			<div id="inline_example1" title="This is a modal box" style='padding:10px; background:#fff;'>
			<p><strong>This content comes from a hidden element on this page.</strong></p>
            			
			<p><strong>Try testing yourself!</strong></p>
            <p>You can call as many dialogs you want with jQuery UI.</p>
			</div>
		</div>
</div>
<!-- WRAPPER END -->
<!-- FOOTER START -->
<div class="container_16" id="footer">
Website Administration by <a href="../index.htm">WebGurus</a></div>
<!-- FOOTER END -->
</body>
</html>
