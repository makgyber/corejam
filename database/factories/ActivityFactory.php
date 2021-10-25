<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\Target;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Activity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'owner' => $target->owner,
            // 'target_id'=> $target->id,
            'title' => $this->faker->sentence,
            'success_indicator' => $this->faker->sentence,
            'location'  => $this->faker->address,
            'remarks'  => $this->faker->sentence,
            'plan_b'     => $this->faker->sentence,
            'support_request'    => $this->faker->sentence,
            'support_from_whom'    => $this->faker->name(),
            'support_how_much'    => $this->faker->numberBetween(1000, 100000),
            'support_when_needed'    => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'target_start'    => now(),
            'target_end'    => now(),
        ];
    }
}
