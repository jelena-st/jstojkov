<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Horses
class Horse {
    public string $name;
    public int $gender;
    public int $age;
    public string $breed;
    public int $price;
    public string $description;
    public int $featured;

    public function getName() {
        return $this->name;
    }

    public function __construct($name, $gender, $age, $breed, $price, $description, $featured)
    {
        $this->name = $name;
        $this->gender = $gender;
        $this->age = $age;
        $this->breed = $breed;
        $this->price = $price;
        $this->description = $description;
        $this->featured = $featured;
    }
}

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/horses', function () {
    return view('horses', [
        "name" => "Emerald",
        "breed" => "KWPN",
        "horses" => [
            [
                "name" => "Emerald",
                "gender" => "Gelding",
                "breed" => "KWPN",
                "age" => "9"
            ],
            [
                "name" => "Dreamcatcher",
                "gender" => "Mare",
                "breed" => "Oldenburg",
                "age" => "4"
            ],
            [
                "name" => "Windstorm",
                "gender" => "Stallion",
                "breed" => "KWPN",
                "age" => "11"
            ]
        ]
    ]);
});

Route::get('/horse', function () {
    return view('horse', [
        "horse" => new Horse("Explosion W", 3, 9, "KWPN", 12000, "Consistent clear rounds at 1.30m, showing power, scope, and carefulness. Balanced under saddle with a proven competition record. Ready to step up.", 1)
    ]);
});
