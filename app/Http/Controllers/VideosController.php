<?php

// app/Http/Controllers/BlogController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\HoroscopeVideo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class VideosController extends Controller
{
    public function index()
    {
        $videos = HoroscopeVideo::all();
        // You can fetch astrologer data from the database here and pass it to the view
        return view('admin.video.video', compact('videos'));
    }

    public function create(){

        return view('admin.video.add');
    }

    public function store(Request $request){

        // print_r($request->all());die;

        $validator = Validator::make($request->all(), [
            'video_title' => 'required|string|max:255',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_url' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $thumbnailPath = $request->file('cover_image')->store('thumbnails', 'public');
        
        // print_r($request->all());die;
            

        $video = HoroscopeVideo::create([
            'video_title' => $request->video_title,
            'cover_image' => $thumbnailPath,
            'video_url' => $request->video_url,
           
            
        ]);

        $temp_list = HoroscopeVideo::all();
        return redirect('admin/video');

    }

    public function edit($id){
        $video=   HoroscopeVideo::find($id);
        return view('admin.video.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'video_title'  => 'required|string|max:255',
            'cover_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // ✅ Made optional
            'video_url' => 'required',
           
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }
    
        // ✅ Find the existing video record
        $video = HoroscopeVideo::find($id);
        if (!$video) {
            return response()->json([
                'success' => false,
                'message' => 'Video not found.'
            ], 404);
        }
    
        // ✅ Handle File Upload (only if a new file is uploaded)
        if ($request->hasFile('cover_image')) {
            $thumbnailPath = $request->file('cover_image')->store('thumbnails', 'public');
            $video->cover_image = $thumbnailPath;
        }
    
        // ✅ Update video Entry
        $video->video_title  = $request->video_title;
        // $video->cover_image = $request->cover_image;
        $video->video_url      = $request->video_url;
        $video->save();
    
        return redirect('admin/video')->with('success', 'Video updated successfully!');
    }

  

    public function destroy($id)
    {
        $video = HoroscopeVideo::find($id);

        if (!$video) {
            return redirect()->route('admin.video.video')->with('error', 'Blog not found.');
        }

        // Delete the blog image if it exists
        if ($video->cover_image) {
            Storage::delete('public/' . $video->cover_image);
        }

        // Delete the blog entry
        $video->delete();

        return redirect()->route('admin.video.video')->with('success', 'Video deleted successfully.');
    }

}

