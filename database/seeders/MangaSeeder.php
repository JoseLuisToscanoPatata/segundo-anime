<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class MangaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = 'https://kitsu.io/api/edge/manga';

        for ($i=58000; $i > 57000 ; $i--) {  //CAMBIAR 53000 POR 57000
            
            $response = Http::get($url."/".($i));

            if($response->ok()) {

                $manga = $response->json();
                $manga = $manga['data'];

                if($manga['attributes']['status'] == 'unreleased' || $manga['attributes']['status'] == 'upcoming') {
                    $manga['attributes']['status'] = 'tba';
                }

                 if(!$manga['attributes']['ageRating']) {
                    $manga['attributes']['ageRating'] = 'G';
                }

                DB::table('mangas')->insert([
                   'title' => str_replace('-',' ',$manga['attributes']['slug']),
                    'rating' => 0,
                    'synopsis' =>$manga['attributes']['synopsis'],
                    'chapters' => $manga['attributes']['chapterCount']? $manga['attributes']['chapterCount']: 0,
                    'ageRating'=>$manga['attributes']['ageRating'],
                    'subType' =>  $manga['attributes']['subtype'],
                    'status'=>$manga['attributes']['status'],
                      'startDate'=>$manga['attributes']['startDate'],
                    'endDate'=>$manga['attributes']['endDate'],
                    'ratingCount'=>0,
                    'userCount'=>0,
                    'cover'=>$manga['attributes']['posterImage']?$manga['attributes']['posterImage']['original']: null,
                    'created_at'=>now(),
                ]);
            }
        }
    }
}
