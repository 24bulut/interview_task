<?php

namespace User\JobCase\Core;

class Bootstrap
{
    public function handleRoute(){
        $routes = require __DIR__.'/../Routes/Routes.php';
        foreach ($routes as $route => $detail){
            RouteManager::get($route,$detail['callable'],$detail['params']);
        }
        echo 'Sayfa bulunamadı';
        exit();
    }


}