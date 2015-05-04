<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- start: Meta -->
        <meta charset="utf-8">
        <title>Bootstrap Metro Dashboard by Dennis Ji for ARM demo</title>
        <meta name="description" content="Login">
        <meta name="author" content="Admin Login">
        <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <!-- end: Meta -->

        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- end: Mobile Specific -->

        <!-- start: CSS -->
        <link id="bootstrap-style" href="<?php echo ASSETS_URL_CSS ?>bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo ASSETS_URL_CSS ?>bootstrap-responsive.min.css" rel="stylesheet">
        <link id="base-style" href="<?php echo ASSETS_URL_CSS ?>style.css" rel="stylesheet">
        <link id="base-style-responsive" href="<?php echo ASSETS_URL_CSS ?>style-responsive.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>

        <link rel="shortcut icon" href="<?php echo ASSETS_URL_IMAGES ?>favicon.ico">
        <style type="text/css">

            body { background: url(<?php echo ASSETS_URL_IMAGES ?>bg-login.jpg) !important; }
        </style>

    </head>
    <body>
        <?php
        $attributes = array('class' => '', 'id' => 'signin', 'name' => 'signin');

        $username = array(
            'name' => 'username',
            'id' => 'username',
            'maxlength' => '100',
            'class' => 'input-large span10',
            'placeholder' => 'username',
            'size' => '50'
                /* 'class'=>'inputText' */
        );

        $password = array(
            'name' => 'password',
            'id' => 'password',
            'maxlength' => '100',
            'class' => 'input-large span10',
            'placeholder' => 'password',
            'size' => '50'
        );

        $submit = array(
            'name' => 'submit',
            'id' => 'submit',
            'value' => 'Login',
            'class' => 'btn btn-primary'
                )
        ?>
        <div class="container-fluid-full">
            <div class="row-fluid">

                <div class="row-fluid">
                    <div class="login-box">
                        <div class="icons">
                            <a href="index.html"><i class="halflings-icon home"></i></a>
                            <a href="#"><i class="halflings-icon cog"></i></a>
                        </div>
                        <h2>Login to your account</h2>
                        <!--                        
                        <?php if ($this->session->flashdata('login_error')) { ?>  <p class="error">Wrong Username Or Passward!</p>  <?php } ?>      
                        -->
                        <?php echo form_open('home', $attributes); ?>

                        <fieldset>

                            <div class="input-prepend" title="Username">
                                <span class="add-on"><i class="halflings-icon user"></i></span>
                                <?php echo form_input($username); ?>
                            </div>
                            <div class="clearfix"></div>

                            <div class="input-prepend" title="Password">
                                <span class="add-on"><i class="halflings-icon lock"></i></span>
                                <?php echo form_input($password); ?>  </div>
                            <div class="clearfix"></div>

                            <label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>


                            <div class="button-login">	
                                <?php echo form_submit($submit); ?>   </div>  <?php echo form_close(); ?>
                            <div class="clearfix"></div>

                            <hr>
                            <h3>Forgot Password?</h3>
                            <p>
                                No problem, <a href="#">click here</a> to get a new password.
                            </p>	
                    </div><!--/span-->
                </div><!--/row-->
            </div>
        </div>
        <script src="<?php echo ASSETS_URL_JS ?>jquery-1.9.1.min.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>jquery-migrate-1.0.0.min.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>jquery-ui-1.10.0.custom.min.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>jquery.ui.touch-punch.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>modernizr.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>bootstrap.min.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>jquery.cookie.js"></script>
        <script src='<?php echo ASSETS_URL_JS ?>fullcalendar.min.js'></script>
        <script src='<?php echo ASSETS_URL_JS ?>jquery.dataTables.min.js'></script>
        <script src="<?php echo ASSETS_URL_JS ?>excanvas.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>jquery.flot.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>jquery.flot.pie.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>jquery.flot.stack.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>jquery.flot.resize.min.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>jquery.chosen.min.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>jquery.uniform.min.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>jquery.cleditor.min.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>jquery.noty.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>jquery.elfinder.min.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>jquery.raty.min.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>jquery.iphone.toggle.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>jquery.uploadify-3.1.min.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>jquery.gritter.min.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>jquery.imagesloaded.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>jquery.masonry.min.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>jquery.knob.modified.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>jquery.sparkline.min.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>counter.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>retina.js"></script>
        <script src="<?php echo ASSETS_URL_JS ?>custom.js"></script>
        <script  src="<?php echo ASSETS_URL_JS ?>jquery-1.8.2.min.js" ></script>
        <script src="<?php echo ASSETS_URL_JS ?>jquery.validate.js" ></script>
        <script type="text/javascript">
                    $(document).ready(function() {
            $("#signin").validate({
            rules: {
            username: "required", // simple rule, converted to {required:true}
                    password: "required"
            }
            });
            });

        </script>

        <!-- end: JavaScript-->

    </body>
</html>
