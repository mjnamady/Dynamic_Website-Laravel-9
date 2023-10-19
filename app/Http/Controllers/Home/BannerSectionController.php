<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\BannerSections;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BannerSectionController extends Controller
{
    public function banerSection(){
        $bannerInfo = BannerSections::findOrfail(1);
        return view('admin.banner_section.banner_section_edit', compact('bannerInfo'));
    } // End method


    public function banerUpdate(Request $request){

        $banner_id = $request->id;

        if($request->hasFile('banner_image')){
            $image = $request->file('banner_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 232224566.png

            Image::make($image)->resize(636,852)->save('uploads/banner_images/' . $name_gen);

            $image_url = 'uploads/banner_images/'.$name_gen;

            BannerSections::findOrFail($banner_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'video_url' => $request->video_url,
                'banner_image' => $image_url
            ]);

            $notificaton = array(
                'message' => 'Banner Section Updated With Image Successfully!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notificaton);
        } else {

            BannerSections::findOrFail($banner_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'video_url' => $request->video_url
            ]);

            $notificaton = array(
                'message' => 'Banner Section Updated Without Image Successfully!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notificaton);
        }

    } // End method
}
