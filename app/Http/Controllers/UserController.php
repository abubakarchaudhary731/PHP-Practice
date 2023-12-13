<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUsers(string $id)
    {
        return view('user', ['id' => $id]);
    }
}
