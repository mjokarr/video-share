<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Video;
class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Video::factory()->count(5)->create();
        Video::factory()
        ->hasComments(4)
        ->hasLikes(10)
        ->count(15)
        ->create();
    }
}
