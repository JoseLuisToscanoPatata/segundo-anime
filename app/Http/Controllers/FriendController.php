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

            $amigos1 = DB::table('friends')
                    ->join('users','users.id','=','friends.user1_id')
                    ->select('friends.user1_id as id','users.name as name')
                    ->where('friends.user2_id','=',$id)
                    ->where('confirmation_date','<>',NULL)->get()->toArray();

            $amigos2 = DB::table('friends')
                    ->join('users','users.id','=','friends.user2_id')
                    ->select('friends.user2_id as id','users.name as name')
                    ->where('friends.user1_id','=',$id)
                    ->where('confirmation_date','<>',NULL)->get()->toArray();

             $amigos = array_merge($amigos1,$amigos2);

            if($id == Auth::user()->id) {
               
                $recibidos = DB::table('friends')
                    ->join('users','users.id','=','friends.user1_id')
                    ->select('friends.user1_id as id','users.name as name')
                    ->where('friends.user2_id','=',$id)
                    ->where('confirmation_date','=',NULL)->get()->toArray();

                $enviados = DB::table('friends')
                    ->join('users','users.id','=','friends.user2_id')
                    ->select('friends.user2_id as id','users.name as name')
                    ->where('friends.user1_id','=',$id)
                    ->where('confirmation_date','=',NULL)->get()->toArray();

                $total = [$amigos,$recibidos,$enviados];

            } else {

                $total = $amigos;                  
            }

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
                
                 return response()->json(["status"=>"success","message" => "User added as friend :)",""],200);

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
        $friend = Friend::find($id);

        if(!is_null($friend)) {
            
            if(Auth::user()->id == $friend->user2_id ) {
                 
                if($friend->confirmation_date == NULL) {
                    $friend->confirmation_date = date();
                    return response()->json(["status"=>"success","message" => "You have confirmed his friend invitation :)"],200);

                } else {
                     return response()->json(["status"=>"failed","message"=>"You cant confirm a friendship you have already acepted :("],403);
                }                
            
            } else {
                 return response()->json(["status"=>"failed","message"=>"You cant confirm a friendship you havent been invited to :("],403);

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
        $friend = Friend::find($id);

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
