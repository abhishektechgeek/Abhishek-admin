<script>
$(document).ready(function () {
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
	$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
	 
});
function submitForm(){
   $("#target").attr("action", "<?php echo base_url().'serviceupgrade/serviceupgradelist'?>");
  $( "#target" ).submit();
}


</script>

<!-- CONTENT START -->
    <div class="grid_16" id="content">
    <!--  TITLE START  --> 
    <div class="grid_9">
     <h1 class="skills">Service Upgrade</h1>
    </div>
   
    <!--RIGHT TEXT/CALENDAR-->
    <div class="grid_6" id="eventbox"><!--<a href="#" class="inline_calendar">You don't have any events for today! Yay!</a>
    	<div class="hidden_calendar"></div>-->
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
        <?php echo $this->session->flashdata('fail');?> 
        </div>
        
        <div class="portlet-header fixed success">
        <?php echo $this->session->flashdata('success');?> 
        </div>
        <div class="portlet-header fixed"  align="right"> 
            <?php 
               // $serviceupgradeList = $skillslist_detail->result();
              //  print_r($serviceupgradeList);
                 $serviceupgradeId = $serviceupgradeList['0']->parent_id;
            ?>
     <?php if($is_modify){?><a href="<?php echo base_url().'serviceupgrade/edit_serviceupgrade/'?>" class="edit_inline">Add New</a><a href="<?php echo base_url().'service/servicelistBackButton/'.$service_id?>" class="edit_inline">Back</a><?php }?>
        </div>
       
		<div class="portlet-content nopadding">
        <?php //$segment_id = $this->input->post('segment_id'); ?>
        <form action="<?php echo base_url().'serviceupgrade/serviceupgradelist'?>" method="post" id="target">
        <select name="segment_id" id="segment_id" onchange="return submitForm();" >
              <option value="0">All</option>
             <?php foreach($segment_list as $k =>$segment){?>
			 <option value="<?php echo $k;?>" <?php if($segment_id == $k)echo 'selected="selected"'?>><?php echo $segment;?></option>
			 <?php }?>
             </select>
        </form>
        <form action="<?php echo base_url().'serviceupgrade/all_service'?>" method="post">
          <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
            <thead>
              <tr>
                <th width="34" scope="col"><input type="checkbox" name="allbox" id="allbox" onclick="checkAll()" /></th>
                <th width="206" scope="col">Service Upgrade Name</th>
                <!--th width="206" scope="col">Sub service Name</th-->
                <th width="282" scope="col">Path</th>
                <th width="282" scope="col">Description</th>
                
                  <th width="150" scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
             <?php $total=0;
                   $i=0;
               
				    foreach ($skillslist_detail->result() as $row) { $i++;
 				/*	
                                    $query =$this->db->query("SELECT c.description , c.name AS service, p.name AS segment, (SELECT name FROM `skills` WHERE id = p.parent_id) AS category
						FROM `skills` AS c
						LEFT JOIN `skills` p ON c.parent_id = p.id
						WHERE c.id ='".$row->id."' "); 
                                  */  
 					$query =$this->db->query("SELECT c.description , c.name AS serviceupgrade , p.name AS service, p1.name AS segment,p2.name AS category
						FROM `skills` AS c
						LEFT JOIN `skills` p ON c.parent_id = p.id
                                                LEFT JOIN `skills` p1 ON p.parent_id = p1.id
                                                LEFT JOIN `skills` p2 ON p1.parent_id = p2.id
						WHERE c.id ='".$row->id."' "); 
                                    
                                  /*  $query = "SELECT c.name AS service, p.name AS segment, (
                                                SELECT name
                                                FROM `skills`
                                                WHERE id = p.parent_id
                                                ) AS category, u.attribute_name
                                                FROM `skills` AS c
                                                LEFT JOIN `skills` p ON c.parent_id = p.id
                                                LEFT JOIN `upgrade_option` u ON u.service_id = c.id
                                                WHERE c.id ='".$row->id."' ";
						$query_str=$this->db->query($query); */
  	             	$row1 = $query->result_object();  
                                                	
 					?>
                    
 					<tr>
                        <td width="34"><label>
                            <input type="checkbox" name="checkbox[]" id="checkbox[]" class="checkbox" value="<?php echo $row->id;?>"/>
                        </label></td>
                        <td><?php echo $row->name;?></td>
                        
                        <td><?php echo $row1[0]->category.' > '.$row1[0]->segment.' > '.$row1[0]->service .' > '.$row1[0]->serviceupgrade;?></td>
                        <td><?php echo $row->description;?> </td>
                      
                          <td width="90">
                          <?php 
						  if($is_modify){
						  if($row->status == 1){?>
                           <a href="<?php echo base_url().'serviceupgrade/inactiveservice/'.$row->id;?>" title="Reject" class="reject_icon"></a>
                          <?php }else{?>
                           <a href="<?php echo base_url().'serviceupgrade/activeservice/'.$row->id;?>" class="approve_icon" title="Approve"></a> 
                          <?php }?> 
							 
                    
                         <a href="<?php echo base_url().'serviceupgrade/edit_serviceupgrade/'.$row->id;?>" class="edit_icon" title="Edit"></a> <a href="<?php echo base_url().'serviceupgrade/deleteservice/'.$row->id;?>" onclick="return confirm('Do you want to delete?');" class="delete_icon" title="Delete"></a></td>
                         
              </tr>
					<?php }
					}
              ?>
                
              <tr class="footer">
                <td colspan="4">
                <?php if($is_modify){?>
               <input type="submit" name="action_all" class="delete_inline" value="delete_all"/>
               <input type="submit" name="action_all" class="delete_inline" value="approve_all"/>
              <input type="submit" name="action_all" class="delete_inline" value="unapprove_all"/>
              <?php }?>
               </form>
              
                 <!--<a href="#" class="edit_inline">Edit all</a><a href="#" class="delete_inline">Delete all</a><a href="#" class="approve_inline">Approve all</a><a href="#" class="reject_inline">Reject all</a>--></td>
                <td align="right">&nbsp;</td>
                <td colspan="3" align="right">
				<!--  PAGINATION START  -->             
                   <!-- <div class="pagination">
                    <span class="previous-off">&laquo; Previous</span>
                    <span class="active">1</span>
                    <a href="query_41878854">2</a>
                    <a href="query_8A8058C2">3</a>
                    <a href="query_2823E521">4</a>
                    <a href="query_B322F5B7">5</a>
                    <a href="query_3A2A444D">6</a>
                    <a href="query_912D14DB">7</a>
                    <a href="query_41878854" class="next">Next &raquo;</a>
                    </div>  -->
                <!--  PAGINATION END  -->       
                </td>
              </tr>
            </tbody>
          </table>
        </form>
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
       <div style='display:none'>
			<div id='inline_content' style='padding:10px; background:#ccc;'>
			<p><strong>This content comes from a hidden element on this page.</strong></p>
			<p>The inline option preserves bound JavaScript events and changes, and it puts the content back where it came from when it is closed.</p>
			<p><a id="click" href="#" style='padding:5px; background:green;'>Click me, it will be preserved!</a></p>
			
			<p><strong>If you try to open a new Colorbox while it is already open, it will update itself with the new content.</strong></p>
			<p>Updating Content Example:<br />
			<!--<a class="ajax" href="../content/ajax.html">Click here to load new content</a></p>-->
            
            <p><a class='iframe' href="http://wikipedia.com">Outside Webpage (Iframe)</a></p>
			</div>
	 </div>
<!-- WRAPPER END -->


   