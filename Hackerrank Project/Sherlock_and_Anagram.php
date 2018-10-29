<?php

// Complete the sherlockAndAnagrams function below
function sherlockAndAnagrams($s) {
	//inisiasi nilai variabel count
    $count = 0;
	
	//program looping untuk mencari jumlah dari sherlockAndAnagrams
    for ($i = 1; $i < strlen($s); $i++){
        for ($j = 0; $j < strlen($s)-$i+1; $j++){
            for ($k = $j+1; $k < strlen($s)-$i+1; $k++){
                $temp1 = substr($s, $j, $i);
                $temp2 = substr($s, $k, $i);
				//mengecek apakah variabel temp1 dan temp2 merupakan anagram
                if (count_chars($temp1, 1) == count_chars($temp2, 1)){
                    $count++;
                }
            }
        }
    }
    
    return $count;

}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $q);

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $s = '';
    fscanf($stdin, "%[^\n]", $s);

    $result = sherlockAndAnagrams($s);

    fwrite($fptr, $result . "\n");
}

fclose($stdin);
fclose($fptr);
