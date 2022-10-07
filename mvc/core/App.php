<?php
    class App{
        private $controller="home";
        private $action="mainpage";
        private $param=[];
        function __construct(){
            $arr=$this->UrlProcess();
            if(isset($arr))
            if(file_exists("./mvc/controllers/".$arr[0].".php")){
                $this->controller=$arr[0];
            }
            require_once "./mvc/controllers/".$this->controller.".php";
            $this->controller=new $this->controller;
            unset($arr[0]);
            if(isset($arr[1])){
                if(method_exists($this->controller,$arr[1])){
                    $this->action=$arr[1];
                }
            }
            unset($arr[1]);
            $this->param=$arr?array_values($arr):[];
            call_user_func_array([$this->controller,$this->action],$this->param);
        }
        function urlProcess(){
            if(isset($_GET["url"])){
                $url=$_GET["url"];
                $url=rtrim($url,"/");
                $url=filter_var($url,FILTER_SANITIZE_URL);
                $url=explode("/",$url);
                return $url;
            }
        }
    }
?>