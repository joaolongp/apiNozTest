<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR);

const HOST = 'localhost';
const DATABASE = 'api';
const USER = 'root';
const PASSWORD = 'Joao@010798';

const DS = DIRECTORY_SEPARATOR;
const DIR_APP = __DIR__;
const DIR_PROJECT = 'api';

if(file_exists( 'autoload.php')){
    include 'autoload.php';
}else{
    echo 'Bootstrap Error';exit;
}