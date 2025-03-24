<?php

// app/Http/Controllers/BlogController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BannerManagement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function index()
    {
        // You can fetch astrologer data from the database here and pass it to the view
        $banners = BannerManagement::all();

        return view('admin.banner.banner', compact('banners'));
    }


    public function create(){

        return view('admin.banner.add');
    }

    public function store(Request $request){

        // print_r($request->banner_image);die;

        $validator = Validator::make($request->all(), [
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'from_date' => 'required',
            'to_date' => 'required',
            'banner_type' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $thumbnailPath = $request->file('banner_image')->store('banner', 'public');
        
        // print_r($thumbnailPath);die;
            

        $video = BannerManagement::create([
            'banner_image' =>$thumbnailPath,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'banner_type' => $request->banner_type,
            'status' => 'Active',
            
        ]);

        $temp_list = BannerManagement::all();
        return redirect('admin/banner');

    }

    public function edit($id){
        $blog=   BannerManagement::find($id);
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bannerImage'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // ✅ Made optional
            'fromDate' => 'required',
            'toDate'  => 'required|string|max:255',
            'bannerType' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }
        $id = $request->bannerId;
        // ✅ Find the existing blog record
        $banner = BannerManagement::find($id);
        if (!$banner) {
            return response()->json([
                'success' => false,
                'message' => 'Blog not found.'
            ], 404);
        }
    
        // ✅ Handle File Upload (only if a new file is uploaded)
        if ($request->hasFile('bannerImage')) {
            $thumbnailPath = $request->file('bannerImage')->store('banner', 'public');
            $banner->banner_image = $thumbnailPath;
        }
    
        // ✅ Update Blog Entry
        $banner->from_date  = $request->fromDate;
        $banner->to_date = $request->toDate;
        $banner->banner_type = $request->bannerType;
        $banner->save();
    
        return redirect('admin/banner')->with('success', 'Banner updated successfully!');
    }


    public function updateStatus(Request $request) {
        $banner = BannerManagement::find($request->id);
        
        if ($banner) {
            $banner->status = $request->status;
            $banner->save();
    
            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        }
    
        return response()->json(['success' => false, 'message' => 'Banner not found'], 404);
    }
    


}
