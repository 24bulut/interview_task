<?php

namespace User\JobCase\Factory;

use User\JobCase\Interfaces\IPlatform;
use User\JobCase\Service\Akakce;
use User\JobCase\Service\Cimri;
use User\JobCase\Service\Epey;

class PlatformFactory
{
    /**
     * @throws \Exception
     */
    public static function make($platform): IPlatform{
        switch ($platform){
            case 'akakce':
                return Akakce::Instance();
            case 'cimri':
                return Cimri::Instance();
            case 'epey':
                return Epey::Instance();
        }
        throw new \Exception('Platform Not Found');
    }

}