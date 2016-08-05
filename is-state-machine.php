<?php
// Read in the source file of tope 5000 icelandic words (needs cleaning, lots of non-icelandic chars)
$letter_pairs = array();
$lines = file("top-5000-icelandic-words.txt");

// Build-up an array with the letter as a key and the value is an array of the next letter and the frequency
foreach($lines as $line){
	for($i=0; $i<mb_strlen($line); $i++){
		$this_char = mb_substr($line, $i, 1, "UTF8");
		if(($i+1) == mb_strlen($line)){
			$next_char = "\n";
		} else {
			$next_char = mb_substr($line, ($i+1), 1, "UTF8");
		}
		if(!isset($letter_pairs[$this_char])){
			$letter_pairs[$this_char] = array($next_char=>1);
		} else {
			$letter_pairs[$this_char][$next_char] += 1;
		}
	}
}

// Get a list of all the unique keys and convert the frequency to a probability (0-1)
$letters = array();
foreach ($letter_pairs as $key => $value) {
	$letters[] = $key;
	$total = 0;
	$sum = 0;
	foreach($value as $l => $count){
		$total += $count;
	}
	foreach($value as $l => $count){
		$letter_pairs[$key][$l] = ($count/$total)+$sum;
		$sum += ($count/$total);
	}

}

// start at a random letter from our unique keys
$start = rand(0,count($letters));
$found_letter = false;
$next_letter = $letters[$start];

// while we don't end a work, keep appending characters
while($next_letter != "\n"){
	print($next_letter);
	$pos = rand(0,100000)/100000;
	foreach($letter_pairs[$next_letter] as $l => $prob){
		if (($pos > $prob) || ($found_letter == false)){
			$next_letter = $l;
			$found_letter = true;
		} else {
			$found_letter = false;
			break;
		}
	}
}
print("\n");

?>