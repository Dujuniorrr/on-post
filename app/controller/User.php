<?php


    class User extends Controller {

        public function register(){
            $form = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            if(isset($form)){
                $data = [
                    'name' => trim($form['name']),
                    'email' => trim($form['email']),
                    'password' => trim($form['password']),
                    'password_confirm' => trim($form['password_confirm'])
                ];
            }
            else{
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'password_confirm' => ''
                ];
            }
            $this->view('user/register', $data);
        }
    }
?>