<?php

namespace App\Controller;

use Framework\Controller\BaseController;
use Framework\Request\Request;
use \Framework\Response\Response;

/**
 * Class ProductsController
 * @package App\Controller
 */
class ProductsController extends BaseController
{
    /**
     * @return Response
     */
    public function get_all_products()
    {
        return $this->render("", "get_all_products", 200);
    }

    /**
     * @param $id
     * @param Request $request
     * @return Response
     */
    public function get_product($id, Request $request)
    {
        return $this->render("", "get_product $id", 200);
    }
}