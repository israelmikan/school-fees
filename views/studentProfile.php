<?php
//print_r($this->studentDetails);
//print_r($this->semester);
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
                                    <li><a href="<?php echo URL; ?>"><i class="fa fa-home"></i> Home</a></li>
                                    <li><a href="<?php echo URL . '/dashboard'; ?>"><i class="fa fa-user"></i> Student</a></li>
                                    <li class="active">profile</li>
                                </ul>
                                <div class="m-b-md">
                                    <h3 class="m-b-none">Student Profile</h3>
                                    <small>Detail informations.</small>
                                </div>
                                <section class="panel panel-default">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="list-group bg-white">
                                                <a class="list-group-item" href="<?php echo URL . 'dashboard/addSemester/' . $this->studentDetails[0]['id'] ?>">
                                                    <i class="fa fa-chevron-right icon-muted"></i>
                                                    <i class="fa fa-plus fa-fw"></i> Add Term
                                                </a>
                                                <a class="list-group-item" href="<?php echo URL . 'dashboard/update/' . $this->studentDetails[0]['id']; ?>">
                                                    <i class="fa fa-chevron-right icon-muted"></i>
                                                    <i class="fa fa-pencil fa-fw"></i> Update student information
                                                </a>
                                                <a class="list-group-item" href="<?php echo URL . 'dashboard/delete/' . $this->studentDetails[0]['id']; ?>">
                                                    <i class="fa fa-chevron-right icon-muted"></i>
                                                    <i class="fa fa-minus-circle fa-fw"></i> Delete Student
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <table class="table table-striped m-b-none">
                                                <thead>
                                                    <tr>
                                                        <td width="20%"></td>
                                                        <td width="80%"></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Firstname:</strong></td>
                                                        <td><?php echo $this->studentDetails[0]['firstName']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Lastname:</strong></td>
                                                        <td><?php echo $this->studentDetails[0]['lastName']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Enroll No:</strong></td>
                                                        <td><?php echo $this->studentDetails[0]['enrollNo']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Address:</strong></td>
                                                        <td><?php echo $this->studentDetails[0]['address']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Phone-1:</strong></td>
                                                        <td><?php echo $this->studentDetails[0]['p1']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Phone-2:</strong></td>
                                                        <td><?php echo $this->studentDetails[0]['p2']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Course:</strong></td>
                                                        <td><?php echo $this->studentDetails[0]['courseName']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <?php
                                        foreach ($this->semester as $val) {
                                            echo '<div class="col-lg-6">';
                                            echo '<section class="panel panel-default">';
                                            echo '<header class="panel-heading">';
                                            echo '<a href="' . URL . 'dashboard/semDetails/' . $val['id'] . '"><h4 style="display: inline-block;">' . ucfirst($val['name']) . '</h4></a>';
                                            echo '<span class="pull-right"><a href="' . URL . 'dashboard/addFees/' . $val['id'] . '"><i class="fa fa-plus"></i> Add Fees</a></span>';
                                            echo '</header>';
                                            echo '<table class="table table-striped m-b-none">';
                                            echo '<thead><tr><th width="50%">Amount</th><th width="40%">Date & Time</th><th width="10%">Invoice</th></tr></thead>';
                                            echo '<tbody>';
                                            foreach ($val['emi'] as $emi) {
                                                echo '<tr>';
                                                echo '<td>' . $emi['amount'] . '</td>';
                                                echo '<td>' . model::mDisplayDate($emi['lastUpdated']) . '</td>';
                                                echo '<td><a href="' . URL . 'dashboard/invoice/' . $emi['id'] . '"><i class="fa fa-clipboard"></i></a></td>';
                                                echo '</tr>';
                                            }
                                            echo '<tr>';
                                            echo '<td><h4>Total fees: </h4></td>';
                                            echo '<td><h4>' . $val['fees'] . ' &#8377;</h4></td>';
                                            echo '</tr>';
                                            echo '<tr>';
                                            echo '<td><h4>Remaining fees: </h4></td>';
                                            $sum_total = intval($val['fees']) - intval($val['paid']);
                                            echo '<td><h4>' . $sum_total . ' &#8377;</h4></td>';
                                            echo '</tr>';
                                            echo "</tbody>";
                                            echo '</table>';
                                            echo '</section>';
                                            echo '</div>';
                                        }
                                        ?>
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