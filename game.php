<?php
    // import needed files
    require "./Database/session.php";
    $session = new SessionFunction;
    $session->loginCheck();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- seo -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jellyfish Jordy | Be one with the fish</title>
    <meta name="description" content="A game with the greatest jellyfish called Jordy" />
    <meta name="keywords" content="game aqua fish">

    <!-- icon -->
    <link rel="icon"          href="./media/seo/favicon.png"    type="image/png" />
    <link rel="shortcut icon" href="./media/seo/favicon.png"    type="image/png">
    <link rel="shortcut icon" href="./media/seo/favicon.ico"    type="" id="favicon" />
    <link rel="apple-touch-icon" href="./media/seo/favicon.png" type="image/png" >
    
    <!-- css -->
    <link rel="stylesheet" href="./css/game/style.css">

    <!-- js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php include('./components/header.php') ?>

    <div class="wrapper">
        <div class="page__main" id="page-main">
            <h1 class="page__main-title">Jellyfish Jordy</h1>
            <button class="btn-primary" id="btn-play">Play</button>
        </div>
        <div class="page__secondary" id="game" hide>
            <div class="scoreboard">
                <div class="text" id="saveScore"></div>
                <div class="scoreboard__top">
                    <p>Score</p>
                    <p class="score-indicator" id="score"></p>
                </div>
                <div class="scoreboard__bottom">
                    <div class="progress-bar" id="progress-bar">
                        <p>Level</p>
                        <p class="level-indicator" id="level"></p>
                    </div>
                </div>
            </div>
            <div class="game-canvas" id="game-canvas">
                <div class=background>
                    <div class="background__far"></div>
                    <div class="background__mid"></div>
                    <div class="background__close"></div>
                </div>
                <div class="game-canvas__text">
                    <div class="text" id="text"></div>
                </div>
                <div class="character" id="character"></div>
            </div>
        </div>
    </div>
    <script src="./js/game.js"></script>
</body>
</html>