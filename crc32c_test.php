<?php
	$pattern = array();
	if((count($argv)!=1 && count($argv)!=3) or (count($argv)==3 and (!is_numeric($argv[1]) or !is_numeric($argv[2])))){
		echo "Command : \"php crc32c_test.php\" or \"php crc32c_test.php {number of identifiants} {number of hash hex characters (0-8)}\"\n";
		exit();
	}
	switch(count($argv)){
		case 1:
			for ($i=0; $i < 2000000; $i++) {
				if($i < 8000){
					$pattern[] = '%j.'.substr(hash("crc32c", strval($i)), 0, 4);
				} elseif($i < 200000) {
					$pattern[] = '%j.'.substr(hash("crc32c", strval($i)), 0, 6);
				} else {
					$pattern[] = '%j.'.substr(hash("crc32c", strval($i)), 0, 8);
				}
			}
			echo strval(2000000-count(array_count_values($pattern)))." repeat on the 2000000 generated identifiants (8 hash hex characters)\n";
		break;
		case 3:
			for ($i=0; $i < (int) $argv[1]; $i++)
				$pattern[] = '%j.'.substr(hash("crc32c", strval($i)), 0, (int) $argv[2]);
			echo (int)$argv[1]-count(array_count_values($pattern))." repeat on the ".$argv[1]." generated identifiants (".$argv[2]." hash hex characters)\n";
		break;
	}
?>