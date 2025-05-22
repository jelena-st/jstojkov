<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/horses', function () {
    $horses = [
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
    ];

    return response()->json($horses);
});
