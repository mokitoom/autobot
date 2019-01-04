$content = file_get_contents('php://input'); $events=json_decode($content, true);
if (!is_null($events['events'])) {
//Loop through each event foreach($events['events']as $event){
//Get replyToken
$replyToken = $event['replyToken']; $ask = $event['message']['text'];
switch(strtolower($ask)) { case 'm':
$respMessage='What sup man.Go away!';
break; case 'f':
$respMessage='Love you lady.';
break; default:
$respMessage='What is your sex? M or F'; break;
}
$httpClient = new CurlHTTPClient($channel_token);
$bot=newLINEBot($httpClient, array('channelSecret'=> $channel_secret)); $textMessageBuilder = new TextMessageBuilder($respMessage);
$response=$bot->replyMessage($replyToken, $textMessageBuilder); }
}
echo "OK";