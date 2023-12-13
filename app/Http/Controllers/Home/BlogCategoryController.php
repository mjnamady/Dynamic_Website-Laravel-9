<?php

namespace App\Http\Controllers\Home;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Faker\Core\Blood;

class BlogCategoryController extends Controller
{
    public function allBlogCategories(){
        $all_blogCat = BlogCategory::latest()->get();
        return view('admin.blog_category.all_blog_categories', compact('all_blogCat'));
    } // End method

    public function addBlogCategory(){
        return view('admin.blog_category.add_blog_category');
    } // End method

    public function storeBlogCategory(Request $request){

    BlogCategory::insert([
        'category_name' => $request->category_name
    ]);

    $notification = array(
        'message' => 'Blog Category Inserted Successfully!',
        'alert-type' => 'success'
    );

    return redirect()->route('all.blog.category')->with($notification);
    } // End method

    public function editBlogCategory($id){
        $category = BlogCategory::findOrFail($id);
        return view('admin.blog_category.edit_category', compact('category'));
    } // End method

    public function updateBlogCategory(Request $request){
        $id = $request->id;
        BlogCategory::findOrFail($id)->update([
            'category_name' => $request->category_name
        ]);

        $notification = array(
            'message' => 'Blog Category Updated Successfully!', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification);
    } // End method

    public function deleteBlogCategory($id){

        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Category Deleted Successfully!', 
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
