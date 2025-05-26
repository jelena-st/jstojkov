<?php

namespace Database\Seeders;

use App\Models\Bid;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bid = new Bid();
        $bid->horse_id = 1;
        $bid->user_id = 1;
        $bid->amount = 1000000;
        $bid->save();

        $bid = new Bid();
        $bid->horse_id = 1;
        $bid->user_id = 2;
        $bid->amount = 1200000;
        $bid->save();

        $bid = new Bid();
        $bid->horse_id = 3;
        $bid->user_id = 1;
        $bid->amount = 90000;
        $bid->save();

        $bid = new Bid();
        $bid->horse_id = 2;
        $bid->user_id = 2;
        $bid->amount = 1300000;
        $bid->save();

        $bid = new Bid();
        $bid->horse_id = 4;
        $bid->user_id = 3;
        $bid->amount = 1400000;
        $bid->save();
    }
}
