<?php
require_once('./vendor/autoload.php');
// Namespace
use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot;
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;
$channel_token = 'pDY5cSpSVUQRUameQ2tqncOfWwQkKfcW9jOeHlPUnF3ZaeOIDxJPOFVtt3TRKYAcvme7AOvdnyxDP8lyfen0gJ4TgWua6QnDL+fHePAhObqHnKQ/KS21HTWEU2Rs8CLOmRr1u52ChdPuGmjZC5m/ygdB04t89/1O/w1cDnyilFU=';
$channel_secret = '02b4c36856d84cfe9c4e27ca90e8612a';

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
				$httpClient=new CurlHTTPClient($channel_token); 
				$bot=new LINEBot($httpClient, array('channelSecret'=> $channel_secret)); 
				$textMessageBuilder=new TextMessageBuilder($respMessage);
				$response=$bot->replyMessage($replyToken, $textMessageBuilder); 
				break;
			} 		
		}
	} 
}

echo "$textMessageBuilder";
error_log( $message );
