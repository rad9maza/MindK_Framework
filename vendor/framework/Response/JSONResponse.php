<?php

namespace Framework\Response;


class JSONResponse extends Response
{
    public $content_type = 'application/json';
    public function setContent($data)
    {
        $this->content = json_encode($data);
    }
}