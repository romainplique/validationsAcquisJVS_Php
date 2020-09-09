<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\BasketProducts;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

/// PRODUCT
$factory->define(Product::class, function (Faker $faker) {
    $faker->addProvider(new Xvladqt\Faker\LoremFlickrProvider($faker));
    $faker->addProvider(new \Faker\Provider\Fakecar($faker));
    return [
        'name' => $faker->vehicle,
        'description' => $faker->sentence(20, true),
        'price' => $faker->randomFloat(2, 3000, 15000),
        'image' => $faker->imageUrl(640, 480, ['car', 'cars', 'bus'], false),
    ];
});

/// PRODUCTS_BASKET
$factory->define(BasketProducts::class, function (Faker $faker) {
    return [
        'idProduct' => Product::all(['id'])->random(),
        'quantity' => $faker->randomDigitNotNull(),
    ];
});
