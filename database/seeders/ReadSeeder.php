<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Manga;

class ReadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $estadosManga = ['PlanToRead','Reading','OnHold','Dropped','Completed'];

        for ($i=1; $i < 300; $i++) {  //CAMBIAR POR 600

                $mangaActual = Manga::find($i);
                $mangaActual->userCount = 1;
                
                 if($mangaActual->status == 'tba') {
                    $estadoLeer = $estadosManga[0];

                } else if($mangaActual->status == 'current') {
                    $estadoLeer = $estadosManga[mt_rand(0,3)];

                } else {
                    $estadoLeer = $estadosManga[mt_rand(0,4)];
                }

                $votado = rand(0,5);

                if($votado) {
                    $nota = rand(1,10);
                    $mangaActual->ratingCount = 1;
                    $mangaActual->rating = $nota;
                    $mangaActual->save();
                }

                
            
            DB::table('reades')->insert([
                'user_id'=>1,
                'manga_id'=>$i,
                'readStatus'=>$estadoLeer,
                'score'=>$votado ? $nota :null,
                'favourite'=>rand(0,80)>78?true:false,
                'created_at'=>now(),
            ]);
        }

        for ($i=2; $i <= 25; $i++) { 
            
            for ($j=1; $j < 300; $j++) { //CAMBIAR POR 400

                if(mt_rand(0,9) > 8) {

                    $mangaActual = Manga::find($j);
                    $mangaActual->userCount = $mangaActual->userCount + 1;
                    
                    if($mangaActual->status == 'tba') {
                        $estadoLeer = $estadosManga[0];

                    } else if($mangaActual->status == 'current') {
                        $estadoLeer = $estadosManga[mt_rand(0,3)];

                    } else {
                        $estadoLeer = $estadosManga[mt_rand(0,4)];
                    }

                    $votado = rand(0,5);

                    if($votado) {
                        $nota = rand(0,10);
                        $mangaActual->rating = round((($nota + ($mangaActual->rating * $mangaActual->ratingCount)) / ($mangaActual->ratingCount + 1)),2);
                        $mangaActual->ratingCount = $mangaActual->ratingCount + 1;
                        $mangaActual->save();
                        
                    }
                
                    DB::table('reades')->insert([
                        'user_id'=>$i,
                        'manga_id'=>$j,
                        'readStatus'=>$estadoLeer,
                        'score'=>$votado? $nota :null,
                        'favourite'=>rand(0,80)>75?true:false,
                        'created_at'=>now(),
                    ]);

                }
            }
        }
        
    }
}
