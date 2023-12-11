<?php
include (__DIR__ . '/modelGames.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
else {
    $games = getGames();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete'])) {
        $id = $_POST['delete'];
        $result = deleteGame($id);

        if ($result === 'Data Deleted') {
            header("Location: viewGames.php");
            exit();
        }
    }
}

if (isset($_POST['searchButton'])) {
    $title = filter_input(INPUT_POST, 'title');
    $publisher = filter_input(INPUT_POST, 'publisher');
    $rating = filter_input(INPUT_POST, 'rating');
} else {
    $title = '';
    $publisher = '';
    $rating = '';
}

$games = searchGames($title, $publisher, $rating);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Game Statistics</title>
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
    <h2>Games</h2>
<table>
<form method="post">
        <label>Title:</label>
        <input type="text" name="title" />

        <label>Publisher:</label>
        <input type="text" name="publisher" />

        <label for="married">Rating:</label>
        <input type="text" name="rating" >
        <input type="submit" name="searchButton" value="Search" /><br><br>
    </form>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Publisher</th>
            <th>ReleaseDate</th>
            <th>Total Achievements</th>
            <th>Earned Achievements</th>
            <th>Rating</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ((array) $games as $g):
        ?>
        <tr>
            <td><?php echo isset($g['id']) ? $g['id'] : ''; ?></td>
            <td><?php echo isset($g['title']) ? $g['title'] : ''; ?></td>
            <td><?php echo isset($g['publisher']) ? $g['publisher'] : ''; ?></td>
            <td><?php echo isset($g['releaseDate']) ? $g['releaseDate'] : ''; ?></td>
            <td><?php echo isset($g['totalAchievements']) ? $g['totalAchievements'] : ''; ?></td>
            <td><?php echo isset($g['earnedAchievements']) ? $g['earnedAchievements'] : ''; ?></td>
            <td><?php echo isset($g['rating']) ? $g['rating'] : ''; ?></td>
            <td><a href="editGames.php?id=<?php echo isset($g['id']) ? $g['id'] : ''; ?>">Edit</a></td>
            <td>
                <form method="post" action="viewGames.php">
                    <input type="hidden" name="delete" value="<?php echo isset($g['id']) ? $g['id'] : ''; ?>" />
                    <input type="submit" value="Delete" />
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br>
<a href="addGames.php">Add Games</a>
<a href="viewGames.php">Reset</a>
<a href="logoff.php">Logoff</a>
</body>
</html>