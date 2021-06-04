<?php


namespace Util;


use http\Exception\InvalidArgumentException;
use JsonException as JsonExceptionAlias;

class UtilJson
{

    /**
     * @return array|mixed
     */
    public static function JsonBodyRequestHelper()
    {
        try{
            $postJson = json_decode(file_get_contents('php://input'),true);
        }catch(JsonExceptionAlias $exception){
            throw new InvalidArgumentException(UtilGenericConstants::MSG_EMPTY_JSON_ERROR);
        }

        if(is_array($postJson) && count($postJson) > 0){
            return $postJson;
        }
    }

}