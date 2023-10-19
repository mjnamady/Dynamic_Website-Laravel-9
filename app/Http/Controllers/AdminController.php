<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully!',
            'alert-type' => 'info'
        );

        return redirect('/login')->with($notification);
    } // End Method

    public function profile(){
        $id = Auth::user()->id;
        $adminData = User::findOrFail($id);

        return view('admin.admin_profile_view', compact('adminData'));

    } // End Method

    public function profileEdit($id){
        $editData = User::findOrFail($id);

        return view('admin.admin_profile_edit', compact('editData'));
    } // End method

    public function profileStore(Request $request){
        $id = Auth::user()->id;
        $cUser = User::findOrFail($id);

        $cUser->name = $request->name;
        $cUser->username = $request->username;
        $cUser->email = $request->email;

        if($request->hasFile('profile_image')){
            $file = $request->file('profile_image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            // @unlink($fileName, 'uploads/admin_images');
            $file->move(public_path('uploads/admin_images'), $fileName);
            $cUser['profile_image'] = $fileName;
        }
        
        $cUser->save();

        $notificaton = array(
            'message' => 'Profile Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notificaton);
    } // End method

    public function changePassword(){
        return view('admin.admin_password_change');
    } // End method

    public function updatePassword(Request $request){
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:4',
            'confirmPassword' => 'required|same:newPassword'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldPassword, $hashedPassword)){
            $id = Auth::id();
            $user = User::findOrfail($id);
            $user->password = bcrypt($request->newPassword);
            $user->save();

            session()->flash('message', 'Password Updated Successfully!');
            return redirect()->back();
        } else {
            session()->flash('message', 'Old Password Does not Match!');
            return redirect()->back();
        }
    } // End method
}
