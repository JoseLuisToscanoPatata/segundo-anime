<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manga;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


/**
 * @group Manga
 * 
 * API Endpoints for working with mangas
 */

class MangaController extends Controller
{
    /**
     * Index
     * 
     * Get info of every manga on the database
     *
     * @responseFile status=200  storage/responses/manga/index/200.json
     * @responseFile status=404  storage/responses/manga/index/404.json
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
     * Store
     * 
     * Create a new manga on the database
     * 
     * @bodyParam Manga object required Manga details Example: 1
     * @bodyParam Manga.title string required Manga title Example: Naruto
     * @bodyParam Manga.synopsis string required Manga synopsis  Example: Ugh
     * @bodyParam Manga.chapters integer required Number of chapters Example: 500
     * @bodyParam Manga.status string Manga required status Example: current
     * @bodyParam Manga.subType string Manga subtype Example: manga
     * @bodyParam Manga.subType string Manga ageRating Example: G
     * @bodyParam Manga.startDate string  Manga startDate No-example
     * @bodyParam Manga.endDate string  Manga endDate No-example
     * @bodyParam Manga.cover file  Manga cover No-example
     *
     * @responseFile status=200 storage/responses/manga/store/200.json
     * @responseFile status=401 storage/responses/401-admin.json 
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
     * Show
     * 
     * Get info about the specified manga
     *
     * @urlParam manga integer required The ID of the manga. Example: 1
     * 
     * @responseFile status=200  storage/responses/manga/show/200.json
     * @responseFile status=404  storage/responses/manga/show/404.json
     */ 
    public function show($manga)
    {
         $mangaFound  =  Manga::find($manga);

            if(!is_null($mangaFound)) {
                return response()->json(["status" => "success", "data" => $mangaFound], 200);
            }
            else {
                return response()->json(["status" => "failed", "message" => "Failed! no manga found"], 404);
            }
    }

   /**
     * Update
     * 
     * Update an existing manga from the database 
     * 
     * @bodyParam manga integer required The ID of the manga Example: 1
     * @bodyParam Manga object required Manga details
     * @bodyParam Manga.title string required Manga title Example: Naruto
     * @bodyParam Manga.synopsis string required Manga synopsis  Example: Ugh
     * @bodyParam Manga.chapters integer required Number of chapters Example: 500
     * @bodyParam Manga.status string Manga required status Example: current
     * @bodyParam Manga.subType string Manga subtype Example: manga
     * @bodyParam Manga.subType string Manga ageRating Example: G
     * @bodyParam Manga.startDate string  Manga startDate No-example
     * @bodyParam Manga.endDate string  Manga endDate No-example
     * @bodyParam Manga.cover file  Manga cover No-example
     *
     * @responseFile status=200 storage/responses/manga/update/200.json
     * @responseFile status=401 storage/responses/401-admin.json 
     * @responseFile status=404 storage/responses/manga/update/404.json
     */ 
    public function update($manga, Request $request)
    {
           if(Auth::user()->role=="admin") {


            $mangaFound = Manga::find($manga);

            if(!is_null($mangaFound)) {

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
                    $mangaFound->synopsis = $request->synopsis;
                }

                $mangaFound->chapters = $request->chapters;

                if($request->ageRating) {
                    $mangaFound->ageRating = $request->ageRating;
                } else {
                    $mangaFound->ageRating = null;
                }

                if($request->subType) {
                    $mangaFound->subType = $request->subType;
                } else {
                    $mangaFound->subType = null;
                }

                if($request->startDate) {
                    $mangaFound->startDate = $request->startDate;
                } else {
                    $mangaFound->startDate = null;
                }

                if($request->endDate) {
                    $mangaFound->endDate = $request->endDate;
                } else {
                    $mangaFound->endDate = null;
                }

                $mangaFound->status = $request->status;
                
                $mangaFound->save();

                $image = $request->cover;

                if($image) {

                    $url = 'https://s3.us-east-2.amazonaws.com/proyectobigchungus/';

                    if(($mangaFound->cover != null && strpos($mangaFound->cover,'original') === false)) {
                        Storage::disk('s3')->delete("images/mangas/".substr($mangaFound->cover,68));
                    }

                    $extension = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
                    $image_name = strval($mangaFound->id) . '.' . $extension;
                    $image->storeAs('images/mangas',$image_name,'s3');
                    
                    //Storage::disk('s3')->put("/images/".$image_name,File::get($image));
                    $mangaFound->cover = $url .  'images/mangas/' .$image_name;

                    $mangaFound->save();
                }

                return response()->json(["status"=>"success","message" => "Manga updated successfully :)","data"=>$mangaFound],200);
            
            } else {
                return response()->json(["status"=>"failed","message"=>"Manga not found :("],404);
            }

          } else {
            return response()->json(["status"=>"failed","message"=>"You dont have permissions :("],401);
            
          }
    }

    /**
     * Destroy
     * 
     * Delete the given manga from the database
     *
     * @urlParam manga integer required The ID of the manga. Example: 1
     * 
     * @responseFile status=200  storage/responses/manga/destroy/200.json
     * @responseFile status=401  storage/responses/401-admin.json
     * @responseFile status=404  storage/responses/manga/destroy/404.json
     */ 
    public function destroy($manga)
    {
        $mangaFound = Manga::find($manga);

        if(Auth::user()->role=="admin") {

            if(!is_null($mangaFound)) {

                if(($mangaFound->cover != null && strpos($mangaFound->cover,'original') === false)) {
                    Storage::disk('s3')->delete("images/mangas/".substr($mangaFound->cover,68));
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
