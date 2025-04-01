<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WisdomController extends Controller
{
    public function wisdom()
    {

        return view('admin.Wisdom.wisdom');
    }
    public function edit()
    {

        return view('admin.Wisdom.edit');
    }



}
