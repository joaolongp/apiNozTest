<?php

use Util\UtilRoutes;
use Validator\RequestValidator;

include 'bootstrap.php';

try{
    $RequestValidator = new RequestValidator(UtilRoutes::getRoutes());
    $return = $RequestValidator->requestProcessor();
}catch(Exception $exception){
    echo $exception->getMessage();
}