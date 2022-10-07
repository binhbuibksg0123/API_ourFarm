<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login to OurFarm</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/mvc/public/css/login.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div id="mainframe">
            
                <img src="/mvc/public/img/avt.jpg" alt="logo">
                <h1><span>our</span>Farm</h1>
                <form method="post">
                    <label>
                        <input type="email" name="email" placeholder="&#xf0e0 Email" required>
                    </label>
                    <label>
                        <input type="username" name="username" placeholder="&#xf007 username" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,16}$" required>
                    </label>
                    <label>
                        <input type="password" name="pwd" placeholder="&#xf084 Password"  pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$" required>
                    </label>
                    <label>
                        <input type="password" name="pwdRe" placeholder="&#xf09c Repeat Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$" required>
                    </label>
                    <a href="#">Forgot password?</a>
                    <input type="submit" value="Sign Up">
                    <?php
                        include_once 'mvc/core/session_help.php';
                        // aloo("signup")
                        if(isset($data["errorRegiester"])){
                            echo "<div class='form-message form-message-red'>".$data["errorRegiester"]."</div>";
                        }
                    ?>
                    
                
                </form>

        </div>
    </body>
</html>