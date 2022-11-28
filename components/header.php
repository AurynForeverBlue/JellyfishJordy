<header class="card darkmode">
    <?php 

    // login check
    if(isset($_SESSION["UserID"])) { ?>
        <h1><a href="./">Home</a></h1>
        <a href="./leaderb.php"><button class="btn btn-blue"><i class="fa fa-trophy"></i>LEADERBOARD</button></a>
        <a href="./game.php"><button class="btn btn-green">▶ PLAY</button></a>
        <a href="./logout.php"><button class="btn btn-red">LOG OUT</button></a>
    <?php
    } else { ?>
        <h1>Welcome to jellyfish Jordy</h1>
    <?php } ?>
        
</header>