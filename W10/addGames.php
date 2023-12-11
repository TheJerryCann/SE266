<?php
    session_start();

    include (__DIR__ . '/modelGames.php');
    include (__DIR__ . '/db.php');

    function age($releaseDate) { 
        $date = new DateTime($releaseDate);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
    }

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }
    else {
        $games = getGames();
    }

    $error = 0;
    $errormsg = "";
    $now = new DateTime;
    if (isset($_POST['submitBtn'])){ 

        $title = filter_input(INPUT_POST,'title');
        $publisher = filter_input(INPUT_POST,'publisher');
        $releaseDate = filter_input(INPUT_POST,'releaseDate');
        if (age($releaseDate) > 65){
            $error += 1;
            $errormsg .= "The release date cannot have been more than 65 years ago\n"; #first video game ever made
        }
        if ($releaseDate > $now){
            $error += 1;
            $errormsg .= "Cannot enter a future date\n";
        }
        $totalAchievements = filter_input(INPUT_POST,'totalAchievements', FILTER_VALIDATE_INT);
        if ($totalAchievements < 0){
            $error += 1;
            $errormsg .= "Number of achievements cannot be negative\n";
        }
        $earnedAchievements = filter_input(INPUT_POST,'earnedAchievements', FILTER_VALIDATE_INT);
        if ($earnedAchievements < 0){
            $error += 1;
            $errormsg .= "Number of achievements cannot be negative\n";
        }
        if ($earnedAchievements > $totalAchievements){
            $error += 1;
            $errormsg .= "Number of earned achievements cannot surpass total achievements\n";
        }
        $rating = filter_input(INPUT_POST,'rating', FILTER_VALIDATE_INT);
        if ($rating < 0){
            $error += 1;
            $errormsg .= "Rating cannot be negative\n";
        }
        if ($rating > 100){
            $error += 1;
            $errormsg .= "Rating cannot be over 100\n";
        }
        if ($error !=0){ 
            echo $errormsg;
        }
        if ($error == 0){  
            header("Location: viewGames.php");
        }
        if(isset($_POST['submitBtn']) && ($error == 0)){
            addGame($title, $publisher, $releaseDate, $totalAchievements, $earnedAchievements, $rating);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Creation Log</title>
    <h1>Game Creation Log</h1>
    <form method="post" action="addGames.php">
    <style>      
    body{
        background-color: #4C4747;
        color: white;
        text-align: center;
    }
    table,tr,th,td{
        border: 1px solid black;
        text-align: center;
        margin-left: auto;
        margin-right: auto;
    }
    label{
        margin-left: 20px;
        margin-right: 5px;
    }
    a{
        color: darkblue;
    }

</style>
</head>
<body>
    <form action="index.php" method="post"> 
        <label for="title">Game Title:</label>
        <input type="text" name="title" required >
        <br><br>
        <label for="publisher">Publisher:</label>
        <input type="text" name="publisher" required>
        <br><br>
        <label for="releaseDate">Release Date:</label>
        <input type="date" name="releaseDate" required>
        <br><br>
        <label for="totalAchievements">Total Achievements:</label>
        <input type="number" name="totalAchievements" required>
        <br><br>
        <label for="earnedAchievements">Earned Achievements:</label>
        <input type="number" name="earnedAchievements">
        <br><br>
        <label for="rating">Rate This Game:</label>
        <input type="number" name="rating">
        <br><br>
        <input type="submit" name="submitBtn"/>
        </form>
        <?php
            $file = basename($_SERVER['PHP_SELF']);
            $mod_date=date("F d Y h:i:s A", filemtime($file));
            echo "<br>File last updated $mod_date";
        ?>
<br><br>
<a href="viewGames.php">View Games</a>
</body>
</html>