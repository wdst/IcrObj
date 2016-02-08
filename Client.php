<?php

namespace wdst\YiiJsonRPCClient;

use Yii;
use Yii\App;
use yii\base\Component;
/**
 * Description of Client
 *
 * @author wds
 */
class Client extends Component{

    public $session_guid;

    public $url;

    public $login;

    private $IcrObj;

    private $Model;

    public function init()
    {
        parent::init();
        $this->Model = new JsonModel($this->url);
    }

    public function getObj($type_code, $object_id = null)
    {
        $this->Model = new JsonModel($this->url);

        $this->IcrObj = new IcrObj($this->Model,
                $this->getSessionId($this->login['username'], $this->login['password']),
                $type_code, $object_id);

        return $this->IcrObj;
    }

    public function getSessionId($username, $password)
    {
        return $this->Model->getSession($username, $password);
    }
}
