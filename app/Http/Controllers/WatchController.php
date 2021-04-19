<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\Watch;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class WatchController extends Controller
{
    /**
     * Get all animes in an user list
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        $user = User::find($id);

        if(!is_null($user)) {

            $watches = $user->animes()->get()->all();

            return response()->json(["status"=>"success","data"=>$watches],200);

        } else {
            return response()->json(["status"=>"failed","message"=>"No user found :("],404);
        }
    }

    /**
     * Add a new anime to an user list.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
               "anime_id"=>"required|integer|numeric",
               "score"=>"nullable|integer|numeric",
               "favourite"=>"required","integer","numeric",Rule::in([1, 2]),
                "watchStatus"=>"nullable","integer","numeric",Rule::in(['Watching','PlanToWatch','Completed','Dropped','OnHold']),
            ]);

            if($validator->fails()) {
                return response()->json(["status"=>"failed","validation_errors" => $validator->errors()],400);
            }

            $watch = new Watch;

            $watch->user_id = Auth::user()->id;
            $watch->anime_id = $request->anime_id;
            
            if($request->score) {
                $watch->score = $request->score;
            }

            $watch->favourite = $request->favourite;
            $watch->watchStatus = $request->watchStatus;

            $watch->save();

           return response()->json(["status"=>"success","message" => "Anime added successfully to your list :)"],200);
    }

    /**
     * Get the anime watch status from an user
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $watch = Watch::find($id);

        if(!is_null($watch)) {
             return response()->json(["status"=>"success","data"=>$watch],200);
        } else {
            return response()->json(["status"=>"failed","message"=>"anime not found in any list :("],404);
        }
    }

    /**
     * Update the specified anime watch status form an user
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $watch = Watch::find($id);

        if(!is_null($watch)) {

            $user = $watch->user_id;

            if($user == Auth::user()->id) {

                $validator = Validator::make($request->all(), [
                "score"=>"nullable|integer|numeric",
                "favourite"=>"required","integer","numeric",Rule::in([1, 2]),
                    "watchStatus"=>"nullable","integer","numeric",Rule::in(['Watching','PlanToWatch','Completed','Dropped','OnHold']),
                ]);

                if($validator->fails()) {
                    return response()->json(["status"=>"failed","validation_errors" => $validator->errors()],400);
                }
            
                if($request->score) {
                    $watch->score = $request->score;
                }

                $watch->favourite = $request->favourite;
                $watch->watchStatus = $request->watchStatus;

                $watch->save();

                return response()->json(["status"=>"success","message" => "Anime updated on your list :)"],200);
            
            } else {
                    return response()->json(["status"=>"failed","message"=>"You cant update an anime from other people lists :("],403);
                }

        } else {
            return response()->json(["status"=>"failed","message"=>"Anime watch not found on your list:("],404);
        }
    }

    /**
     * Delete the anime from an user list.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $watch = Watch::find($id);

        if(!is_null($watch)) {
            
            if(Auth::user->id == $watch->user_id) {
                 return response()->json(["status"=>"success","message"=>"Anime deleted from your list :)"],200);
            } else {
                return response()->json(["status"=>"failed","message"=>"You cant delete an anime from other people lists :("],403);
            }
        } else {
            return response()->json(["status"=>"failed","message"=>"Anime not found on your list:("],404);
        }
    }
}
