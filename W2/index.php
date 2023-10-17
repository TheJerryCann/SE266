<?php
if (isset($_POST['submit'])){
        echo "Form Submitted<hr />"
        echo $_POST['fname']
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
        <input type="text" name="fname" required>
        <br><br>
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" required>
        <br><br>
        <label for="married">Married:</label>
        <input type="radio" name="married" required>
        <br><br>
        <label for="bday">Birth Date:</label>
        <input type="date" name="bday" required>
        <br><br>
        <label for="height">Height:</label>
        <input type="number" name="height" required>
        <br><br>
        <label for="weight">Weight:</label>
        <input type="number" name="weight" required>
        <br><br>
        <input type="button" id="submit" value="submit" onclick="" />
        </form>
</body>
<script>
    fname = document.querySelector('#fname').value
    lname = document.querySelector('#lname').value
    married = document.querySelector('#married').value
    bday = document.querySelector('#bday').value
    height = document.querySelector('#height').value
    weight = document.querySelector('#weight').value
</script>
</html>