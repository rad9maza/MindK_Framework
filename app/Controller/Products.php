<?php

namespace App\Controller;


use Framework\Response\Response;

class Products
{
    static public function get_all_products($params)
    {

        return new Response(("hw"), 200);

    }

    static public function get_product($params)
    {
        var_dump($params);
        return new Response(("hw"), 200);
    }
}