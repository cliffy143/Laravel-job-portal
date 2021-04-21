<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'user_id' => $this->faker->numberBetween(1, 12),
            'title' => $this->faker->name,
            'company_id'=>$this->faker->numberBetween(1, 12),
            'slug' => Str::slug($this->faker->name),
            'description' => $this->faker->text,
            'position' => $this->faker->jobTitle,
            'address' => $this->faker->address,
            'type' => $this->faker->text,
            'roles' => $this->faker->text,
            'Last_date' => $this->faker->date,
            'status' => $this->faker->numberBetween(1, 2)


        


        ];
    }
}



