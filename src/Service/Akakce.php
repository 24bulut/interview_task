<?php

namespace User\JobCase\Service;

use User\JobCase\Interfaces\IPlatform;
use User\JobCase\Traits\Singleton;

class Akakce implements IPlatform
{
    use Singleton;

    public function convertProductsToXmlFeed($products){
        $xmlService = Xml::Instance();
        return $xmlService->setXmlTemplate([
            "product_name"=>"{name}",
            "prices"=>'{price}',
            "category"=>"{category}"
        ],$products);
    }
}