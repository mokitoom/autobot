<?php
	$access_token = 'hb40kGTLBjEgw0J8sDwc2HTTKgv9wXt9NGnxjVf8BXBCgRJUBHp+BU2MOuTzCoPT3+GCcMwvJ2d3Yh5Ck7ifRvw4coVIgwFJRG0H2iRAAU9parABcj3V3yeSsOkxxKP79JWuSexwbml/fZPqOgjPqAdB04t89/1O/w1cDnyilFU=';
	$url = 'https://api.line.me/v1/oauth/verify';
	$headers = array('Authorization: Bearer ' . $access_token);$ch = curl_init($url);curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$result = curl_exec($ch);
	curl_close($ch);
	echo $result;
