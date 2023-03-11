<?php


    class Users extends Controller {

        public User $user;
        public UserDAO $user_dao;

        public function __construct()
        {
            $this->user = new User();
            $this->user_dao = new UserDAO();
        }

        public function register(){
            if(Url::is_not_logged()){
                $form = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
                if(isset($form)){
                    $data = [
                        'name' => trim($form['name']),
                        'email' => trim($form['email']),
                        'password' => trim($form['password']),
                        'password_confirm' => trim($form['password_confirm']),
                        'name_error' => null,
                        'email_error' => null,
                        'password_error' => null,
                        'password_confirm_error' => null
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
                        else if($this->user_dao->email_already_exists($form['email'])){
                            $data['email_error'] = "O email informado já está sendo utilizado.";
                        }
                        else{
                            $form['password'] = password_hash($form['password'], PASSWORD_DEFAULT);
                            $this->user->build_user($form);

                            if($this->user_dao->create_user($this->user)){
                                Message::alert("user", "Cadastro realizado com sucesso, agora faça login!", 'alert-success');
                                Url::redirect("users/login");
                            }
                            else{
                                Message::alert("user", "Cadastro inválido, tente novamente", 'alert-danger');
                            }
                        }
                    }
                
                }
                else{
                    $data = [
                        'name' => null,
                        'email' => null,
                        'password' => null,
                        'password_confirm' => null,
                        'name_error' => null,
                        'email_error' => null,
                        'password_error' => null,
                        'password_confirm_error' => null
                    ];
                }
                $this->view('user/register', $data);
            }
        }

        public function login(){
           if(Url::is_not_logged()){
                $form = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
                if(isset($form)){
                    $data = [
                        'email' => $form['email'],
                        'password' => $form['password'],
                        'email_error' => null,
                        'password_error' => null,
                        'message' => null,
                        'message-type' => null
                    ];

                    if(in_array("", $form)){

                        if(empty($form['email'])){
                            $data['email_error'] = "Preencha o campo email.";
                        }

                        if(empty($form['password'])){
                            $data['password_error'] = "Preencha o campo de senha.";
                        }

                    }
                    else{
                        if(!Validation::check_email($form['email'])){
                            $data['email_error'] = "Insira um email válido.";
                        }
                        else if(strlen($form['password']) < 8){
                            $data['password_error'] = "A senha deve ter no mínimo 8 caracteres";
                        }
                        else{
                            $user_data = $this->user_dao->verify_user($form['email'], $form['password']);
                            if($user_data){
                                $this->user->build_user($user_data);
                                $this->user->create_session();
                                Message::alert("user", "Seja bem vindo!", 'alert-success');
                                Url::redirect('posts/index');
                            }
                            else{
                                Message::alert("user", "Email e/ou senha inválidos.", 'alert-danger');
                            }
                        }
                    }
                }
                else{
                    $data = [
                        'email' => null,
                        'password' => null,
                        'email_error' => null,
                        'password_error' => null,
                        'message' => null,
                        'message-type' => null
                    ];
                }
                $this->view('user/login', $data);
           }
        }

        public function logout(){
            $this->user->destroy_session();
            Url::redirect('pages/index');
        }

       
    }
?>