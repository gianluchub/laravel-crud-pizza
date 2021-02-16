<?php

use Illuminate\Database\Seeder;
use App\Pizza;
use Faker\Generator as Faker;

class PizzasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 20; $i++) {
            $data = $faker->dateTime();

            $pizza = new Pizza();
            $pizza->name = $faker->sentence(2);
            $pizza->price = $faker->randomFloat(2, 4, 12);
            $pizza->ingredients = $faker->text(500);
            // $pizza->img_path = $faker->image('public/images', 640, 480, 'food', false);
            $pizza->img_path = $faker->imageUrl(640, 480, 'food');
            $pizza->vegetarian = rand(0,1);
            $pizza->created_at = $data;
            $pizza->updated_at = $data;
            $pizza->save();
        }
    }
}
