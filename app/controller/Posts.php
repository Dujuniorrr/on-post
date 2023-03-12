<?php 

    class Posts extends Controller {

        public User $user;
        public UserDAO $user_dao;
        public Post $post;
        public PostDAO $post_dao;

        public function __construct()
        {
           Url::is_logged();

           $this->user = new User();
           $this->user_dao = new UserDAO();
           $this->post = new Post();
           $this->post_dao = new PostDAO();
        }

        public function index(){
            $data = [];
            $data['posts'] = $this->post_dao->list_all_posts();
            $this->view("/post/index", $data);
        }

        public function create(){
            $form = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            if(isset($form)){
                $data = [
                    'title' => $form['title'],
                    'content' => $form['content'],
                    'title_error' => '',
                    'content_error' => ''
                ];

                if(in_array("", $form)){
                    if(empty($form['title'])){
                        $data['title_error'] = 'Preencha o campo do título.';
                    }
    
                    if(empty($form['content'])){
                        $data['content_error'] = 'Preencha o campo de texto.';
                    }
                }
                else{
                    if(strlen($form['content']) > 5000){
                        $data['content_error'] = 'O número máximo de caracteres é 1000.';
                    }
                    else{
                        $this->user = $this->user_dao->find_by_id($_SESSION['user_id']);
                        $this->post->build_post($form, $this->user);
                        $this->post_dao->create_post($this->post);
                        Message::alert("user", "Seu post foi adicionado com sucesso!", "alert-success");
                        Url::redirect("posts/index");
                    }
                }      
            }
            else{
                $data = [
                    'title' => '',
                    'content' => '',
                    'title_error' => '',
                    'content_error' => ''
                ];
            }
            $this->view("/post/create", $data);
        }
        
        public function read($id){
            $data = [];
            if($this->post_dao->find_by_id($id)){
                $data['post'] = $this->post_dao->find_by_id($id);
                $this->view('/post/read', $data);
            }
            else{
                Message::alert("user", "Esse post não foi encontrado.", "alert-danger");
                Url::redirect("posts/index");
            }
        }

        public function update($id){
            try{
                $post = $this->post_dao->find_by_id($id);
                if($post->getUser()->getId() == $_SESSION['user_id']){
                    $form = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
                    if(isset($form)){
                        $data = [
                            'title' => $form['title'],
                            'content' => $form['content'],
                            'title_error' => '',
                            'content_error' => ''
                        ];
    
                        if(in_array("", $form)){
                            if(empty($form['title'])){
                                $data['title_error'] = 'Preencha o campo do título.';
                            }
            
                            if(empty($form['content'])){
                                $data['content_error'] = 'Preencha o campo de texto.';
                            }
                        }
                        else{
                            if(strlen($form['content']) > 5000){
                                $data['content_error'] = 'O número máximo de caracteres é 1000.';
                            }
                            else{
                                $post->build_post($form, $post->getUser());
                                $this->post_dao->update_post($post);
                                Message::alert("user", "Seu post foi atualizado com sucesso!", "alert-success");
                                Url::redirect("posts/index");
                            }
                        }      
                    }
                    else{
                        $data = [
                            'id' => $post->getId(),
                            'title' => $post->getTitle(),
                            'content' => $post->getContent(),
                            'title_error' => '',
                            'content_error' => ''
                        ];
                    }
                    $this->view("/post/update", $data);
                }
                else{
                    Message::alert("user", "Você não tem permissão para editar essa postagem.", "alert-danger");
                    Url::redirect("posts/index");
                }
            }
            catch(PDOException $e){
                Message::alert("user", "Essa postagem não foi encontrada.", "alert-danger");
                Url::redirect("posts/index");
            }
          
        }
        
        public function delete($id){
          $this->post = $this->post_dao->find_by_id($id);
          if($this->post->getUser()->getId() == $_SESSION['user_id']){
                $this->post_dao->delete_post($id);
                Message::alert("user", "Postagem deletada com sucesso!", "alert-danger");
                Url::redirect("posts/index");
          }
          else{
                Message::alert("user", "Você não tem permissão para deletar essa postagem", "alert-danger");
                Url::redirect("posts/index");
          }
        }
    }
?>