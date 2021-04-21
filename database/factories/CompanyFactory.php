<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 12),
            'cname' => $this->faker->text,
            'address' => $this->faker->streetAddress,
             'phone' => $this->faker->phoneNumber,
            'website' => $this->faker->url,
            'slug' => Str::slug($this->faker->name),
            'cover_photo' => $this->faker->text,
            'slogan' => $this->faker->sentence,
            'description' => $this->faker->text,
            'logo' => $this->faker->text,


            
            
           
         
        ];
    }
}
           
          