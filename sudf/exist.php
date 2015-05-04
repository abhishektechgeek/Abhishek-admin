<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Shlomi Nissan">

    <title>jQuery Form Builder v3.0</title>

    <link rel="stylesheet" href="src/css/style.css">

  </head>

  <body>


    <div >

      <div id="formBuilder"></div>
    

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
    <script src="src/libraries/dust-js/dust-core-0.3.0.min.js"></script>
    <script src="src/libraries/dust-js/dust-full-0.3.0.min.js"></script>
    <script src="src/libraries/dust-js/dust-helpers.js"></script>
    <script src="src/libraries/tabs.jquery.js"></script>
    <script src="src/formBuilder.jquery.js"></script>
<?php 
$s_id = $_GET['skill_id'];
 $edit_id = $_GET['edit_id'];
//$id = $_POST['segment_id'];
//print_r($_POST);
//echo  $id;
?>

    <script>

      $('#formBuilder').formBuilder({
        
        load_url: 'src/json/example.php?skill_id='+<?php echo $s_id ; ?>,
        save_url: 'demo/save.php',
        
        onSaveForm: function() {
          // redirect to demo page
          window.location.href = 'demo/render.php?skill_id='+<?php echo $s_id ; ?>+'&edit_id='+<?php echo $edit_id ; ?>;
        }

      });

    </script>

  </body>
</html>
