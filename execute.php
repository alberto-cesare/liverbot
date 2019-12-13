<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if(!$update)
{
  exit;
}
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

$arrayQuestions = array(
    0    => "Ci siamo capiti (bene)? ",
    1  => "Spero che sia chiaro ",
    2  => "Lettura del complessivo",
    3 => "Può essere da prendere in considerazione",
    4 => "Sono deduzioni da cose semplici ",
    5 => "Dico delle banalità ",
    6 => "Di questi errori ne continuo a vedere a palate",
    7 => "No? Ecco.",
    8 => "È chiaro per tutti? ",
    9 => "Per l'amor del cielo! ",
    10 => "Lasciamo stare eh ",
    11 => "Mi sono spiegato?",
);


if(strpos($text, "/start") === 0 || $text=="ciao")
{
	$response = "Ci siamo capiti?";
}
elseif(strpos($text, "?") === 0)
{
	$randInt = random_int(0,11);
	$response = myarray[randInt];
}

$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);