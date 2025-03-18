<?php

// app/Http/Controllers/BlogController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function index()
    {
        // You can fetch astrologer data from the database here and pass it to the view
        return view('admin.video.video');
    }


}
