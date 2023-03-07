<?php

    class Pages extends Controller {
        
        public function index(){
            $data =  [
                'title' => 'Página incial',
                'description' => 'Curso PHP'
            ];
            $this->view('pages/home', $data);
        }

        public function about(){
            $data =  [
                'title' => 'Página Sobre',
            ];
            $this->view('pages/about', $data);
        }
    }

?>