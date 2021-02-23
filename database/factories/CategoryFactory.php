<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->word(20);
        return [
            'name'  => $name,
            'color' => $this->faker->randomElement(['red', 'yellow', 'green', 'blue', 'indigo', 'purple', 'ping']),
            'slug'  => Str::slug($name)
        ];
    }
}
