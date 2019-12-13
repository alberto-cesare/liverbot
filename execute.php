<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);
//if(!$update)
//{
//  exit;
//}
$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$text = trim($text);
$text = strtolower($text);
header("Content-Type: application/json");
$response = '';

$token = "941539793:AAGdZEeLppzYtY_J_4tuAf_MyHgjl590DWc";


sendMessage($chatid, "[EXECUTED]", $token);
if(strstr($text, '?')){
    sendMessage($chatid, "HO TROVATO UN PUNTO INTERROGATIVO", $token);
}
//elseif($text=="domanda 1")
//{
//	$response = "risposta 1";
//}
//elseif($text=="domanda 2")
//{
//	$response = "risposta 2";
//}
//else
//{
//	$response = "Comando non valido!";
//}
//$parameters = array('chat_id' => $chatId, "text" => $response);
//$parameters["method"] = "sendMessage";
//echo json_encode($parameters);






function sendMessage($chatID, $messaggio, $token) {
    echo "sending message to " . $chatID . "\n";

    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
    $url = $url . "&text=" . urlencode($messaggio);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}