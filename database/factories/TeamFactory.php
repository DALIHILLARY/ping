<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Domain;

class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $domain = Domain::first();
        if (!$domain) {
            $domain = Domain::factory()->create();
        }

        return [
            'name' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'email' => $this->faker->email,
            'domain_id' => $this->faker->word,
            'contact_number' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
