<?php

    class Post {
        private $id;
        private $title;
        private $content;
        private $created_in;
        private User $user;
        
        public function build_post($data, User $user){
            $this->setId(isset($data['id']) ? $data['id'] : null);
            $this->setTitle($data['title']);
            $this->setContent($data['content']);
            $this->setCreated_in(isset($data['created_in']) ? $data['created_in'] : null);
            $this->setUser($user);
        }

        public function getTitle()
        {
                return $this->title;
        }

        public function setTitle($title)
        {
                $this->title = $title;

                return $this;
        }

        public function getContent()
        {
                return $this->content;
        }

        public function setContent($content)
        {
                $this->content = $content;

                return $this;
        }

        public function getCreated_in()
        {
                return $this->created_in;
        }

        public function setCreated_in($created_in)
        {
                $this->created_in = $created_in;

                return $this;
        }

        public function getUser()
        {
                return $this->user;
        }

        public function setUser($user)
        {
                $this->user = $user;

                return $this;
        }

        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
    }
?>