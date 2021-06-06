<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Auth;


/**
 * @group Message
 * 
 * API Endpoints for working with user messages
 */
class MessageController extends Controller
{

    /**
     * Index
     * 
     * See all message you belong to (both sent by and to you)
     *
     * @responseFile status=200  storage/responses/message/index/200.json
     */ 
    public function index()
    {

        $enviados = Auth::user()->messages_sent()->get()->all(); //Todos los amigos a los que ha invitado el usuario
        $recibidos = Auth::user()->messages_recieved()->get()->all(); //Todos los amigos que han invitado a este usuario

        $totales = [$recibidos, $enviados];
        
          return response()->json(["status"=>"success","data"=>$totales],200);

    }


   /**
     * Store
     * 
     * Send a new message
     * 
     * @bodyParam Message object required Message defailts
     * @bodyParam Message.message string required Message you want to send Example: "Me gustan las patatas"
     * @bodyParam Message.recipient integer required anime synopsis Example: 3
     *
     * @responseFile status=200 storage/responses/message/store/200.json
     * @responseFile status=404 storage/responses/message/store/403.json
     */ 
    public function store(Request $request)
    {

           $ids = User::where('id','>',0)->pluck('id')->toArray();

            $validator = Validator::make($request->all(), [
                "message" =>  "required|string|max:250",
                "recipient" =>  ["required","integer","numeric",Rule::in($ids),],
            ]);

            if($validator->fails()) {
                return response()->json(["status"=>"failed","validation_errors" => $validator->errors()],400);
            }

            if($request->recipient == Auth::user()->name) {
                return response()->json(["status"=>"failed","message" => "You cant send a message to yourself :("],403);
            }

            $message = new Message;

            $message->message = $request->message;  
            $message->emisor = Auth::user()->id;
            $message->recipient = $request->recipient;

            $message->save();

            return response()->json(["status"=>"success","message" => "Message send successfully :)"],200);

    }

   /**
     * Show
     * 
     * Show a message you have sent or recieved
     * @urlParam user integer required The ID of the another user. Example: 1
     *
     * @responseFile status=200  storage/responses/message/show/200.json
     * @responseFile status=403  storage/responses/message/show/403.json
     * @responseFile status=404  storage/responses/message/show/404.json
     */ 
    public function show($message)
    {
        $messageFound = Message::find($message);

        if(!is_null($messageFound)) {
            
            if($messageFound->recipient == Auth::user->id || $messageFound->emisor == Auth::user->id) {
                return response()->json(["status"=>"success","data" => $messageFound],200);
            
            } else {
                return response()->json(["status"=>"failed","message"=>"You cant get a message you dont belong :("],403);
            }
        } else {
            return response()->json(["status"=>"failed","message"=>"Message not found :("],404);
        }
    }

    /**
     * Destroy
     * 
     * Delete a message you have sent
     *
     * @urlParam id integer required The ID of the message. Example: 5
     * 
     * @responseFile status=200  storage/responses/message/destroy/200.json
     * @responseFile status=403 storage/responses/message/destroy/403.json
     * @responseFile status=404  storage/responses/message/destroy/404.json
     */ 
    public function destroy($message)
    {
        $messageFound = Message::find($message);

        if(!is_null($messageFound)) {
            
            if($messageFound->emisor == Auth::user()->id) {

                $messageFound->delete();
                return response()->json(["status"=>"success","message" => "Message deleted successfully :) "],200);
            
            } else {
                return response()->json(["status"=>"failed","message"=>"You cant destroy a message you dont own :("],403);
            }
        } else {
            return response()->json(["status"=>"failed","message"=>"Message not found :("],404);
        }
    }
}
