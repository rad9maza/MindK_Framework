<?php

namespace Framework\Controller;

use Framework\Response\Response;

/**
 * Class BaseController
 * Implement parent class for controllers
 * @package Framework\Controller
 */
class BaseController
{
    /**
     * @param $view
     * @param $params
     * @param $code
     * @return Response
     */
    public function render($view, $params, $code)
    {
        return new Response($params, $code);
    }
}