<?php

    // Función que calcula si un número es primo o no
    function esPrimo($numero) {
        $esPrimo = true;

        if ($numero < 2) {
            $esPrimo = false;
        } else {
            for ($i = 2; $i <= sqrt($numero); $i++) {
                if ($numero % $i == 0) {
                    $esPrimo = false;
                }
            }
        }

        return $esPrimo;
    }

    // Función factorial iterativa
    function factorialIterativo($n) {
        $factorial = 1;
        for ($i = 1; $i <= $n; $i++) {
            $factorial *= $i;
        }
        return $factorial;
    }

    // Función factorial con recursividad
    function factorialRecursivo($n) {
        if ($n <= 1) {
            $factorial = 1;
        } else {
            $factorial = $n * factorialRecursivo($n - 1);
        }
        return $factorial;
    }

    // Algoritmo de Euclides por restas sucesivas (iterativo)
    function mcdRestas($a, $b) {
        while ($a != $b) {
            if ($a > $b) {
                $a -= $b;
            } else {
                $b -= $a;
            }
        }
        return $a;
    }

    // Algoritmo de Euclides por divisiones sucesivas (iterativo)
    function mcdDivision($a, $b) {
        while ($b != 0) {
            $resto = $a % $b;
            $a = $b;
            $b = $resto;
        }
        return $a;
    }

    // Versión recursiva por restas
    function mcdRestasRecursivo($a, $b) {
        if ($a == $b) {
            return $a;
        } elseif ($a > $b) {
            return mcdRestasRecursivo($a - $b, $b);
        } else {
            return mcdRestasRecursivo($a, $b - $a);
        }
    }

    // Versión recursiva por divisiones
    function mcdDivisionRecursivo($a, $b) {
        if ($b == 0) {
            return $a;
        } else {
            return mcdDivisionRecursivo($b, $a % $b);
        }
    }

    // Función swap: intercambia dos valores por referencia
    function swap(&$n1, &$n2) {
        $temp = $n1;
        $n1 = $n2;
        $n2 = $temp;
    }

    // Función para invertir el array usando swap
    function invertirArray($array) {
        $inicio = 0;
        $fin = count($array) - 1;
        while ($inicio < $fin) {
            swap($array[$inicio], $array[$fin]);
            $inicio++;
            $fin--;
        }
        return $array;
    }
?>