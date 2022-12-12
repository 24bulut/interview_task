<?php

namespace User\JobCase\Core;

class RouteManager
{

    public static function get($url, $actions,$params = [])
    {
        self::fetch($url, $actions,__FUNCTION__,$params);
    }

    public static function post($url, $actions,$params = [])
    {
        self::fetch($url, $actions,__FUNCTION__,$params);
    }

    public static function delete($url, $actions,$params = [])
    {
        self::fetch($url, $actions,__FUNCTION__,$params);
    }

    public static function put($url, $actions,$params = [])
    {
        self::fetch($url, $actions,__FUNCTION__,$params);
    }

    private static function fetch($url,$actions,$method,$params)
    {
        $_GET['url'] =isset($_GET['url']) ? $_GET['url'] : '';

        if ($_SERVER['REQUEST_METHOD']==strtoupper($method) && $url == '/'. $_GET['url']) {

            $actions = explode('@',$actions);
            $actionMethod = !isset($actions[1]) || $actions[1] ==="" ? 'index': $actions[1];
            $controller =$actions[0];

            $controllerClass = "\User\JobCase\Controller\\".$controller;
            $controllerClass = new $controllerClass();
            $controllerClass->{$actionMethod}($params);
            exit;
        }
    }
}