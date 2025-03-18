<?php

// app/Http/Controllers/CustomerController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View; 


class CustomerController extends Controller
{
    public function index()
    {
        // You can fetch customer data from the database here and pass it to the view
        return view('admin.customers');
    }
}
