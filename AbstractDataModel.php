<?php
namespace wdst\YiiJsonRPCClient;

abstract class AbstractDataModel{

    public $client;

    public function getSession($username, $password)
    {
        return $this->client->add_session($username, $password);
    }

    public function object($obj)
    {
        return $this->client->object(json_encode($obj));
    }
}