<script type="text/javascript">
	$(document).ready(function() {
		$("#category").validate({
			rules: {							
				category_name: "required"				
				//shipping_charges: { check: true }
			} 			
		});
	});
</script> 
<style type="text/css">
    * { font-family:Verdana, Arial, Helvetica, sans-serif; }     
	label.error { width: 130px; display: block; color: red;  text-align:left; font-size:12px; }
</style> 
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"> 
     <tr style="background-color:#5089BE; color:#FFFFFF; text-align:left;">   
        <td align="center"  class="title">Category</td>    
    </tr> 
    <tr>
        <td  height="5px">&nbsp;</td>
    </tr>
    <tr>
    	<td align="center">						
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border="0" >
                    <TBODY>
                        <TR valign="top">
                           <TD width="50%" valign="top" align="center">
                                <?php 
								 $attributes = array('class' => 'categoryMaster', 'id' => 'categoryDel','name' => 'categoryDel');
								echo form_open('category/delete_category',$attributes);?>
                                    <TABLE cellSpacing=1 cellPadding=0 width="100%" border=0 >
                                        <tr style="background-color:#5089BE; color:#FFFFFF; text-align:left;">
                                        	<td width="10%" class="small_title" style="padding-left:5px">#</td>
											<td width="60%" class="small_title" style="padding-left:5px">Category</td>
											<td width="10%" class="small_title" style="padding-left:5px">Status</td>
                                            <td width="10%" class="small_title" style="padding-left:5px">Edit</td>
                                            <td width="10%" class="small_title" style="padding-left:5px">Delete</td>
                                        </tr>
										<?php 
											$mainCatRow=$this->categorymodel->get_main_categories(0);
											foreach ($mainCatRow as $mainCat){?>
												<tr align='center'>
                                                	<td align='left'><?php echo $mainCat->category_id ?></td>
                                                    <td  align='left'><strong><?php echo ucfirst($mainCat->category_name); ?></strong></td>
                                                    <td>
                                                    <?php if($mainCat->status==1){?>
                                           			<a href="<?php echo base_url().'category/active_category/'.$mainCat->category_id.'/0';?>"><img src='<?php echo base_url().'layout/';?>images/green_point.png' width='10' height='10' alt='Deactive' border='0'></a>
												<?php }else{ ?>
                                                	<a href="<?php echo base_url().'category/active_category/'.$mainCat->category_id.'/1';?>"><img src='<?php echo base_url().'layout/';?>images/red_point.png' width='10' height='10' alt='Deactive' border='0'></a>
											<?php }?>
                                            		</td>
                                                    
                                                    
                                                    <td><a href="<?php echo base_url().'category/edit_category/'.$mainCat->category_id;?>"> <img src='<?php echo base_url().'layout/';?>images/edit.png' width='16' height='16' alt='Edit' border='0'></a></td>
                                                    <td ><input type='checkbox' name='delCategory[]' value="<?php echo  $mainCat->category_id;?>"></td>
                                                </tr>
												<?php 
													$SubCatRow=$this->categorymodel->get_subcategories($mainCat->category_id);
													foreach($SubCatRow as $subCat){ ?>
														<tr align='center'>
                                                        	<td  align='left'><?php echo $subCat->category_id ?></td>
                                                            <td  align='left'  style="padding-left:15px;">|_<strong><?php echo ucfirst($subCat->category_name);?></strong></td>
                                                            <td>
                                                            <?php if($subCat->status==1){?>
                                           			<a href="<?php echo base_url().'category/active_category/'.$subCat->category_id.'/0';?>"><img src='<?php echo base_url().'layout/';?>images/green_point.png' width='10' height='10' alt='Deactive' border='0'></a>
												<?php }else{ ?>
                                                	<a href="<?php echo base_url().'category/active_category/'.$subCat->category_id.'/1';?>"><img src='<?php echo base_url().'layout/';?>images/red_point.png' width='10' height='10' alt='Deactive' border='0'></a>
											<?php }?></td>
                                                            <td><a href="<?php echo base_url().'category/edit_category/'.$subCat->category_id;?>"> <img src='<?php echo base_url().'layout/';?>images/edit.png' width='16' height='16' alt='Edit' border='0'></a></td>
                                                             <td ><input type='checkbox' name='delCategory[]' value="<?php echo  $subCat->category_id;?>"></td>
                                                       	</tr>
														
														<?php 
													$Sub2CatRow=$this->categorymodel->get_subcategories($subCat->category_id);
													foreach($Sub2CatRow as $sub2Cat){?>
														 <tr align='center'>
                                                         	<td  align='left'><?php echo $sub2Cat->category_id;?></td>
                                                            <td  align='left' style="padding-left:30px;">|_<strong><?php echo ucfirst($sub2Cat->category_name);?></strong></td>
                                                            <td>
                                                            	 <?php if($sub2Cat->status==1){?>
                                           			<a href="<?php echo base_url().'category/active_category/'.$sub2Cat->category_id.'/0';?>"><img src='<?php echo base_url().'layout/';?>images/green_point.png' width='10' height='10' alt='Deactive' border='0'></a>
												<?php }else{ ?>
                                                	<a href="<?php echo base_url().'category/active_category/'.$sub2Cat->category_id.'/1';?>"><img src='<?php echo base_url().'layout/';?>images/red_point.png' width='10' height='10' alt='Deactive' border='0'></a>
											<?php }?>
                                                            
                                                            </td>
                                                            <td><a href="<?php echo base_url().'category/edit_category/'.$sub2Cat->category_id;?>"> <img src='<?php echo base_url().'layout/';?>images/edit.png' width='16' height='16' alt='Edit' border='0'></a></td>
                                                            <td ><input type='checkbox' name='delCategory[]' value="<?php echo  $sub2Cat->category_id;?>"></td>
                                                       </tr>
														
												<?php }
													}
																										
												}			
										
										?>												
                                        <tr align="right">
                                            <td width="100%" colspan="5"><hr></td>
                                        </tr>
                                        <tr align="right">
                                            <td width="100%" colspan="5">
                                           		     	<input type="submit" value="Delete" onClick="return confirm('Are you sure you want to delete?');">
                                            </td>
                                        </tr>
                                    </TABLE>
                                </FORM>
                            </TD>
                            <TD width="50%" valign="top" align="center">
							<?php 
							
                            $attributes = array('class' => 'category', 'id' => 'category','name' => 'category');
							if(count($edit_category_data[0])> 0){								
								echo form_open('category/update_category/'.$edit_category_data[0]->category_id,$attributes);								
							}else{
								echo form_open('category/add_category',$attributes);							
							}
                            $category_name=array(
											'name'	=>	'category_name',
											'id'	=>	'category_name',
											'type'  =>'text',
											'maxlength'=>'150',
											'size'=>'20',
											'value'	=>$edit_category_data[0]->category_name
                                       		);
                            $category_description=array(
                                            'name'	=>	'description',
                                             'id'	=>	'description',
                                             'rows'=>'5',
                                            'cols'=>'38',
											'value'	=>$edit_category_data[0]->description
                                            );
                            $submit=array(
                                        'name'	=>	'submit',
                                        'id'	=>	'submit',
                                        'value'	=>	'Submit'		
                                          );
							$categoryTree=array(
												'1'=>'Category 1',
												'2'=>'Category 2',
												'3'=>'Category 3'
												  )
                             ?>

                                    <TABLE cellSpacing=2 cellPadding=2 width="100%" border=0 >
                                        <tr style="background-color:#5089BE; color:#FFFFFF; text-align:center;">
                                            <td  colspan="3" class="title"><?php echo $page_title;?></td>
                                        </tr>
                                            											
                                       
                                        <tr>
                                            <td align="left" class="Text" style="padding-left:10px;">Parent Category</td><td> : </td>
                                            <td align="left"><?php //echo form_dropdown('parent_id',$categoryTree,$old_parentId); ?>
                                            	<select name="parent_id">
                                                <option value="0" >Select Parent</option>
                                                <!----------------------->
                                                <?php													
														$mainCatRow=$this->categorymodel->get_main_categories(0);											
														foreach ($mainCatRow as $mainCat){?>
															<option value="<?php echo $mainCat->category_id ?>" <?php if($mainCat->category_id==$edit_category_data[0]->parent_id){echo "selected";}?>><?php echo ucfirst($mainCat->category_name); ?></option>												
															<?php 															
																$SubCatRow=$this->categorymodel->get_subcategories($mainCat->category_id);
																foreach($SubCatRow as $subCat){ ?>
																	<option value="<?php echo $subCat->category_id ?>" style="padding-left:10px;" <?php if($subCat->category_id==$edit_category_data[0]->parent_id){echo "selected";}?>><?php echo ucfirst($subCat->category_name); ?></option>
																	<?php 
																		$Sub2CatRow=$this->categorymodel->get_subcategories($subCat->category_id);
																		foreach($Sub2CatRow as $sub2Cat){?>
																			<option value="<?php echo $sub2Cat->category_id ?>" style="padding-left:20px;" <?php if($sub2Cat->category_id==$edit_category_data[0]->parent_id){echo "selected";}?>><?php echo ucfirst($sub2Cat->category_name); ?></option>
																		<?php
																		 }
																	}																												
																}															
															?>                                                
                                                <!------------------------>                                                
                                                </select>
                                            
                                            </td>											
                                        </tr>
                                        
                                         <tr>
                                            <td align="left" class="Text" style="padding-left:10px;">Category</td><td> : </td>
                                            <td align="left"><?php echo form_input($category_name); ?></td>											
                                        </tr>
                                       
										<tr>
                                            <td align="left" class="Text" style="padding-left:10px;">Description</td><td> : </td>
                                            <td align="left"><?php echo form_textarea($category_description); ?></td>											
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="right" style="padding-right:252px">&nbsp;</td>												
                                        </tr>
                                    </TABLE>
                               <?php echo form_submit($submit); ?>
                            </TD>
                        </TR>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                        </tr>
                    </TBODY>
                </TABLE>           
            <?php ########################################################################?>
        </td>
    
    </tr>
   
</table>   
