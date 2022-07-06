<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function index()
    {
        return view('/form_test');
    }
    public function upload()
    {
        return view('/form_test');
    }
}
