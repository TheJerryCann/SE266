<?php 
session_start();
include(__DIR__ . '/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $pw = $_POST['pw'];

    if (authenticateUser($username, $pw)==1) {
        $_SESSION['username'] = $username;
        header("Location: viewGames.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if(isset($error)) { echo "<p>$error</p>"; } ?>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="passkey">Password:</label>
        <input type="pw" id="pw" name="pw" required><br><br>

        <input type="submit" value="Login">
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
    </form>
</body>
</html>

<?php
function authenticateUser($username, $pw) {
    global $db;
    $results = [];
    $stmt = $db->prepare("SELECT * FROM users WHERE 0=0 AND username LIKE :username AND pw LIKE :pw");

    $binds = array(
        ":username" => $username,
        ":pw" => sha1($pw)
    );

    if($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = '1';
    }
    else{
        $results = '2';
    }

    return $results;
}
?>