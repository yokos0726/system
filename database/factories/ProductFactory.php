<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //
        'company_id' => factory(App\Models\Company::class),
        'product_name' => $faker->randomElement(['オレンジジュース','コーヒー','スポーツドリンク']),
        'price' => $faker->randomElement(['100','150','130']),
        'stock' => $faker->randomNumber(2),
        'image' => '',
        'comment' => $faker->sentence,


    ];
});
