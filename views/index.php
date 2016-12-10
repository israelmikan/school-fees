<!DOCTYPE html>
<html lang="en" class="app">
    <head>
        <meta charset="utf-8" />
        <title>Login | Please login to proceed further</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
        <link rel="stylesheet" href="<?php echo URL_css . "/bootstrap.css"; ?>" type="text/css" />
        <link rel="stylesheet" href="<?php echo URL_css . "/animate.css"; ?>" type="text/css" />
        <link rel="stylesheet" href="<?php echo URL_css . "/font-awesome.min.css"; ?>" type="text/css" />
        <link rel="stylesheet" href="<?php echo URL_css . "/font.css"; ?>" type="text/css" />
        <link rel="stylesheet" href="<?php echo URL_css . "/app.css"; ?>" type="text/css" />
        <!--[if lt IE 9]>
          <script src="js/ie/html5shiv.js"></script>
          <script src="js/ie/respond.min.js"></script>
          <script src="js/ie/excanvas.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="modal-over">
            <div class="modal-center animated fadeInUp text-center" style="width:200px;margin:-80px 0 0 -100px;">
                <div class="thumb-md"><img src="<?php echo URL_images . "/avatar.jpg"; ?>" class="img-circle b-a b-light b-3x"></div>
                <p class="text-white h4 m-t m-b">Grace High School Fees Portal</p>
                <div class="alert alert-success hidden"></div>
                <div class="alert alert-danger hidden"></div>
                <?php //parsley-error ?>
                <div class="input-group">
                    <form role="form" name="frmLogin" id ="frmLogin" method="post" action="index/xhrLogin">
                        <input type="password" name="password" class="form-control text-sm noSubmit" placeholder="Enter pwd to continue">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button" data-dismiss="modal">
                                <i class="fa fa-arrow-right"></i>
                            </button>
                        </span>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo URL_javascript . '/jquery.min.js' ?>" ></script>
        <script type="text/javascript" src="<?php echo URL_javascript . '/main.js' ?>" ></script>
        <script type="text/javascript" src="<?php echo URL_javascript . '/login.js' ?>" ></script>
    </body>
</html>