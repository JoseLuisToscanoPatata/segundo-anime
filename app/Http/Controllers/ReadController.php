<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;
use App\Models\Read;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ReadController extends Controller
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

            $reads = $user->mangas()->get()->all();

            return response()->json(["status"=>"success","data"=>$reads],200);

        } else {
            return response()->json(["status"=>"failed","message"=>"No user found :("],404);
        }
    }

    /**
     * Add a new anime to the current user list.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $validator = Validator::make($request->all(), [
               "manga_id"=>"required|integer|numeric",
               "score"=>"nullable|integer|numeric",
               "favourite"=>"required","integer","numeric",Rule::in([1, 2]),
                "readStatus"=>"nullable","integer","numeric",Rule::in(['Reading','PlanToRead','Completed','Dropped','OnHold']),
            ]);

            if($validator->fails()) {
                return response()->json(["status"=>"failed","validation_errors" => $validator->errors()],400);
            }

            
        $existe = Read::where('user_id',Auth::user()->id)->where('manga_id',$request->manga_id)->get()->all();

        if(count($existe)>0) {
             return response()->json(["status"=>"failed","message" => "An user cant read the same manga twice :("],400);
  
        } else {

            $read = new Read;

            $read->user_id = Auth::user()->id;
            $read->manga_id = $request->manga_id;
            
            if($request->score) {
                $read->score = $request->score;
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
     * Get the manga read status from any user
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $read = Read::find($id);

        if(!is_null($read)) {
             return response()->json(["status"=>"success","data"=>$read],200);
        } else {
            return response()->json(["status"=>"failed","message"=>"Manga not found in any list :("],404);
        }
    
    }

    /**
     * Update the specified manga read status form an user
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $read = Read::find($id);

        if(!is_null($read)) {

            $user = $watch->user_id;

            if($user == Auth::user()->id) {

                $validator = Validator::make($request->all(), [
                    "score"=>"nullable|integer|numeric",
                    "favourite"=>"required","integer","numeric",Rule::in([1, 2]),
                    "readStatus"=>"nullable","integer","numeric",Rule::in(['Reading','PlanToRead','Completed','Dropped','OnHold']),
                    ]);

                    if($validator->fails()) {
                        return response()->json(["status"=>"failed","validation_errors" => $validator->errors()],400);
                    }
                
                    if($request->score) {
                        $read->score = $request->score;
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
     * Delete the manga from an user list.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $read = Read::find($id);

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
