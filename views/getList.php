<?php
//print_r($this->param);
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

        <link rel="stylesheet" href="<?php echo URL_css; ?>/app.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo URL_js; ?>/datatables/jquery.dataTables.css" type="text/css"/>
        <link href="<?php echo URL_js; ?>/datatables/dataTables.tableTools.css" rel="stylesheet" />
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
                                    <li class="active">reports</li>
                                </ul>
                                <div class="m-b-md">
                                    <h3 class="m-b-none">Due Payments</h3>
                                    <small>List of students with total and remaining fees.</small>
                                </div>
                                <section class="panel panel-default">

                                    <div class="table-responsive">
                                        <table class="table table-striped m-b-none" data-ride="datatables" id="studentListDashboard">
                                            <thead>
                                                <tr>
                                                    <th width="20%">Enroll Number</th>
                                                    <th width="20%">Name</th>
                                                    <th width="20%">Paid (&#8377;)</th>
                                                    <th width="20%">Due (&#8377;)</th>
                                                    <th width="15%">Total (&#8377;)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($this->param as $val) {
                                                    $due = $val['fees'] - $val['paid'];
                                                    echo "<tr>";
                                                    echo "<td>" . $val['enrollNo'] . "</td>";
                                                    echo "<td>" . $val['firstName'] . " " . $val['lastName'] . "</td>";
                                                    echo "<td>" . $val['paid'] . "</td>";
                                                    echo "<td>" . $due . "</td>";
                                                    echo "<td>" . $val['fees'] . "</td>";
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
                        
                        <p align="right"><input name="" type="button" value="Print" onclick="javascript:window.print()" style="cursor:pointer; float:left;">
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
        <script src="<?php echo URL_js; ?>/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo URL_js; ?>/datatables/dataTables.tableTools.js"></script>

        <script type="text/javascript" src="<?php echo URL_javascript . '/main.js' ?>" ></script>
        <script type="text/javascript" src="<?php echo URL_javascript . '/reports.js' ?>" ></script>
         
    </body>
</html>