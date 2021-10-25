<?php

namespace Database\Seeders;

use App\Models\Target;
use App\Models\Activity;
use Illuminate\Database\Seeder;
use Database\Factories\TargetFactory;

class TargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Target::factory()->count(50)->create()->each(
            function($target) {
                Activity::factory()->count(10)->create(['owner' => $target->owner, 'target_id'=>$target->id]);
            }
        );
    }
}
