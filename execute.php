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

if(strpos($text, "/start") === 0 || $text=="ciao")
{
	$response = "Ci siamo capiti?";
}

elseif((substr(strrev(trim($text)),0,1) == "?"))
	{
		$arrayQuestions = array("Ci siamo capiti (bene)? ", "Spero che sia chiaro ", "Lettura del complessivo", "Può essere da prendere in considerazione", "Sono deduzioni da cose semplici ", "Dico delle banalità ", "Di questi errori ne continuo a vedere a palate", "No? Ecco.", "È chiaro per tutti? ", "Per l'amor del cielo! ", "Lasciamo stare eh ", "Mi sono spiegato?");

		$randInt = random_int(0,11);
		$response = $arrayQuestions[$randInt];
	}
	elseif(strpos($mystring, "ah") !== false){

        $response = "Non ridete che di questi errori ne ho visti a palate";

    }
    elseif(strpos($mystring, "?") !== false){

        $arrayQuestions = array("Ci siamo capiti (bene)? ", "Spero che sia chiaro ", "Lettura del complessivo", "Può essere da prendere in considerazione", "Sono deduzioni da cose semplici ", "Dico delle banalità ", "Di questi errori ne continuo a vedere a palate", "No? Ecco.", "È chiaro per tutti? ", "Per l'amor del cielo! ", "Lasciamo stare eh ", "Mi sono spiegato?");
        $randInt = random_int(0,11);
		$response = $arrayQuestions[$randInt];

    }


$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);