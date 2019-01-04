<?php
require_once('./vendor/autoload.php');
// Namespace
use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot;
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;
$channel_token = 'Kb85ubKoLYW1lObZoqcNtx2zD79RU7YgKoAHTYU1GqnJpbkAr82vNXnx2oLo3Neqvme7AOvdnyxDP8lyfen0gJ4TgWua6QnDL+fHePAhObpVrydchIIfRqrAexk3A8FC+j36DoOaNjhs9TUAJAqAuAdB04t89/1O/w1cDnyilFU=';
$channel_secret = '0ab7d67c217b36826001b7fae7e84558';
//Get message from Line API
$content = file_get_contents('php://input');
$events=json_decode($content, true);
if (!is_null($events['events'])) {
//Loop through each event foreach($events['events']as $event){
// Line API send a lot of event type, we interested in message only. if ($event['type'] == 'message') {
switch($event['message']['type']) {
case 'text':
//Get replyToken
$replyToken = $event['replyToken']; //Reply message
$respMessage='Hello, your message is '.$event['message']['text'];
$httpClient=newCurlHTTPClient($channel_token); $bot=newLINEBot($httpClient, array('channelSecret'=> $channel_secret)); $textMessageBuilder=newTextMessageBuilder($respMessage);
} }
} }
$response=$bot->replyMessage($replyToken, $textMessageBuilder); break;
echo "OK";