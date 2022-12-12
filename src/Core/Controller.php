<?php

namespace User\JobCase\Core;

class Controller
{
    protected $response;

    protected function setContentType($type = "text/xml"){
        header('Content-Type: '.$type.'; charset=utf-8', true);
        return $this;
    }

    protected function setData($data = ''){
        $this->response['data'] = $data;
        return $this;
    }

    protected function sendResponse(){
        echo $this->response['data'];
    }


}