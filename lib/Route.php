<?php

namespace Lib;

class Route
{
    private static $routes = [];
    private static $middlewares = [];

    public static function get($uri, $callback)
    {
        self::addRoute('GET', $uri, $callback);
    }

    public static function post($uri, $callback)
    {
        self::addRoute('POST', $uri, $callback);
    }

    public static function put($uri, $callback)
    {
        self::addRoute('PUT', $uri, $callback);
    }

    public static function delete($uri, $callback)
    {
        self::addRoute('DELETE', $uri, $callback);
    }

    private static function addRoute($method, $uri, $callback)
    {
        $uri = trim($uri, '/');
        self::$routes[$method][$uri] = 
        [
            'callback' => $callback,
            'middleware' => null
        ];
    }

    public static function middleware($uri, $middlewareClass)
    {
        $uri = trim($uri, '/');
        self::$middlewares[$uri] = $middlewareClass;
    }

    private static function notFound()
    {
        http_response_code(404);
        echo "Error 404 - Page Not Found";
        exit;
    }

    public static function dispatch()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (strpos($uri, '/framework/public') === 0) 
        {
            $uri = substr($uri, strlen('/framework/public'));
        }

        $uri = trim($uri, '/');

        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'POST' && isset($_POST['_method'])) 
        {
            $method = strtoupper($_POST['_method']);
        }

        if (!isset(self::$routes[$method]))
        {
            return self::notFound();
        }

        foreach (self::$routes[$method] as $route => $data) 
        {

            $callback = $data['callback'];
            $middleware = $data['middleware'] ?? null;

            $pattern = $route;
            if (strpos($route, ':') !== false) 
            {
                $pattern = preg_replace('#:[a-zA-Z_]+#', '([a-zA-Z0-9\-_]+)', $route);
            }

            if (preg_match("#^$pattern$#", $uri, $matches)) 
            {

                $params = array_slice($matches, 1);

                $params = array_map('htmlspecialchars', $params);

                if ($middleware && class_exists($middleware)) 
                {
                    $mid = new $middleware();
                    if (method_exists($mid, 'handle')) 
                    {
                        $result = $mid->handle();
                        if ($result === false) 
                        {
                            return; 
                        }
                    }
                }

                if (is_array($callback)) 
                {
                    $controller = new $callback[0];
                    $response = $controller->{$callback[1]}(...$params);
                } else 
                {
                    $response = $callback(...$params);
                }

                if (is_array($response) || is_object($response))
                {
                    header('Content-Type: application/json');
                    echo json_encode($response);
                } else 
                {
                    echo $response;
                }
                return;
            }
        }
        return self::notFound();
    }
}
