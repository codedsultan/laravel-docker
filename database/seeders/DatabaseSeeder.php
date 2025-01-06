<?php

namespace Database\Seeders;

use App\Models\Channel;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory(10)->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::create(
            [
                'name' => 'Olusegun Ibraheem',
                'email' => 'codesultan369@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => 'NpkjO0rOQ5b'
            ]
        );

        $channels = collect(['general', 'laravel', 'reverb', 'echo', 'livewire']);


        $channels->each(function ($channel) {
            Channel::firstOrCreate(['name' => $channel])
                ->subscribers()
                ->attach(
                    User::inRandomOrder()
                        ->take(rand(1, 10))->get()
                );
        });
    }
}
