<link rel="stylesheet" href="http://gofavo.com/api/admin/layout/css/servicelist.css">
<script src="http://code.jquery.com/jquery-1.7.2.min.js" type="text/javascript" > </script>
	
	<script type="text/javascript">

		$( document ).ready( function( ) {
				$( '.tree li' ).each( function() {
						if( $( this ).children( 'ul' ).length > 0 ) {
								$( this ).addClass( 'parent' );     
						}
				});
				$( '.tree li.parent > a' ).parent().addClass( 'active' );
				$( '.tree li.parent > a' ).parent().children( 'ul' ).slideToggle( 'fast' );
				
				/*$( '.tree li.parent > a' ).click( function( ) {
						$( this ).parent().toggleClass( 'active' );
						$( this ).parent().children( 'ul' ).slideToggle( 'fast' );
				});
				
			/*	$( '.tree li.parent > a' ).click( function( ) {
						$( this ).parent().toggleClass( 'active' );
						$( this ).parent().children( 'ul' ).slideToggle( 'fast' );
				});*/
				
				
		});
        
	</script>
	
	<style>
	 #details-head td{background:#ccc;padding:5px;font-size:12px;text-align:center;border-color: #fff;  border-style: solid;
  border-width: 1px;    }
	 #details-head{margin: 10px 0px 0px 100px;}
	 
	 #details td{text-align: center;background:#eee;padding:5px;font-size:12px;border-color: #fff; border-style: solid; border-width: 1px;
    }
	 #details{margin: 5px 0px 0px 100px;}
         table {border-spacing: 2px;border-collapse: 1px;}
	</style>

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
	
        
 $(".preferenceSelect").change(function() {
            // Get the selected value
             var id = this.id;
            var selected = $("option:selected", $(this)).val();
           
            $.ajax({

                    url: "<?php echo base_url(); ?>servicetimeslot/update_service_order/"+id+"/"+selected , 

                    
                    success: function (response) {
//alert(response);
alert("success");   
$('#order').fadeIn().html(response);
                    },

                    error: function (xhr) {

                        alert("Something went wrong, please try again");

                    }

                });
           
          
            // Get the ID of this element
            var thisID = $(this).attr("id");
            // Reset so all values are showing:
            $(".preferenceSelect option").each(function() {
                $(this).show();
            });
            $(".preferenceSelect").each(function() {
                if ($(this).attr("id") != thisID) {
                    $("option[value='" + selected + "']", $(this)).attr("disabled", true);
                }
            });

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
	
        
  $(".dropdown_class").change(
          
           function(){
  // alert('aaaa'); 
      var id = this.id;
      var timeInt = id.replace("ts", "ti");
      var time =  $(this).val();
      var timeInterval =  $("#"+timeInt).val();
 
      var ids = id.replace("ts", "");
   // alert(time);
    //  alert(timeInterval);
      
      $.ajax({

                    url: "<?php echo base_url(); ?>servicetimeslot/update_time_slot/"+ids+"/"+time+"/"+timeInterval , 

                    
                    success: function (response) {
//alert(response);
//alert("success");
                    },

                    error: function (xhr) {

                        alert("Something went wrong, please try again");

                    }

                });
      
    
   } ) ;      
   
   
   $(".timeinterval_class").change(
           
           function(){
   //alert('bbbb');
      var id = this.id;
      var timeslot = id.replace("ti", "ts");
      var time =  $("#"+timeslot).val();
      var timeInterval =  $(this).val();
           
      var ids = id.replace("ti", "");
    //alert("hello"+time);
     // alert(timeInterval);
      
      $.ajax({

                    url: "<?php echo base_url(); ?>servicetimeslot/update_time_slot/"+ids+"/"+time+"/"+timeInterval , 

                    
                    success: function (response) {

//alert("success");
                    },

                    error: function (xhr) {

                        alert("Something went wrong, please try again");

                    }

                });
      
    
   } ) ;



	 
});
function submitForm(){
   $("#target").attr("action", "<?php echo base_url().'service/servicelist'?>");
  $( "#target" ).submit();
}




/*
function submitForm(){
   $("#target").attr("action", "<?php echo base_url().'service/servicetimeslotlist'?>");
  $( "#target" ).submit();
}

*/



</script>

<!-- CONTENT START -->
    <div class="grid_16" id="content">
    <!--  TITLE START  --> 
    <div class="grid_9">
     <h1 class="skills">Service</h1>
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
        <?php if($is_modify){?><a href="<?php echo base_url().'service/edit_service'?>" class="edit_inline">Add New</a><?php }?>
        </div>
       
		<div class="portlet-content nopadding">
        <?php //$segment_id = $this->input->post('segment_id'); ?>
                    <!--
        <form action="<?php echo base_url().'service/servicelist'?>" method="post" id="target">
        <select name="segment_id" id="segment_id" onchange="return submitForm();" >
              <option value="0">All</option>
             <?php foreach($segment_list as $k =>$segment){?>
			 <option value="<?php echo $k;?>" <?php if($segment_id == $k)echo 'selected="selected"'?>><?php echo $segment;?></option>
			 <?php }?>
             </select>
        </form>
                    -->
                    <!----------------------------start------------------------------------------------------------------->
    
                     <?php
                     $name;
                     $id;
                     $image;
                     foreach($segment_list as $k =>$segment){
                    if($segment_id == $k){
                    $id=$k;
                    $name=$segment;
                    }
                     }
                    ?>
			 
<div id="wrapper" style="margin-top: 20px;">
<div class="tree">
		
<ul>
		
		<li>
                    
		
			<table width="300px" height="50px" style="margin-bottom: 0px;border-color:#aaa;border-width:1px;border-style:solid;">
				<tr>
				<td width="20%" bgcolor="#bbb" style="background-color: #bbb;"><center><?php echo $id; ?></center></td>
				<td width="60%" bgcolor="#bbb" style="background-color: #bbb;"><center><?php echo $name; ?> </center></td>
				<td width="20%" bgcolor="#bbb" style="background-color: #bbb;"><center>Action <br> - / X</center></td>
				</tr>
			</table>
			<a></a>
				<ul>
				
				
				<table id="details-head" width="">
											<tr>
											<td rowspan=2 width="55px">Service <br>order <br>in app</td>
											<td rowspan=2 width="100px">Service<br>Name</td>
											<td rowspan=2 width="75px">Service<br>Description<br>& Edit/Delete</td>
											<td colspan=3 width="120px">Image</td>
											<td colspan=2 width="140px">Calender Time</td>
											<td colspan=2 width="130px">Forms</td>
											<td rowspan=2 width="50px">Bid Type</td>
											<td rowspan=2 width="65px">Countries</td>
											<td rowspan=2 width="50px">View</td>
											</tr>
	
											<tr>
											<td width="37px">Icon</td>
											<td width="40px">ID</td>
											<td width="36px">Path</td>
											<td width="70px">Increment</td>
											<td width="70px">Interval</td>
											<td width="65px">Service<br>upgrades</td>
											<td width="65px">Customer<br>Details</td>
											</tr>
					</table>
				
					<li>
							<table  id="details">
								<tr>
									<td width="44px"><div style="word-wrap: break-word;width:44px;">1</div></td>
									<td width="64px"><div style="word-wrap: break-word;width:64px;">sunilismynamewhatisourname</div></td>
									<td width="67px"><div style="word-wrap: break-word;width:67px;"><a href="#">-/x</a></div></td>
									<td width="30px"><div style="word-wrap: break-word;width:30px;">.</div></td>
									<td width="23px"><div style="word-wrap: break-word;width:23px;">.</div></td>
									<td width="30px"><div style="word-wrap: break-word;width:30px;">.</div></td>
									<td width="62px"><div style="word-wrap: break-word;width:62px;">value</div></td>
									<td width="53px"><div style="word-wrap: break-word;width:53px;">value</div></td>
									<td width="57px"><div style="word-wrap: break-word;width:57px;"><a href="#">value</a></div></td>
									<td width="57px"><div style="word-wrap: break-word;width:57px;"><a href="#">value</a></div></td>
									<td width="37px"><div style="word-wrap: break-word;width:37px;"><a href="#">edit</a></div></td>
									<td width="57px"><div style="word-wrap: break-word;width:57px;"><a href="#">-/x</a></div></td>
									<td width="38px"><div style="word-wrap: break-word;width:38px;"><a href="#">-/x</a></div></td>
								</tr>

							</table>
					</li>
					
					
				
				
				
				<li><a>
					<table width="800px" bgcolor="#ddd" style="margin: 10px 0px 10px 103px;background:#ddd">
						<tr bgcolor="#ccc" >
							<td style="padding:5px;background:#ddd">Add Service</td>
						</tr>
					</table>
				</a>
				
				
				
				</li>
				
				</ul>
		</li>

		
</ul>
</div>
</div>

                       <!----------------------------------------------------------------------------------------------------------------->
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/scripts/jquery.form.js"></script>
<script type="text/javascript">
var jq=$.noConflict();
jq(document).ready(function() 
{ 
//$('#photoimg').live('change', function()
jq('input[id^="photoimg"]').live('change', function()
{ 

 //alert(this.value);
 var id=jq(this).attr('id');
 //alert(id);
jq("#preview").html('');
jq("#preview").html('<img src="ajax-loader.gif" alt="Uploading...."/>');
//alert('rajeev');

jq("#imageform").ajaxForm(
{

target: '#preview',
	data :id
}).submit();
});
}); 
</script>



   