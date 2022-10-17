<?php
class userModel extends DB{
    public function findUserByEmailOrUsername($email,$username){
        $this->query('SELECT * FROM Customers WHERE email = :email OR username = :username');
        $this->bind(':email',$email);
        $this->bind(':username',$username);
        $row = $this->single();
        if($this->rowCount() > 0){
            return $row;
        }
        else{
            return false;
        }
    }
    public function registerUser($data){
        $this->query('INSERT INTO Customers (username,email,password) VALUES (:username,:email,:password)');
        $this->bind(':username',$data['username']);
        $this->bind(':email',$data['email']);
        $this->bind(':password',$data['password']);
        if($this->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    public function loginUser($data){
        $row = $this->findUserByEmailOrUsername($data['username'],$data['username']);
        if($row){
            // if(password_verify($data['password'],$row['password'])){
            //     return $row;
            // }
            if($data['password'] == $row['password']) return $row;
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
}
?>