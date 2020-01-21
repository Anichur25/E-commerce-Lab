<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(App\User :: class, function (Faker $faker) {
    return [
        'first_name' => 'Anichur',
        'last_name' => 'Rahman',
        'email_address' => Str :: random(10).'@gmail.com',
        'mailing_address' => 'Faridpur',
        'user_name' => Str :: random(6),
        'password' => Str :: random(10)
    ];
});
