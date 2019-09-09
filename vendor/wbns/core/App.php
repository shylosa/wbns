<?php

namespace wbns;

class App
{
    public static $app;

    public function __construct()
    {
        $query = trim($_SERVER['REQUEST_URI'], '/');

        session_start();
        self::$app = Registry::instance();
        $this->getParams();
        new ErrorHandler();
        Router::dispatch($query);
    }

    protected function getParams()
    {
        $params = require_once CONF . '/params.php';
        if(!empty($params)){
            foreach ($params as $key=>$value){
                self::$app->setProperty($key, $value);
            }
        }
    }

    protected function getUriParams()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        $uri = $url[0] . '?';
        if( isset($url[1]) && $url[1] !=''){
            $params = explode('&', $url[1]);
            foreach ($params as $param) {
                if(!preg_match("#id=#", $param)) $uri .= "{$param}&amp;" ;
            }
        }
        return $uri;
    }
}