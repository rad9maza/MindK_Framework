<?php

namespace Framework\Router;

class Router
{
    private $config;
    private $request;

    public function __construct($config = [])
    {
        $this->config = $config;
    }

    /**
     * Function selects the desired Route
     * @return array with controller, action and params (if present)
     */
    public function getRoute($request)
    {
        $this->request = $request;
        $uri = $request->getUri();
        $request_method = $request->getRequestMethod();

        foreach ($this->config as $route_name => $route_array) {

            if ($route_array['http_method'] === $request_method) {

                $uri_regexp = $this->preparePattern($route_array);
                preg_match($uri_regexp, $uri, $matches);

                if (count($matches) == 1) {
                    return [
                        "name" => $route_name,
                        "class" => $route_array["class"],
                        "method" => $route_array["action"],
                        "params" => [
                            "request" => $request
                        ]
                    ];
                } elseif (count($matches) > 1) {
                    return [
                        "name" => $route_name,
                        "class" => $route_array["class"],
                        "method" => $route_array["action"],
                        "params" => [
                            $this->getParams($route_array['requirements'], $matches),

                        ]
                    ];
                }
            }
        }
        return [
            "error" => "Pattern not exist",
        ];
    }

    /**
     * Function create regular expression for compare with URI
     * @param $route_array
     * @return string pattern
     */
    public function preparePattern($route_array)
    {
        $pattern = $route_array['pattern'];
        $pattern = str_replace('/', '\/', $pattern);

        if (array_key_exists('requirements', $route_array)) {
            foreach ($route_array['requirements'] AS $item) {
                $pattern = preg_replace("/{.*}/U", "(" . $item . "?)", $pattern, 1);
            }
        }

        return '/^' . $pattern . '$/';
    }

    /**
     * Function associates params from $params_array with values in $matches
     * @param $params_array
     * @param $matches
     * @return array $param_name => $param_value
     */
    public function getParams($params_array, $matches)
    {
        $params = [];
        $i = 1;
        foreach ($params_array as $param_name => $param_pattern) {
            $params[$param_name] = $matches[$i];
            $i++;
        }
        $params["request"] = $this->request;
        return $params;
    }
}