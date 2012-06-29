<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo isset($template['title']) ? $template['title'] : 'Servlio'; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php echo $template['metadata']; ?>
        <meta name="description" content="<?php echo isset($metaDesc) ? $metaDesc : 'Servlio'; ?>" />
        <meta name="keyword" content="<?php echo isset($metaKeyword) ? $metaKeyword : 'Servlio'; ?>" />
        <meta name="generator" content="Servlio" />
        <base href="<?= base_url(); ?>">
        <link href="<?= base_url() ?>css/style.css" rel="stylesheet">
        <link href="<?= base_url() ?>css/start/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
        <script src="<?php echo base_url(); ?>js/jquery-1.7.2.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery_validate.js"></script>
        <style>
            .err{
                color: #FF0000;
            }
        </style>
        <script>
            $(document).ready(function() {
                $("#fromlogin").validate({
                    rules:{
                        vEmail : {
                            required:true,
                            email:true
                        },
                        vPassword : {
                            required:true                            
                        }
                    },
                    messages:{
                        vEmail : {
                            required:"Please enter email",
                            email:"Please enter proper email"
                        },
                        vPassword : {
                            required:"Please enter password"
                        }
                    }
                    
                });
            });
        </script>    
    </head>

    <body>
        <div id="login_logo" style="margin-top:40px;"><a href="index.html"><img src="images/login_logo.png"></a></div>
        <div id="invite_top_header">Login</div>
        <div id="left_side_interface_login">

            <div id="structure_left_container_login">

                <?php $signin = $this->session->flashdata('signin'); ?>
                <?php if (isset($signin) && !empty($signin)) : ?>
                    <div id="error_msg2"><?php echo $signin; ?></div>     
                <?php endif; ?>

                <form name="fromlogin" id="fromlogin" method="post" action="users/signin_a" >
                    <input  class="signup_input_login3" placeholder="Email" name="vEmail" id="vEmail" type="text">
                    <input  class="signup_input_login4"  placeholder="Password" name="vPassword" id="vPassword" type="text">
                    <div class="btn" id="login_btn" title="Apply" style="width:65px; float:left; font-size:15px; height:28px; padding-top:2px; margin-top:15px; margin-left:0px;">Login</div>
                    <div style="float:left;">&nbsp;</div>
                    <div class="btn" id="reset_btn" title="Apply" style="width: 65px; float: left; font-size: 15px; height: 28px; padding-top: 2px; margin-top: 15px; margin-left: 0px; ;">Reset</div>
                    <div class="login_text_new" id="forgot">Forgot your password?</div>
                    <div style="display: none;" class="login_text_new" id="back">Back to login?</div>
                    <div class="clearfloat"></div>
                </form>
            </div>
        </div>
    </body>
</html>
<script>
    $("#login_btn").click(function() {
        $("#fromlogin").submit();
    });
    $("#reset_btn").click(function(){
        $("#fromlogin")[0].reset();
    });
    $("#vPassword").keyup(function(event){
        if(event.keyCode == 13){
            $("#login_btn").click();
        }
    });
    $("#forgot").click(function(){
       window.location.href = 'users/forget'; 
    });
</script>    