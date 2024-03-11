<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LogoutController extends Controller
{
    public function store()
    {
       auth()->logout();
       return Redirect()->route('login');
    }
}
