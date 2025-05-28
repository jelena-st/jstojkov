<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bid;
use App\Models\Horse;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BidController extends Controller
{
    public function adminAll()
    {
        return view('admin/bid/bids', [
            "bids" => Bid::all()
        ]);
    }

    public function create($id)
    {
        $horse = Horse::find($id);

        if (!$horse) {
            return redirect()->back()->with("error", "Horse not found!");
        }

        return view('bid/create', [
            "horse" => $horse
        ]);
    }

    public function store(Request $request, $id)
    {
        $horse = Horse::find($id);

        if ($horse->price >= $request->amount) {
            return redirect()->back()->with("error", "Bid must be higer then current highest one!");
        }

        if (empty($request->amount)) {
            return redirect()->back()->with("error", "Bid amount is required!");
        }

        $bid = new Bid();
        $bid->amount = $request->amount;
        $bid->horse_id = $id;
        $bid->user_id = Auth::user()->id;
        $bid->save();

        $horse->price = $request->amount;
        $horse->save();

        return redirect()->route("horse.list")->with("success", "Bid placed successfully!");
    }

    public function createAdmin()
    {
        return view('admin/bid/create', [
            "horses" => Horse::all(),
            "users" => User::all()
        ]);
    }

    public function storeAdmin(Request $request)
    {
        if (empty($request->amount) || empty($request->horse) || empty($request->user)) {
            return redirect()->back()->with("error", "All fields are required!");
        }

        $horse = Horse::find($request->horse);
        if ($horse->price >= $request->amount) {
            return redirect()->back()->with("error", "Bid must be higer then current highest one!");
        }

        $bid = new Bid();
        $bid->amount = $request->amount;
        $bid->horse_id = $request->horse;
        $bid->user_id = $request->user;
        $bid->save();

        return redirect()->route("bid.admin.all")->with("success", "Bid created successfully!");
    }

    public function edit($id)
    {
        $bid = Bid::find($id);
        return view('admin/bid/edit', [
            "bid" => $bid,
            "horses" => Horse::all(),
            "users" => User::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        if (empty($request->amount)) {
            return redirect()->back()->with("error", "All fields are required!");
        }

        $horse = Horse::find($request->horse);
        if ($horse->price >= $request->amount) {
            return redirect()->back()->with("error", "Bid must be higer then current highest one!");
        }

        $bid = Bid::find($id);
        $bid->amount = $request->amount;
        if ($request->has('horse')) {
            $bid->horse_id = $request->horse;
        }
        if ($request->has('user')) {
            $bid->user_id = $request->user;
        }
        $bid->save();
        return redirect()->route("bid.admin.all")->with("success", "Bid edited successfully!");
    }

    public function delete($id)
    {
        $bid = Bid::find($id);
        $bid->delete();
        return redirect()->route("bid.admin.all")->with("success", "Bid deleted successfully!");
    }

    public function dashboard()
    {
        $bidsPerDay = DB::table('bids')
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date')
            ->get();

        $chartData = [];
        $chartData[] = ['Date', 'Number of Bids'];
        foreach ($bidsPerDay as $row) {
            $chartData[] = [$row->date, $row->count];
        }

        $user = Auth::user();
        $userBids = Bid::where('user_id', $user->id)->get();
        return view('dashboard', [
            "bids" => $userBids,
            "chartData" => json_encode($chartData)
        ]);
    }
}
