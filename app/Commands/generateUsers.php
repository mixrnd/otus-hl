<?php
require_once '../../vendor/autoload.php';
$config = include '../config/config.php';

\App\Components\Repository::init($config['database']);

$repo = new \App\Models\User\UserRepository();

$faker = Faker\Factory::create('Ru_RU');

$name = [];
for ($i = 0; $i < 500000; $i++) {
    $repo->insertUser(
        $faker->email, $faker->firstName, $faker->lastName, $faker->randomDigit, $faker->sentence(3),
        $faker->city, $faker->randomElement(['m', 'f']), 123
    );
}
