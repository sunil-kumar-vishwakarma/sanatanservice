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
    public function editaudio()
    {
        return view('admin.arti.edit');
    }

    public function store(Request $request)
    {

        try {
            $request->validate([
                'audio_name' => 'required|string|max:255',
                'thumbnail' => 'required|image|max:2048',
                'audio_file' => 'required',
                'pdf_file' => 'required|file|max:2048',
            ]);

            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $audioPath = $request->file('audio_file')->store('audios', 'public');
            $pdfPath = $request->file('pdf_file')->store('pdfs', 'public');

            $audio = Audio::create([
                'audio_name' => $request->audio_name,
                'thumbnail_path' => $thumbnailPath,
                'audio_path' => $audioPath,
                'pdf_path' => $pdfPath,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Audio added successfully.',
                'audio' => [
                    'id' => $audio->id,
                    'audio_name' => $audio->audio_name,
                    'thumbnail_path' => Storage::url($audio->thumbnail_path),
                    'pdf_path' => $audio->pdf_path,
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add audio: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $audio = Audio::findOrFail($id);
            Storage::delete($audio->thumbnail_path);
            Storage::delete($audio->audio_path);
            $audio->delete();

            return back()->with('success', 'Audio deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete audio: ' . $e->getMessage());
        }
    }
}
