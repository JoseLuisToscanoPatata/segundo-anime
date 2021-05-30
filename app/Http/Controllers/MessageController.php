<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Auth;

class MessageController extends Controller
{
    /**
     * See all message you belong to (both sent by and to you)
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $enviados = Auth::user()->messages_sent()->get()->all(); //Todos los amigos a los que ha invitado el usuario
        $recibidos = Auth::user()->messages_recieved()->get()->all(); //Todos los amigos que han invitado a este usuario

        $totales = [$recibidos, $enviados];
        
          return response()->json(["status"=>"success","data"=>$totales],200);

    }

    /**
     * Send a new message
     *
     * @param  \Illuminate\Http\Request  $request message and user of the new message
     * @return \Illuminate\Http\Response
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
                return response()->json(["status"=>"failed","message" => "You cant send a message to yourself :("],401);
            }

            $message = new Message;

            $message->message = $request->message;  
            $message->emisor = Auth::user()->id;
            $message->recipient = $request->recipient;

            $message->save();

            return response()->json(["status"=>"success","message" => "Message send successfully :)"],200);

    }

    /**
     * Display a message you belong to
     *
     * @param  int  $id Database Id of the message you want to show
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::find($id);

        if(!is_null($message)) {
            
            if($message->recipient == Auth::user->id || $message->emisor == Auth::user->id) {
                return response()->json(["status"=>"success","data" => $message],200);
            
            } else {
                return response()->json(["status"=>"failed","message"=>"You cant get a message you dont belong :("],401);
            }
        } else {
            return response()->json(["status"=>"failed","message"=>"Message not found :("],404);
        }
    }

    /**
     * Delete a message you have created
     *
     * @param  int  $id Database ip of the message you want to delete
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);

        if(!is_null($message)) {
            
            if($message->emisor == Auth::user()->id) {

                $message->delete();
                return response()->json(["status"=>"success","message" => "Message deleted successfully :) "],200);
            
            } else {
                return response()->json(["status"=>"failed","message"=>"You cant get a message you dont own :("],401);
            }
        } else {
            return response()->json(["status"=>"failed","message"=>"Message not found :("],404);
        }
    }
}
