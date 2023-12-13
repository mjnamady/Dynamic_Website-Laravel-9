<?php

namespace App\Http\Controllers\Home;

use App\Models\AboutSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MultiImage;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class AboutSectionController extends Controller
{
    public function AboutSection(){
        $aboutInfo = AboutSection::findOrFail(1);
        return view('admin.about_section.about_section_view', compact('aboutInfo'));
    } // End method

    public function AboutUpdate(Request $request){

        $banner_id = $request->id;

        if($request->hasFile('about_image')){
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 232224566.png

            Image::make($image)->resize(523,605)->save('uploads/about_images/' . $name_gen);

            $image_url = 'uploads/about_images/'.$name_gen;

            AboutSection::findOrFail($banner_id)->update([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_img' => $image_url
            ]);

            $notificaton = array(
                'message' => 'About Section Updated With Image Successfully!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notificaton);
        } else {

            AboutSection::findOrFail($banner_id)->update([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
            ]);

            $notificaton = array(
                'message' => 'About Section Updated Without Image Successfully!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notificaton);
        }

    } // End method

    public function AboutPage(){
        $aboutInfo = AboutSection::findOrFail(1);
        return view('frontend.about_page', compact('aboutInfo'));
    } // End method

    public function AddMultiImages(){
        return view('admin.about_section.add_multi_image');
    } // End method


    public function StoreMultiImages(Request $request){
       
        if($request->hasFile('multi_image')){
            $images = $request->file('multi_image');

            foreach($images as $image){
                $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalName();

                Image::make($image)->resize(220,220)->save('uploads/about_images/multi_images/' . $imageName);

                $imageSRC = 'uploads/about_images/multi_images/' . $imageName;

                MultiImage::insert([
                    'multi_image' => $imageSRC,
                    'created_at' => Carbon::now()
                ]);
            }  
        }

        $notificaton = array(
            'message' => 'Multiple Images Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.multi.image')->with($notificaton);
    } // End method

    public function AllMultiImages(){
        $allMulti_images = MultiImage::all();
        return view('admin.about_section.all_multi_images_view', compact('allMulti_images'));
    } // End method

    public function MultiImagesEdit($id){
        $selected_image = MultiImage::findOrFail($id);
        return view('admin.about_section.edit_multi_image', compact('selected_image'));
    } // End method

    public function updateMultiImage(Request $request){

        if($request->hasFile('image')){
            $image = $request->file('image');
                $imageNewName = hexdec(uniqid()) . '.' . $image->getClientOriginalName();
                Image::make($image)->resize(220,220)->save('uploads/about_images/multi_images/' . $imageNewName);

                $imageSRC = 'uploads/about_images/multi_images/' . $imageNewName;
                $oldImage = MultiImage::findOrFail($request->id);
                unlink($oldImage->multi_image);
                $oldImage->update([
                    'multi_image' => $imageSRC,
                    'updated_at' => Carbon::now()
                ]);  
        }

        $notificaton = array(
            'message' => 'Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.multi.image')->with($notificaton);

    } // End method

    public function deleteMultiImage($id){
        $activeImage = MultiImage::findOrFail($id);
        unlink($activeImage->multi_image);
        $activeImage->delete();

        $notificaton = array(
            'message' => 'Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.multi.image')->with($notificaton);
    } // End method
}
