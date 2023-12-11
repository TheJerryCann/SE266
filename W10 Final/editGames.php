<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Log</title>

</head>
<body>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include __DIR__ . '/modelGames.php';
include __DIR__ . '/db.php';


$id = isset($_GET['id']) ? $_GET['id'] : null;

$selectedGame = null;
foreach ($games as $g) {
    if ($g['id'] == $id) {
        $selectedGame = $g;
        break;
    }
}


$id = $selectedGame["id"] ?? null;
$title = $selectedGame["title"] ?? '';
$publisher = $selectedGame['publisher'] ?? '';
$releaseDate = $selectedGame["releaseDate"] ?? '';
$totalAchievements = $selectedGame["totalAchievements"] ?? '';
$earnedAchievements = $selectedGame["earnedAchievements"] ?? '';
$rating = $selectedGame["rating"] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'] ?? $id;
    $title = $_POST['title'] ?? $title;
    $publisher = $_POST['publisher'] ?? $publisher;
    $releaseDate = $_POST['releaseDate'] ?? $releaseDate;
    $totalAchievements = $_POST['totalAchievements'] ?? $totalAchievements;
    $earnedAchievements = $_POST['earnedAchievements'] ?? $earnedAchievements;
    $rating = $_POST['rating'] ?? $rating;

    $result = updateGame($id, $title, $publisher, $releaseDate, $totalAchievements, $earnedAchievements, $rating);

    if ($result === 'Data Updated') {
        header("Location: viewGames.php");
        exit();
    } else {
        echo "Update failed. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Log</title>
</head>
<body>

<h2>Game Log</h2>

<form name="game" method="post" action="editGames.php">

    <div class="wrapper">
        <input type="hidden" name="id" value="<?= $id; ?>" />
        <div class="label">
            <label>Title:</label>
        </div>
        <div>
            <input type="text" name="title" value="<?= $title; ?>" required/>
        </div>
        <div class="label">
            <label>Publisher:</label>
        </div>
        <div>
            <input type="text" name="publisher" value="<?= $publisher; ?>" required/>
        </div>
        <div class="label">
            <label>Release Date:</label>
        </div>
        <div>
            <input type="date" name="releaseDate" value="<?= $rating; ?>" required/>
        </div>
        <div class="label">
            <label>Total Achievements:</label>
        </div>
        <div>
            <input type="text" name="totalAchievements" value="<?= $totalAchievements; ?>" required/>
        </div>
        <div class="label">
            <label>Earned Achievements:</label>
        </div>
        <div>
            <input type="text" name="earnedAchievements" value="<?= $earnedAchievements; ?>" required/>
        </div>
        <div class="label">
            <label>Rating:</label>
        </div>
        <div>
            <input type="text" name="rating" value="<?= $rating; ?>" required/>
        </div>

        <div>
            <input type="submit" name="submit" id="submit">
        </div>
    </div>

</form>

</body>
</html>