<?php

// app/Http/Controllers/BlogController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index()
    {
       $blogs =  Blog::all();
        // You can fetch astrologer data from the database here and pass it to the view
        return view('admin.blog.list', compact('blogs'));
    }

    public function create(){

        return view('admin.blog.add');
    }

    public function store(Request $request){

        // print_r($request->all());die;

        $validator = Validator::make($request->all(), [
            'blog_title' => 'required|string|max:255',
            'blog_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            'blog_status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $thumbnailPath = $request->file('blog_image')->store('thumbnails', 'public');
        
        // print_r($request->all());die;
            

        $video = Blog::create([
            'blog_title' => $request->blog_title,
            'blog_image' => $thumbnailPath,
            'description' => $request->description,
            'status' => $request->blog_status,
            
        ]);

        $temp_list = Blog::all();
        return redirect('admin/blog');

    }

    public function edit($id){
        $blog=   Blog::find($id);
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'blog_title'  => 'required|string|max:255',
            'blog_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // ✅ Made optional
            'description' => 'required',
            'blog_status' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }
    
        // ✅ Find the existing blog record
        $blog = Blog::find($id);
        if (!$blog) {
            return response()->json([
                'success' => false,
                'message' => 'Blog not found.'
            ], 404);
        }
    
        // ✅ Handle File Upload (only if a new file is uploaded)
        if ($request->hasFile('blog_image')) {
            $thumbnailPath = $request->file('blog_image')->store('thumbnails', 'public');
            $blog->blog_image = $thumbnailPath;
        }
    
        // ✅ Update Blog Entry
        $blog->blog_title  = $request->blog_title;
        $blog->description = $request->description;
        $blog->status      = $request->blog_status;
        $blog->save();
    
        return redirect('admin/blog')->with('success', 'Blog updated successfully!');
    }

    public function view($id){

        $blog = Blog::find($id);
        return view('admin.blog.view', compact('blog'));
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return redirect()->route('admin.blog.list')->with('error', 'Blog not found.');
        }

        // Delete the blog image if it exists
        if ($blog->blog_image) {
            Storage::delete('public/' . $blog->blog_image);
        }

        // Delete the blog entry
        $blog->delete();

        return redirect()->route('admin.blog.list')->with('success', 'Blog deleted successfully.');
    }

}
