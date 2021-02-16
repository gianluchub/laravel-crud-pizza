<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;

class HomeController extends Controller
{
    public function index() {
        $pizzas = Pizza::all();

        return view('welcome', compact('pizzas'));
    }
}
