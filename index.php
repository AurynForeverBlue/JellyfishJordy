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
    <title>Jellyfish Jordy | Welcoming your fish home</title>
    <meta name="description" content="A game with the greatest jellyfish called Jordy" />
    <meta name="keywords" content="game aqua fish">
    <meta name="author" content="Yourmom">

    <!-- icon -->
    <link rel="icon"          href="./media/seo/favicon.png"    type="image/png" />
    <link rel="shortcut icon" href="./media/seo/favicon.png"    type="image/png" />
    <link rel="shortcut icon" href="./media/seo/favicon.ico"    type="image/x-icon" />
    <link rel="apple-touch-icon" href="./media/seo/favicon.png" type="image/png" />
    
    <!-- css -->
    <link rel="stylesheet" href="./css/home.css">
</head>
<body>
    <?php include('./components/header.php') ?>
    <h2>falko is cool</h2>
    <div class="card darkmode">
        <h2>Over Ons</h2>
        <div id="developers">
            <div class="nerd">
                <img src="./media/page/pfp1.png" alt="">
                <h3>Josh Agripo</h3>
                <p>Hey mijn naam is Josh Agripo. Momenteel zit ik op het GLR. Voor dit project heb ik het spel gemaakt. Hievoor maakte ik een engine in js</p>
            </div>

            <div class="nerd">
                <img src="./media/page/pfp2.png" alt="">
                <h3>Christopher Garcia</h3>
                <p>Hey mijn naam is Christopher Garcia. Ik doe de opleiding Software Developer bij het Grafisch Lyceum. Voor dit project heb ik gewerkt aan de back- en front-end van deze website. Probeer maar een foute input in mijn database te zetten.</p>
            </div>

            <div class="nerd">
                <img src="./media/page/pfp3.png" alt="">
                <h3>Alexandros Papadakis</h3>
                <p>Hallo! Mijn naam is Alexandros Papadakis. Ik studeer Software Developer bij het Grafisch Lyceum ter Rotterdam. Voor dit project heb ik gewerkt aan de front-end van deze website.</p>
            </div>
        </div>
    </div>
    <div class="card darkmode">
        <h2>Over het spel</h2><br>
        <p>*Algemene info*</p><br>
        <h3>Over de ontwikkeling</h3><br>
        <p>*wat hierboven staat lmao*</p><br>
        <h3>Over onze ervaring</h3><br>
        <p>*wat hierboven staat lmao*</p><br>
        <h3>Over onze mening</h3><br>
        <p>*wat hierboven staat lmao*</p>
    </div>
</body>
</html>