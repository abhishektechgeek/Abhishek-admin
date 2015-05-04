<?php echo "service Upgrade" ;

?>


<html>

<head>

<title></title>

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<script type="text/javascript">

var counter = 0;

$(function(){

 $('p#add_field').click(function(){

 counter += 1;

 $('#container').append(

 '<strong>Service Upgrade No. ' + counter + '</strong><br />'

 + '<input id="field_' + counter + '" name="dynfields[]' + '" type="text" /><br />' );

 });

});

</script>

<body>
 

<?php if (!isset($_POST['submit_val'])) { ?>

 <h1>Add Service Upgrade</h1>

 <form method="post" action='<?php echo base_url()."service/service_upgrade/".$edit_data[0]['id']; ?>'>

 <div id="container">

 <p id="add_field"><a href="#"><span>Click To Add Service Upgrade</span></a></p>

 </div>

 <input type="submit" name="submit_val" value="Submit" />

 </form>

<?php } ?>

 

</body>

</html>
