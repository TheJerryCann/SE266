<?php

    function age($bday) { #function to convert the date of birth to an actual age 
        $date = new DateTime($bday);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
    }

    function poundsToKilograms($pounds) { #converts weight in pounds to kilograms
        return $pounds * 0.453592; 
    }

    function bmi($heightFT, $heightIN, $weight) { #calculates the BMI using height and weight
        $heightCM = ($heightFT * 30.48) + ($heightIN * 2.54); 
        $weightKG = poundsToKilograms($weight);
        if ($heightCM <= 0 || $weightKG <= 0) {
            return 0; 
        }
        $bmi = $weightKG / (($heightCM / 100) * ($heightCM / 100));
        return $bmi;
    }

    function bmiDescription($bmi) { #puts the bmi into a category
        if ($bmi < 18.5) {
            return "Underweight";
        } elseif ($bmi < 24.9) {
            return "Normal Weight";
        } elseif ($bmi < 29.9) {
            return "Overweight";
        } else {
            return "Obese";
        }
    }
    $error = 0; #setting variables
    $errormsg = "";
    $now = new DateTime;
    if (isset($_POST['submitBtn'])){ #if statement to check if areas are set correctly

        $fname = filter_input(INPUT_POST,'fname');
        $lname = filter_input(INPUT_POST,'lname');
        $married = filter_input(INPUT_POST,'married');
        if ($married == true){ 
            $married = "Yes";
        }
        if ($married == false){
            $married = "No";
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
        $heightFT = filter_input(INPUT_POST,'heightFT', FILTER_VALIDATE_INT);
        if ($heightFT < 0){
            $error += 1;
            $errormsg .= "Height can't have negative feet\n";
        }
        if ($heightFT > 10){
            $error += 1;
            $errormsg .= "Height can't be above 10 feet\n";
        }
        $heightIN = filter_input(INPUT_POST,'heightIN', FILTER_VALIDATE_INT);
        if ($heightIN < 0){
            $error += 1;
            $errormsg .= "Height can't have negative inches\n";
        }
        if ($heightIN > 12){
            $error += 1;
            $errormsg .= "Height can't be above 12 inches\n";
        }
        if ($heightFT < 1 and $heightIN < 1){
            $error += 1;
            $errormsg .= "Height must be at least 1 inch\n";
        }
        $weight = filter_input(INPUT_POST,'weight', FILTER_VALIDATE_FLOAT);
        if ($weight < 0){
            $error += 1;
            $errormsg .= "Weight must be at least 1 pound\n";
        }
        if ($weight > 1000){
            $error += 1;
            $errormsg .= "Weight can't be above 1000 pounds\n";
        }
        if ($error !=0){ #if there are errors it will display all errors
            echo $errormsg;
        }
        $bmi = bmi($heightFT, $heightIN, $weight);
        $bmiDescription = bmiDescription($bmi);
        if ($error == 0){   #Final output if no errors
            echo "<h1>Completed Form</h1>";
            echo "<br>";
            echo "First Name: $fname";
            echo "<br>";
            echo "Last Name: $lname";
            echo "<br>";
            echo "Married: $married";
            echo "<br>";
            echo "Birthday: $bday";
            echo "<br>";
            echo "Feet: $heightFT";
            echo "<br>";
            echo "Inches: $heightIN";
            echo "<br>";
            echo "Weight: $weight";
            echo "<br>";
            echo "BMI Class: $bmiDescription";
        }
    }
    $file = basename($_SERVER['PHP_SELF']);
    $mod_date=date("F d Y h:i:s A", filemtime($file));
    echo "<br>" . "File last updated $mod_date";
?>