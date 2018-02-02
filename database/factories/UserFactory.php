<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'gender' => $faker->randomElement($array = array('male', 'female')),
        'statusVerify' => $faker->randomElement($array = array(1)),
        'phone' => $faker->phoneNumber,
        'dateOfBirth' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-20 years'),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\StatasPost::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement($array = array(3,4,5,6,7,8,9,10)),
        'status' => $faker->text,
        'whoSee' => $faker->randomElement($array = array('Public','Friend','only me')),
        'option' => $faker->randomElement($array = array('About me','Game','Movie')),
        'upload_photo' => $faker->imageUrl($width = 640, $height = 480, $category = null, $randomize = true, $word = null, $gray = false),
        'anonymous' => $faker->randomElement($array = array('on','')),
        'post_time' => $faker->dateTime,
    ];
});
$factory->define(App\role_admin::class, function (Faker $faker) {
    return [
        'admin_id' => $faker->randomElement($array = array(1,2)),
        'role_id' => $faker->randomElement($array = array(1,2)),
    ];
});
$factory->define(App\role::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement($array = array('admin','editor')),
    ];
});
$factory->define(App\Admin::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->randomElement($array = array('shadhin','jahid')),
        'statusVerify' => $faker->randomElement($array = array(1)),
        'phone' => $faker->phoneNumber,
        'email' => $faker->randomElement($array = array('shadhinemail@gmail.com','jahid@gmail.com')),
        'password' => $password ?: $password = bcrypt('123456'),
    ];
});

