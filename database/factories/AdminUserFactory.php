<?php

namespace Database\Factories;

use App\Models\AdminUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdminUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->name();
        return [
            'name' => $name,
            'username' => $name,
            'phone' => $this->faker->phoneNumber,
            'avatar' => url('/static/images/default_avatar.jpeg'),
            'introduction' => '这家伙还没有简介'
        ];
    }
}
