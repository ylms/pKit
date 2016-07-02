<?php

use App\Controllers\IndexController;

$cc = $controllerCollector;
$cp = $controllerParameters;

$cc->add(new IndexController($cp));