<?php

// Complete the encryption function below.
function encryption($s) {
	//menghilangkan spasi
    $s = str_replace(' ', '', $s);
	
	//akar kuadrat dari jumlah huruf inputan
    $l = sqrt(strlen($s));
	
	//pembulatan kebawah hasil akar kuadrat $s sebagai jumlah baris
    $row = floor($l);
	
	//pembulatan keatas hasil akar kuadrat $s sebagai jumlah kolom
    $columns = ceil($l);
	
	//jika baris x kolom lebih kecil dari panjang huruf inputan
    if ($row*$columns < strlen($s)){
        $row = $columns;
    }
	
    $array[$row][$columns] = [0];
    $k = 0;
	
	//menginput huruf inputan kedalam array
    for ($i = 0; $i < $row; $i++){
        for($j = 0; $j < $columns; $j++){
            $array[$i][$j] = $s[$k];
            $k++;
        }
    }
	
	//encrypt string inputan
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
