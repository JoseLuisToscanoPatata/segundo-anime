<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class MangaController extends Controller
{
    /**
     * Get every manga on the database
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
     * Store a newly created anime in storage.
     *
     * @param  \Illuminate\Http\Request $request Anime data
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->role=="admin") {

            $validator = Validator::make($request->all(), [
                "title" =>  "required|string|filled",
                "synopsis" =>  "required|string|filled",
                "chapters" =>"integer|required|min:0",
                "ageRating"=>["sometimes","nullable",Rule::in(['G','PG','R','R18'])],
                "subType"=>["sometimes","nullable",Rule::in(['doujin','manga','manhwa','manhua','novel','oel','oneshot'])],
                "status"=>["required",Rule::in(['current','finished','tba'])],
                "startDate" =>  "sometimes|nullable|string",
                "endDate" =>  "sometimes|nullable|string|after_or_equal:startDate",
                'cover' =>  ["max:1000","file","mimes:jpg,jpeg,png","nullable"],
            ]);

            if($validator->fails()) {
                return response()->json(["status"=>"failed","validation_errors" => $validator->errors()],400);
            }

            //Los campos que no son obligatorio (con validación sometimes) se establecerán a null en caso de que no se pase ninguno

            $manga = new Manga;

            $manga->title = $request->title;

            if($request->synopsis) {
                $manga->synopsis = $request->synopsis;
            }

            $manga->chapters = $request->chapters;

            if($request->ageRating) {
                $manga->ageRating = $request->ageRating;
            } else {
                $manga->ageRating = null;
            }

            if($request->subType) {
                $manga->subType = $request->subType;
            } else {
                $manga->subType = null;
            }

            if($request->startDate) {
                $manga->startDate = $request->startDate;
            } else {
                $manga->startDate = null;
            }

            if($request->endDate) {
                $manga->endDate = $request->endDate;
            } else {
                $manga->endDate = null;
            }
            
            $manga->status = $request->status;
            $manga->ratingCount = 0;
            $manga->userCount = 0;
            $manga->rating = 0;

            $manga->save();

            $image = $request->file('cover');

                //Si hemos introducido una imagen, la guardamos en el storage y establecemos como nombre de imagen la url de la imagen

                if($image) {

                    $url = 'https://s3.us-east-2.amazonaws.com/proyectobigchungus/';

                    $extension = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
                    $image_name = strval($manga->id) . '.' . $extension;
                    $image->storeAs('images/mangas',$image_name,'s3');
                    

                    //Storage::disk('s3')->put("/images/".$image_name,File::get($image));
                    $manga->cover = $url .  'images/mangas/' .$image_name;

                    $manga->save();
                }

            return response()->json(["status"=>"success","message" => "Manga created successfully :)","data"=>$manga],200);

          } else {
            return response()->json(["status"=>"failed","message"=>"You dont have permissions :("],401);

          }
    }

    /**
     * Get the data of the manga.
     *
     * @param  int  $id Database Ip of the given manga to show
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
     * Update the specified manga in storage, given the id and the request with the new data
     *
     * @param  \Illuminate\Http\Request  $request New manga info
     * @param  int  $id Database Ip of the given manga to update
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
           if(Auth::user()->role=="admin") {


            $manga = Manga::find($id);

            if(!is_null($manga)) {

                $validator = Validator::make($request->all(), [
                "title" =>  "required|string|filled",
                "synopsis" =>  "required|string|filled",
                "chapters" =>"integer|required|min:0",
                "ageRating"=>["sometimes","nullable",Rule::in(['G','PG','R','R18'])],
                "subType"=>["sometimes","nullable",Rule::in(['doujin','manga','manhwa','manhua','novel','oel','oneshot'])],
                "status"=>["required",Rule::in(['current','finished','tba'])],
                "startDate" =>  "sometimes|nullable|string",
                "endDate" =>  "sometimes|nullable|string|after_or_equal:startDate",
                'cover' =>  ["max:1000","file","mimes:jpg,jpeg,png","nullable"],
                ]);

                if($validator->fails()) {
                    return response()->json(["status"=>"failed","validation_errors" => $validator->errors()],400);
                }

                $manga->title = $request->title;

                if($request->synopsis) {
                    $manga->synopsis = $request->synopsis;
                }

                $manga->chapters = $request->chapters;

                if($request->ageRating) {
                    $manga->ageRating = $request->ageRating;
                } else {
                    $manga->ageRating = null;
                }

                if($request->subType) {
                    $manga->subType = $request->subType;
                } else {
                    $manga->subType = null;
                }

                if($request->startDate) {
                    $manga->startDate = $request->startDate;
                } else {
                    $manga->startDate = null;
                }

                if($request->endDate) {
                    $manga->endDate = $request->endDate;
                } else {
                    $manga->endDate = null;
                }

                $manga->status = $request->status;
                
                $manga->save();

                $image = $request->cover;

                if($image) {

                    $url = 'https://s3.us-east-2.amazonaws.com/proyectobigchungus/';

                    if(($manga->cover != null && strpos($manga->cover,'original') === false)) {
                        Storage::disk('s3')->delete("images/mangas/".substr($manga->cover,68));
                    }

                    $extension = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
                    $image_name = strval($manga->id) . '.' . $extension;
                    $image->storeAs('images/mangas',$image_name,'s3');
                    
                    //Storage::disk('s3')->put("/images/".$image_name,File::get($image));
                    $manga->cover = $url .  'images/mangas/' .$image_name;

                    $manga->save();
                }

                return response()->json(["status"=>"success","message" => "Manga updated successfully :)","data"=>$manga],200);
            
            } else {
                return response()->json(["status"=>"failed","message"=>"Manga not found :("],404);
            }

          } else {
            return response()->json(["status"=>"failed","message"=>"You dont have permissions :("],401);
            
          }
    }

   /**
     * Delete a manga from the database.
     *
     * @param  int  $id Database Ip of the given manga to delete
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manga = Manga::find($id);

        if(Auth::user()->role=="admin") {

            if(!is_null($manga)) {

                if(($manga->cover != null && strpos($manga->cover,'original') === false)) {
                    Storage::disk('s3')->delete("images/mangas/".substr($manga->cover,68));
                }

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
