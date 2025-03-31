<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AudioController extends Controller
{
    public function index()
    {
        $audios = Audio::all();
        return view('admin.Arti.audio', compact('audios'));
    }
 

    public function store(Request $request)
    {

        try {
            $request->validate([
                'audio_name' => 'required|string|max:255',
                'thumbnail' => 'required|image|max:2048',
                'audio_file' => 'required',
                'description' => 'required',
            ]);

            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $audioPath = $request->file('audio_file')->store('audios', 'public');
            // $pdfPath = $request->file('pdf_file')->store('pdfs', 'public');

            $audio = Audio::create([
                'audio_name' => $request->audio_name,
                'thumbnail_path' => $thumbnailPath,
                'audio_path' => $audioPath,
                'description' => $request->description,
            ]);

            // return response()->json([
            //     'success' => true,
            //     'message' => 'Audio added successfully.',
            //     'audio' => [
            //         'id' => $audio->id,
            //         'audio_name' => $audio->audio_name,
            //         'thumbnail_path' => Storage::url($audio->thumbnail_path),
            //         'description' => $audio->description,
            //     ]
            // ]);

            redirect()->route('admin.arti.audio')->with(['success' => true,'message' => 'Audio added successfully.']);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add audio: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function editaudio($id)
    {
        $audio = Audio::findOrFail($id);
        // print_r($audio);die;
        return view('admin.Arti.edit', compact('audio'));
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'audio_name' => 'required|string|max:255',
        'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'audio_file' => 'nullable|mimes:mp3,wav|max:10240',
        'description' => 'required',
    ]);

    $audio = Audio::findOrFail($id);
    $audio->audio_name = $request->audio_name;
    $audio->description = $request->description;

    // Upload and update thumbnail if provided
    if ($request->hasFile('thumbnail')) {
        $thumbnailPath = $request->file('thumbnail')->store('uploads/thumbnails', 'public');
        $audio->thumbnail = $thumbnailPath;
    }

    // Upload and update audio file if provided
    if ($request->hasFile('audio_file')) {
        $audioPath = $request->file('audio_file')->store('uploads/audios', 'public');
        $audio->audio_file = $audioPath;
    }

    // Upload and update PDF file if provided
    // if ($request->hasFile('pdf_file')) {
    //     $pdfPath = $request->file('pdf_file')->store('uploads/pdfs', 'public');
    //     $audio->pdf_file = $pdfPath;
    // }

    $audio->save();

    return redirect()->route('admin.arti.audio')->with('success', 'Audio updated successfully!');
}


    public function destroy($id)
    {
        try {
            $audio = Audio::findOrFail($id);
            Storage::delete($audio->thumbnail_path);
            // Storage::delete($audio->audio_path);
            $audio->delete();

            return back()->with('success', 'Audio deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete audio: ' . $e->getMessage());
        }
    }
}
