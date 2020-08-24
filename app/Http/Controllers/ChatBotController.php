<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;
//use Twilio\Rest\Client;
use Twilio\TwiML\MessagingResponse;
use Illuminate\Support\Facades\DB;

class ChatBotController extends Controller
{
    public function listenToReplies(Request $request){
        $from = $request->input('From');
        $body = $request->input('Body');
        $response = new MessagingResponse();
        
        switch ($body){
            case "Hi":
            case "hi":
            case "Hello":
            case "hello":
            case "0":
                //bring menu
                $message = "Hello, Welcome to this chatbot!\n";
                $message .= "Reply with a number to select an item from the menu\n";
                $message .= "1. Latest information\n";
                $message .= "2. Search for information with a keyword\n";
                $message .= "3. Visit our website";
//                $this->sendWhatsAppMessage($message, $from);
                $response->message($message);
                return $response;
                break;
            case "1":
                //latest information; top three
                $message = "Here are the 3 latest information we have:";
                $response->message($message);
                $infos = DB::select('select * from infos order by updated_at desc limit 3');
                foreach ($infos as $info) {
                    $message1 = "*Title:* $info->info_name\n";
                    $message1 .= "*Event Name:* $info->event_name\n";
                    $message1 .= "*Category:* $info->category\n";
                    $message1 .= "*Industry:* $info->industry\n";
                    $message1 .= "$info->activity_date - $info->expiry_date\n\n";
                    $message1 .= "$info->actual_info\n\n";
                    $message1 .= "$info->other_details\n\n";
                    $message1 .= "*Submitted:* $info->created_at\n";
                    $message1 .= "*Last modified:* $info->updated_at\n";
                    $response->message($message1);
                }
                $message2 = "Type 0 to see the menu again.";
                $response->message($message2);
                return $response;
                break;
            case "2":
                //search information by keyword
                $message = "Type a keyword and we'll send you the top 2 results from our database.";
                $response->message($message);
                return $response;
                break;
            case "3":
                //visit our website
                $message = "Here's the link to our website:\n";
                $message .= "https://5ec893f61819.ngrok.io";
                $response->message($message);
                return $response;
                break;
            default:
                //show misunderstanding
                $fbody = strtolower($body);
                $infos = DB::select('select * from infos where keywords like ? or industry like ? or category like ? order by updated_at desc limit 2', [$fbody, $fbody, $fbody]);
                if (!count($infos)){
                    $message = "This chatbot currently responds to numbers on the menu and certain keywords.\n\n";
                    $message .= "Try again with a number on the menu, a keyword, or type 0 to view the menu again.";
                    $response->message($message);
                    return $response;
                }
                else{
                    $message = "Search results:";
                    $response->message($message);
                    foreach ($infos as $info) {
                        $message1 = "*Title:* $info->info_name\n";
                        $message1 .= "*Event:* $info->event_name\n";
                        $message1 .= "*Category:* $info->category\n";
                        $message1 .= "*Industry:* $info->industry\n";
                        $message1 .= "$info->activity_date - $info->expiry_date\n\n";
                        $message1 .= "$info->actual_info\n\n";
                        $message1 .= "$info->other_details\n\n";
                        $message1 .= "*Submitted:* $info->created_at\n";
                        $message1 .= "*Last modified:* $info->updated_at\n";
                        $response->message($message1);
                    }
                    return $response;
                }
            }
    }
    
//    public function sendWhatsAppMessage(string $message, string $recipient){
//        $twilio_whatsapp_number = getenv('TWILIO_WHATSAPP_NUMBER');
//        $account_sid = getenv('TWILIO_SID');
//        $auth_token = getenv('TWILIO_AUTH_TOKEN');
//        
//        $client = new Client($account_sid, $auth_token);
//        return $client->messages->create($recipient, array('from' => "whatsapp:$twilio_whatsapp_number", 'body' => $message));
//    }
}
