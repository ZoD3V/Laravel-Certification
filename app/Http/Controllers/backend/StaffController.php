<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\user_department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $idUser = Auth::user()->id;
        $departement = user_department::where('users_id', $idUser)->get();
        return view('backend.staff.index', compact('departement'));
    }
}
