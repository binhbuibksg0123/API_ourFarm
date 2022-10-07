<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dashboard OurFarm</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/mvc/public/css/MasterLayout.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>

    </head>
    <body>
        <div class="navClass">
            <div class="logo">
                <img class="masterImg" src="/mvc/public/img/avt.jpg">
                <h1><span>our</span>Farm</h1>
            </div>
            <form action="/ourfarm/dashboard">
                <button class="navButton"><i class="fas fa-tachometer-alt"></i>Dashboard</button>
            </form>
            <form action="/<?=$_SESSION['domainname']?>/checkip">
                <button class="navButton"><i class="fa fa-microchip" aria-hidden="true"></i>Check Ip By Domain</button>
            </form>
            <form action="#">
                <button class="navButton"><i class="fas fa-tasks"></i>Task</button>
            </form>
            <form action="/ourfarm/recipe">
                <button class="navButton"><i class="fa fa-calculator" aria-hidden="true"></i>
                    Recipe</button>
            </form>
            <form action="#">
                <button class="navButton"><i class="fas fa-leaf"></i>Crop</button>
            </form>
            <form action="#">
                <button class="navButton"><i class="fas fa-comments-dollar"></i>Profit/Loss</button>
            </form>
            <form action="#">
                <button class="navButton"><i class="fas fa-user"></i>Users Management</button>
            </form>
        </div>
        <div class="mainClass">
            <header>
                <h2><i class="fas fa-indent"></i><?=$data['header']?></h2>
            </header>
            <main>
                <?php require_once "./mvc/views/pages/".$data["Page"].".php" ?>
            </main>
            <footer>
                <sub>Copyright <i class="fas fa-copyright"></i> Socialism Team / ourFarm</sub>
            </footer>
        </div>
    </body>
</html>