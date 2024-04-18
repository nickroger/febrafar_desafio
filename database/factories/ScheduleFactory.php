<?php

namespace Database\Factories;

use App\Enums\ScheduleStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'title' => fake()->unique()->name(),
            'description' => fake()->sentence(10),
            'start_date' => $this->validationdate(fake()->unique()->date('Y-m-d')),
            'deadline_date' => $this->validationdate(fake()->unique()->date('Y-m-d')),
            'conclusion_date' => $this->validationdate(fake()->unique()->date('Y-m-d')),
            'status' => ScheduleStatus::o,
            'id_user' => '1'
        ];
    }
    public function validationdate($data): string
    {
        $nameDay = date("D", strtotime($data));
        if ($nameDay == "Sat" || $nameDay == "Sun") {
            $newdate = fake()->unique()->date('Y-m-d');
            return $this->validationdate($newdate);
        }
        return $data;
    }
}
