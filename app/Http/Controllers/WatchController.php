<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\Watch;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

/**
 * @group Watch (Anime List)
 * 
 * API Endpoints for working with users anime lists
 */

class WatchController extends Controller
{
    /**
     * Index
     * 
     * Get info of every anime on the list of an user
     * @urlParam id integer required The ID of the user. Example: 1
     *
     * @responseFile status=200  storage/responses/watch/index/200.json
     * @responseFile status=404  storage/responses/watch/index/404.json
     */ 
    public function index($user)
    {
        
        $userFound = User::find($user);

        if(!is_null($userFound)) {

            $watches = $userFound->animes()->get()->all();

            return response()->json(["status"=>"success","data"=>$watches],200);

        } else {
            return response()->json(["status"=>"failed","message"=>"No user found :("],404);
        }
    }

   /**
     * Store
     * 
     * Add an anime to the list of an user
     * 
     * @bodyParam List object required List watch details
     * @bodyParam List.anime_id integer required Id of the anime to add to the list Example: 3
     * @bodyParam List.score string required anime synopsis Example: 5
     * @bodyParam List.favourite integer required Boolean declaring if its a favourite anime Example: 1
     * @bodyParam List.watchStatus string Status of watch Example: Watching
     *
     * @responseFile status=200 storage/responses/watch/store/200.json
     * @responseFile status=404 storage/responses/watch/store/403.json
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
             return response()->json(["status"=>"failed","message" => "An user cant watch the same anime twice :("],403);
  
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
     * show
     * 
     * Show the watch status of an anime on an user list
     * @urlParam anime integer required The ID of the anime. Example: 3
     * @urlParam user integer required The ID of the user. Example: 1
     *
     * @responseFile status=200  storage/responses/watch/show/200.json
     * @responseFile status=404  storage/responses/watch/show/404.json
     */ 
    public function show($anime, $user)
    {

        $watch = Watch::where('anime_id',$anime)->where('user_id',$user)->get()->first();

        if(!is_null($watch)) {
             return response()->json(["status"=>"success","data"=>$watch],200);
        } else {
            return response()->json(["status"=>"failed","message"=>"anime not found in any list :("],404);
        }
    }

   /**
     * Update
     * 
     * Change the watch status of a anime on an user list
     * 
     * @urlParam anime integer required The ID of the anime. Example: 3
     * @urlParam user integer required The ID of the user. Example: 1
     * 
     * @bodyParam List object required List watch details
     * @bodyParam List.anime_id integer required Id of the anime to add to the list Example: 1
     * @bodyParam List.score string required anime synopsis Example: 5
     * @bodyParam List.favourite integer required Boolean declaring if its a favourite anime Example: 1
     * @bodyParam List.watchStatus string Status of watch Example: Watching
     *
     * @responseFile status=200 storage/responses/watch/update/200.json
     * @responseFile status=403 storage/responses/watch/update/403.json
     * @responseFile status=404 storage/responses/watch/update/404.json
     */ 
    public function update(Request $request, $anime,$user)
    {
        
        $watch = Watch::where('anime_id',$anime)->where('user_id',$user)->get()->first();

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
     * Destroy
     * 
     * Delete the given anime from an user list
     *
     * @urlParam anime integer required The ID of the user. Example: 1
     * @urlParam user integer required The ID of the anime. Example: 1
     * 
     * @responseFile status=200  storage/responses/watch/destroy/200.json
     * @responseFile status=403 storage/responses/watch/destroy/403.json
     * @responseFile status=404  storage/responses/watch/destroy/404.json
     */ 
    public function destroy($anime,$user)
    {
        $watch = Watch::where('anime_id',$anime)->where('user_id',$user)->get()->first();

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
