<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Associate;
use App\Models\Contractor;
use App\Models\Policy;
use App\Models\Tax;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')
        		->with('associates', Associate::count())
        		->with('contractors', Contractor::count())
        		->with('policies', Policy::count())
        		->with('taxes', Tax::count())
        		->with('users', User::count());
    }
}