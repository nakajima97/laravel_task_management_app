<?php

namespace App\Http\Controllers\NormalUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('NormalUser.tasks');
    }
}