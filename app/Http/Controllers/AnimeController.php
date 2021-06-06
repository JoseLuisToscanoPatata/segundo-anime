<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

/**
 * @group Anime
 * 
 * API Endpoints for working with animes
 */

class AnimeController extends Controller
{


    /**
     * Index
     * 
     * Get info of every anime on the database
     *
     * @responseFile status=200  storage/responses/anime/index/200.json
     * @responseFile status=404  storage/responses/anime/index/404.json
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
     * Store
     * 
     * Create a new anime on the database
     * 
     * @bodyParam Anime object required Anime details
     * @bodyParam Anime.title string required Anime title Example: One piece
     * @bodyParam Anime.synopsis string required Anime synopsis  Example: too many episodes
     * @bodyParam Anime.episodes integer required Number of episodes Example: 900
     * @bodyParam Anime.episodeLength integer required Length of each episode  Example: 25
     * @bodyParam Anime.status string Anime required status Example: current
     * @bodyParam Anime.subType string Anime subtype Example: TV
     * @bodyParam Anime.subType string Anime ageRating Example: G
     * @bodyParam Anime.startDate string  Anime startDate No-example
     * @bodyParam Anime.endDate string  Anime endDate No-example
     * @bodyParam Anime.trailer string  Anime trailer  Example: https://www.youtube.com/embed/tM7qJQ1MVZY
     * @bodyParam Anime.cover file  Anime cover No-example
     *
     * @responseFile status=200 storage/responses/anime/store/200.json
     * @responseFile status=401 storage/responses/401-admin.json 
     */ 
    public function store(Request $request)
    {
          if(Auth::user()->role=="admin") {

            $validator = Validator::make($request->all(), [
                "title" =>  "required|string|filled",
                "synopsis" =>  "string|required|filled",
                "episodes" =>"integer|required|min:0",
                "episodeLength"=>"integer|required|min:0",
                "ageRating"=>["sometimes","nullable",Rule::in(['G','PG','R','R18'])],
                "subType"=>["sometimes","nullable",Rule::in(['ONA','OVA','TV','movie','music','special'])],
                "status"=>["required",Rule::in(['current','finished','tba'])],
                "startDate" =>  "sometimes|nullable|string",
                "endDate" =>  "sometimes|nullable|string|after_or_equal:startDate",
               "trailer" => ["sometimes","nullable","string","regex:/^https:\/\/www.youtube.com\/embed\/.+$/"],
                "cover" => ['nullable', 'mimes:jpg,jpeg,png', 'max:1000','file'],
            ]);

            if($validator->fails()) {
                return response()->json(["status"=>"failed","validation_errors" => $validator->errors()],400);
            }

            $anime = new Anime;

            //Los campos que no son obligatorio (con validación sometimes) se establecerán a null en caso de que no se pase ninguno

            $anime->title = $request->title;

            if($request->synopsis) {
                $anime->synopsis = $request->synopsis;
            }

            $anime->episodes = $request->episodes;                

            $anime->episodeLength = $request->episodeLength;

            if($request->ageRating) {
                $anime->ageRating = $request->ageRating;
            } else {
                $anime->ageRating = null;
            }

            if($request->subType) {
                $anime->subType = $request->subType;
            } else {
                $anime->subType = null;
            }

            if($request->startDate) {
                $anime->startDate = $request->startDate;
            } else {
                $anime->startDate = null;
            }

            if($request->endDate) {
                $anime->endDate = $request->endDate;
            } else {
                $anime->endDate = null;
            }
            
            if($request->trailer) {
                 $anime->trailer = $request->trailer;
            } else {
                $anime->trailer = null;
             }
     
            $anime->status = $request->status;
            $anime->ratingCount = 0;
            $anime->userCount = 0;
            $anime->rating = 0;

            $anime->save();

            $image = $request->file('cover');

            //Si hemos introducido una imagen, la guardamos en el storage y establecemos como nombre de imagen la url de la imagen

                if($image) {

                    $url = 'https://s3.us-east-2.amazonaws.com/proyectobigchungus/';

                    $extension = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
                    $nueva = strval($anime->id) . '.' . $extension;
                    $image->storeAs('images/animes',$image_name,'s3');

                    //Storage::disk('public')->put("/anime-photos/".$nueva,File::get($image));
                   $manga->cover = $url .  'images/animes/' .$image_name;

                    $anime->save();
                }

            return response()->json(["status"=>"success","message" => "Anime created successfully :)","data"=>$anime],200);

          } else {
            return response()->json(["status"=>"failed","message"=>"You dont have permissions :("],401);

          }
    }

    /**
     * Show
     * 
     * Get info about the specified anime
     *
     * @urlParam anime integer required The ID of the anime. Example: 1
     * 
     * @responseFile status=200  storage/responses/anime/show/200.json
     * @responseFile status=404  storage/responses/anime/show/404.json
     */ 
    public function show($anime)
    {
        $animeFound  =  Anime::find($anime);

            if(!is_null($animeFound)) {
                return response()->json(["status" => "success", "data" => $animeFound], 200);
            }
            else {
                return response()->json(["status" => "failed", "message" => "Failed! no anime found"], 404);
            }
    }

   /**
     * Update
     * 
     * Update an existing anime from the database
     * 
     * @bodyParam anime integer required The ID of the anime Example: 1
     * @bodyParam Anime object required Anime details
     * @bodyParam Anime.title string required Anime title Example: One piece
     * @bodyParam Anime.synopsis string required Anime synopsis  Example: too many episodes
     * @bodyParam Anime.episodes integer required Number of episodes Example: 900
     * @bodyParam Anime.episodeLength integer required Length of each episode  Example: 25
     * @bodyParam Anime.status string Anime required status Example: current
     * @bodyParam Anime.subType string Anime subtype Example: TV
     * @bodyParam Anime.subType string Anime ageRating Example: G
     * @bodyParam Anime.startDate string  Anime startDate No-example
     * @bodyParam Anime.endDate string  Anime endDate No-example
     * @bodyParam Anime.trailer string  Anime trailer  Example: https://www.youtube.com/embed/tM7qJQ1MVZY
     * @bodyParam Anime.cover file  Anime cover No-example
     *
     * @responseFile status=200 storage/responses/anime/update/200.json
     * @responseFile status=401 storage/responses/401-admin.json 
     * @responseFile status=404 storage/responses/anime/update/404.json
     */ 
    public function update($anime, Request $request)
    {
           if(Auth::user()->role=="admin") {

            $animeFound = Anime::find($anime);

            if(!is_null($animeFound)) {

                $validator = Validator::make($request->all(), [
                    "title" =>  "required|string|filled",
                    "synopsis" =>  "required|string|filled",
                    "episodes" =>"integer|required|min:0",
                    "episodeLength"=>"integer|required|min:0",
                    "ageRating"=>["sometimes","nullable",Rule::in(['G','PG','R','R18'])],
                    "subType"=>["sometimes","nullable",Rule::in(['ONA','OVA','TV','movie','music','special'])],
                    "status"=>["required",Rule::in(['current','finished','tba'])],
                    "startDate" =>  "sometimes|nullable|string",
                     "endDate" =>  "sometimes|nullable|string|after_or_equal:startDate",
                     "trailer" => ["sometimes","nullable","string","regex:/^https:\/\/www.youtube.com\/embed\/.+$/"],
                    "cover" => ['nullable', 'mimes:jpg,jpeg,png', 'file', 'max:1000'],
                ]);

                if($validator->fails()) {
                    return response()->json(["status"=>"failed","validation_errors" => $validator->errors()],400);
                }

                $animeFound->title = $request->title;
                
                if($request->synopsis) {
                    $animeFound->synopsis = $request->synopsis;
                }

                $animeFound->episodes = $request->episodes;

                $animeFound->episodeLength = $request->episodeLength;

                if($request->ageRating) {
                    $animeFound->ageRating = $request->ageRating;
                } else {
                    $animeFound->ageRating = null;
                }

                if($request->subType) {
                    $animeFound->subType = $request->subType;
                } else {
                    $animeFound->subType = null;
                }
                
                if($request->trailer) {
                    $animeFound->trailer = $request->trailer;
                } else {
                    $animeFound->trailer = null;
                }

                if($request->startDate) {
                    $animeFound->startDate = $request->startDate;
                } else {
                    $animeFound->startDate = null;
                }

                if($request->endDate) {
                    $animeFound->endDate = $request->endDate;
                } else {
                    $animeFound->endDate = null;
                }

                $animeFound->status = $request->status;

                $animeFound->save();

                $image = $request->cover;

                if($image) {

                    $url = 'https://s3.us-east-2.amazonaws.com/proyectobigchungus/';

                    if(($animeFound->cover != null && strpos($animeFound->cover,'original') === false)) {
                        Storage::disk('s3')->delete("images/animes/".substr($animeFound->cover,68));
                    }

                    $extension = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
                    $image_name = strval($animeFound->id) . '.' . $extension;
                    $image->storeAs('images/animes',$image_name,'s3');
                    
                    //Storage::disk('s3')->put("/images/".$image_name,File::get($image));
                    $animeFound->cover = $url .  'images/animes/' .$image_name;

                    $animeFound->save();
                }
                

                return response()->json(["status"=>"success","message" => "Anime updated successfully :)","data"=>$animeFound],200);
            
            } else {
                return response()->json(["status"=>"failed","message"=>"Anime not found :("],404);
            }

          } else {
            return response()->json(["status"=>"failed","message"=>"You dont have permissions :("],401);
            
          }
    }


    /**
     * Destroy
     * 
     * Delete the given anime from the database
     *
     * @urlParam anime integer required The ID of the anime. Example: 1
     * 
     * @responseFile status=200  storage/responses/anime/destroy/200.json
     * @responseFile status=401  storage/responses/401-admin.json
     * @responseFile status=404  storage/responses/anime/destroy/404.json
     */ 
    public function destroy($anime)
    {
        $animeFound = Anime::find($anime);

        if(Auth::user()->role=="admin") {

            if(!is_null($animeFound)) {

                if(($animeFound->cover != null && strpos($animeFound->cover,'original') === false)) {
                    Storage::disk('s3')->delete("images/animes/".substr($animeFound->cover,68));
                }

                $animeFound->delete();
                return response()->json(["status"=>"success","message"=>"Anime deleted successfully"],200);

            } else {
                return response()->json(["status"=>"failed","message"=>"No anime found :("],404);
            }

          } else {
            return response()->json(["status"=>"failed","message"=>"You dont have permissions :("],401);
          }

       
    }
}
