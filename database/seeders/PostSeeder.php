<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    public function run()
    {
        User::all()->each(function ($user) {
            Post::factory()->count(10)->create(['user_id' => $user->id]);
        });
    }
}
