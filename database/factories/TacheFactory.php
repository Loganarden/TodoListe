<?php

namespace Database\Factories;

use App\Models\Tache;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TacheFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tache::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre' => $this->faker->name ,
            'description' => $this->faker->Str::random(20),
            'date' => $this->faker->datetime,
        ];
    }
}
