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
        $entrantes = DB::table('users')
                                ->join('messages','users.id','=','messages.recipient')
                                ->select('users.name','messages.message','messages.created_at')
                                ->where('recipient','=',Auth::user()->id)
                                ->orderBy('messages.created_at','desc')->get();

        $enviadas = DB::table('users')
                                ->join('messages','users.id','=','messages.recipient')
                                ->select('users.name','messages.message','messages.created_at')
                                ->where('emisor','=',Auth::user()->id)
                                ->orderBy('messages.created_at','desc')->get();

        $totales = [$entrantes, $enviadas];
        
          return response()->json(["status"=>"success","data"=>$totales],200);

    }

    /**
     * Send a new message
     *
     * @param  \Illuminate\Http\Request  $request
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
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);

        if(!is_null($message)) {
            
            if($message->emisor == Auth::user->id) {

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
