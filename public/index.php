<?php

include_once dirname(__DIR__) . '/vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(dirname(__DIR__) . '/.env');

ini_set('display_errors', $_ENV["ERRORS"]);

include_once '../routes/Web.php';