<?php

namespace Framework\Response;


/**
 * Class JSONResponse
 * @package Framework\Response
 */
class JSONResponse extends Response
{
    /**
     * @var string content_type
     * @default 'application/json'
     */
    public $content_type = 'application/json';

    /**
     * Method set Content by encoded $data to JSON
     * @param $data
     */
    public function setContent($data)
    {
        $this->content = json_encode($data);
    }
}