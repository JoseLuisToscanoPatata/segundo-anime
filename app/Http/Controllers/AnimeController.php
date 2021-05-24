<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class AnimeController extends Controller
{
    /**
     * Get every anime on the database
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
                "synopsis" =>  "string|required|filled",
                "episodes" =>"integer|required|min:0",
                "episodeLength"=>"integer|required|min:0",
                "ageRating"=>["sometimes","nullable",Rule::in(['G','PG','R','R18'])],
                "subType"=>["sometimes","nullable",Rule::in(['ONA','OVA','TV','movie','music','special'])],
                "status"=>["required",Rule::in(['current','finished','tba'])],
                "startDate" =>  "sometimes|nullable|string",
                "endDate" =>  "sometimes|nullable|string|after_or_equal:startDate",
               "trailer" => ["sometimes","nullable","string","regex:/^https:\/\/www.youtube.com\/embed\/.+$/"],
                "cover" => ['nullable', 'mimes:jpg,jpeg,png', 'max:1000'],
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

                    $extension = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
                    $image_name = strval($anime->id) . '.' . $extension;
                    

                    Storage::disk('public')->put("/anime-photos/".$image_name,File::get($image));
                    $anime->cover = env('APP_URL') . "/storage/anime-photos/" .$image_name;

                    $anime->save();
                }

            return response()->json(["status"=>"success","message" => "Anime created successfully :)","data"=>$anime],200);

          } else {
            return response()->json(["status"=>"failed","message"=>"You dont have permissions :("],401);

          }
    }

    /**
     * Get the data of the anime.
     *
     * @param  int  $id Database Ip of the given anime to show
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
     * Update the specified anime in storage, given the id and the request with the new data
     *
     * @param  \Illuminate\Http\Request  $request New anime info
     * @param  int  $id Database Ip of the given anime to update
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
                    "episodes" =>"integer|required|min:0",
                    "episodeLength"=>"integer|required|min:0",
                    "ageRating"=>["sometimes","nullable",Rule::in(['G','PG','R','R18'])],
                    "subType"=>["sometimes","nullable",Rule::in(['ONA','OVA','TV','movie','music','special'])],
                    "status"=>["required",Rule::in(['current','finished','tba'])],
                    "startDate" =>  "sometimes|nullable|string",
                     "endDate" =>  "sometimes|nullable|string|after_or_equal:startDate",
                     "trailer" => ["sometimes","nullable","string","regex:/^https:\/\/www.youtube.com\/embed\/.+$/"],
                    "cover" => ['nullable', 'mimes:jpg,jpeg,png', 'max:255'],
                ]);

                if($validator->fails()) {
                    return response()->json(["status"=>"failed","validation_errors" => $validator->errors()],400);
                }

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
                
                if($request->trailer) {
                    $anime->trailer = $request->trailer;
                } else {
                    $anime->trailer = null;
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

                $anime->status = $request->status;

                $anime->save();

                $image = $request->cover;

                if($image) {

                    $extension = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
                    $nueva = strval($anime->id) . '.' . $extension;

                    if(!is_null(Storage::disk('public')->get("/anime-photos/".substr($anime->cover,43)))) {
                        Storage::disk('public')->delete("/anime-photos/".substr($anime->cover,43));
                    }

                    Storage::disk('public')->put("/anime-photos/".$nueva,File::get($image));
                    $anime->cover = env('APP_URL') . "/storage/anime-photos/" .$nueva;

                    $anime->save();
                }
                

                return response()->json(["status"=>"success","message" => "Anime updated successfully :)","data"=>$anime],200);
            
            } else {
                return response()->json(["status"=>"failed","message"=>"Anime not found :("],404);
            }

          } else {
            return response()->json(["status"=>"failed","message"=>"You dont have permissions :("],401);
            
          }
    }

    /**
     * Delete an anime from the database.
     *
     * @param  int  $id Database Ip of the given anime to delete
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
