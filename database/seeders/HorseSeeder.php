<?php

namespace Database\Seeders;

use App\Models\Horse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HorseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horse = new Horse();
        $horse->name = 'Explosion W';
        $horse->age = 5;
        $horse->breed = 'Thoroughbred';
        $horse->price = 155000;
        $horse->description = 'Consistent clear rounds at 1.30m, showing power, scope, and carefulness. Balanced under saddle with a proven competition record. Ready to step up.';
        $horse->image = 'images/1.jpg';
        $horse->featured = 1;
        $horse->gender = 2;
        $horse->save();

        $horse = new Horse();
        $horse->name = 'Catch Me If You Can';
        $horse->age = 7;
        $horse->breed = 'Holsteiner';
        $horse->price = 13000;
        $horse->description = 'A real Grand Prix prospect: ultra-careful, incredibly scopey, and mentally tough. Consistent results in FEI 6yo classes, ready to develop into a top-level horse.';
        $horse->image = 'images/2.jpg';
        $horse->featured = 0;
        $horse->gender = 3;
        $horse->save();

        $horse = new Horse();
        $horse->name = 'Urico';
        $horse->age = 10;
        $horse->breed = 'KWPN';
        $horse->price = 123000;
        $horse->description = 'This mare boasts top-10 finishes across national shows. Careful, cat-like over fences, and naturally uphill—she’s a forward-thinking partner with heart.';
        $horse->image = 'images/3.jpg';
        $horse->featured = 1;
        $horse->gender = 1;
        $horse->save();

        $horse = new Horse();
        $horse->name = 'Sapphire';
        $horse->age = 11;
        $horse->breed = 'KWPN';
        $horse->price = 15000;
        $horse->description = 'With multiple clear rounds in age classes, this stallion pairs elite bloodlines with modern athleticism. A true sport horse with a big future ahead.';
        $horse->image = 'images/4.jpg';
        $horse->featured = 1;
        $horse->gender = 2;
        $horse->save();

        $horse = new Horse();
        $horse->name = 'California';
        $horse->age = 13;
        $horse->breed = 'Zangersheide';
        $horse->price = 190000;
        $horse->description = 'Winner at 1.20m with scope for more. Light in the hand, responsive, and brave to the fences. Ideal for junior or amateur looking to climb the ranks.';
        $horse->image = 'images/5.jpg';
        $horse->featured = 0;
        $horse->gender = 1;
        $horse->save();

        $horse = new Horse();
        $horse->name = 'Celestaro Z';
        $horse->age = 8;
        $horse->breed = 'Zangersheide';
        $horse->price = 20000;
        $horse->description = 'Placed in young horse championships, this gelding offers textbook technique, quick reflexes, and excellent rideability. A serious contender for ambitious riders.';
        $horse->image = 'images/6.jpg';
        $horse->featured = 1;
        $horse->gender = 1;
        $horse->save();
    }
}
