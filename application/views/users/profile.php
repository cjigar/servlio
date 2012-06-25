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
        <script src="<?php echo base_url(); ?>js/jquery-1.7.2.min.js"></script>
        <script src="<?php echo base_url(); ?>js/cycle.js"></script>
    </head>

    <body>
        <div id="login_logo" style="margin-top:40px;"><a href="index.html"><img src="images/login_logo.png"></a></div>
        <div id="invite_top_header">Login</div>
        <div id="left_side_interface_login">

            <div id="structure_left_container_login">

                <div id="error_msg2">Email/password not recognised. Please try again.</div>     


                <input name="field" class="signup_input_login3" placeholder="Email" type="text">
                <input name="field" class="signup_input_login4" id="password" placeholder="Password" type="text">
                <div class="btn" id="login_btn" title="Apply" style="width:65px; float:left; font-size:15px; height:28px; padding-top:2px; margin-top:15px; margin-left:0px;">Login</div>
                <div class="btn" id="reset_btn" title="Apply" style="width: 65px; float: left; font-size: 15px; height: 28px; padding-top: 2px; margin-top: 15px; margin-left: 0px; display: none;">Reset</div>
                <div class="login_text_new" id="forgot">Forgot your password?</div>
                <div style="display: none;" class="login_text_new" id="back">Back to login?</div>
                <div class="clearfloat"></div>

            </div>
        </div>
    </body>
</html>
