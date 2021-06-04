<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Friend;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Auth;

/**
 * @group Friend
 * 
 * API Endpoints for working with friends
 */

class FriendController extends Controller
{
    /**
     * Get every friend of the specified user, both confirmed as not confirmed yet.
     *@param $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        if(!is_null(User::find($id))) {
                
            $enviadas = User::find($id)->friendsOfMine(true)->get()->all(); //Todos los amigos a los que ha invitado el usuario
            $recibidas = User::find($id)->friendOf(true)->get()->all(); //Todos los amigos que han invitado a este usuario
            $amigos = array_merge($enviadas,$recibidas);  //Unimos estos

            $enviadasFalse = User::find($id)->friendsOfMine(false)->get()->all(); //Todas las peticiones de amistad sin confirmar mandadas por el usuario
            $recibidasFalse = User::find($id)->friendOf(false)->get()->all(); //Todas las peticiones de amistad sin confirmar que le llegan a este

            $total = [$amigos,$enviadasFalse,$recibidasFalse];

             return response()->json(["status"=>"success","data"=>$total],200);

        } else {
              return response()->json(["status"=>"failed","message"=>"User not found :("],404);
        }

    }

    /**
     * Add an existing user as friend
     *
     * @param \Illuminate\Http\Request Request with the database IP of the user you want to add as friend
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->id != Auth::user()->id) {

            $user = User::find($request->id);

            if(!is_null($user)) {
                
                $friend = new Friend;
                $friend->user1_id = Auth::user()->id;
                $friend->user2_id = $request->id;
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
     * @param  int  $id database IP of the user friendship you want to show
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
     * @param  int  $id database IP of the user which friendship you want to confirm
     * @param  \Illuminate\Http\Request Request which contains the PUT method to call the api
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $friendship = Friend::where('user1_id',$id)->where('user2_id',Auth::user()->id)->first();

        if(!is_null($friendship)) {

            if($friendship->confirmation_date == NULL) {
                $friendship->confirmation_date = now();
                $friendship->save();
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
     * @param  int  $id database IP of the user which friendship you want to delete
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $friendship = Friend::where('user1_id',$id)->where('user2_id',Auth::user()->id)->first();

        if(is_null($friendship)) {
            $friendship = Friend::where('user2_id',$id)->where('user1_id',Auth::user()->id)->first();     
        }

        if(!is_null($friendship)) {
            
            if(Auth::user()->id == $friendship->user1_id  || Auth::user()->id == $friendship->user2_id ) {

                    $friendship->delete(); 
                    return response()->json(["status"=>"success","message" => "You have deleted this relationship :("],200);

                } else {
                     return response()->json(["status"=>"failed","message"=>"You cant delete a friendship you dont belong to :("],403);
                }                
    
        } else {
            return response()->json(["status"=>"failed","message"=>"Friendship not found :("],404);
        }
    }
}
