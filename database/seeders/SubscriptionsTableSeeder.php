<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                'plans' => 'monthly',
                'discount_percentage' => 30,
                'is_access_cource' => 1,
                'duration' => 20,
                'feedback_video_count' => 5,
                'webinar_access' => '1',
                'yoodli_access' => '1',
                'price' => 150,
                'booking_credit' => 2,
            ],[
                'plans' => 'yearly',
                'discount_percentage' => 30,
                'is_access_cource' => 1,
                'duration' => 40,
                'feedback_video_count' => 5,
                'webinar_access' => '1',
                'yoodli_access' => '1',
                'price' => 2000,
                'booking_credit' => 2,
            ]
        ];
        Subscription::insert($plans);
    }
}
