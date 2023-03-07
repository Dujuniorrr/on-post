<?php 

    class Controller {

        public function model($model){
            require_once('../app/model/'.$model.'.php');
            return new $model;
        }

        public function view($view, $data = []){
            $file = "../app/view/".$view.".php";
            if(file_exists($file)){
                require_once($file);
            }
            else{
                die("The file view don't exists.");
            }
        }
    }
?>