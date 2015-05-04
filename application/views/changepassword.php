<script type="text/javascript">
	$(document).ready(function() {
		$("#change_password").validate({
			rules: {
							
				password: "required",
				cnfPassword: {required: true,equalTo: "#password"}				
				
				//shipping_charges: { check: true }
			} 
			
		});
	});
</script>
<style type="text/css">
    * { font-family:Verdana, Arial, Helvetica, sans-serif; }     
	label.error { width: 130px; display: block; float: right; color: red;  text-align:left; font-size:12px; }
</style> 
  <?php
 $attributes = array('class' => 'changePassword', 'id' => 'change_password','name' => 'change_password');

#########################################

$newPassword=array(
			'name'	=>	'password',
			'id'	=>	'password',
			'type'  =>'password',
			'maxlength'=>'20',
			'size'=>'20'
			/*'class'=>'inputText' */
			);
$cnfPassword=array(
			'name'	=>	'cnfPassword',
			'id'	=>	'cnfPassword',
			'type'  =>'password',
			'maxlength'=>'20',
			'size'=>'20'
			/*'class'=>'inputText' */
			);
$submit=array(
			'name'	=>	'submit',
			'id'	=>	'submit',
			'value'	=>	'Submit'		
			  )
#################################################################


?>
     
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"> 
     <tr style="background-color:#5089BE; color:#FFFFFF; text-align:left;">   
        <td align="center"  class="title"><?php echo $page_title;?></td>    
    </tr> 
    <tr>
        <td  height="5px">&nbsp;</td>
    </tr>
    <tr>
    	<td align="center">
			<?php 	echo form_open('home/changePassword',$attributes);?>					
            
                <table cellpadding="0" cellspacing="0" border="0" style="border:1px solid #B6CFE6;">
                <?php 
    if($this->session->flashdata(1)) {?>
    <tr>
    	<td colspan="2" align="center"><font color="#FF0000">Password changed successfully.</font></td>
    </tr>
    <?php }elseif($this->session->flashdata(0)){?>
		
		 <tr>
    	<td colspan="2" align="center"><font color="#FF0000">password Not changed.</font></td>
    </tr>
	<?php	} ?>
                <tr>
                    <td class="Text">New Password</td>
                    <td class="Text"><?php echo form_input($newPassword); ?></td>					
                </tr>
                <tr>
                    <td class="Text">Confirm Password</td>
                    <td class="Text"><?php echo form_input($cnfPassword); ?></td>					
                </tr>
                <tr>
                    <td colspan="2" class="Text" align="center">
                    <input type="hidden" name="adminId" value=""/>
                    <input type="button" name="cancle" value="Cancle" onClick="history.back();"/>&nbsp;&nbsp;<?php echo form_submit($submit); ?></td>										
                </tr>			
                </table>
            </form>				
                                    
            <?php echo form_close();?>
        </td>
    
    </tr>
   
</table>   
