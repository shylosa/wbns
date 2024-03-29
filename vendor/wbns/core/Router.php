<?php

namespace wbns;

class Router
{

    protected static $routes = [];
    protected static $route = [];
    protected static $paramUrl;

    /**
     * @return mixed
     */
    public static function getParamUrl()
    {
        return self::$paramUrl;
    }

    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function getRoute()
    {
        return self::$route;
    }

    public static function dispatch($url)
    {
        $url = self::removeQueryString($url);

        if (self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route['controller'] . 'Controller';

            if (class_exists($controller)) {
                $controllerObject = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';

                if (method_exists($controllerObject, $action)) {
                    $controllerObject->$action();
                    $controllerObject->getView();
                } else {
                    throw new \RuntimeException("Метод $controller::$action не найден", 404);
                }

            } else {
                throw new \RuntimeException("Контроллер $controller не найден", 404);
            }

        } else {
            throw new \RuntimeException('Страница не найдена', 404);
        }
    }

    public static function matchRoute($url): bool
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#{$pattern}#i", $url, $matches)) {

                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }

                if (empty($route['action'])) {
                    $route['action'] = 'index';
                }

                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    // CamelCase
    protected static function upperCamelCase($name)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    // camelCase
    protected static function lowerCamelCase($name): string
    {
        return lcfirst(self::upperCamelCase($name));
    }


    protected static function removeQueryString($url): ?string
    {
        if ($url) {
            $params = explode('?', $url, 2);
            if (false === strpos($params[0], '=')) {
                self::$paramUrl = explode('=', $url, 2)[1];
                return rtrim($params[0], '/');
            }
        }

        return '';
    }
}