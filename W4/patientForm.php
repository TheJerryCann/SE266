<?php

    include (__DIR__ . '/model_patients.php');

    function age($bday) { #function to convert the date of birth to an actual age 
        $date = new DateTime($bday);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
    }

    $error = 0; #setting variables
    $errormsg = "";
    $now = new DateTime;
    if (isset($_POST['submitBtn'])){ #if statement to check if areas are set correctly

        $fname = filter_input(INPUT_POST,'fname');
        $lname = filter_input(INPUT_POST,'lname');
        $married = filter_input(INPUT_POST,'married');
        if ($married == true){ 
            $married = 1;
        }
        if ($married == false){
            $married = 0;
        }
        $bday = filter_input(INPUT_POST,'bday'); #All validation for patient
        if (age($bday) > 120){
            $error += 1;
            $errormsg .= "Age cannot be more than 119\n";
        }
        if ($bday > $now){
            $error += 1;
            $errormsg .= "Cannot enter a future date\n";
        }
        if ($error !=0){ #if there are errors it will display all errors
            echo $errormsg;
        }
        if ($error == 0){   #Final output if no errors
            header("Location: viewPatients.php");
        }
        if(isset($_POST['submitBtn']) && ($error == 0)){
            addPatient($fname, $lname, $married, $bday);
        }
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
    <form method="post" action="patientForm.php">
</head>
<body>
    <form action="index.php" method="post"> <!-- All inputs for patient -->
        <label for="fname">First Name:</label>
        <input type="text" name="fname" required >
        <br><br>
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" required>
        <br><br>
        <label for="married">Married:</label>
        <input type="checkbox" name="married" >
        <br><br>
        <label for="bday">Birth Date:</label>
        <input type="date" name="bday" required>
        <br><br>
        <input type="submit" name="submitBtn"/> <!-- Submit Button -->
        </form>
        <?php
            $file = basename($_SERVER['PHP_SELF']);
            $mod_date=date("F d Y h:i:s A", filemtime($file));
            echo "<br>File last updated $mod_date";
        ?>
<br><br>
<a href="viewPatients.php">View Patients</a>
</body>
</html>