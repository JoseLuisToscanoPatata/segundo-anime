<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Friend;

class FriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         DB::table('friends')->insert([
            'user1_id'=>1,
            'user2_id'=>2,
            'created_at'=>now(),
            'confirmation_date'=>now(),
        ]);


        for ($i=1; $i < 100 ; $i++) { 

           do {
                $n = mt_rand(1,100);
           }while ($n == $i);

           if(!Friend::class::where('user1_id',$i)->where('user2_id',$n)->first() && !Friend::class::where('user2_id', $i)->where('user1_id', $n)->first()) {

            DB::table('friends')->insert([
                   'user1_id'=>$i,
                   'user2_id'=>$n,
                   'created_at'=>now(),
                   'confirmation_date'=>rand(0,4)?null:now(),
                ]);
           }  
        }
    }
}
