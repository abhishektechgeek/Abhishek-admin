  <?php 
  error_reporting(0);
// echo "<pre>";print_r($edit_data); 
     ?>
    
 
<style>
.textarea {width:170; height:100px;}


</style>

   
<!-- CONTENT START -->
    <div class="grid_16" id="content">
    <!--  TITLE START  --> 
    <div class="grid_9">
    <h1 class="users"> 
	   View User Profile 
    </h1>
    </div>
    
    <div class="clear">
    </div>
    <!--  TITLE END  -->    
    <!-- #PORTLETS START -->
    <div id="portlets">
    <!-- FIRST SORTABLE COLUMN START -->
      <div class="column" id="left">
      <!--THIS IS A PORTLET-->
		<div class="portlet">
            
        </div>      
      <!--THIS IS A PORTLET-->
        <div class="portlet">
		
        </div>
      </div>
      <!-- FIRST SORTABLE COLUMN END -->
      <!-- SECOND SORTABLE COLUMN START -->
      <div class="column">
      <!--THIS IS A PORTLET-->        
      
      <!--THIS IS A PORTLET--> 
      <div class="portlet">
        </div>                         
    </div>
	<!--  SECOND SORTABLE COLUMN END -->
    <div class="clear"></div>
    <!--THIS IS A WIDE PORTLET-->
    <?php //echo "<pre>";print_r($user_listing);die;?>
    
    <div class="portlet" >
        <div class="portlet-header fixed"><img src="<?php echo base_url().'layout/';?>images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /> </div>
        
        <div class="portlet-header fixed"><h2><?php echo $edit_data[0]['first_name'] .' '.$edit_data[0]['last_name']; ?></h2>
        <span id="text_name">User Type</span>
                <span id="text_name"> : </span>
                <span id="text_name">  
        <?php if($edit_data[0]['type'] == '1') {
		         echo 'Consumer';
		      }else  if($edit_data[0]['type'] =='2') {
		         echo 'Service Provider';
		      }else {
			  
			  echo 'Both Consumer and Service Provider';
			  }
 		?>
        </span>
        <br/>
         <span id="text_name">Skills</span>
                <span id="text_name"> : </span>
                <span id="text_name">  
          <?php 
		  $skills = array();
		   foreach($edit_data_skills as $key =>$record){
		      $skills[] = $record['name'];
 		   }
		   echo implode(',',$skills);
		  
		  ?>
        </span>
       
        
        
        <h2>Bid List</h2>
        </div>
        <?php foreach($edit_data as $key =>$record){?>
		<div class="portlet-content nopadding">
               <div class="form-element ">
                  <span id="text_name">Service Name</span>
                <span id="text_name"> : </span>
                <span id="text_name"><?php echo $record['name']; ?></span>
		      </div>
              
               <div class="form-element">
                <span id="text_name">Job Description</span>
                <span id="text_name"> : </span>
                <span id="text_name">  
				<?php echo $record['job_description']; ?> 
  				 </span>
		   </div>
           
           <div class="form-element">
                <span id="text_name">My Availability</span>
                <span id="text_name"> : </span>
                <span id="text_name">  
				<?php echo $record['my_availability']; ?> 
  				 </span>
		   </div>
           
           <div class="form-element">
                <span id="text_name">Time Slots</span>
                <span id="text_name"> : </span>
                <span id="text_name">  
				<?php echo $record['time_slot1'].'    '.$record['time_slot2'].'    '.$record['time_slot3'].'    '.$record['time_slot4']; ?> 
  				 </span>
		   </div>
              
            <div class="form-element">
                <span id="text_name">Status</span>
                <span id="text_name"> : </span>
                <span id="text_name">  
				<?php if($record['approved'] == '1') { echo 'Approved';}else {echo 'Pending';}?>
  				 </span>
		   </div>
           
           
         </div> <?php }?>
          
          
          <div class="portlet-header fixed"></div>
		  
          
       
		  
           
          <a href="<?php echo base_url().'user/userlist/';?>" class="btn-ok"  title="OK">Ok</a> 
           
         
         </div>  
	 

		</div>
      </div>
<!--  END #PORTLETS -->  
   </div>
    <div class="clear"> </div>
<!-- END CONTENT-->    
  </div>
<div class="clear"> </div>

		<!-- This contains the hidden content for modal box calls -->
		
</div>
<!-- WRAPPER END -->
