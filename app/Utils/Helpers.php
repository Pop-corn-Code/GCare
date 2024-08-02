<?php

require __DIR__.'/../../vendor/autoload.php';

use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;

function executeGemi($text){
    // $data = json_decode(file_get_contents("php://input"));

    // $text = $data->text;

    $client = new Client(env('GEMINI_KEY'));

    $response = $client->geminiPro()->generateContent(
        new TextPart($text)
    );

    return $response->text();
}



?>