<?php

namespace Framework\Controller;

use Framework\Response\Response;

class BaseController
{
    public function render($view, $params)
    {
            return new Response();
    }
}