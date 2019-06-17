<?php

use Faker\Generator as Faker;
use Faker\Provider\Lorem as Lorem;

$factory->define(App\Category::class, function (Faker $faker) {
$lorem = new Lorem($faker);
    return [
        'name' =>  $lorem->words(2, true),
        'description' => $lorem->words(10, true),
       
    ];
});
