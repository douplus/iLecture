<?php
function getTinyURL( $url ){
	$fp = fopen( 'http://tinyurl.com/api-create.php?url='.$url, 'r');
	if($fp) {
		$tinyurl = fgets($fp);
		if($tinyurl && !empty($tinyurl)) {
			$returnurl = $tinyurl; 
			fclose($fp);
		}
	}
	return $returnurl;
}
?>