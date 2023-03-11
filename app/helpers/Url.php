<?php
    class Url{

        public static function redirect($url){
            header("Location:" . URL . DIRECTORY_SEPARATOR . $url);
        }

        public static function is_logged(){
            if(!isset($_SESSION["user_id"])){
                Message::alert("user", "Você só pode acessar essa página caso esteja logado!", "alert-danger");
                Url::redirect('pages/index');
            }
        }

        public static function is_not_logged(){
            if(isset($_SESSION["user_id"])){
                Message::alert("user", "Você já está logado!", "alert-danger");
                Url::redirect('pages/index');
                return false;
            }

            return true;
        }
    }
?>