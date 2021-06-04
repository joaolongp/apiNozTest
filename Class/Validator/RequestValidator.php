<?php

namespace Validator;

use http\Client;
use Repository\ClientsRepository;
use Service\ClientsService;
use Util\UtilGenericConstants;
use Util\UtilJson;

class RequestValidator
{
    private $request;
    private array $requestData = [];
    private object $ClientsRepository;

    const GET = 'GET';
    const DELETE = 'DELETE';
    const CLIENTS = 'CLIENTS';
    /**
     * RequestValidator constructor.
     * @param $request
     */
    public function __construct($request)
    {
        $this->request = $request;
        $this->ClientsRepository = new ClientsRepository();
    }

    /**
     * @return string
     */
    public function requestProcessor()
    {
        $return = utf8_encode(UtilGenericConstants::MSG_ROUTE_ERROR);

        $this->request['method'] == 'POST';
        if(in_array($this->request['method'], UtilGenericConstants::METHOD_REQUEST, true)){
            $return = $this->directRequest();
        }
        return $return;
    }

    private function directRequest()
    {
        if($this->request['method'] !== self::GET && $this->request['method'] !== self::DELETE){
            $this->requestData = UtilJson::JsonBodyRequestHelper();
        }
        $method = $this->request['method'];
        return $this->$method();
    }

    private function get(){
        $return = utf8_encode(UtilGenericConstants::MSG_ROUTE_ERROR);
        if(in_array($this->request['route'], UtilGenericConstants::METHOD_GET)){
            switch ($this->request['route']){
                case self::CLIENTS:
                    $ClientsService = new ClientsService($this->request);
                    $return = $ClientsService->validateGet();
            }
        }
    }
}