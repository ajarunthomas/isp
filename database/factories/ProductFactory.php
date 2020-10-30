<?php

use Faker\Generator as Faker;

$random_plan = [0, 1, 2, 3, 4, 5, 6, 7];
$upload_speed = [4, 8, 12, 16, 20, 24, 28, 32];
$download_speed = [32, 64, 96, 128, 160, 192, 224, 256];
$technology = ['fiber', 'dialup'];
$static_ip = ['yes', 'no'];

$factory->define(App\Product::class, function (Faker $faker) use ($random_plan, $upload_speed, $download_speed, $technology, $static_ip) {
	$i = $faker->randomElement($random_plan);
	$plan = "Plan_".$upload_speed[$i]."_".$download_speed[$i]."_".rand(10,99);

    return [
        'name' => $plan,
        'upload_speed' => $upload_speed[$i],
        'download_speed' => $download_speed[$i],
        'technology' => $faker->randomElement($technology),
        'static_ip' => $faker->randomElement($static_ip)
    ];
});
