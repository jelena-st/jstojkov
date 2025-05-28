<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Horse;
use Illuminate\Http\Request;

class HorseController extends Controller
{
    public function welcome()
    {
        $featured_horses = Horse::where('featured', 1)->get();
        return view('horse/welcome', [
            "horses" => $featured_horses,
        ]);
    }

    public function list()
    {
        $all_horses = Horse::all();
        return view('horse/list', [
            "horses" => $all_horses,
        ]);
    }

    public function adminAll()
    {
        return view('admin/horse/horses', [
            "horses" => Horse::all(),
        ]);
    }

    public function one($id)
    {
        $horse = Horse::find($id);
        return view('horse/one', [
            "horse" => $horse,
        ]);
    }

    public function create()
    {
        return view('admin/horse/create');
    }

    public function store(Request $request)
    {
        if (empty($request->name) or empty($request->age) or empty($request->breed) or empty($request->description) or empty($request->gender) or empty($request->price)) {
            return redirect()->back()->with("error", "All fields are required!");
        }

        $horse = new Horse();
        $horse->name = $request->name;
        $horse->age = $request->age;
        $horse->breed = $request->breed;
        $horse->description = $request->description;
        $horse->gender = $request->gender;
        $horse->price = $request->price;
        $horse->featured = $request->featured ? 1 : 0;
        $horse->image = 'storage/' . $request->file('image')->store('', 'public');
        $horse->save();

        return redirect()->route("horse.admin.all")->with("success", "Horse added successfully!");
    }

    public function edit($id)
    {
        $horse = Horse::find($id);
        return view('admin/horse/edit', [
            "horse" => $horse,
        ]);
    }

    public function update(Request $request, $id)
    {
        if (empty($request->name) or empty($request->age) or empty($request->breed) or empty($request->description) or empty($request->gender) or empty($request->price)) {
            return redirect()->back()->with("error", "All fields are required!");
        }
        $horse = Horse::find($id);
        $horse->name = $request->name;
        $horse->age = $request->age;
        $horse->breed = $request->breed;
        $horse->description = $request->description;
        $horse->price = $request->price;
        $horse->gender = $request->gender;
        $horse->featured = $request->featured ? 1 : 0;
        if ($request->hasFile('image')) {
            $horse->image = 'storage/' . $request->file('image')->store('', 'public');
        }
        $horse->save();
        return redirect()->route("horse.admin.all")->with("success", "Horse edited successfully!");
    }

    public function delete($id)
    {
        $horse = Horse::find($id);
        $horse->delete();
        return redirect()->route("horse.admin.all")->with("success", "Horse deleted successfully!");
    }
}
