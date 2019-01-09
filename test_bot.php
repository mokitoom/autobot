<?php
	$access_token = 'Dmq1hDEyi7LHI8MYzTDC4aljxLt1eu8H6t3bpwgZVZluBhWu+/jsbb6bITP57MYW3+GCcMwvJ2d3Yh5Ck7ifRvw4coVIgwFJRG0H2iRAAU8yU+y4dZVf3lS/drpzTGfOkLUmQAQ50itVR/HuL05DsAdB04t89/1O/w1cDnyilFU=';
	$url = 'https://api.line.me/v1/oauth/verify';
	$headers = array('Authorization: Bearer ' . $access_token);$ch = curl_init($url);curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$result = curl_exec($ch);
	curl_close($ch);
	echo $result;
