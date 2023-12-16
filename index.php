<?php


$average = 3.2;

if ($average < 3) {
            $nd = 'INSUFICIENTE';
        } else if ($average <= 3.5) {
            $nd = 'SUFICIENTE';
        } else if ($average >= 3.5 && $average < 4) {
            $nd = 'REGULAR';
        } else if ($average >= 4.0 && $average < 4.5) {
            $nd = 'BUENO';
        } else if ($average >= 4.5 && $average < 5) {
            $nd = 'MUY BUENO';
        } else if ($average == 5) {
            $nd = 'EXCELENTE';
        }



print('Average 3.2:' . $nd);