<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animes = Anime::get();

        if(count($animes) > 0) {
            return response()->json(["status"=>"success","data"=>$animes],200);
        } else {
            return response()->json(["status"=>"failed","message"=>"No animes found :("],404);
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
                "title" =>  "required|string|filled",
                "synopsis" =>  "string|nullable",
                "episodes" =>"numeric|integer",
                "episodeLength"=>"numeric|integer|nullable",
                "ageRating"=>["nullable",Rule::in(['G','PG','R','R18'])],
                "subType"=>["nullable",Rule::in(['ONA','OVA','TV','movie','music','special'])],
                "status"=>["required",Rule::in(['current','finished','tba'])],
                "cover" => ['nullable', 'mimes:jpg,jpeg,png', 'max:255'],
            ]);

            if($validator->fails()) {
                return response()->json(["status"=>"failed","validation_errors" => $validator->errors()],400);
            }

            $anime = new Anime;

            $anime->title = $request->title;

            if($request->synopsis) {
                $anime->synopsis = $request->synopsis;
            }

            if($request->episodes) {
                $anime->episodes = $request->episodes;
            }

            if($request->episodeLength) {
                $anime->episodeLength = $request->episodeLength;
            }

            if($request->ageRating) {
                $anime->ageRating = $request->ageRating;
            }

            if($request->subType) {
                $anime->subType = $request->subType;
            }
     
            $anime->status = $request->status;
            $anime->ratingCount = 0;
            $anime->userCount = 0;
            $anime->rating = 0;

            if($request->cover) {
                $anime->cover = $request->cover;
            }

            $anime->save();

            return response()->json(["status"=>"success","message" => "Anime created successfully :)"],200);

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
        $anime  =  Anime::find($id);

            if(!is_null($anime)) {
                return response()->json(["status" => "success", "data" => $anime], 200);
            }
            else {
                return response()->json(["status" => "failed", "message" => "Failed! no anime found"], 404);
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


            $anime = Anime::find($id);

            if(!is_null($anime)) {

                $validator = Validator::make($request->all(), [
                    "title" =>  "required|string|filled",
                    "synopsis" =>  "required|string|filled",
                    "episodes" =>"numeric|integer|required",
                    "episodeLength"=>"numeric|integer|required",
                    "ageRating"=>["nullable",Rule::in(['G','PG','R','R18'])],
                    "subType"=>["nullable",Rule::in(['ONA','OVA','TV','movie','music','special'])],
                    "status"=>["required",Rule::in(['current','finished','tba'])],
                    "cover" => ['nullable', 'mimes:jpg,jpeg,png', 'max:255'],
                ]);

                if($validator->fails()) {
                    return response()->json(["status"=>"failed","validation_errors" => $validator->errors()],400);
                }

                $anime->title = $request->title;
                
                if($request->synopsis) {
                    $anime->synopsis = $request->synopsis;
                }

                if($request->episodes) {
                    $anime->episodes = $request->episodes;
                }

                if($request->episodeLength) {
                    $anime->episodeLength = $request->episodeLength;
                }

                if($request->ageRating) {
                    $anime->ageRating = $request->ageRating;
                }

                if($request->subType) {
                    $anime->subType = $request->subType;
                }

                $anime->status = $request->status;

                 if($request->cover) {
                    $anime->cover = $request->cover;
                }

                $anime->save();

                return response()->json(["status"=>"success","message" => "Anime updated successfully :)"],200);
            
            } else {
                return response()->json(["status"=>"failed","message"=>"Anime not found :("],404);
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
        $anime = Anime::find($id);

        if(Auth::user()->role=="admin") {

            if(!is_null($anime)) {
                $anime->delete();
            return response()->json(["status"=>"success","message"=>"Anime deleted successfully"],200);

            } else {
                return response()->json(["status"=>"failed","message"=>"No anime found :("],404);
            }

          } else {
            return response()->json(["status"=>"failed","message"=>"You dont have permissions :("],401);
          }

       
    }
}
