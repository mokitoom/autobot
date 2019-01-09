<?php
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('hb40kGTLBjEgw0J8sDwc2HTTKgv9wXt9NGnxjVf8BXBCgRJUBHp+BU2MOuTzCoPT3+GCcMwvJ2d3Yh5Ck7ifRvw4coVIgwFJRG0H2iRAAU9parABcj3V3yeSsOkxxKP79JWuSexwbml/fZPqOgjPqAdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => 'b1121d248eb9e38cf2f2f30ebfcf8bc2']);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->replyMessage('<replyToken>', $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
