<?php
//print_r($this->studentList);
?>
<!DOCTYPE html>
<html lang="en" class="app">
    <head>
        <meta charset="utf-8" />
        <title>Students | List</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
        <link rel="stylesheet" href="<?php echo URL_css; ?>/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo URL_css; ?>/animate.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo URL_css; ?>/font-awesome.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo URL_css; ?>/font.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo URL_js; ?>/datatables/datatables.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo URL_css; ?>/app.css" type="text/css" />
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
                                    <li><a href='<?php echo URL; ?>'><i class="fa fa-home"></i> Home</a></li>
                                    <li class="active">Reports</li>
                                </ul>
                                <div class="m-b-md">
                                    <h3 class="m-b-none">Reports</h3>
                                    <small>Please select form below to find out list of students with remaining fees</small>
                                </div>
                                <section class="panel panel-default">
                                    <div class='panel-body'>
                                        <div class="alert alert-success hidden"></div>
                                        <div class="alert alert-danger hidden"></div>
                                        <form id='frmReport' name='frmReport' action='../xhrFrmReport' role="form">
                                            <div class="form-group col-md-6">
                                                <label>Select Branch</label>
                                                <select class="form-control m-b input-lg" name="course" id="course">
                                                    <option value="">Please select Class</option>
                                                    <?php
                                                    for ($i = 0; $i < count($this->param['courseList']); $i++) {
                                                        echo "<option value=" . $this->param['courseList'][$i]['id'] . ">" . $this->param['courseList'][$i]['name'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Select Term</label>
                                                <select class="form-control m-b input-lg" name="semester" id="semester">
                                                    <option value="">Please select Term</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <a class="btn btn-default" id='cancel' href='<?php echo URL; ?>'>Cancel</a>
                                                    <button class="btn btn-primary" id='frmSubmitReport' type="button">Search</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </section>
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
        <!-- datatables -->
        <script src="<?php echo URL_js; ?>/datatables/jquery.dataTables.min.js"></script>

        <script type="text/javascript" src="<?php echo URL_javascript . '/main.js' ?>" ></script>
        <script type="text/javascript" src="<?php echo URL_javascript . '/reports.js' ?>" ></script>
    </body>
</html>