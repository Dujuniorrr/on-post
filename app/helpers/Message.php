<?php

    class Message{

        public static function alert($name, $text = null, $class = null){
            if(!empty($name)){
                if(! empty($text) && empty( $_SESSION[$name])){
                    $_SESSION[$name] = $text;
                    $_SESSION[$name . "-class"] = $class;
                }
                else if(!empty($_SESSION[$name]) && empty($text)){
                    $class = empty($_SESSION[$name . "-class"]) ? 'alert-success' : $_SESSION[$name . "-class"];
                    echo "<div class='alert ". $class ." col-11 col-sm-8 col-md-4 mt-2 mb-2 text-center m-auto' role='alert'>" .   $_SESSION[$name] . "</div>";

                    unset($_SESSION[$name]);
                    unset($_SESSION[$name . "-class"]);
                }
            }
        }

    }

?>