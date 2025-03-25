<?php

namespace App\Http\Controllers;


use App\Models\LiveDarshan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LiveDarsanController extends Controller
{
    //

    public function index()
    {
        $videos = LiveDarshan::all();
        return view('admin.live.darshan', compact('videos'));
    }

    public function store(Request $request)
    {

        
        $validator = Validator::make($request->all(), [
            'video_name' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'video_file' => 'required|mimes:mp3,mp4,avi,mov|max:102400',
            // 'video_option' => 'required',
            'video_file' => 'nullable|mimes:mp4,mov,avi|max:20480', // Max 20MB
            'video_url' => 'nullable|url'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        // $videoPath = $request->file('video_file')->store('videos', 'public');

        // print_r($request->video_option);die;
            $video_url = null;
        $videoPath = null; 

        if ($request->video_option == 'file' && $request->hasFile('video_file')) {
            // Store Video File
            $filePath = $request->file('video_file')->store('videos', 'public');
            $videoPath = $filePath;
        } elseif ($request->video_option == 'url') {
            // Store Video URL
            $video_url = $request->video_url;
        }

        $video = LiveDarshan::create([
            'video_name' => $request->video_name,
            'thumbnail_path' => $thumbnailPath,
            'video_path' => $videoPath,
            'video_url'=> $video_url,
        ]);

        return response()->json([
            'success' => true,
            'video' => $video,
            'thumbnail_url' => Storage::url($thumbnailPath),
            'video_url' => Storage::url($videoPath)
        ]);
    }

    public function destroy($id)
    {
        $video = LiveDarshan::find($id);

        if (!$video) {
            return redirect()->route('admin.live.darshan')->with('error', 'Blog not found.');
        }

        // Delete the blog image if it exists
        if ($video->cover_image) {
            Storage::delete('public/' . $video->cover_image);
        }

        // Delete the blog entry
        $video->delete();

        return redirect()->route('admin.live.darshan')->with('success', 'Video deleted successfully.');
    }
}
