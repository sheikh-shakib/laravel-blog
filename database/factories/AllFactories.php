<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'slug'=>Str::slug($faker->word)
    ];
});

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'slug'=>Str::slug($faker->word)
    ];
});

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence,
        'slug'=>Str::slug($faker->word),
        'image'=>$faker->imageUrl(600,400),
        'description'=>$faker->text(400),
        'category_id'=>factory('App\Category')->create()->id,
        'user_id'=>1
    ];
});

