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

        return view('admin.Astrologer.pending-request');
    }
    public function addpendingrequest()
    {

        return view('admin.Astrologer.addpendingrequest');
    }
    public function review()
    {

        return view('admin.Astrologer.review');
    }
    public function commission()
    {

        return view('admin.Astrologer.commission');
    }
    public function addcommission()
    {

        return view('admin.Astrologer.addcommission');
    }
    public function editcommission()
    {

        return view('admin.Astrologer.editcommission');
    }
    public function skills()
    {

        return view('admin.Astrologer.skills');
    }


    public function category()
    {
        // You can fetch category data from the database here and pass it to the view
        return view('admin.Astrologer.categories');
    }
    public function addcategory()
    {
        // You can fetch category data from the database here and pass it to the view
        return view('admin.Astrologer.addcategory');
    }

    public function block()
    {
        // You can fetch astrologer data from the database here and pass it to the view
        return view('admin.Astrologer.block-astrologer');
    }
}
