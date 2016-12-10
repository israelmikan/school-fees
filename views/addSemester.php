<?php
//print_r($this->cat);
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
                                <div class="m-b-md">
                                    <h3 class="m-b-none">Add Semester</h3>
                                    <small>Add Term and total fees for student</small>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-10'>
                                        <section class="panel panel-default">
                                            <div class='panel-body'>
                                                <div class="alert alert-success hidden"></div>
                                                <div class="alert alert-danger hidden"></div>
                                                <form id='frmAddSemester' name='frmAddSemester' action='../xhrAddSemester' role="form">
                                                    <input type="hidden" name="studentId" value="<?php echo $this->param['studentId']; ?>" />
                                                    <input type="hidden" name="courseId" value="<?php echo $this->param['courseId']; ?>" />

                                                    <div class="form-group col-md-12">
                                                        <label>Select Term</label>
                                                        <select class="form-control m-b input-lg" name="semester">
                                                            <option value="">Please select Term</option>
                                                            <?php
                                                            for ($i = 0; $i < count($this->param['semester']); $i++) {
                                                                echo "<option value=" . $this->param['semester'][$i]['id'] . ">" . $this->param['semester'][$i]['name'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>



                                                    <!--- Other fees -->

                                                    <?php
                                                    for ($i = 0; $i < count($this->cat); $i++) {
                                                        echo '<div class="form-group col-md-6">';
                                                        echo '<label>' . $this->cat[$i]['name'] . '</label>';
                                                        echo '<input type="text" name="' . $this->cat[$i]['id'] . '" placeholder="Please enter ' . $this->cat[$i]['name'] . '" class="form-control input-lg afee" />';
                                                        echo '</div>';
                                                    }
                                                    ?>

                                                    <!--- Other fees complete-->


                                                    <div class="form-group col-md-6">
                                                        <label>Enter total fees for semester</label>
                                                        <input type="text" name='fees' id="fees" placeholder="Enter total fees" class="form-control input-lg" disabled="disabled" />
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <div class="col-sm-4 col-sm-offset-2">
                                                            <a class="btn btn-default" id='cancel' href='<?php echo URL; ?>'>Cancel</a>
                                                            <button class="btn btn-primary" id='frmSubmitAddSemester' type="button">Add Term</button>
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