<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PersonaFactory extends Factory
{
    protected $model = Persona::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
			'telefono' => $this->faker->name,
			'tipopersona_id' => $this->faker->name,
			'status' => $this->faker->name,
        ];
    }
}
