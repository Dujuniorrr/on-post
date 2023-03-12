<?php

    class PostDAO {
        private PDO $conn;

        public function __construct()
        {
            $db = new Database();
            $this->conn = $db->connection();
        }

        public function create_post(Post $post){
            $stmt = $this->conn->prepare("INSERT INTO POST (title, content, USER_id) VALUES (:title, :content, :user_id)");
            $stmt->bindValue(":title", $post->getTitle());
            $stmt->bindValue(":content", $post->getContent());
            $stmt->bindValue(":user_id", $post->getUser()->getId());
            $stmt->execute();
        }

        public function update_post(Post $post){
            $stmt = $this->conn->prepare("UPDATE POST SET title = :title, content = :content WHERE id = :id");
            $stmt->bindValue(":title", $post->getTitle());
            $stmt->bindValue(":content", $post->getContent());
            $stmt->bindValue(":id", $post->getId());
            $stmt->execute();
        }

        public function delete_post($id){
            $stmt = $this->conn->prepare("DELETE FROM POST WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        }

        public function find_by_id($id){
            $stmt = $this->conn->prepare("SELECT * FROM POST WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                $row = $stmt->fetch();
                $user = new User();
                $user_dao = new UserDAO();
                $post = new Post();
                $user = $user_dao->find_by_id($row['user_id']);
                $post->build_post($row, $user);
                return $post;
            }

            return false;
        }

        public function list_all_posts(){
            $stmt = $this->conn->query("SELECT * FROM POST");
            $stmt->execute();
            $data = $stmt->fetchAll();
            $posts = [];
            foreach($data as $row){
                $user = new User();
                $user_dao = new UserDAO();
                $post = new Post();
                $user = $user_dao->find_by_id($row['user_id']);
                $post->build_post($row, $user);
                $posts[] = $post;
            }

            return $posts;
        }
    }
?>