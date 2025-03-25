<?php

// app/Http/Controllers/CustomerController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\UserFeedback;


class FeedbackController extends Controller
{
    public function index()
    {
        // You can fetch customer data from the database here and pass it to the view
    //    $feedback = UserFeedback::all();

    $feedback = UserFeedback::with('user')->get();
// print_r($feedback);die;
        return view('admin.feedback', compact('feedback'));
    }
}
