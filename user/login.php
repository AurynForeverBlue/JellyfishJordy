<?php
    // import needed files
    require "../Database/session.php";
    $session = new SessionFunction;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- seo -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jellyfish Jordy | Logging into your fish</title>
    <meta name="description" content="A game with the greatest jellyfish called Jordy" />
    <meta name="keywords" content="game aqua fish">

    <!-- icon -->
    <link rel="icon"          href="../media/seo/favicon.png"    type="image/png" />
    <link rel="shortcut icon" href="../media/seo/favicon.png"    type="image/png">
    <link rel="shortcut icon" href="../media/seo/favicon.ico"    type="" id="favicon" />
    <link rel="apple-touch-icon" href="../media/seo/favicon.png" type="image/png" >
    
    <!-- css -->
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <?php include('../components/header.php') ?>

    <form method="POST" action="../backend/LoginVerwerk.php" autocomplete="off" class="darkmode card loginForm">
        <input type="hidden" name="csrf_token" <?php echo 'value="'.$session->CreateID().'"'; ?>>

        <h1>Login:</h1>
        <div class="form__group field">
            <label for="name" class="form__label">Username</label>
            <input type="text" class="form__field" placeholder="Username" name="username" required />
        </div>
        <div class="form__group field">
            <label for="name" class="form__label">Password</label>
            <input type="password" class="form__field" placeholder="Password" name="password" required /> <!-- lees invoer uit in verwerk. gebruik session functie om te checken als ingevuld is en hier tonen -->
        </div>

        <?php
            if(isset($_SESSION["error"])){
                echo $_SESSION["error"];
            }
            $_SESSION["error"] = '';
        ?> 

        <input type="submit" class="btn btn-blue" name="submit" value="Inloggen"/>
        <p>Heeft u geen account? <a href="./register.php" class="register">Registreren</a></p>
    </form>
</body>
</html>