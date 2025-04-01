<?php

namespace App\Http\Controllers;

use App\Models\WisdomVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WisdomController extends Controller
{
    public function wisdom()
    {

        $videos = WisdomVideo::all();

        return view('admin.Wisdom.wisdom', compact('videos'));
    }
    public function edit($id)
    {
        $video = WisdomVideo::find($id);

        return view('admin.Wisdom.edit', compact('video'));
    }

    public function store(Request $request)
    {
        // print_r($request->all());die;
        

        $validator = Validator::make($request->all(), [
           'video_name' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif',
            // 'language' => 'required|string',
            // 'video_type' => 'required|string',
            // 'video_file' => 'nullable|mimes:mp4,mov,avi,flv,wmv|max:10240',
            // 'video_url' => 'nullable|url'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');

        $videoPath = null;
        // if ($request->video_type == 'file' && $request->hasFile('video_file')) {
        //     $videoPath = $request->file('video_file')->store('videos', 'public');
        // }
        if ($request->video_option == 'file' && $request->hasFile('video_file')) {
            // Store Video File
            $filePath = $request->file('video_file')->store('videos', 'public');
            $videoPath = $filePath;
        } elseif ($request->video_option == 'url') {
            // Store Video URL
            $video_url = $request->video_url;
        }

        
        WisdomVideo::create([
            'video_name' => $request->video_name,
            'thumbnail_path' => $thumbnailPath,
            'language' => $request->language,
            'video_option' => $request->video_option,
            'video_path' => $videoPath,
            'video_url' => $video_url,
        ]);

        return redirect()->route('admin.Wisdom.wisdom')->with('success', 'Video added successfully.');
    }

    public function show(WisdomVideo $video)
    {
        return view('videos.show', compact('video'));
    }

    // public function edit(Video $video)
    // {
    //     return view('videos.edit', compact('video'));
    // }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'video_name' => 'required|string|max:255',
        //     'language' => 'required|string',
        //     'video_type' => 'required|string',
        //     'video_file' => 'nullable|mimes:mp4,mov,avi,flv,wmv|max:10240',
        //     'video_url' => 'nullable|url'
        // ]);

        $video = WisdomVideo::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'video_name' => 'required|string|max:255',
            //  'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif',
             // 'language' => 'required|string',
             // 'video_type' => 'required|string',
             // 'video_file' => 'nullable|mimes:mp4,mov,avi,flv,wmv|max:10240',
             // 'video_url' => 'nullable|url'
         ]);
 
         if ($validator->fails()) {
             return response()->json([
                 'success' => false,
                 'errors' => $validator->errors()
             ], 422);
         }


         if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail
            if ($video->thumbnail_path) {
                Storage::disk('public')->delete($video->thumbnail_path);
            }
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $video->thumbnail_path = $thumbnailPath;
        }

        $videoPath = null;
        $video_url = null;

        if ($request->video_option == 'file' && $request->hasFile('video_file')) {
            // Store Video File
            $filePath = $request->file('video_file')->store('videos', 'public');
            $videoPath = $filePath;
        } elseif ($request->video_option == 'url') {
            // Store Video URL
            $video_url = $request->video_url;
        }

        $video->video_name = $request->video_name;
        $video->language = $request->language;
        $video->video_option = $request->video_option;
        $video->video_path = $videoPath;
        $video->video_url = $video_url;
        $video->save();

        return redirect()->route('admin.Wisdom.wisdom')->with('success', 'Video updated successfully.');
    }

    public function destroy($id)
    {
        $video = WisdomVideo::findOrFail($id);

        if (!$video) {
            return redirect()->route('admin.live.darshan')->with('error', 'Blog not found.');
        }

        // Delete the blog image if it exists
        if ($video->cover_image) {
            Storage::delete('public/' . $video->cover_image);
        }

        // Delete the blog entry
        $video->delete();

        return redirect()->route('admin.Wisdom.wisdom')->with('success', 'Video deleted successfully.');
    }

}