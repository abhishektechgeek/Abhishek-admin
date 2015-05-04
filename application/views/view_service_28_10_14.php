  <?php 
  error_reporting(0);
 // echo "<pre>";print_r($edit_data);die;  
     ?>
    
 
<style>
.textarea {width:170; height:100px;}


</style>

   
<!-- CONTENT START -->
    <div class="grid_16" id="content">
    <!--  TITLE START  --> 
    <div class="grid_9">
    <h1 class="users"> 
	   View service 
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
        <div class="portlet-header fixed"><img src="<?php echo base_url().'layout/';?>images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /> Service Edit</div>
        
        <div class="portlet-header fixed"><h1><?php echo $edit_data[0]['name']; ?></h1></div>
		<div class="portlet-content nopadding">
               <div class="form-element ">
                 
                <h2>Genral</h2>
                <span id="text_name">Service Name</span>
                <span id="text_name"> : </span>
                <span id="text_name"><?php echo $edit_data[0]['name']; ?></span>
		    </div>
            
           
           <div class="form-element">
                <span id="text_name">Link To Category</span>
                <span id="text_name"> : </span>
                <span id="text_name">  
				
				 <?php 
				$query ="SELECT c.name AS service, p.name AS segment, (SELECT name FROM `skills` WHERE id = p.parent_id) AS category
						FROM `skills` AS c
						LEFT JOIN `skills` p ON c.parent_id = p.id
						WHERE c.id ='".$edit_data[0]['id']."' ";
						$query_str=$this->db->query($query);
  	             	$row1 = $query_str->result_object();
					echo $row1[0]->category.' > '.$row1[0]->segment;
				
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
		<div class="portlet-content nopadding">
               <div class="form-element ">
                 
                <h2>Upgrade Option</h2>
                <div id="text_name">Descripotion</div>
                
                <div id="text_name"><?php echo $edit_data[0]['upgrade_description']; ?></div>
		    </div>
            
           <?php 
		   foreach($edit_attr_data as $attr_data){?>
			 <div class="form-element">
			<p><label for="p_scnts"><?php echo $attr_data['attribute_name'];?></label></p>
             </div>
			 <?php 	}		   ?>
          
           
          </div> 
          
          <div class="portlet-header fixed"></div>
		<div class="portlet-content nopadding">
               <div class="form-element ">
                 
                <h2>Specification</h2>
                
                
                <div id="text_name"><h1><?php echo $edit_data[0]['specification']; ?></h1></div>
		    </div>
            
           <?php 
		   foreach($edit_spc_data as $attr_data){?>
			 <div class="form-element">
			<p style=" font-size: 12px; font-weight:bold"><?php echo $attr_data['attribute_name'];?><bold>
             </div>
			 <?php 	}		   ?>
          
           
          </div> 
           
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
