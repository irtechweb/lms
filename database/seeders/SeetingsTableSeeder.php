<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeetingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->truncate();

        $settings = [
            [
                'title' => 'Landing Page Video',
                'key' => 'landing_page_video',
                'value' => 'movie.mp4'
            ]
        ];
        Setting::insert($settings);
    }
}
