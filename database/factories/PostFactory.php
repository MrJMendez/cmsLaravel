<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'author_first_name' => $this->faker->firstName(),
            'author_last_name' => $this->faker->LastName(),
            'file_path' => $this->faker->imageUrl(900, 300),
            'p_date' => $this->faker->date(),
            'user_id' => User::factory(),
            'p_status' => 'published'
        ];
    }
}
