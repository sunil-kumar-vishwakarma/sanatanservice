<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class MasterSettingController extends Controller
{
    public function customerProfile()
    {
        return view('admin.master-setting.customerProfile');
    }


}
