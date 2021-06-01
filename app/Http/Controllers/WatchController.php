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
     * @param  \Illuminate\Http\Request  $request New watch status
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
               "anime_id"=>"required|integer ",
               "score"=>"sometimes|nullable|integer|between:1,10",
               "favourite"=>"required","boolean",
                "watchStatus"=>"required","string",Rule::in(['Watching','PlanToWatch','Completed','Dropped','OnHold']),
            ]);

            if($validator->fails()) {
                return response()->json(["status"=>"failed","validation_errors" => $validator->errors()],400);
            }

             $existe = Watch::where('user_id',Auth::user()->id)->where('anime_id',$request->anime_id)->get()->all();

             

        if(count($existe)>0) {
             return response()->json(["status"=>"failed","message" => "An user cant watch the same anime twice :("],400);
  
        } else {

            $watch = new Watch;

            $watch->user_id = Auth::user()->id;
            $watch->anime_id = $request->anime_id;
            
            $watch->score = $request->score;

            $watch->favourite = $request->favourite;
            $watch->watchStatus = $request->watchStatus;

            $watch->save();

            $anime = Anime::find($request->anime_id);
            $anime->userCount = $anime->userCount + 1;
            $anime->rating = round((($request->score + ($anime->rating * $anime->ratingCount)) / ($anime->ratingCount + 1)),2);
            $anime->ratingCount = $anime->ratingCount + 1;
            $anime->save();

           return response()->json(["status"=>"success","message" => "Anime added successfully to your list :)","data"=>$watch],200);
        }
    }

    /**
     * Get the anime watch status from any user
     *
     * @param  int  $id Database ip of the anime you want to show from an user list
     * @param int $user Database ip of the user which list you want to show a anime
     * @return \Illuminate\Http\Response
     */
    public function show($id, $user)
    {

        $watch = Watch::where('anime_id',$id)->where('user_id',$user)->get()->first();

        if(!is_null($watch)) {
             return response()->json(["status"=>"success","data"=>$watch],200);
        } else {
            return response()->json(["status"=>"failed","message"=>"anime not found in any list :("],404);
        }
    }

     /**
     * Update the specified anime watch status, score or favourite from an user
     *
     * @param  \Illuminate\Http\Request  $request New status info
     * @param  int  $id Database ip of the anime you want to update from an user list
     * @param int $user Database ip of the user which list you want to update a anime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$user)
    {
        
        $watch = Watch::where('anime_id',$id)->where('user_id',$user)->get()->first();

        if(!is_null($watch)) {

            if($user == Auth::user()->id) {

                $validator = Validator::make($request->all(), [
                "score"=>"sometimes|nullable|integer|between:1,10",
                "favourite"=>"required","boolean",
                    "watchStatus"=>"required","string",Rule::in(['Watching','PlanToWatch','Completed','Dropped','OnHold']),
                ]);

                if($validator->fails()) {
                    return response()->json(["status"=>"failed","validation_errors" => $validator->errors()],400);
                }
            
                $watch->score = $request->score;
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
     * @param  int  $id Database ip of the anime you want to remove from an user list
     * @param int $user Database ip of the user which list you want to remove the anime
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$user)
    {
        $watch = Watch::where('anime_id',$id)->where('user_id',$user)->get()->first();

        if(!is_null($watch)) {
            
            if(Auth::user()->id == $user) {

                $anime = Anime::find($watch->anime_id);
                $anime->userCount = $anime->userCount - 1;

                if(($anime->ratingCount - 1) == 0) {
                    $anime->rating = 0;
                } else {
                    $anime->rating = round(((($anime->rating * $anime->ratingCount) - $watch->score) / ($anime->ratingCount - 1)),2);
                }
                $anime->ratingCount = $anime->ratingCount - 1;
                $anime->save();

                $watch->delete();
                 return response()->json(["status"=>"success","message"=>"Anime deleted from your list :)"],200);
            } else {
                return response()->json(["status"=>"failed","message"=>"You cant delete an anime from other people lists :("],403);
            }
        } else {
            return response()->json(["status"=>"failed","message"=>"Anime not found on your list:("],404);
        }
    }
}
