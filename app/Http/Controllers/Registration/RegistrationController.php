<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        return view ('registration.index');
    }
}
