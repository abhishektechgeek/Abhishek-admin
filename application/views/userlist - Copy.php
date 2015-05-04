
<script type="text/javascript" language="javascript">
		$( function() { 
			$( '.checkAll' ).live( 'change', function() {
				$( '.cb-element' ).attr( 'checked', $( this ).is( ':checked' ) ? 'checked' : '' );
				$( this ).next().text( $( this ).is( ':checked' ) ? '' : '' );
			});
			$( '.invertSelection' ).live( 'click', function() {
				$( '.cb-element' ).each( function() {
					$( this ).attr( 'checked', $( this ).is( ':checked' ) ? '' : 'checked' );
				}).trigger( 'change' );
 
			});
			$( '.cb-element' ).live( 'change', function() {
				$( '.cb-element' ).length == $( '.cb-element:checked' ).length ? $( '.checkAll' ).attr( 'checked', 'checked' ).next().text( 'Uncheck All' ) : $( '.checkAll' ).attr( 'checked', '' ).next().text( 'Check All' );
 
			});
		});
</script>

<?php
	if ($this->session->flashdata('msg')){
	  echo $this->session->flashdata('msg');
	}
?>

<?php echo form_open("saller/sendmail");
	$subject=array(
					'name'	=>	'subject',
					'id'	=>	'subject',
					'class'	=>	'fieldtext-1',
					'value'	=>	set_value('subject')
				);
	$body=array(
		'name'	=>	'body',
		'id'	=>	'body',
		'class'	=>	'fieldtext-1',
		'rows'	=>	'6',
		'cols'=>	'40',
		'value'	=>	set_value('body')
	);
?> 
 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr style="background-color:#5089BE; color:#FFFFFF; text-align:left;">   
        <td align="center"  class="title">User List</td>    
    </tr> 
    <tr>
        <td  height="5px">&nbsp;</td>
    </tr> 
 <?php if(is_array($user_listing->result()) && count($user_listing->result())){	?>
 <tr>
 	<td>
        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr style="background-color:#5089BE; color:#FFFFFF; text-align:left;"> 
               <!-- <td class="small_title"><input type="checkbox" class="checkAll" /> </td>-->
                <td class="small_title">Sr. No.</td>
                <td  class="small_title">First Name</td>                
                <td  class="small_title"> Last Name </td>
                <td  class="small_title"> Gender </td>              
                <td  class="small_title">Email </td>
                <td  class="small_title"> Birthday </td>
                <td  class="small_title">Action</td>      
            </tr>
        <?php 
        $total=0;
        $i=0;
		
		//echo "<pre>";print_r($user_listing);die;
        foreach ($user_listing->result() as $row) { $i++;
		if($i%2==0){
			$bg="bgcolor='#D7D7FF'";
		}else{
			$bg="bgcolor='#E3F2EE'";
		}
        ?>
            <tr <?php echo $bg;?> >
                <!--<td class="cell" align="left"><input type="checkbox" value="<?php //echo $row->userID;?>" name="user_ids[]" title="checked to send mail" class="cb-element"/></td>-->
                <td width="7%" class="cell" align="center"><?php echo $i;?></td>
                <td class="cell" align="left"><?php echo $row->first_name;?></td>
                <td class="cell"  align="left"><?php echo $row->last_name;?></td>
                <td class="cell"   align="left"><?php echo $row->gender;?></td>
                
                <td class="cell"   align="left"><?php echo $row->email;?></td>
                <td class="cell"  align="left"><?php echo $row->birthday;?></td>
                <td class="cell"  align="left">           
                    <a href="<?php echo base_url().'user/edit_user/'.$row->id;?>"> <img src='<?php echo base_url().'layout/';?>images/edit.png' width='16' height='16' alt='Edit' border='0'></a>
                <?php  if ($row->status=='0'){?>
                    <a href="<?php echo base_url().'user/activeuser/'.$row->id;?>" title="change status">
                        <img src="<?php echo base_url().'layout/images/red_point.png';?>" width="12" height="12" border="0" alt="inactive"/></a>
                 <?php } else{?>
                 <a href="<?php echo base_url().'user/inactiveuser/'.$row->id;?>" title="change status">
                        <img src="<?php echo base_url().'layout/images/green_point.png';?>" width="12" height="12" border="0" alt="active"/></a>
                      <?php }?>
                      <a title="delete" href="<?php echo base_url().'user/deleteuser/'.$row->id;?>" onclick="return confirm('Do you want to delete?');"><img src="<?php echo base_url().'layout/images/close_pop.png';?>" width="16" height="16" border="0" alt="delete" /></a>
                </td>		
            </tr> 
        <?php }?>
        <?php echo $this->pagination->create_links();?>
        </table>
        </td>
        </tr>
        <?php }else{?>
            <tr>
                <td>
                    <table width="95%" border="0"  cellspacing="1" cellpadding="0" bgcolor="#959595" align="center">
                        <tr>
                            <td align="center">--Seller list is Empty--</td>   
                        </tr>
                    </table>
                </td>
            </tr>
  <?php }?>

</table>

    
     
</form>   
