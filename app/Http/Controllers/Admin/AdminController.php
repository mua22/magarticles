<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //Admin landing Page
    public function welcome()
    {
        return view('admin.admin.welcome');
    }
}
