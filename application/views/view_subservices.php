  <?php 
  error_reporting(0);
 //echo "<pre>";print_r($edit_data);die;  
 
  
  ?>
    
 
<style>
.textarea {width:170; height:100px;}


</style>

   
<!-- CONTENT START -->
    <div class="grid_16" id="content">
    <!--  TITLE START  --> 
    <div class="grid_9">
    <h1 class="users"> 
	   View Sub service 
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
        <div class="portlet-header fixed"><img src="<?php echo base_url().'layout/';?>images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" />  </div>
        
        <div class="portlet-header fixed"><h1><?php echo $edit_data[0]['name']; ?></h1></div>
		<div class="portlet-content nopadding">
               <div class="form-element ">
                <span id="text_name">Sub Service Name</span>
                <span id="text_name"> : </span>
                <span id="text_name"><?php echo $edit_data[0]['attribute_name']; ?></span>
		    </div>
            
           
           <div class="form-element">
                <span id="text_name">Link To Category</span>
                <span id="text_name"> : </span>
                <span id="text_name">  
				
				 <?php 
				$query ="SELECT c.name AS service, p.name AS segment, (SELECT name FROM `skills` WHERE id = p.parent_id) AS category
						FROM `skills` AS c
						LEFT JOIN `skills` p ON c.parent_id = p.id
						WHERE c.id ='".$edit_data[0]['service_id']."' ";
						$query_str=$this->db->query($query);
  	             	$row1 = $query_str->result_object();
					echo $row1[0]->category.' > '.$row1[0]->segment.' > '.$row1[0]->service;
				
				?>
 				 </span>
		   </div>
            	
           <div class="form-element">
                <span id="text_name">What You Get(Description)</span>
                <span id="text_name"> : </span>
                <div style=" background:#ccc">
                <?php  echo $edit_data[0]['description'];?>
                  </div>
		   </div>
           
           <div class="form-element">
                <span id="text_name">Image</span>
                <span id="text_name"> : </span>
                <span><img src="<?php echo base_url().'application/uploads/'.$edit_data[0]['image']?>" title="<?php echo $row2->image?>" style="max-height:100px; max-width:100px;"/></span>
  		   </div>
          </div> 
          
          
          <div class="portlet-header fixed"></div>
		
          <div class="portlet-header fixed"></div>
		
           
          <a href="<?php echo base_url().'service/servicelist/';?>" class="btn-ok"  title="OK">Ok</a> 
           
         
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
