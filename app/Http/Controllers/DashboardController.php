<?php

namespace App\Http\Controllers;

use App\Fitur;
use App\Kasus;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::count();
        $fitur = Fitur::count();
        $kasus = Kasus::count();
        return view("dashboard", compact('user', 'fitur', 'kasus'));
    }
}
