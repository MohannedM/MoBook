<?php 
class Post{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getPosts(){
        $this->db->query("SELECT *,
                        posts.id as postId,
                        users.id as userId,
                        posts.created_at as postCreated,
                        users.created_at as userCreated
                        FROM posts INNER JOIN users on posts.user_id = users.id
                        ORDER BY posts.created_at DESC");
        return $this->db->resultSet();
    }
    public function addPost($data){
        $this->db->query("INSERT INTO posts(user_id, title, body, image) VALUES(:user_id, :title, :body, :image)");
        //Bind Values
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':image', $data['image']);
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function getPostById($id){
        $this->db->query("SELECT * FROM posts WHERE id = :id");
        //bind values
        $this->db->bind(':id', $id);
        //return post
        return $this->db->single();
    }
    public function editPost($data){
        $this->db->query("UPDATE posts SET title = :title, body = :body, image = :image WHERE id = :id");
        //Bind Values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':id', $data['id']);
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id){
        $this->db->query("DELETE FROM posts WHERE id = :id");
        $this->db->bind(':id', $id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}