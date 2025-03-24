<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use DB;
use App\Models\User;
// use App\Models\Partner;
// use App\Models\Testimonial;
// use App\Models\Enquiry;


class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    { 
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            // print_r($request->all());die;
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {

        $totalUsers = User::count();
        // $totalPartners = Partner::count();
        // $totalTestimonials = Testimonial::count();
        // $totalEnquiries = Enquiry::count();
         $totalPartners = '';
        $totalTestimonials ='';
        $totalEnquiries = '';

        $userdata = DB::table('users')
        ->join('user_roles', 'user_roles.userId', '=', 'users.id')
        ->join('roles', 'user_roles.roleId', '=', 'roles.id')
        ->where('users.isActive', true)
        ->where('users.isDelete', false)
        // ->where('user_roles.roleId', 3) // Uncomment if needed
        ->select('users.*', 'user_roles.roleId', 'roles.name as role_namess') // Corrected alias
        ->orderBy('users.id', 'DESC')
        ->limit(5)
        ->get();
    
    // Output data
    // $userdata = $user;

                // print_r($userdata);die;

        return view('admin.dashboard', compact('totalUsers', 'totalPartners', 'totalTestimonials', 'totalEnquiries','userdata'));

        // return view('admin.dashboard');
    }
}
