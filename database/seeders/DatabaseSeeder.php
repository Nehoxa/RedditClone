<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Community;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Community::factory(10)->create();


        User::factory()
            ->count(10)
            ->hasCommunities(2)
            ->hasPosts(3, function (array $attributes, User $user) {
                return ['community_id' => $user->communities->random()->id];
            })
            ->create();
    }
}
