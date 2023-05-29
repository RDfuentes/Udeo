<?php

namespace Database\Factories;

use App\Models\Tipopersona;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TipopersonaFactory extends Factory
{
    protected $model = Tipopersona::class;

    public function definition()
    {
        return [
			'name' => $this->faker->name,
			'descripcion' => $this->faker->name,
			'status' => $this->faker->name,
        ];
    }
}
