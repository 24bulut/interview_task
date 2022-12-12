<?php

namespace User\JobCase\Service;

use User\JobCase\Interfaces\IPlatform;
use User\JobCase\Traits\Singleton;

class Cimri implements IPlatform
{
    use Singleton;

    public function convertProductsToXmlFeed($products){
        $xmlService = Xml::Instance();
        return $xmlService->setXmlTemplate([
            "product_name"=>"{name}",
            "prices"=>[
                "discounted_price"=>"{price}"
            ],
            "category"=>"{category}"
        ],$products);
    }
}