<?php
class Home extends Controller{
    public function mainpage(){
        $this->view("masterLayout",[
            "header"=>"Homepage",
            "Page"=>"homepage"
        ]);
    }
    public function SayHi2(){
        echo "Hello World 2";
    }
}
?>