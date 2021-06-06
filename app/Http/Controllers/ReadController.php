<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;
use App\Models\Read;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


/**
 * @group Read (Manga Lists)
 * 
 * API Endpoints for working with users manga lists
 */

class ReadController extends Controller
{
    /**
     * Index
     * 
     * Get info of every manga on the list of an user
     * @urlParam id integer required The ID of the user. Example: 1
     *
     * @responseFile status=200  storage/responses/read/index/200.json
     * @responseFile status=404  storage/responses/read/index/404.json
     */ 
    public function index($user)
    {
        
        $userFound = User::find($user);

        if(!is_null($userFound)) {

            $reads = $userFound->mangas()->get()->all();

            return response()->json(["status"=>"success","data"=>$reads],200);

        } else {
            return response()->json(["status"=>"failed","message"=>"User not found :("],404);
        }
    }

   /**
     * Store
     * 
     * Add a manga to the list of an user
     * 
     * @bodyParam List object required List read details
     * @bodyParam List.manga_id integer required Id of the manga to add to the list Example: 1
     * @bodyParam List.score string required Manga synopsis  Example: 10
     * @bodyParam List.favourite integer required Boolean declaring if its a favourite manga Example: 0
     * @bodyParam List.readStatus string Status of read Example: Reading
     *
     * @responseFile status=200 storage/responses/read/store/200.json
     * @responseFile status=403 storage/responses/read/store/403.json
     */ 
    public function store(Request $request)
    {

            $validator = Validator::make($request->all(), [
               "manga_id"=>"required|integer",
               "score"=>"sometimes|nullable|integer|between:1,10",
               "favourite"=>"required","boolean",
                "readStatus"=>'string',Rule::in(['Reading','PlanToRead','Completed','Dropped','OnHold']),
            ]);

            if($validator->fails()) {
                return response()->json(["status"=>"failed","validation_errors" => $validator->errors()],400);
            }

            
        $existe = Read::where('user_id',Auth::user()->id)->where('manga_id',$request->manga_id)->get()->all();

        if(count($existe)>0) {
             return response()->json(["status"=>"failed","message" => "An user cant read the same manga twice :("],403);
  
        } else {

            $read = new Read;

            $read->user_id = Auth::user()->id;
            $read->manga_id = $request->manga_id;
            
            if($request->score) {
                $read->score = $request->score;
            }  else {
                $read->score = null;
            }

            $read->favourite = $request->favourite;
            $read->readStatus = $request->readStatus;

            $read->save();

            $manga = Manga::find($request->manga_id);
            $manga->userCount = $manga->userCount + 1;
            $manga->rating = round((($request->score + ($manga->rating * $manga->ratingCount)) / ($manga->ratingCount + 1)),2);
            $manga->ratingCount = $manga->ratingCount + 1;
            $manga->save();

           return response()->json(["status"=>"success","message" => "Manga added successfully to your list :)","data"=>$read],200); 
        }
    }

   /**
     * show
     * 
     * Show the read status of a manga on an user list
     * @urlParam manga integer required The ID of the manga. Example: 1
     * @urlParam user integer required The ID of the user. Example: 1
     *
     * @responseFile status=200  storage/responses/read/show/200.json
     * @responseFile status=404  storage/responses/read/show/404.json
     */ 
    public function show($manga,$user)
    {
        $read = Read::where('manga_id',$manga)->where('user_id',$user)->get()->first();

        if(!is_null($read)) {
             return response()->json(["status"=>"success","data"=>$read],200);
        } else {
            return response()->json(["status"=>"failed","message"=>"Manga not found in any list :("],404);
        }
    
    }

   /**
     * Update
     * 
     * Change the read status of a manga on an user list
     * 
     * @urlParam manga integer required The ID of the manga. Example: 1
     * @urlParam user integer required The ID of the user. Example: 1
     * 
     * @bodyParam List object required List read details
     * @bodyParam List.manga_id integer required Id of the manga to add to the list Example: 1
     * @bodyParam List.score string required Manga synopsis Example: 10
     * @bodyParam List.favourite integer required Boolean declaring if its a favourite manga Example: 0
     * @bodyParam List.readStatus string Status of read Example: Reading
     *
     * @responseFile status=200 storage/responses/read/update/200.json
     * @responseFile status=403 storage/responses/read/update/403.json
     * @responseFile status=404 storage/responses/read/update/404.json
     */ 
    public function update(Request $request, $manga, $user)
    {

        $read = Read::where('manga_id',$manga)->where('user_id',$user)->get()->first();

        if(!is_null($read)) {

            $user = $read->user_id;

            if($user == Auth::user()->id) {

                $validator = Validator::make($request->all(), [
                    "score"=>"sometimes|nullable|integer|between:1,10",
                    "favourite"=>"required",'boolean',
                    "readStatus"=>'string',Rule::in(['Reading','PlanToRead','Completed','Dropped','OnHold']),
                    ]);

                    if($validator->fails()) {
                        return response()->json(["status"=>"failed","validation_errors" => $validator->errors()],400);
                    }
                
                    if($request->score) {
                        $read->score = $request->score;
                    } else {
                        $read->score = null;
                    }

                    $read->favourite = $request->favourite;
                    $read->readStatus = $request->readStatus;

                    $read->save();

                    return response()->json(["status"=>"success","message" => "Manga updated on your list :)"],200);

                }else{
                      return response()->json(["status"=>"failed","message"=>"You cant update an anime from other people lists :("],403);
                }

            } else {
                return response()->json(["status"=>"failed","message"=>"Manga read not found in your list :("],404);
            }
    }


    /**
     * Destroy
     * 
     * Delete the given manga from an user list
     *
     * @urlParam user integer required The ID of the user. Example: 1
     * @urlParam manga integer required The ID of the manga. Example: 1
     * 
     * @responseFile status=200  storage/responses/read/destroy/200.json
     * @responseFile status=403 storage/responses/read/destroy/403.json
     * @responseFile status=404  storage/responses/read/destroy/404.json
     */ 
    public function destroy($manga,$user)
    {
        $read = Read::where('manga_id',$manga)->where('user_id',$user)->get()->first();

        if(!is_null($read)) {

            if(Auth::user()->id == $read->user_id) {
                $manga = Manga::find($read->manga_id);
                $manga->userCount = $manga->userCount - 1;

                if(($manga->ratingCount - 1) == 0) {
                    $manga->rating = 0;
                } else {
                    $manga->rating = round(((($manga->rating * $manga->ratingCount) - $read->score) / ($manga->ratingCount - 1)),2);
                }       
                $manga->ratingCount = $manga->ratingCount - 1;
                $manga->save();

                $read->delete();

                 return response()->json(["status"=>"success","message"=>"Manga deleted from your list :)"],200);

            } else {
                return response()->json(["status"=>"failed","message"=>"You cant delete a manga from other people lists :("],403);
            }
           
        } else {
            return response()->json(["status"=>"failed","message"=>"Manga not found on your list:("],404);
        }
    }
}
