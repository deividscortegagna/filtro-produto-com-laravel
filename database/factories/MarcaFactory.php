<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Marca;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Marca>
 */
class MarcaFactory extends Factory
{
    protected $model = Marca::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->company,
        ];
    }
}
