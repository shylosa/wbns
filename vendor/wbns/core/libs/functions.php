<?php

function debug($arr){
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

function redirect($http = false){
    if($http){
        $redirect = $http;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
    }

    header("Location: $redirect");
    exit;
}

function dd()
{
    echo '<pre>';
    array_map(function($x) {var_dump($x);}, func_get_args());
    die;
}