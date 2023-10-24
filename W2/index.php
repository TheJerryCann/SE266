<?php
    if (isset($_POST['submitBtn'])){
        echo "Form Submitted<hr />";
        $fname = filter_input(INPUT_POST,'fname');
        $lname = filter_input(INPUT_POST,'lname');
        $married = filter_input(INPUT_POST,'married');
        $bday = filter_input(INPUT_POST,'bday');
        $height = filter_input(INPUT_POST,'height', FILTER_VALIDATE_FLOAT);
        $weight = filter_input(INPUT_POST,'weight', FILTER_VALIDATE_FLOAT);
    }
    else {
        $height = 0;
        $weight = 0;
    }
    $error = "";
    if ($height < 0 and $height > 120){
        $error .= "<li>Height must be at least 1 inch</li>";
    }
    if ($error !=""){
        $error .= "<ul>$error</ul>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Intake Form</title>
    <h1>Patient Intake Form</h1>
</head>
<body>
    <form action="index.php" method="post">
        <label for="fname">First Name:</label>
        <input type="text" name="fname" value="<?= $fname; ?>" required>
        <br><br>
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" value="<?= $lname; ?>" required>
        <br><br>
        <label for="married">Married:</label>
        <input type="checkbox" name="married" value="<?= $married; ?>">
        <br><br>
        <label for="bday">Birth Date:</label>
        <input type="date" name="bday" value="<?= $bday; ?>" required>
        <br><br>
        <label for="height">Height(in):</label>
        <input type="number" name="height" value="<?= $height; ?>" required>
        <br><br>
        <label for="weight">Weight:</label>
        <input type="number" name="weight" value="<?= $weight; ?>" required>
        <br><br>
        <input type="submit" name="submitBtn"/>
        </form>
</body>
</html>