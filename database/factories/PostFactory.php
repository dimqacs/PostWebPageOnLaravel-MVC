<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{

    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     *
     * @throws RandomException
     *
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title(20),
            'content' => $this->faker->paragraphs(10, true),
            'image' => $this->faker->imageUrl(),
            'like' => random_int(1, 10000),
            'category_id' => Category::query()->get()->random()->id
        ];
    }
}
