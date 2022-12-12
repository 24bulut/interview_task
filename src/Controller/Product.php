<?php

namespace User\JobCase\Controller;

use User\JobCase\Core\Controller;
use User\JobCase\Factory\PlatformFactory;

class Product extends Controller
{
    public function getProducts($params){
        $productModel = \User\JobCase\Model\Product::Instance();
        $products = $productModel->get();

        $platform = PlatformFactory::make($params['platform']);

        $result = $platform->convertProductsToXmlFeed($products);

        $this->setContentType()->setData($result)->sendResponse();
    }

}