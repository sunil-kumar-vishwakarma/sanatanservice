<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Partner;
use App\Models\Testimonial;
use App\Models\Enquiry;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalPartners = Partner::count();
        $totalTestimonials = Testimonial::count();
        $totalEnquiries = Enquiry::count();

        return view('admin.dashboard', compact('totalUsers', 'totalPartners', 'totalTestimonials', 'totalEnquiries'));
    }
}
