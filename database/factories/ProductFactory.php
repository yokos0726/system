<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //
        'company_id' => factory(App\Models\Company::class),
        'product_name' => $faker->randomElement(['お茶','水','オレンジジュース','コーヒー','スポーツドリンク','緑茶']),
        'price' => $faker->randomElement(['100','150','130']),
        'stock' => $faker->randomNumber(2),
        'comment' => $faker->sentence,


    ];
});
