<?php
    if (isset($_POST['submit'])){
        echo "Form Submitted<hr />";
        $fname = filter_input(INPUT_POST,'fname',FILTER_VALIDATE_TEXT);
        if ($fname == "" ){
            echo "Please enter a name";
        }
        $lname = filter_input(INPUT_POST,'lname',FILTER_VALIDATE_TEXT);
        $married = filter_input(INPUT_POST,'married',FILTER_VALIDATE_CHECKBOX);
        $bday = filter_input(INPUT_POST,'bday',FILTER_VALIDATE_DATE);
        $height = filter_input(INPUT_POST,'height',FILTER_VALIDATE_NUMBER);
        $weight = filter_input(INPUT_POST,'weight',FILTER_VALIDATE_NUMBER);
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
        <input type="button" name="submit" value="submit"/>
        </form>
</body>
</html>