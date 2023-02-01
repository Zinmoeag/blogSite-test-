<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Artist;
use App\Models\Category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "title" =>fake()->sentence(),
            "slug" =>fake()->slug(),
            "body" => fake()->paragraph(),
            "artist_id" => 1,
            "category_id"=>1
        ];
    }
}
