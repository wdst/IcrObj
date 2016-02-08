<?php

namespace wdst\IcrObj;
/**
 * Description of IcrObj
 *
 * @author wds
 */
class IcrObj {

    public $session_guid;

    public $url;

    public $type_code;

    public $type_id;

    public $object_id;

    public $action;

    public $attr_value = [];

    public $Model;

    public $responce;

    public function __construct(AbstractDataModel $Model, $session_guid, $type_code, $object_id = null)
    {
        $this->type_code = $type_code;
        $this->object_id = $object_id;
        $this->Model = $Model;
        $this->session_guid = $session_guid;

        if(empty($this->object_id)){
            $this->action = 'I';
        } else {
            $this->action = 'U';
        }
    }

    public function setAttr($attr, $value = null)
    {
        if(is_array($attr) && is_null($value)){
            $this->attr_value = $attr;
            return $this;
        }
        if(!is_null($value)){
            $this->attr_value[$attr] = $value;
        }
        return $this;
    }

    public function getAttr($attr)
    {
        return $this->attr_value[$attr];
    }

    public function save()
    {
        $obj = [
            'session_guid' => $this->session_guid,
            'type_code' => $this->type_code,
            'object_id' => $this->object_id,
            'action' => $this->action,
            'attr_value' => $this->attr_value
        ];

        $this->responce = $this->Model->object($obj);

        return $this->responce;
    }
}
