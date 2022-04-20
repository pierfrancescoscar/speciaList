<?php

use Illuminate\Database\Seeder;

use App\Subscription;

class SubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allSub = [
            [
                "type" => 'bronze',
                "price" => '2.99',
                "duration" => '24',
            ],
            [
                "type" => 'silver',
                "price" => '5.99',
                "duration" => '72',
            ],
            [
                "type" => 'gold',
                "price" => '9.99',
                "duration" => '144',
            ],
        ];

        foreach ($allSub as $sub) {

            $new_sub = new Subscription;

            $new_sub->type = $sub['type'];
            $new_sub->price = $sub['price'];
            $new_sub->duration = $sub['duration'];

            $new_sub->save();
        }
    }
}
