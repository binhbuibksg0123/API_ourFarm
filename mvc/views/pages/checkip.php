<link href="/mvc/public/css/checkip.css" type="text/css" rel="stylesheet">
<form action="checkip" method="post" id="formip">
    <label>
        Domain URL:
        <input type="text" name="domain" placeholder="Domain Name: " required/>
        <input type="submit" value="Look up">
    </label>
    <div>
        <?php
            if(isset($data["errorIp"])){
                echo "<div class='form-message form-message-red'>".$data["errorIp"]."</div>";
            }
            if(isset($data["ip"])){
                echo "<div class='form-message form-message-green'>".$data["ip"]."</div>";
            }
        ?>
    </div>
</form>