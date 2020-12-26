<?php

namespace Database\Factories;

use App\Models\AdminPermission;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminPermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdminPermission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->name();
        return [
            'name' => $name . '-权限',
            'tag' => $this->faker->uuid,
        ];
    }
}
