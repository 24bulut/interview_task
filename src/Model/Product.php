<?php

namespace User\JobCase\Model;

use User\JobCase\Core\Model;
use User\JobCase\Traits\Singleton;

class Product extends Model
{
    use Singleton;

    public function get(){
        return json_decode($this->getPublicFile('products.json'));
    }
}