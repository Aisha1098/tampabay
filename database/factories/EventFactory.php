<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'group_id' => function(){
                return Group::factory()->create()->id;
            },
            'desc' => fake()->paragraph(),
            'location_id' => function(){
                return Location::factory()->create()->id;
            },
            'date' => fake()->date(),
            'time' => fake()->time()
        ];
    }
}
