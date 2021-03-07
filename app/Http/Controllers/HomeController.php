<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public $search;
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        return view('home');
    }
}
