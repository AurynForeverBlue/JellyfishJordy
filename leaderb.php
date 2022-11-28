<?php
    // import needed files
    require "./Database/session.php";
    require "./Database/scoretable.php"; $score = new ScoreFunction;
    require "./Database/usertable.php"; $user = new UserFunction;

    $userid = $_SESSION["UserID"];
    $data = $score->GetLeaderboard();
    $user->loginCheck();
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

    <!-- icon -->
    <link rel="icon"          href="./media/seo/favicon.png"    type="image/png" />
    <link rel="shortcut icon" href="./media/seo/favicon.png"    type="image/png">
    <link rel="shortcut icon" href="./media/seo/favicon.ico"    type="" id="favicon" />
    <link rel="apple-touch-icon" href="./media/seo/favicon.png" type="image/png" >
    
    <!-- css -->
    <link rel="stylesheet" href="./css/leaderb.css">
</head>
<body>
    <?php include('./components/header.php') ?>

    <div class="card darkmode">
        <h1>Leaderboard</h1>
        <table id="leaderb">
            <thead>
                <th>Username</th>
                <th>Points</th>
            </thead>
            <tbody>
            <?php 
            
            foreach ($data as $score) {
                if ($score['user_id'] == $userid) { ?>
                    <tr class="playerScore">
                        <td><?php echo $user->GetUser($score['user_id'])[0]['username'];   ?></td>
                        <td><?php echo $score['score'] ?></td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td><?php echo $user->GetUser($score['user_id'])[0]['username'];   ?></td>
                        <td><?php echo $score['score'] ?></td>
                    </tr>
                <?php } ?>
                
            <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>