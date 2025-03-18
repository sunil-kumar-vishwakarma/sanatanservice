<?php

namespace App\Http\Controllers;

use App\Models\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    public function index()
    {
        $pdfs = Pdf::all();
        return view('admin.arti.pdf', compact('pdfs'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'pdf_name' => 'required|string|max:255',
                'thumbnail' => 'required|image|max:2048',
                'pdf_file' => 'required|file|max:2048',
            ]);

            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $pdfPath = $request->file('pdf_file')->store('pdfs', 'public');

            $pdf = Pdf::create([
                'pdf_name' => $request->pdf_name,
                'thumbnail_path' => $thumbnailPath,
                'pdf_path' => $pdfPath,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'PDF added successfully.',
                'pdf' => [
                    'id' => $pdf->id,
                    'pdf_name' => $pdf->pdf_name,
                    'thumbnail_path' => Storage::url($pdf->thumbnail_path),
                    'pdf_path' => Storage::url($pdf->pdf_path),
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add PDF: ' . $e->getMessage()
            ], 500);
        }
    }


    public function destroy($id)
    {
        try {
            $pdf = Pdf::findOrFail($id);

            // Delete stored files from public disk
            Storage::disk('public')->delete($pdf->thumbnail_path);
            Storage::disk('public')->delete($pdf->pdf_path);

            $pdf->delete();

            return back()->with('success', 'PDF deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete PDF: ' . $e->getMessage());
        }
    }
}
