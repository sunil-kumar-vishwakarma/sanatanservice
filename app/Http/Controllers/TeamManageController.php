<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class TeamManageController extends Controller
{
    public function role()
    {
        return view('admin.team-management.role');
    }
    public function list()
    {
        return view('admin.team-management.list');
    }
    public function addlist()
    {
        return view('admin.team-management.addlist');
    }
    public function editlist()
    {
        return view('admin.team-management.editlist');
    }


}
