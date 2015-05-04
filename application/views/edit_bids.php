<?php 
 //if(in_array(3,$edit_data[0])){echo 'cdf'; }

/*echo "<pre>";print_r($edit_data[0]);
*/?><script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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

$serviceList = $this->servicemodel->servicelist();
foreach ($serviceList->result_object() as $row){
   $service_option[$row->id] = $row->name;
 }
 
$query = $this->db->query("SELECT id, first_name ,last_name FROM `users` ");
  
foreach ($query->result_object() as $row){
   $user_option[$row->id] = $row->first_name .' '.$row->last_name;
 }

$attributes = array('class' => '', 'id' => 'edit_profile','name' => 'edit_profile');

 
 #########################################
if($edit_data[0]['id']>0){

            $upgrade_option=array(
				'name'	=>	'upgrade_option',
				'id'	=>	'upgrade_option',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['upgrade_option']				
				);
				
			$country=array(
				'name'	=>	'country',
				'id'	=>	'country',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['country']				
				);
				
				
		    $my_availability=array(
				'name'	=>	'my_availability',
				'id'	=>	'my_availability',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['my_availability']				
				);
				
		 $time_slot1=array(
				'name'	=>	'time_slot1',
				'id'	=>	'time_slot1',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['time_slot1']				
				);
				
				
		$time_slot2=array(
				'name'	=>	'time_slot2',
				'id'	=>	'time_slot2',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['time_slot2']				
				);
				
		$time_slot3=array(
				'name'	=>	'time_slot3',
				'id'	=>	'time_slot3',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['time_slot3']				
				);
		$time_slot4=array(
				'name'	=>	'time_slot4',
				'id'	=>	'time_slot4',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['time_slot4']				
				);
		
		$phone_number=array(
				'name'	=>	'phone_number',
				'id'	=>	'phone_number',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['phone_number']				
				);	
				
		$comments=array(
				'name'	=>	'comments',
				'id'	=>	'comments',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['comments']				
				);	
	$job_desc=array(
				'name'	=>	'job_description',
				'id'	=>	'job_description',
				'maxlength'=>'1000',
				'size'=>'50',
				'value'=>$edit_data[0]['job_description']	
  				);	
				
	$lat=array(
				'name'	=>	'lat',
				'id'	=>	'lat',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['lat']	
  				);	
				
	$lon=array(
				'name'	=>	'lon',
				'id'	=>	'lon',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['lon']	
  				);							
		
	$address=array(
				'name'	=>	'address',
				'id'	=>	'address',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['address']	
  				);			
			
 		$city=array(
				'name'	=>	'city',
				'id'	=>	'city',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['city']	
  				);	
				
 		$state=array(
				'name'	=>	'state',
				'id'	=>	'state',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['state']	
  				);	
		$zip=array(
				'name'	=>	'zip',
				'id'	=>	'zip',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['zip']	
  				);			
				
 					
     $submit=array(
			'name'	=>	'submit',
			'id'	=>	'submit',
			'value'	=>	'Update'
			);
			
	$bid_id=array(
				'name'	=>	'id',
				'id'	=>	'id',
 				'value'=>$edit_data[0]['id'],
				'type' =>'hidden'				
				);

}else{
  $upgrade_option=array(
				'name'	=>	'upgrade_option',
				'id'	=>	'upgrade_option',
				'maxlength'=>'100',
				'size'=>'50'
				);
				
			$country=array(
				'name'	=>	'country',
				'id'	=>	'country',
				'maxlength'=>'100',
				'size'=>'50'
				);
				
				
		    $my_availability=array(
				'name'	=>	'my_availability',
				'id'	=>	'my_availability',
				'maxlength'=>'100',
				'size'=>'50'
				);
				
		$time_slot1=array(
				'name'	=>	'time_slot1',
				'id'	=>	'time_slot1',
				'maxlength'=>'100',
				'size'=>'50'
 				);
				
				
		$time_slot2=array(
				'name'	=>	'time_slot2',
				'id'	=>	'time_slot2',
				'maxlength'=>'100',
				'size'=>'50'
 				);
				
		$time_slot3=array(
				'name'	=>	'time_slot3',
				'id'	=>	'time_slot3',
				'maxlength'=>'100',
				'size'=>'50'
 				);
		$time_slot4=array(
				'name'	=>	'time_slot4',
				'id'	=>	'time_slot4',
				'maxlength'=>'100',
				'size'=>'50'
 				);
		
		$phone_number=array(
				'name'	=>	'phone_number',
				'id'	=>	'phone_number',
				'maxlength'=>'100',
				'size'=>'50'
				);	
				
		$comments=array(
				'name'	=>	'comments',
				'id'	=>	'comments',
				'maxlength'=>'100',
				'size'=>'50'
 				);	
				
  		$job_desc=array(
				'name'	=>	'job_description',
				'id'	=>	'job_description',
				'maxlength'=>'1000',
				'size'=>'50',
  				);
					
		$bid_id=array(
				'name'	=>	'id',
				'id'	=>	'id',
 				'value'=>'',
				'type' =>'hidden'				
				);	
				
		$lat=array(
				'name'	=>	'lat',
				'id'	=>	'lat',
				'maxlength'=>'100',
				'size'=>'50',
   				);	
				
	$lon=array(
				'name'	=>	'lon',
				'id'	=>	'lon',
				'maxlength'=>'100',
				'size'=>'50',
   				);							
		
	$address=array(
				'name'	=>	'address',
				'id'	=>	'address',
				'maxlength'=>'100',
				'size'=>'50',
   				);			
			
 		$city=array(
				'name'	=>	'city',
				'id'	=>	'city',
				'maxlength'=>'100',
				'size'=>'50',
   				);	
				
 		$state=array(
				'name'	=>	'state',
				'id'	=>	'state',
				'maxlength'=>'100',
				'size'=>'50',
   				);	
		$zip=array(
				'name'	=>	'zip',
				'id'	=>	'zip',
				'maxlength'=>'100',
				'size'=>'50',
   				);			
				
		
 				
     $submit=array(
			'name'	=>	'submit',
			'id'	=>	'submit',
			'value'	=>	'Insert'
			);

}




#################################################################
?>
  
<!-- CONTENT START -->
    <div class="grid_16" id="content">
    <!--  TITLE START  --> 
    <div class="grid_9">
    <h1 class="users"> 
     <?php if(isset($edit_data[0]['id']))
	         echo 'Edit User';
		 else
		   echo 'Add User';
    ?>
    </h1>
    </div>
    <!--RIGHT TEXT/CALENDAR-->
    <!--<div class="grid_6" id="eventbox"><a href="#" class="inline_calendar">You don't have any events for today! Yay!</a>
    	<div class="hidden_calendar"></div>
    </div>-->
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
        <div class="portlet-header fixed"><img src="<?php echo base_url().'layout/';?>images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /> Last Registered users Table Example</div>
		<div class="portlet-content nopadding">
         <?php echo form_open('bids/save_bids',$attributes);?>
         
         <div class="form-element">
			<span id="text_name">Service name</span>
			<span id="text_name"> : </span>
			 <?php
			  if($edit_data[0]['id']>0){echo form_dropdown('service', $service_option, $edit_data[0]['service_id']); 
			 }else{
			  echo form_dropdown('service', $service_option);
			 }?>
		 </div>
         <div class="form-element">
			<span id="text_name">User</span>
			<span id="text_name"> : </span>
			<span>
             <?php
			 
			 if($edit_data[0]['id']>0){echo form_dropdown('user', $user_option, $edit_data[0]['user_id']);
			 }else{
			   echo form_dropdown('user', $user_option);
			 }

			  ?>
            </span>
		 </div>
 
           <div class="form-element">
			<span id="text_name">Upgrade Option</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($upgrade_option); ?></span>
		  </div>
          <div class="form-element">
			<span id="text_name">Job Description</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($job_desc); ?></span>
		  </div>
          
           <div class="form-element">
			<span id="text_name">Latitude </span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($lat); ?></span>
		  </div>
           <div class="form-element">
			<span id="text_name">Longitude  </span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($lon); ?></span>
		  </div>
          <div class="form-element">
			<span id="text_name">Address  </span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($address); ?></span>
		  </div>
          
          <div class="form-element">
			<span id="text_name">City  </span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($city); ?></span>
		  </div>
          
          <div class="form-element">
			<span id="text_name">State  </span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($state); ?></span>
		  </div>
         
          <div class="form-element">
			<span id="text_name">Zip  </span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($zip); ?></span>
		  </div>
          <div class="form-element">
			<span id="text_name">Country</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($country); ?></span>
		 </div>
          <div class="form-element">
			<span id="text_name">my Availability</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($my_availability); ?></span>
		 </div>
         
         <div class="form-element">
			<span id="text_name">Time_Slot1</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($time_slot1); ?></span>
		 </div>
         
         <div class="form-element">
			<span id="text_name">Time_Slot2</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($time_slot2); ?></span>
		 </div>
         
         <div class="form-element">
			<span id="text_name">Time_Slot3</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($time_slot3); ?></span>
		 </div>
         
         <div class="form-element">
			<span id="text_name">Time_Slot4</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($time_slot4); ?></span>
		 </div>
         
          <div class="form-element">
			<span id="text_name">Phone Number</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($phone_number); ?></span>
		 </div>
         
         <div class="form-element">
			<span id="text_name">Comments</span>
			<span id="text_name"> : </span>
			<span><?php echo form_input($comments); ?></span>
		 </div>
             <?php echo form_input($bid_id); ?>
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
