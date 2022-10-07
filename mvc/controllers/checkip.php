<?php
    class checkip extends Controller{
        public function mainpage(){
            if(isset($_POST['domain'])){
                $domain = $_POST['domain'];
  
                // if (!filter_var($domain, FILTER_VALIDATE_URL) === false) {
                    $ip = gethostbyname($domain);
                    $this->view("masterLayout",[
                        "Page"=>"checkip",
                        "header"=>"Check IP",
                        "ip"=>$ip
                    ]);
               // }
                // else {
                //     $this->view("masterLayout",[
                //         "header"=>"Check IP",
                //         "Page"=>"checkip",
                //         "errorIp" => "URL Doesn't Exist"
                //     ]);
                    
                // }
                
                
            }else
            $this->view("masterLayout",[
                "Page"=>"checkip",
                "header"=>"Check IP"
            ]);
        }
    }
?>