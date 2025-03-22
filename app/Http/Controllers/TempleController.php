<?php

// app/Http/Controllers/AstrologerController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Temple;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TempleController extends Controller
{
    public function index()
    {
        $temp_list = Temple::all();
        return view('admin.Temple.list', compact('temp_list'));
        // return view('admin.Temple.list');
    }
    public function view($id)
    {
        $temple = Temple::findOrFail($id);
        return view('admin.Temple.view', compact('temple'));
    }
    public function add()
    {
        return view('admin.Temple.add');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'temple_name' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        
        // print_r($request->all());die;
            

        $video = Temple::create([
            'name' => $request->temple_name,
            'photo' => $thumbnailPath,
            'description' => $request->description,
            
        ]);

        $temp_list = Temple::all();
        return redirect('admin/temple-list');
        // return view('admin.Temple.list', compact('temp_list'));

        // return response()->json([
        //     'success' => true,
        //     'video' => $video,
        //     'thumbnail_url' => Storage::url($thumbnailPath),
            
        // ]);

    }

}
