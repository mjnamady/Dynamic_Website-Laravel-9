<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactPage(){
        return view('frontend.contact_page');
    } // End method

    public function storeMessage(Request $request){
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Your Message Is Submitted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End method

    public function contactMessages(){
        $messages = Contact::latest()->get();
        return view('admin.message.all_messages', compact('messages'));
    } // End method

    public function deleteMessage($id){
        Contact::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Message Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End method
}