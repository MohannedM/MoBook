<?php
class User{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getUserByEmail($email){
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);
        if($this->db->row() > 0){
            return $this->db->single();
        }else{
            return false;
        }
    }
    public function register($data){
        $this->db->query("INSERT INTO users(fullname, email, password) VALUES(:fullname, :email, :password)");
        
        //Bind Values
        $this->db->bind(':fullname', $data['fullname']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function verifyPassword($data){
        //Get user
        $user = $this->getUserByEmail($data['email']);
        if($user){
            $hashed_password = $user->password;
            if(password_verify($data['password'],$hashed_password)){
                return true;
            }else{
                return false;
            }
        }
    }
    public function getUserById($id){
        $this->db->query("SELECT * FROM users WHERE id = :id");
        //bind values
        $this->db->bind(':id', $id);
        //return user
        return $this->db->single();
    }

}