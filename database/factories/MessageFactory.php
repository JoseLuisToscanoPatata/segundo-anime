<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $emisor = mt_rand(1,25);

        do{
            $receptor = mt_rand(1,25);
        
        }while($receptor == $emisor);

        return [
            'emisor' => $emisor,
            'recipient' => $receptor,
            'message'=>$this->faker->realText(200,1),
            'created_at'=>now(),
        ];
    }
}
