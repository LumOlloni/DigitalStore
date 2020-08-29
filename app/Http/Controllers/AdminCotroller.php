<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use DB;
use App\Payment;
use App\User;
use Charts;


class AdminCotroller extends Controller
{

    public function allUser()
    {
        $roleName = 'user';

        $users = User::whereHas('roles', function ($q) use ($roleName) {
            $q->where('name', $roleName);
        })->get();

        return view('adminTemplate.userStats')->with('users', $users);
    }

    public function order($userid)
    {

        $query = Payment::where('user_id', $userid)->get();

        $users = User::find($userid);


        return view('adminTemplate.order')->with(['users' =>  $users, 'query' => $query]);

        // return redirect()->back()->with('error' , 'User doesnt buy anything ');

    }

    public function menage()
    {
        return view('adminTemplate.menage');
    }

    public function getSettingsAttribute($value)
    {
        return json_decode($value);
    }


    public function statistics()
    {
        $data = Product::orderBy('buyProduct', 'ASC')->get();
        $string = '';
        $s = '';
        $number = '';
        $numberS = '';
        foreach ($data as $key) {
            $string .= '' . $key->name . '","';
            $number .= '' .  $key->buyProduct . ',';
        }
        $s = $s . '' . $string . ',';
        $numArray = explode(" ", $number);
        $s = trim($s, '","');
        foreach ($numArray as $num) {
            $integer = $num;
        }

        $integer = substr($integer, 0, -1);
        $integerValue  = trim($integer, '" "');
        $chart = Charts::create('line', 'highcharts')
            ->title('Product Soled')
            ->elementLabel('Product')
            ->labels([$s])
            ->values([$integerValue])
            ->dimensions(1000, 500)
            ->responsive(true);

        return view('adminTemplate.statistics', compact('chart'));
    }
}
