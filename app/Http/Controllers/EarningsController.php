<?php

// app/Http/Controllers/CustomerController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\UserFeedback;


class EarningsController extends Controller
{
    public function withdrawalmethods()
    {
        return view('admin.earnings.withdrawalmethods');
    }
    public function withdrawalRequests()
    {
        return view('admin.earnings.withdrawalRequests');
    }
    public function walletHistory()
    {
        return view('admin.earnings.walletHistory');
    }
}
