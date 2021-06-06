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
     * Index
     * 
     * See all friend a user have, as well as invitations if the user is the currently logged
     * 
     * @bodyParam user integer required User whose list you want to see Example: 3
     *
     * @responseFile status=200  storage/responses/friend/index/200.json
     * @responseFile status=404  storage/responses/friend/index/404.json
     */ 
    public function index($user)
    {

        if(!is_null(User::find($user))) {
                
            $enviadas = User::find($user)->friendsOfMine(true)->get()->all(); //Todos los amigos a los que ha invitado el usuario
            $recibidas = User::find($user)->friendOf(true)->get()->all(); //Todos los amigos que han invitado a este usuario
            $amigos = array_merge($enviadas,$recibidas);  //Unimos estos

            $enviadasFalse = User::find($user)->friendsOfMine(false)->get()->all(); //Todas las peticiones de amistad sin confirmar mandadas por el usuario
            $recibidasFalse = User::find($user)->friendOf(false)->get()->all(); //Todas las peticiones de amistad sin confirmar que le llegan a este

            $total = [$amigos,$enviadasFalse,$recibidasFalse];

             return response()->json(["status"=>"success","data"=>$total],200);

        } else {
              return response()->json(["status"=>"failed","message"=>"User not found :("],404);
        }

    }

   /**
     * Store
     * 
     * Add an user as a friend
     * 
     * @bodyParam Friendship object required Message defailts
     * @bodyParam Friendship.id integer required User you want to add Example: 3
     *
     * @responseFile status=200 storage/responses/friend/store/200.json
     * @responseFile status=403 storage/responses/friend/store/403.json
     * @responseFile status=404 storage/responses/friend/store/404.json
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
     * Show
     * 
     * Show a friendship between users (quite useless)
     * @urlParam friend integer required The ID of the friendship. Example: 104
     *
     * @responseFile status=200  storage/responses/friend/show/200.json
     * @responseFile status=403  storage/responses/friend/show/403.json
     * @responseFile status=404  storage/responses/friend/show/404.json
     */ 
    public function show($friend)
    {
        $friendship = Friend::find($friend);

        if(!is_null($friendship)) {
            
            if(Auth::user()->id == $friendship->user1_id ||Auth::user()->id == $friendship->user2_id ) {
                 return response()->json(["status"=>"success","data" => $friendship],200);
            
            } else {
                 return response()->json(["status"=>"failed","message"=>"You cant get data from other users relations :("],403);

            }
    
        } else {
            return response()->json(["status"=>"failed","message"=>"Friendship not found :("],404);
        }
    }

   /**
     * Update
     * 
     * Accept an user sent invitation to you
     * 
     * @bodyParam friend integer required User you want to add Example: 3
     *
     * @responseFile status=200 storage/responses/friend/update/200.json
     * @responseFile status=403 storage/responses/friend/update/403.json
     * @responseFile status=404 storage/responses/friend/update/404.json
     */ 
    public function update($friend, Request $request)
    {
        $friendship = Friend::where('user1_id',$friend)->where('user2_id',Auth::user()->id)->first();

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
     * Destroy
     * 
     * Delete a friendship you belong to
     *
     * @urlParam friend integer required The ID of the friendship. Example: 14
     * 
     * @responseFile status=200  storage/responses/friend/destroy/200.json
     * @responseFile status=403 storage/responses/friend/destroy/403.json
     * @responseFile status=404  storage/responses/friend/destroy/404.json
     */ 
    public function destroy($friend)
    {
        $friendship = Friend::where('user1_id',$friend)->where('user2_id',Auth::user()->id)->first();

        if(is_null($friendship)) {
            $friendship = Friend::where('user2_id',$friend)->where('user1_id',Auth::user()->id)->first();     
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
