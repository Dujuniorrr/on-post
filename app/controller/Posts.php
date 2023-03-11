<?php 

    class Posts extends Controller {

        public function __construct()
        {
           Url::is_logged();
        }
        public function index(){
            $data = [];
            $this->view("/post/index", $data);
        }
        
    }
?>