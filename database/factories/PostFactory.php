<?php

namespace Database\Factories;

use Illuminate\Support\Str as Str;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title=$this->faker->sentence(3, true);
        $slug=Str::slug($title);

        // dd($title);
        return [
            'user' => $this->faker->numberBetween(2, 49),
            'title' => $title,
            'slug' => $slug,
            'content' =>$this->faker->realText(),
            'status' => $this->faker->randomElement(array('draft', 'in progress', 'pending','assigned', 'rejected'), 1, true),
        ];
    }
}
