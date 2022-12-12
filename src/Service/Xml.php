<?php

namespace User\JobCase\Service;

use User\JobCase\Traits\Singleton;

class Xml
{
    use Singleton;
    private $childRootElementName = "product";

    function arrayToXml($array, $xml){
        foreach ($array as $key => $value) {
            if(is_int($key)){
                $key = $this->childRootElementName;
            }
            if(is_array($value)){
                $label = $xml->addChild($key);
                $this->arrayToXml($value, $label);
            }
            else {

                $xml->addChild($key, $value);
            }
        }
        return $xml;
    }

    public function replaceProductDetails($array,$replace){
        $temp = [];
        foreach ($array as $key => $value){
            foreach ($replace as $repKey => $repVal){
                if ($value === $repKey){
                    $temp[$key] = $repVal;
                }
                else{
                    if (is_array($value) && count($value)>0){

                        $temp[$key] = $this->replaceProductDetails($value,$replace);
                    }else{
                        if (!isset($temp[$key])){
                            $temp[$key] = $value;
                        }
                    }
                }

            }
        }
        return $temp;
    }

    public function setXmlTemplate($pattern,$products,$rootElementName="products",$childRootElementName="product"){
        $tempProduct = [];
        foreach ($products as $product){
            $tempProduct[] = $this->replaceProductDetails($pattern,[
                "{name}"=>$product->name,
                "{category}"=>$product->category,
                "{price}"=>$product->price
            ]);
        }

        $xml = new \SimpleXMLElement('<'.$rootElementName.'/>');
        $this->childRootElementName = $childRootElementName;
        $xml = $this->arrayToXml($tempProduct,$xml);

        return $xml->asXML();
    }
}