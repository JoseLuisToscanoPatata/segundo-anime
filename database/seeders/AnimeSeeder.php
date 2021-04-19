<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class AnimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = 'https://kitsu.io/api/edge/anime';

        for ($i=1; $i < 500 ; $i++) { 
            
            $response = Http::get($url."/".($i));

            if($response->ok()) {

                $anime = $response->json();
                $anime = $anime['data'];

                if($anime['attributes']['status'] == 'unreleased' || $anime['attributes']['status'] == 'upcoming') {
                    $anime['attributes']['status'] = 'tba';
                }

                 if(!$anime['attributes']['ageRating']) {
                    $anime['attributes']['ageRating'] = 'G';
                }

                DB::table('animes')->insert([
                    'title' => $anime['attributes']['slug'],
                    'rating' => 0,
                    'synopsis' =>$anime['attributes']['synopsis'],
                    'episodes' => $anime['attributes']['episodeCount']? $anime['attributes']['episodeCount']: 0,
                    'episodeLength' => $anime['attributes']['episodeLength']? $anime['attributes']['episodeLength']: 0,
                    'ageRating'=>$anime['attributes']['ageRating'],
                    'subtype' =>  $anime['attributes']['subtype'],
                    'status'=>$anime['attributes']['status'],
                    'ratingCount'=>0,
                    'userCount'=>0,
                    'cover'=>$anime['attributes']['posterImage']['original'],
                ]);
            }
        }


    }
}
