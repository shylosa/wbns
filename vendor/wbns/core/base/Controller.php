<?php

namespace wbns\base;

abstract class Controller{

    public $route;
    public $controller;
    public $model;
    public $view;
    public $layout;
    public $data = [];

    public function __construct($route){
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $route['action'];
    }

    public function getView(){
        $viewObject = new View($this->route, $this->layout, $this->view);
        $viewObject->render($this->data);
    }

    public function set($data){
        $this->data = $data;
    }

    public function isAjax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }

    public function loadView($view, $vars = []){
        extract($vars);
        require APP . "/views/{$this->controller}/{$view}.php";
    }
}