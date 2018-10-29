<?php

// Complete the encryption function below.
function encryption($s) {
    $s = str_replace(' ', '', $s);
    $l = sqrt(strlen($s));
    $row = floor($l);
    $columns = ceil($l);
    if ($row*$columns < strlen($s)){
        $row = $columns;
    }
    $array[$row][$columns] = [0];
    $k = 0;
    
    echo strlen($s)." ".$l." ".$row." ".$columns." ";
    for ($i = 0; $i < $row; $i++){
        for($j = 0; $j < $columns; $j++){
            $array[$i][$j] = $s[$k];
            $k++;
            echo $array[$i][$j];
        }
        echo "\n";
    }
    $encrypt = "";
    for ($i = 0; $i < $columns; $i++){
        for($j = 0; $j < $row; $j++){
            $encrypt = $encrypt.$array[$j][$i];
        }
        $encrypt = $encrypt." ";
    }
    return $encrypt;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

$s = '';
fscanf($stdin, "%[^\n]", $s);

$result = encryption($s);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
