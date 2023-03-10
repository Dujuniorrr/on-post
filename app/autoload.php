<?php

    spl_autoload_register(function ($class){

        $dirs = [
            "libraries",
            "helpers",
            "model",
            "dao"
        ];

        foreach($dirs as $dir){
            $file = __DIR__ . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $class .'.php';
            if(file_exists($file)){
                require_once($file);
            }
        }
    });
?>