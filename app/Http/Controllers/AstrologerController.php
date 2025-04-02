<?php

// app/Http/Controllers/AstrologerController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class AstrologerController extends Controller
{
    public function index()
    {
        // You can fetch astrologer data from the database here and pass it to the view
        return view('admin.Astrologer.manage-astro');
    }
    public function addastrologer()
    {
        // You can fetch astrologer data from the database here and pass it to the view
        return view('admin.Astrologer.addastrologer');
    }

    public function editastrologer()
    {
        // You can fetch astrologer data from the database here and pass it to the view
        return view('admin.Astrologer.editastrologer');
    }
    public function viewastrologer()
    {
        // You can fetch astrologer data from the database here and pass it to the view
        return view('admin.Astrologer.viewastrologer');
    }
    public function requestindex()
    {
        // You can fetch astrologer data from the database here and pass it to the view
        return view('admin.Astrologer.pending-request');
    }
    public function review()
    {
        // You can fetch astrologer data from the database here and pass it to the view
        return view('admin.Astrologer.review');
    }
    public function commission()
    {
        // You can fetch astrologer data from the database here and pass it to the view
        return view('admin.Astrologer.commission');
    }
    public function skills()
    {
        // You can fetch skill data from the database here and pass it to the view
        return view('admin.Astrologer.skills');
    }

    public function addskills()
    {
        // You can fetch astrologer data from the database here and pass it to the view
        return view('admin.Astrologer.addskills');
    }


    public function category()
    {
        // You can fetch category data from the database here and pass it to the view
        return view('admin.Astrologer.categories');
    }
    public function block()
    {
        // You can fetch astrologer data from the database here and pass it to the view
        return view('admin.Astrologer.block-astrologer');
    }
}
