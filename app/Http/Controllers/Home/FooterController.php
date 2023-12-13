<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function footerSetup(){
        $footer = Footer::find(1);
        return view('admin.footer.footer', compact('footer'));
    } // End method

    public function updateFooter(Request $request){
        
        Footer::findOrFail($request->id)->update([
            'phone' => $request->phone,
            'short_description' => $request->short_description,
            'address' => $request->address,
            'email' => $request->email,
            'social_info' => $request->social_info,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'copyright' => $request->copyright
        ]);

        $notification = array(
            'message' => 'Footer Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End method
}
