<?php
   //echo "<pre>";print_r($service_plan_list);die;?>
 <script type="text/javascript">
	$(document).ready(function() {
		$("#edit_coupon").validate({
			rules: {
				name : "required" ,
				code : "required" ,
 				discount : "required" ,
				total_amount : "required" ,
				date_start : "required" ,
				date_end : "required" ,
				user_per_coupon : "required" ,
				user_per_customer : "required" 
 			} ,
			messages: {
			name: "Please enter name" ,
			code: "Please enter  code " ,
			discount: "Please enter  discount " ,
			total_amount: "Please enter  total amount ",
 			date_start: "Please enter  date start ",
			date_end: "Please enter  date end ",
			user_per_coupon: "Please enter  user per coupon ",
			user_per_customer: "Please enter  user per customer "
  		},
 		});
		
		$('#allbox').click(function () {
         var checked = $(this).is(':checked');            
        $('.checkbox').each(function () {
            var checkBox = $(this);               
            if (checked) {
                checkBox.prop('checked', true);                
            }
            else {
                checkBox.prop('checked', false);                
            }
        });

    });
	});
</script>
<?php
$attributes = array('class' => '', 'id' => 'edit_coupon','name' => 'edit_coupon');

$service_plan_options = array();
foreach($service_plan_list as $k=>$v){
$service_plan_options[$v['serviceplan_id']]= $v['name']; 
}
$login_require = array(
	1=>'yes',
	0=>'no'
	);
	
$free_shipping = array(
	1=>'yes',
	0=>'no'
	);
	
$type = array(
	1=>'Percentage',
	2=>'Fixed Amount'
	);
	
#########################################
if($edit_data[0]['coupon_id']>0){
 
$name=array(
			'name'	=>	'name',
			'id'	=>	'name',
			'maxlength'=>'100',
			'size'=>'50',
			'value'=>$edit_data[0]['name'],
			'class'=>'inputText' 
			);
			
			
$code=array(
			'name'	=>	'code',
			'id'	=>	'code',
			'maxlength'=>'100',
			'size'=>'50',
			'value'=>$edit_data[0]['code'],
			'class'=>'inputText' 
			);
			
		$discount=array(
			'name'	=>	'discount',
			'id'	=>	'discount',
			'maxlength'=>'100',
			'size'=>'50',
			'value'=>$edit_data[0]['discount'],
			'class'=>'inputText' 
			);
 
		$total_amount=array(
				'name'	=>	'total_amount',
				'id'	=>	'total_amount',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['total_amount'],
				'type' =>'text'				
				);		
				
	
					
		$date_end=array(
				'name'	=>	'date_end',
				'id'	=>	'date_end',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['date_end'],
				'type' =>'text'				
				);		
				
		$date_start=array(
				'name'	=>	'date_start',
				'id'	=>	'date_start',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['date_start'],
				'type' =>'text'				
				);	
				
		$user_per_coupon=array(
				'name'	=>	'user_per_coupon',
				'id'	=>	'user_per_coupon',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['user_per_coupon'],
				'type' =>'text'				
				);	
				
		$user_per_customer=array(
				'name'	=>	'user_per_customer',
				'id'	=>	'user_per_customer',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['user_per_customer'],
				'type' =>'text'				
				);					
        $id=array(
				'name'	=>	'id',
				'id'	=>	'id',
				'maxlength'=>'100',
				'size'=>'50',
				'value'=>$edit_data[0]['coupon_id'],
 				'type' =>'hidden'				
				);		
			
$submit=array(
			'name'	=>	'submit',
			'id'	=>	'submit',
			'value'	=>	'Update'
 			  );
}else{
 $name=array(
			'name'	=>	'name',
			'id'	=>	'name',
			'maxlength'=>'100',
			'size'=>'50',
 			'class'=>'inputText' 
			);
 			
$code=array(
			'name'	=>	'code',
			'id'	=>	'code',
			'maxlength'=>'100',
			'size'=>'50',
 			'class'=>'inputText' 
			);
			
		$discount=array(
			'name'	=>	'discount',
			'id'	=>	'discount',
			'maxlength'=>'100',
			'size'=>'50',
 			'class'=>'inputText' 
			);
 
		$total_amount=array(
				'name'	=>	'total_amount',
				'id'	=>	'total_amount',
				'maxlength'=>'100',
				'size'=>'50',
 				'type' =>'text'				
				);		
 	
 		$date_end=array(
				'name'	=>	'date_end',
				'id'	=>	'date_end',
				'maxlength'=>'100',
				'size'=>'50',
 				'type' =>'text'				
				);		
				
		$date_start=array(
				'name'	=>	'date_start',
				'id'	=>	'date_start',
				'maxlength'=>'100',
				'size'=>'50',
 				'type' =>'text'				
				);	
				
		$user_per_coupon=array(
				'name'	=>	'user_per_coupon',
				'id'	=>	'user_per_coupon',
				'maxlength'=>'100',
				'size'=>'50',
 				'type' =>'text'				
				);	
				
		$user_per_customer=array(
				'name'	=>	'user_per_customer',
				'id'	=>	'user_per_customer',
				'maxlength'=>'100',
				'size'=>'50',
 				'type' =>'text'				
				);	
		$id=array(
				'name'	=>	'id',
				'id'	=>	'id',
				'maxlength'=>'100',
				'size'=>'50',
  				'type' =>'hidden'				
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
	         echo 'Edit Coupon';
		 else
		   echo 'Add Coupon';
    ?>
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
     <div class="portlet">
        <div class="portlet-header fixed"><img src="<?php echo base_url().'layout/';?>images/icons/user.gif" width="16" height="16" alt="Latest Registered Users" /> Service Plan Edit</div>
		<div class="portlet-content nopadding">
         <?php echo form_open_multipart('coupon/save_coupon',$attributes);?>
             <div class="form-element">
                <span id="text_name">Coupon name</span>
                <span id="text_name"> : </span>
                <span><?php echo form_input($name); ?></span>
		    </div>
            
           <div class="form-element">
                <span id="text_name">Code</span>
                <span id="text_name"> : </span>
               <span><?php echo form_input($code); ?></span>
		   </div>
           
           <div class="form-element">
                <span id="text_name">Type</span>
                <span id="text_name"> : </span>
                <span>  <?php echo form_dropdown('type', $type, $edit_data[0]['status']);?></span>
		   </div>
            <div class="form-element">
                <span id="text_name">Discount</span>
                <span id="text_name"> : </span>
                 <span><?php echo form_input($discount); ?></span>
 		   </div>
           
           <div class="form-element">
                <span id="text_name">Total Amount</span>
                <span id="text_name"> : </span>
                 <span><?php echo form_input($total_amount); ?></span>
 		   </div>
           
            
           
            <div class="form-element">
                <span id="text_name">Login Require</span>
                <span id="text_name"> : </span>
                <span>  <?php echo form_dropdown('login_require', $login_require, $edit_data[0]['login_require']);?></span>
		   </div>
            
            <div class="form-element">
                <span id="text_name">Free Shipping</span>
                <span id="text_name"> : </span>
                <span>  <?php echo form_dropdown('free_shipping', $free_shipping, $edit_data[0]['free_shipping']);?></span>
		   </div>
            
            <div class="form-element">
                <span id="text_name">Date Start(yyyy-mm-dd)</span>
                <span id="text_name"> : </span>
                 <span><?php echo form_input($date_start); ?></span>
 		   </div>
           
            <div class="form-element">
                <span id="text_name">Date End(yyyy-mm-dd)</span>
                <span id="text_name"> : </span>
                 <span><?php echo form_input($date_end); ?></span>
 		   </div>
           
            <div class="form-element">
                <span id="text_name">User Per Coupon</span>
                <span id="text_name"> : </span>
                 <span><?php echo form_input($user_per_coupon); ?></span>
 		   </div>
           
            <div class="form-element">
                <span id="text_name">Service Plan</span>
                <span id="text_name"> : </span>
                <span>  <?php echo form_dropdown('service_plan', $service_plan_options, $edit_data[0]['service_plan']);?></span>
		   </div>
           
            <div class="form-element">
                <span id="text_name">User Per Customer</span>
                <span id="text_name"> : </span>
                 <span><?php echo form_input($user_per_customer); ?></span>
 		   </div>
           
           <div class="form-element">
                 <span><?php echo form_input($id); ?></span>	 
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
