<?php
require_once('./vendor/autoload.php');

// Namespace
use \LINE\LINEBot\HTTPClient\CurlHTTPClient; use \LINE\LINEBot;
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;

// Token
$channel_token = 'Kb85ubKoLYW1lObZoqcNtx2zD79RU7YgKoAHTYU1GqnJpbkAr82vNXnx2oLo3Neqvme7AOvdnyxDP8lyfen0gJ4TgWua6QnDL+fHePAhObpVrydchIIfRqrAexk3A8FC+j36DoOaNjhs9TUAJAqAuAdB04t89/1O/w1cDnyilFU=';
$channel_secret = '0ab7d67c217b36826001b7fae7e84558';

//Get message from Line API
$content = file_get_contents('php://input'); 
$events=json_decode($content, true);

if (!is_null($events['events'])) 
{

	//Loop through each event 
	foreach($events['events']as $event)
	{
		//Get replyToken
		$replyToken = $event['replyToken']; 
		$ask = $event['message']['text'];
		
		switch(strtolower($ask)) 
		{ 
			case 'm':
				$respMessage='What sup man.Go away!';
				break; 
			
			case 'f':
				$respMessage='Love you lady.';
				break; 
		
			default:
				$respMessage='What is your sex? M or F'; 
				break;
		}
		$httpClient = new CurlHTTPClient($channel_token);
		$bot=newLINEBot($httpClient, array('channelSecret'=> $channel_secret)); 
		$textMessageBuilder = new TextMessageBuilder($respMessage);
		$response=$bot->replyMessage($replyToken, $textMessageBuilder); 
	}
}
echo "OK";