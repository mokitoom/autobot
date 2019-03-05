<?php
require_once('./vendor/autoload.php');
// Namespace
use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot;
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;
$channel_token = 'yv2hZPSgQSCbw2G3uWoskqx7g/tmphZzkcn5JEMv8WtSQIUKCmp+igFycea76vsVvme7AOvdnyxDP8lyfen0gJ4TgWua6QnDL+fHePAhOboaF0mOo0sNnJFj1QDhWTio9XUJwwixbvYaDmHR4dpIWQdB04t89/1O/w1cDnyilFU=';
$channel_secret = 'ba09ccef72ff87297da070085814d74a';
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

echo "conect ok autobot";
