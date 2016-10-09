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
    public function render($view, $params, $code = 200)
    {
        return new Response($params, $code);
    }

    //TODO Добавить больше методов, например, redirect, json, generateUrl ...
    //TODO https://github.com/symfony/symfony/blob/5129c4cf7e294b1a5ea30d6fec6e89b75396dcd2/src/Symfony/Bundle/FrameworkBundle/Controller/Controller.php
}