<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class GeminiController extends Controller
{
    public function callGemi(Request $request){
        try {
            $validate_text = Validator::make($request->all(),[
                'text'=>"required"
            ]);

            if($validate_text->fails()){
                return response()->json(['status'=>false, 'message'=>$validate_text->errors()->first('text')], 400);
            }

            $validate_conversation_id = Validator::make($request->all(),[
                'conversation_id'=>"nullable|required"
            ]);

            $validate_user_id = Validator::make($request->all(),[
                'user_id'=>"required"
            ]);

            if($validate_user_id->fails()){
                return response()->json(['status'=>false, 'message'=>$validate_user_id->errors()->first('user_id')], 400);
            }

            //data affectation
            $userMessage = $request->post('text');
            $userId = $request->post('user_id');
            $conversationId = $request->post('conversation_id');

            // Find or create a conversation for the user
            $conversation = Conversation::firstOrCreate([
                'id' => $conversationId,
                'user_id' => $userId,
            ]);

            // Store the user message
            $message = new Message();
            $message->conversation_id = $conversation->id;
            $message->sender = 'user';
            $message->message = $userMessage;
            $message->save();

            // Send the user message to Gemini AI and get the response
            $botResponse = executeGemi($conversation->messages()->pluck('message'));
            // $botResponse = $this->sendToGemini($userMessage);

            // Store the bot response
            $responseMessage = new Message();
            $responseMessage->conversation_id = $conversation->id;
            $responseMessage->sender = 'bot';
            $responseMessage->message = $botResponse;
            $responseMessage->save();

           
            return response()->json([
                'conversation_id' => $conversation->id,
                'user_message' => $userMessage,
                'bot_response' => $botResponse,
            ], 200);
        } catch (\Exception $th) {
            return response()->json(['status'=>false, 'error'=>$th->getMessage()], 500);
        }
    }

    public function getConversationMessages($id) {
        try {
            $messages = Message::where('conversation_id', $id)->orderBy('created_at', 'asc')->get();
            return response()->json(['status' => true, 'messages' => $messages], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'error' => $e->getMessage()], 500);
        }
    }


    protected function sendToGemini($message)
    {
        // Replace with actual Gemini API endpoint and API key
        $geminiApiUrl = 'https://api.gemini.com/v1/chatbot';
        $apiKey = env('GEMINI_KEY');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
        ])->post($geminiApiUrl, [
            'message' => $message,
        ]);

        if ($response->successful()) {
            return $response->json()['response'];
        }

        return 'Sorry, I could not process your request at this time.';
    }
}