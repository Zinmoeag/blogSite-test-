<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artist>
 */
class ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "slug"=>fake()->slug(),
            "name"=>fake()->sentence(),
            "info"=>fake()->paragraph(),
            "img_url"=>"/assets/img/img4.jpg"
        ];
    }
}
