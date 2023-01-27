<?php

namespace Database\Factories;

use App\Models\Fairs\Fair;
use App\Models\Fairs\Invitation;
use App\Models\Institutes\University;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InvitationFactory extends Factory
{
    protected $model = Invitation::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
//            'fair_id'=>Fair::inRandomOrder()->value('id'),
            'university_id' => University::inRandomOrder()->value('id'),
            'status'=>\Arr::random([0,1,2]),
            'accepted_by_school'=>\AppConst::REGISTARTION_PENDING
        ];
    }
}
