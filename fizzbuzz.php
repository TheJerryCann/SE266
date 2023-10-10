<?php


function fizzBuzz($num) {#Task G: FizzBuzz Function
    if ($num % 2 == 0 && $num % 3 == 0) { #if statement to check if the number is divisible by both 2 and 3 and returns the word Fizz Buzz
        return 'Fizz Buzz'; 
    }
    elseif ($num % 2 == 0) { #if statement to check if the number is divisible by 2 and returns the word Fizz
        return 'Fizz'; 
    }
    elseif ($num % 3 == 0) { #if statement to check if the number is divisble by 3 and returns the word Buzz
        return 'Buzz'; 
    } else { #if the number is not divisible by 2 or 3 then it just returns the number
        return $num; 
    }
}

for ($i = 1; $i <= 100; $i++) { #if statement to loop through the numbers 1-100 and display the if statements results
    echo fizzBuzz($i) . " ";
    echo "<br>";
}

?>