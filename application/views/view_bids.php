  <?php 
  error_reporting(0);
 /* echo "<pre>";print_r($edit_resonse_data); */
     ?>
    
 
<style>
.textarea {width:170; height:100px;}


</style>

   
<!-- CONTENT START -->
    <div class="grid_16" id="content">
    <!--  TITLE START  --> 
    <div class="grid_9">
    <h1 class="users"> 
	   View Bids Detail 
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
        <div class="portlet-header fixed"><img src="<?php echo base_url().'layout/';?>images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /> Consumer Name</div>
        
        <div class="portlet-header fixed"><h1><?php echo $edit_data[0]['first_name'] .' '.$edit_data[0]['first_name']; ?></h1></div>
		<div class="portlet-content nopadding">
               <div class="form-element ">
                 
                <h2>Genral</h2>
                <span id="text_name">Service Name</span>
                <span id="text_name"> : </span>
                <span id="text_name"><?php echo $edit_data[0]['name']; ?></span>
		    </div>
            
           
           <div class="form-element">
                <span id="text_name">Job Description</span>
                <span id="text_name"> : </span>
                <span id="text_name">  <?php echo $edit_data[0]['job_description']; ?></span>
		   </div>
            	
           <div class="form-element">
                <span id="text_name">Status</span>
                <span id="text_name"> : </span>
                <span id="text_name">
                <?php 
				if($edit_data[0]['approved'] == '1')
			        $status = 'Approved';
			    else
			        $status = 'Pending';
 				 echo $status ;?>
                 </span>  
		   </div>
           </div> 
           <div class="portlet-header fixed"></div>
		     <div class="portlet-content nopadding">
               <div class="form-element ">
                 
                <h2>Notifications</h2>
                <div id="text_name">Descripotion</div>
                
                <div id="text_name"><?php echo $edit_data[0]['upgrade_description']; ?></div>
		    </div>
            
           <?php 
		   foreach($edit_notification_data as $attr_data){?>
           <div class="form-element">
               <span id="text_name">Bid Id</span>
                <span id="text_name"> : </span>
                <span id="text_name"><?php echo $attr_data['bids_id'];?></span>
           </div>      
            <div class="form-element">   
                <span id="text_name">Service provider Name</span>
                <span id="text_name"> : </span>
                <span id="text_name"><?php echo $attr_data['first_name'].'  '.$attr_data['last_name'];?></span>
           </div>
			  
			 <?php 	}		   ?>
          
           
          </div> 
          
          <div class="portlet-header fixed"></div>
		<div class="portlet-content nopadding">
                
                 
                <h2>Responses</h2>
                
                
                  <?php 
		   foreach($edit_resonse_data as $resonse_data){?>
           <div class="form-element">
               <span id="text_name">Price</span>
                <span id="text_name"> : </span>
                <span id="text_name"><?php echo $resonse_data['price'];?></span>
           </div>      
           <div class="form-element">
               <span id="text_name">Avilabilty</span>
                <span id="text_name"> : </span>
                <span id="text_name"><?php echo $resonse_data['avilabilty'];?></span>
           </div>  
           
            <div class="form-element">   
                <span id="text_name">Time</span>
                <span id="text_name"> : </span>
                <span id="text_name"><?php echo $resonse_data['time'];?></span>
           </div>
           
              <div class="form-element">   
                <span id="text_name">Service provider Name</span>
                <span id="text_name"> : </span>
                <span id="text_name"><?php echo $resonse_data['first_name'].'  '.$resonse_data['last_name'];?></span>
           </div>
			  
			 <?php 	}		   ?>
		  
            
           
          
           
          </div> 
           
          <a href="<?php echo base_url().'bids/bidslist/';?>" class="btn-ok"  title="OK">Ok</a> 
           
         
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
