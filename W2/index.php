<?php
    if (isset($_POST['submitBtn'])){
        echo "Form Submitted<hr />";
        $fname = filter_input(INPUT_POST,'fname');
        if ($fname == "" ){
            echo "Please enter a name";
        }
        $lname = filter_input(INPUT_POST,'lname');
        $married = filter_input(INPUT_POST,'married');
        $bday = filter_input(INPUT_POST,'bday');
        $height = filter_input(INPUT_POST,'height');
        $weight = filter_input(INPUT_POST,'weight');
    }
    else {
        echo "Initial Load";
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
        <input type="text" name="fname" value="" required>
        <br><br>
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" value="" required>
        <br><br>
        <label for="married">Married:</label>
        <input type="checkbox" name="married" required>
        <br><br>
        <label for="bday">Birth Date:</label>
        <input type="date" name="bday" required>
        <br><br>
        <label for="height">Height(in):</label>
        <input type="number" name="height" value="0" required>
        <br><br>
        <label for="weight">Weight:</label>
        <input type="number" name="weight" value="0" required>
        <br><br>
        <input type="submit" name="submitBtn"/>
        </form>
</body>
</html>