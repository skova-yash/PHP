<?php
    for ($num = 1; $num <= 100; $num++) {
        if ($num % 3 == 0 && $num % 5 == 0) {
            echo "FizzBuzz!!";
        } elseif ($num % 3 == 0) {
            echo "Fizz!";
        } elseif ($num % 5 == 0) {
            echo "Buzz!";
        } else {
            echo $num;
        }
        
        if ($num != 100) {
            echo "<br>";
        }
    }
?>