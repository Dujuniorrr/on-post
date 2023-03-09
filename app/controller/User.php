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

                if(in_array("", $form)){
                    if(empty($form['name'])){
                        $data['name_error'] = "Preencha o campo nome.";
                    }
    
                    if(empty($form['email'])){
                        $data['email_error'] = "Preencha o campo email.";
                    }
    
                    if(empty($form['password'])){
                        $data['password_error'] = "Preencha o campo de senha.";
                    }

                    if(empty($form['password_confirm'])){
                        $data['password_confirm_error'] = "Preencha o campo de confirmação de senha.";
                    }
                }
                else{
                    if(!Validation::check_name($form['name'])){
                        $data['name_error'] = "Adicione um nome válido.";
                    }
                    else if(!Validation::check_email($form['email'])){
                        $data['email_error'] = "Insira um email válido.";
                    }
                    else if(strlen($form['password']) < 8){
                        $data['password_error'] = "A senha deve ter no minímo 8 caracteres.";
                    }
                    else if($form['password'] != $form['password_confirm']){
                        $data['password_confirm_error'] = "As senha não correspodem.";
                    }
                    else{
                        echo "cadastra ai po";
                    }
                }
             
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