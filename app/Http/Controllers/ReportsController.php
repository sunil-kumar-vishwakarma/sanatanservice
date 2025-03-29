<?php

// app/Http/Controllers/BlogController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function callHistory()
    {
        // You can fetch astrologer data from the database here and pass it to the view
        return view('admin.reports.callHistory');
    }
    public function chatHistory()
    {
        // You can fetch astrologer data from the database here and pass it to the view
        return view('admin.reports.chatHistory');
    }
    public function partnerWiseEarning()
    {
        // You can fetch astrologer data from the database here and pass it to the view
        return view('admin.reports.partnerWiseEarning');
    }
    public function orderrequest()
    {
        // You can fetch astrologer data from the database here and pass it to the view
        return view('admin.reports.orderrequest');
    }
    public function reportrequest()
    {
        // You can fetch astrologer data from the database here and pass it to the view
        return view('admin.reports.reportrequest');
    }
    public function kundaliearning()
    {
        // You can fetch astrologer data from the database here and pass it to the view
        return view('admin.reports.kundaliearning');
    }



}
