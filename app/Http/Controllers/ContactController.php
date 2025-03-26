<?php

// app/Http/Controllers/CustomerController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;


class ContactController extends Controller
{
    public function index()
    {
       $contact =  Contact::all();
        // You can fetch customer data from the database here and pass it to the view
        return view('admin.contact.index', compact('contact'));
    }

    public function store(Request $request){

        // print_r($request->banner_image);die;

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
           
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

       

        $contact = Contact::create([
            'name' =>$request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        $contact_list = Contact::all();
        return redirect('/contact');
    }

}
