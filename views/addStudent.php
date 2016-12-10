<?php
//print_r($this->courseList);
?>
<!DOCTYPE html>
<html lang="en" class="app">
    <head>
        <meta charset="utf-8" />
        <title>Add | Student</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
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
    <body>
        <section class="vbox">
            <header class="bg-dark dk header navbar navbar-fixed-top-xs">
                <div class="navbar-header aside-md">
                    <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
                        <i class="fa fa-bars"></i>
                    </a>
                    <a href="#" class="navbar-brand" data-toggle="fullscreen">Grace High School Students' Fees</a>
                </div>
            </header>
            <section>
                <section class="hbox stretch">
                    <!-- .aside -->
                    <?php
                    echo $this->mainMenu;
                    ?>
                    <!-- /.aside -->
                    <section id="content">
                        <section class="vbox">          
                            <section class="scrollable padder">
                                <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                                    <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                                    <li class="active">Add Student</li>
                                </ul>
                                <div class="m-b-md">
                                    <h3 class="m-b-none">Add Student</h3>
                                    <small>You can add new student using the form below</small>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-10'>
                                        <section class="panel panel-default">
                                            <div class='panel-body'>
                                                <div class="alert alert-success hidden"></div>
                                                <div class="alert alert-danger hidden"></div>
                                                <form id='frmAddStudent' name='frmAddStudent' action='xhrAddStudent' role="form">
                                                    <div class="form-group col-md-6">
                                                        <label>First name</label>
                                                        <input type="text" name='firstName' placeholder="Enter firstname" class="form-control input-lg">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Last name</label>
                                                        <input type="text" name='lastName' placeholder="Enter lastname" class="form-control input-lg">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Guardian</label>
  <input type="text" name='email' placeholder="Guardian" class="form-control input-lg">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Enroll id</label>
                                                        <input type="text" name='enroll' placeholder="Enter enroll number" class="form-control input-lg">
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>Address</label>
                                                        <input type="text" name='address' placeholder="Enter address" class="form-control input-lg">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Contact Number-1</label>
                                                        <input type="text" name='ph1' placeholder="Enter contact number" class="form-control input-lg">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Contact Number-2</label>
                                                        <input type="text" name='ph2' placeholder="Enter contact number" class="form-control input-lg">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Select class</label>
                                                        <select class="form-control m-b input-lg" name="course">
                                                            <option value="">Please select Class</option>
                                                            <?php
                                                            for ($i = 0; $i < count($this->courseList); $i++) {
                                                                echo "<option value=" . $this->courseList[$i]['id'] . ">" . $this->courseList[$i]['name'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <div class="col-sm-4 col-sm-offset-2">
                                                            <a class="btn btn-default" id='cancel' href='<?php echo URL; ?>'>Cancel</a>
                                                            <button class="btn btn-primary" id='submit' type="button">Save Details</button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </section>
                        </section>
                        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
                    </section>
                    <aside class="bg-light lter b-l aside-md hide" id="notes">
                        <div class="wrapper">Notification</div>
                    </aside>
                </section>
            </section>
        </section>
        <script src="<?php echo URL_js; ?>/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo URL_js; ?>/bootstrap.js"></script>
        <!-- App -->
        <script src="<?php echo URL_js; ?>/app.js"></script>
        <script src="<?php echo URL_js; ?>/app.plugin.js"></script>

        <script src="<?php echo URL_js; ?>/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo URL_js; ?>/charts/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="<?php echo URL_js; ?>/charts/sparkline/jquery.sparkline.min.js"></script>
        <script src="<?php echo URL_js; ?>/charts/flot/jquery.flot.min.js"></script>
        <script src="<?php echo URL_js; ?>/charts/flot/jquery.flot.tooltip.min.js"></script>
        <script src="<?php echo URL_js; ?>/charts/flot/jquery.flot.resize.js"></script>
        <script src="<?php echo URL_js; ?>/charts/flot/jquery.flot.grow.js"></script>
        <script src="<?php echo URL_js; ?>/charts/flot/demo.js"></script>
        <script src="<?php echo URL_js; ?>/sortable/jquery.sortable.js"></script>

        <script type="text/javascript" src="<?php echo URL_javascript . '/jquery.min.js' ?>" ></script>
        <script type="text/javascript" src="<?php echo URL_javascript . '/main.js' ?>" ></script>
        <script type="text/javascript" src="<?php echo URL_javascript . '/dashboard.js' ?>" ></script>
    </body>
</html>