<?php

namespace Database\Factories;

use App\Models\Tour;
use Illuminate\Database\Eloquent\Factories\Factory;

class TourFactory extends Factory
{
    protected $model = Tour::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(10000, 50000),
            'location' => $this->faker->city(),
            'image' => 'tour_images/' . $this->faker->image('public/storage/tour_images', 640, 480, null, false),
        ];
    }
}
