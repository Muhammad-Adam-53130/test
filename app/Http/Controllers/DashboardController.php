<?php

namespace App\Http\Controllers;


class DashboardController extends Controller
{
    public function index()
    {
        $users = auth()->user();

        return view('pages.dashboard', compact('users'));
    }
}