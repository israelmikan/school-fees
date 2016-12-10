<?php
//error_reporting(0);

require_once 'config/paths.php';
require_once 'config/database.php';

require_once 'config/bootstrap.php';
require_once 'config/controller.php';
require_once 'config/model.php';
require_once 'config/view.php';

require 'config/session.php';
$app = new bootstrap();
