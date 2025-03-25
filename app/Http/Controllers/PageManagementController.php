<?php

// app/Http/Controllers/CustomerController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PageManagementController extends Controller
{
    public function index()
    {

        $pages=DB::table('pages')->get();
        
        return view('admin.page-management.index', compact('pages'));
    }

    public function update(Request $request){

        try {
               $affectedRows = DB::table('pages')
                    ->where('id', $request->bannerId)
                    ->update([
                        'title' => $request->title,
                        'type' => $request->type,
                        'description' => $request->description,
                    ]);
                    
              
                    return redirect('admin/page-management')->with('success', 'Page updated successfully!');
            
        } catch (Exception $e) {
            return redirect()->back()->with('error', '', $e->getMessage());
        }

    }

    public function updateStatus(Request $request) {
        // $banner = BannerManagement::find($request->id);
        
        DB::table('pages')
                    ->where('id', $request->id)
                    ->update([
                        'isActive' => $request->status,
                    ]);

       
            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        // }
    
        // return response()->json(['success' => false, 'message' => 'Banner not found'], 404);
    }

    public function getPage(Request $request)
    {
        try {
            if (Auth::guard('web')->check()) {
               $pages=DB::table('pages')->get();
                return view('pages.pages', compact('pages'));
            } else {
                return redirect(LOGINPATH);
            }

        } catch (Exception $e) {
            return redirect()->back()->with('error', '', $e->getMessage());
        }
    }


    public function addPageApi(Request $req)
    {
       
        try {
            if (Auth::guard('web')->check()) {
               
                $page = DB::table('pages')->insert([
                    'title' => $req->title,
                    'type' => $req->type,
                    'description' => $req->description,
                ]);
              
            
                return response()->json([
                    'success' => "Page Added",
                ]);
            } else {
                return redirect(LOGINPATH);
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }


    public function editPageApi(Request $request)
    {
        try {
            if (Auth::guard('web')->check()) {
                $affectedRows = DB::table('pages')
                    ->where('id', $request->filed_id)
                    ->update([
                        'title' => $request->title,
                        'type' => $request->type,
                        'description' => $request->editdescription,
                    ]);
                    
              
                    return response()->json([
                        'success' => "Page Update",
                    ]);
               
            }
            else {
                return redirect(LOGINPATH);
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', '', $e->getMessage());
        }
    }


    public function blogStatusApi(Request $request)
    {
        try {
            if (Auth::guard('web')->check()) {
                $page = DB::table('pages')->find($request->status_id);
                if ($page) {
                    $page->isActive = !$page->isActive;
                    $page->update();
                }
                return redirect()->route('pages');
            } else {
                return redirect(LOGINPATH);
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }

    }


    public function deletePage(Request $request)
    {
        try {
            if (Auth::guard('web')->check()) {
               $page = DB::table('pages')->find($request->del_id);
                if ($page) {
                    $page->delete();
                }
                return redirect()->back();
            } else {
                return redirect(LOGINPATH);
            }
        } catch (Exception $e) {
            return dd($e->getMessage());
        }
    }



    // User Side View
    public function privacyPolicy(Request $request)
	{
		
        try {

            $privacy=DB::table('pages')->where('type','privacy')->first();
            return view('privacypolicy',compact('privacy'));
        } catch (\Exception$e) {
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
	}

    public function termscondition(Request $request)
	{
		
        try {

            $terms=DB::table('pages')->where('type','terms')->first();
            return view('terms',compact('terms'));
        } catch (\Exception$e) {
            return response()->json([
                'error' => false,
                'message' => $e->getMessage(),
                'status' => 500,
            ], 500);
        }
	}
}
