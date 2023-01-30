<?php
// echo 'STI_Bot';
$data = json_decode(file_get_contents('php://input'), TRUE);
$prv_dm = '%3Ci%3E%D0%9F%D1%80%D0%B8%D0%B2%D0%B5%D1%82,%20%D0%94%D0%B8%D0%BC%D0%B0%3C/i%3E';

# MY
$subdata = ($data['message']['text']) ? ($data['message']['text']) : $data;
#
# Try то tracking messages:
if ($data['message']['text'] == '1'){$subdata = 'TURN THE LIGHTS ON!';}
if ($data['message']['text'] == '3'){ $msg = $prv_dm; sendmsg($msg);}
if ($data['message']['text'] == 'привет'){ $msg = '... и тебе Привет ))) '; sendmsg($msg);}

file_put_contents('file.txt','$data: '.print_r($subdata,1)."\n", FILE_APPEND);

$data = $data['callback_query'] ? ['callback_query'] : $data['message'];

define('TOKEN',' paste tg bot token here ');

$message = mb_strtolower(($data['text'] ? $data['data'] : $data['data']),'utf-8');

// echo 'STI_Bot<br><br>';
// var_dump($data);


function sendmsg($msg)
{
    $myCurl = curl_init();
    curl_setopt_array($myCurl, array(
        CURLOPT_URL => 'https://api.telegram.org/bot'.TOKEN.'/sendMessage?chat_id=651492048&parse_mode=HTML&text='. $msg,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true
    ));
    $response = curl_exec($myCurl);
    curl_close($myCurl);
}
// echo "Ответ на Ваш запрос: ".$response;
