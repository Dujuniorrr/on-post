<?php

    class Validation {

        public static function check_name($name){
            if(!preg_match('~^[[:alnum:]-]+$~u', $name)){
                return false;
            }
            
            return true;
        }

        public static function check_email($email){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                return false;
            }

            return true;
        }
    }