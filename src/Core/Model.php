<?php

namespace User\JobCase\Core;

class Model
{
    /**
     * @throws \Exception
     */
    protected function getPublicFile($file): string|bool
    {
        //file_exists
        if (file_exists(__DIR__.'/../../public/'.$file)){
            return file_get_contents(__DIR__.'/../../public/'.$file);
        }else{
            throw new \Exception('File Not Found');
        }
    }
}