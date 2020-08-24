<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Info;
use Faker\Generator as Faker;

$factory->define(Info::class, function (Faker $faker) {
    //possible categories
    $arrayValues = ['Sports', 'Entertainment', 'Business', 'Trending'];
    $industries = ['Film', 'Music', 'Medicine', 'Agriculture'];
    $keywords = ['test', 'covid', 'covid19', 'covid-19', 'barcelona', 'barca'];
    
    return [
        'info_name' => substr($faker->sentence(2), 0, -1),
        'event_name' => substr($faker->sentence(2), 0, -1),
        'category' => $arrayValues[rand(0, 3)],
        'industry' => $industries[rand(0, 3)],
        'actual_info' => $faker->paragraph,
        'keywords' => $keywords[rand(0, 5)],
        'activity_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'expiry_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'related_agency' => $faker->company,
        'numerical_value' => $faker->randomDigit,
        'other_details' => $faker->sentence(4),
    ];
});
