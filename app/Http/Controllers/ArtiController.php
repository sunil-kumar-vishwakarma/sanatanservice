<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArtiController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('admin.live.arti', compact('videos'));
    }
    public function editarti($id)
    {
        $video = Video::findOrFail($id);

        return view('admin.live.editarti', compact('video'));
    }

    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'video_name' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'video_file' => 'required|mimes:mp3,mp4,avi,mov|max:102400',
            'video_option' => 'required',
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

        $video = Video::create([
            'video_name' => $request->video_name,
            'thumbnail_path' => $thumbnailPath,
            'video_option' => $request->video_option,
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

   
    public function update(Request $request, $id)
{
//    print_r($request->all());die;
  

    $validator = Validator::make($request->all(), [
        'video_name' => 'required|string|max:255',
        // 'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // 'video_file' => 'required|mimes:mp3,mp4,avi,mov|max:102400',
        'video_option' => 'required',
        'video_file' => 'nullable|mimes:mp4,mov,avi|max:20480', // Max 20MB
        'video_url' => 'nullable|url'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);
    }

    // $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
    // $videoPath = $request->file('video_file')->store('videos', 'public');

    // print_r($request->video_option);die;
        


    $video = Video::findOrFail($id);
    $video->video_name = $request->video_name;
    $video->video_option = $request->video_option;

    // Handle Thumbnail Upload
    if ($request->hasFile('thumbnail')) {
        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        $video->thumbnail_path = $thumbnailPath;
    }

    // Handle Video File Upload
    if ($request->video_option === 'file' && $request->hasFile('video_file')) {
        $videoPath = $request->file('video_file')->store('videos', 'public');
        $video->video_path = $videoPath;
        $video->video_url = null; // Clear any existing URL
    }

    // Handle Video URL
    if ($request->video_option === 'url') {
        $video->video_url = $request->video_url;
        $video->video_path = null; // Clear any existing file path
    }

    $video->save();

    return redirect()->route('admin.live.arti')->with('success', 'Video updated successfully.');
    }


    public function destroy($id)
    {
        try {
            $video = Video::findOrFail($id);

            // Delete stored files from public disk
            Storage::disk('public')->delete($video->thumbnail_path);
            Storage::disk('public')->delete($video->video_path);

            $video->delete();

            return back()->with('success', 'video deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete video: ' . $e->getMessage());
        }
    }
}
