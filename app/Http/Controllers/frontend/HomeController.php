<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\user_department;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = user_department::all();

        return view('welcome', compact('user'));
    }
}
