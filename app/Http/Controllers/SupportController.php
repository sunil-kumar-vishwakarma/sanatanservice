<?php

// app/Http/Controllers/BlogController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index()
    {
        // You can fetch astrologer data from the database here and pass it to the view
        return view('admin.support-management.FAQs');
    }
    public function tickets()
    {
        // You can fetch astrologer data from the database here and pass it to the view
        return view('admin.support-management.tickets');
    }


}
