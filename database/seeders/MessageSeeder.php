<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         DB::table('messages')->insert([
            'recipient'=>1,
            'emisor'=>2,
            'message'=>'ostia pilotes',
        ]);

         \App\Models\Message::factory(500)->create();
    }
}
