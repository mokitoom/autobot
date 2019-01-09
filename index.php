<?php
require_once('./vendor/autoload.php');
// Namespace
use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot;
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;
$channel_token = 'Dmq1hDEyi7LHI8MYzTDC4aljxLt1eu8H6t3bpwgZVZluBhWu+/jsbb6bITP57MYW3+GCcMwvJ2d3Yh5Ck7ifRvw4coVIgwFJRG0H2iRAAU8yU+y4dZVf3lS/drpzTGfOkLUmQAQ50itVR/HuL05DsAdB04t89/1O/w1cDnyilFU=';
$channel_secret = '8e0ad013e465ccffc6d8917720d01020';

//Get message from Line API
$content = file_get_contents('php://input');
$events=json_decode($content, true);

if (!is_null($events['events'])) 
{
//Loop through each event 
	foreach($events['events']as $event)
	{
		// Line API send a lot of event type, we interested in message only. 
		if ($event['type'] == 'message') 
		{
			switch($event['message']['type']) 
			{
				case 'text':
				//Get replyToken
				$replyToken = $event['replyToken']; 
				
				//Reply message
				$respMessage='Hello, your message is '.$event['message']['text'];
				$httpClient= new CurlHTTPClient($channel_token); 
				$bot= new LINEBot($httpClient, array('channelSecret'=> $channel_secret)); 
				$textMessageBuilder= new TextMessageBuilder($respMessage);
				$response=$bot->replyMessage($replyToken, $textMessageBuilder); 
				break;
			} 		
		}
	} 
}

echo "okk";
?>
