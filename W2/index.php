<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Intake Form</title>
    <h1>Patient Intake Form</h1>
    <form method="post" action="patientForm.php">
</head>
<body>
    <form action="index.php" method="post"> <!-- All inputs for patient -->
        <label for="fname">First Name:</label>
        <input type="text" name="fname" required>
        <br><br>
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" required>
        <br><br>
        <label for="married">Married:</label>
        <input type="checkbox" name="married">
        <br><br>
        <label for="bday">Birth Date:</label>
        <input type="date" name="bday" required>
        <br><br>
        <label for="heightFT">Height(ft):</label>
        <input type="number" name="heightFT" required>
        <br><br>
        <label for="heightIN">Height(in):</label>
        <input type="number" name="heightIN" required>
        <br><br>
        <label for="weight">Weight:</label>
        <input type="number" name="weight" required>
        <br><br>
        <input type="submit" name="submitBtn"/> <!-- Submit Button -->
        </form>
        <?php
            $file = basename($_SERVER['PHP_SELF']);
            $mod_date=date("F d Y h:i:s A", filemtime($file));
            echo "<br>File last updated $mod_date";
        ?>
</body>
</html>