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
                                    <li class="active">Students</li>
                                </ul>
                                <div class="m-b-md">
                                    <h3 class="m-b-none">Students</h3>
                                    <small>List of students with total and remaining fees.</small>
                                </div>
                                <section class="panel panel-default">

                                    <div class="table-responsive">
                                        <table class="table table-striped m-b-none" data-ride="datatables" id="studentListDashboard">
                                            <thead>
                                                <tr>
                                                    <th width="25%">Enroll Number</th>
                                                    <th width="20%">Name</th>
                                                    <th width="25%">Guardian</th>
                                                    <th width="15%">Course</th>
                                                    <th width="5%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for ($i = 0; $i < count($this->studentList); $i++) {
                                                    echo "<tr>";
                                                    echo "<td>" . $this->studentList[$i]['enrollNo'] . "</td>";
                                                    echo "<td>" . $this->studentList[$i]['firstName'] . " " . $this->studentList[$i]['LastName'] . "</td>";
                                                    echo "<td>" . $this->studentList[$i]['email'] . "</td>";
                                                    echo "<td>" . $this->studentList[$i]['name'] . "</td>";
                                                    echo "<td><a href='" . URL . "dashboard/profile/" . $this->studentList[$i]['id'] . "'>"
                                                    . "<i class='fa fa-user h4'></i></a></td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
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
        <script type="text/javascript" src="<?php echo URL_javascript . '/dashboard.js' ?>" ></script>
    </body>
</html>