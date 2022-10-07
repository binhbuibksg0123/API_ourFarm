<?php
include_once "mvc/core/session_help.php";
class users extends Controller{
    private $userModel;
    public function __construct(){
        $this->userModel = $this->model("userModel");
    }
    public function createUserSession($user){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['username'];
        $_SESSION['user_email'] = $user['email'];
        header("Location: home");
        exit();
    }
    public function mainpage(){
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        $data = [
            'username' => trim($_POST['username']),
            'password' => trim($_POST['password']),
        ];
        // print_r($this->userModel->findUserByEmailOrUsername($data['username'],$data['username']));
        if($this->userModel->findUserByEmailOrUsername($data['username'],$data['username'])){
            $logginUser = $this->userModel->loginUser($data);
            if($logginUser){
                $status = "ok";
                $result_code = 1;
                $name = $logginUser['name'];
                header('Content-type: application/json');
                echo json_encode(array("status" => $status, "result_code" => $result_code, "name" => $name),JSON_FORCE_OBJECT);
            }
            else{
                $status = "ok";
                $result_code = 2;
                header('Content-type: application/json');
                echo json_encode(array("status" => $status, "result_code" => $result_code),JSON_FORCE_OBJECT);
            }
        }
        else{
            $status = "ok";
                $result_code = 3;
                header('Content-type: application/json');
                echo json_encode(array("status" => $status, "result_code" => $result_code),JSON_FORCE_OBJECT);
        }
    }
    public function signup(){
        if(isset($_POST['username'])){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = [
                "username"=>trim($_POST['username']),
                "email"=>trim($_POST['email']),
                "password"=>trim($_POST['pwd']),
                "confirm_password"=>trim($_POST['pwdRe']),
            ];
            if(empty($data['username'])||empty($data['email'])||empty($data['password'])||empty($data['confirm_password'])){
                // aloo("signup","Please fill out all inputs");
                $this->view("signupLayout",[
                    "errorRegiester"=>"Please fill out all inputs",
                ]); 
            }
            if(!preg_match("/^[a-zA-Z0-9]*$/",$data['username'])){
                // aloo("signup","Username must be alphanumeric");
                $this->view("signupLayout",[
                    "errorRegiester"=>"Username must be alphanumeric",
                ]); 
            }
            if($data['password']!=$data['confirm_password']){
                $this->view("signupLayout",[
                    "errorRegiester"=>"Password and confirm password do not match",
                ]); 
            }
            if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
                $this->view("signupLayout",[
                    "errorRegiester"=>"Invalid email",
                ]); 
            }
            if($this->userModel->findUserByEmailOrUsername($data['email'],$data['username'])){
                $this->view("signupLayout",[
                    "errorRegiester"=>"Username or email already exists",
                ]); 
            }else{
                $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
                if($this->userModel->registerUser($data)){
                    header("Location: login");
                    exit();
                }
                else{
                    die("Something went wrong");
                }
            }
        }
        else {
            $this->view("signupLayout"); 
        }
    }
}
?>