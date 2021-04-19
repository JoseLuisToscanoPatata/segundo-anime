<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MangaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $mangas = Manga::get();

        if(count($mangas) > 0) {
            return response()->json(["status"=>"success","data"=>$mangas],200);
        } else {
            return response()->json(["status"=>"failed","message"=>"No mangas found :("],404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->role=="admin") {

            $validator = Validator::make($request->all(), [
                "title" =>  "required|string",
                "synopsis" =>  "nullable|string",
                "chapters" =>"numeric|integer|nullable",
                "ageRating"=>["nullable",Rule::in(['G','PG','R','R18'])],
                "subType"=>["nullable",Rule::in(['doujin','manga','manhwa','manhua','novel','oel','oneshot'])],
                "status"=>["required",Rule::in(['current','finished','tba'])],
                "cover" => ['nullable', 'mimes:jpg,jpeg,png', 'max:255'],
            ]);

            if($validator->fails()) {
                return response()->json(["status"=>"failed","validation_errors" => $validator->errors()],400);
            }

            $manga = new Manga;

            $manga->title = $request->title;

            if($request->synopsis) {
                $manga->synopsis = $request->synopsis;
            }

            if($request->chapters) {
                $manga->chapters = $request->chapters;
            }

            if($request->ageRating) {
                $manga->ageRating = $request->ageRating;
            }

            if($request->subType) {
                $manga->subType = $request->subType;
            }
            
            $manga->status = $request->status;
            $manga->ratingCount = 0;
            $manga->userCount = 0;
            $manga->rating = 0;

            if($request->cover) {
                $manga->cover = $request->cover;
            }

            $manga->save();

            return response()->json(["status"=>"success","message" => "Manga created successfully :)"],200);

          } else {
            return response()->json(["status"=>"failed","message"=>"You dont have permissions :("],401);

          }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $manga  =  Manga::find($id);

            if(!is_null($manga)) {
                return response()->json(["status" => "success", "data" => $manga], 200);
            }
            else {
                return response()->json(["status" => "failed", "message" => "Failed! no manga found"], 404);
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
           if(Auth::user()->role=="admin") {


            $manga = Manga::find($id);

            if(!is_null($manga)) {

                $validator = Validator::make($request->all(), [
                    "title" =>  "required|string|filled",
                    "synopsis" =>  "nullable|string|filled",
                    "chapters" =>"nullable|integer|required",
                    "ageRating"=>["nullable",Rule::in(['G','PG','R','R18'])],
                    "subType"=>["nullable",Rule::in(['doujin','manga','manhwa','manhua','novel','oel','oneshot'])],
                    "status"=>["required",Rule::in(['current','finished','tba'])],
                    "cover" => ['nullable', 'mimes:jpg,jpeg,png', 'max:255'],
                ]);

                if($validator->fails()) {
                    return response()->json(["status"=>"failed","validation_errors" => $validator->errors()],400);
                }

                $manga->title = $request->title;

                if($manga->synopsis) {
                    $manga->synopsis = $request->synopsis;
                }

                if($manga->chapters) {
                    $manga->chapters = $request->chapters;
                }

                if($manga->ageRating) {
                    $manga->ageRating = $request->ageRating;
                }

                if($manga->subType) {
                    $manga->subType = $request->subType;
                }

                $manga->status = $request->status;

                if($request->cover) {
                    $manga->cover = $request->cover;
                }

                $manga->save();

                return response()->json(["status"=>"success","message" => "Manga updated successfully :)"],200);
            
            } else {
                return response()->json(["status"=>"failed","message"=>"Manga not found :("],404);
            }

          } else {
            return response()->json(["status"=>"failed","message"=>"You dont have permissions :("],401);
            
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manga = Manga::find($id);

        if(Auth::user()->role=="admin") {

            if(!is_null($manga)) {
                $manga->delete();
            return response()->json(["status"=>"success","message"=>"Manga deleted successfully"],200);

            } else {
                return response()->json(["status"=>"failed","message"=>"No manga found :("],404);
            }

          } else {
            return response()->json(["status"=>"failed","message"=>"You dont have permissions :("],401);
          }
    }
}
