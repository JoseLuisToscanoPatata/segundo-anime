<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Friend;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Auth;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *@param $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        if(!is_null(User::find($id))) {
                
            $enviadas = User::find($id)->friendsOfMine(true)->get()->all();
            $recibidas = User::find($id)->friendOf(true)->get()->all();
            $amigos = array_merge($enviadas,$recibidas);

            $enviadasFalse = User::find($id)->friendsOfMine(false)->get()->all();
            $recibidasFalse = User::find($id)->friendOf(false)->get()->all();

            $total = [$amigos,$enviadasFalse,$recibidasFalse];

             return response()->json(["status"=>"success","data"=>$total],200);

        } else {
              return response()->json(["status"=>"failed","message"=>"User not found :("],404);
        }

    }

    /**
     * Add an user as friend
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        if($id != Auth::user()->id) {

            $user = User::find($id);

            if(!is_null($user)) {
                
                $friend = new Friend;
                $friend->user1_id = Auth::user()->id;
                $friend->user2_id = $id;
                $friend->save();
                
                 return response()->json(["status"=>"success","message" => "Friend invitation sent to that user :)",""],200);

            } else {
                return response()->json(["status"=>"failed","message"=>"User not found :("],404);
            }

        } else {
            return response()->json(["status"=>"failed","message"=>"You cant add yourself as friend :("],403);
        }
        
    }

    /**
     * Get a friend info (useless)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $friend = Friend::find($id);

        if(!is_null($friend)) {
            
            if(Auth::user()->id == $friend->user1_id ||Auth::user()->id == $friend->user2_id ) {
                 return response()->json(["status"=>"success","data" => $friend],200);
            
            } else {
                 return response()->json(["status"=>"failed","message"=>"You cant get data from other users relations :("],403);

            }
    
        } else {
            return response()->json(["status"=>"failed","message"=>"Friendship not found :("],404);
        }
    }

    /**
     * Confirm a friend invitation you recieve (set the confirmation date to now)
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $friendship = Friend::where('user1_id',$id)->where('user2_id',Auth::user()->id);

        if(!is_null($friend)) {

            if($friend->confirmation_date == NULL) {
                $friend->confirmation_date = date();
                return response()->json(["status"=>"success","message" => "You have confirmed his friend invitation :)"],200);

            } else {
                    return response()->json(["status"=>"failed","message"=>"You cant confirm a friendship you have already acepted :("],403);
            }                
    
        } else {
            return response()->json(["status"=>"failed","message"=>"Friendship not found :("],404);
        }
    }

    /**
     * Remove a friendship you belong to
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $friendship = Friend::where('user1_id',$id)->where('user2_id',Auth::user()->id);

        if(is_null($friend)) {
            $friendship = Friend::where('user2_id',$id)->where('user1_id',Auth::user()->id);     
        }

        if(!is_null($friend)) {
            
            if(Auth::user()->id == $friend->user1_id  || Auth::user()->id == $friend->user2_id ) {

                    $friend->delete(); 
                    return response()->json(["status"=>"success","message" => "You have deleted this relationship :("],200);

                } else {
                     return response()->json(["status"=>"failed","message"=>"You cant delete a friendship you dont belong to :("],403);
                }                
    
        } else {
            return response()->json(["status"=>"failed","message"=>"Friendship not found :("],404);
        }
    }
}
