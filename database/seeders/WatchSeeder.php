<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Anime;

class WatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estadosAnime = ['PlanToWatch','Watching','OnHold','Dropped','Completed'];

        for ($i=1; $i < 3500; $i++) { 

                $animeActual = Anime::find($i);
                $animeActual->userCount = 1;
                
                 if($animeActual->status == 'tba') {
                    $estadoVer = $estadosAnime[0];

                } else if($animeActual->status == 'current') {
                    $estadoVer = $estadosAnime[mt_rand(0,3)];

                } else {
                    $estadoVer = $estadosAnime[mt_rand(0,4)];
                }

                $votado = rand(0,5);

                if($votado) {
                    $nota = rand(0,10);
                    $animeActual->ratingCount = 1;
                    $animeActual->rating = $nota;
                    $animeActual->save();
                }

                
            
            DB::table('watches')->insert([
                'user_id'=>1,
                'anime_id'=>$i,
                'watchStatus'=>$estadoVer,
                'score'=>$votado ? $nota :null,
                'favourite'=>rand(0,10)>8?true:false,
                'created_at'=>now(),
            ]);
        }

        for ($i=2; $i <= 50; $i++) { 
            
            for ($j=1; $j < 3000; $j++) {

                if(mt_rand(0,9) > 7) {

                    $animeActual = Anime::find($j);
                    $animeActual->userCount = $animeActual->userCount + 1;
                    
                    if($animeActual->status == 'tba') {
                        $estadoVer = $estadosAnime[0];

                    } else if($animeActual->status == 'current') {
                        $estadoVer = $estadosAnime[mt_rand(0,3)];

                    } else {
                        $estadoVer = $estadosAnime[mt_rand(0,4)];
                    }

                    $votado = rand(0,5);

                    if($votado) {
                        $nota = rand(0,10);
                        $animeActual->rating = round((($nota + ($animeActual->rating * $animeActual->ratingCount)) / ($animeActual->ratingCount + 1)),2);
                        $animeActual->ratingCount = $animeActual->ratingCount + 1;
                        $animeActual->save();
                        
                    }
                
                    DB::table('watches')->insert([
                        'user_id'=>$i,
                        'anime_id'=>$j,
                        'watchStatus'=>$estadoVer,
                        'score'=>$votado? $nota :null,
                        'favourite'=>rand(0,10)>8?true:false,
                        'created_at'=>now(),
                    ]);

                }
            }
        }
    }
}
