<?php
namespace wdst\IcrObj;
use JsonRPC\Client as JsonRPCClient;

Class JsonModel extends AbstractDataModel{

    public function __construct($url, $timeout = 3, $headers  = array()) {
        $this->client = new JsonRPCClient($url, $timeout, $headers);
    }
    
    public function getClient()
    {
        return $this->client;
    }
    
    function save(){

    }
}