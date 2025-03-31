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
    public function horoscopeSigns()
    {
        return view('admin.master-setting.horoscopesign');
        // return view('admin.master-setting.horoscopeSigns');
    }
    public function rechargeAmount()
    {
        return view('admin.master-setting.rechargeAmount');
    }
    public function reportTypes()
    {
        return view('admin.master-setting.reportTypes');
    }


}
