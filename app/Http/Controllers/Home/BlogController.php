<?php

namespace App\Http\Controllers\Home;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function allBlogs(){
        $all_blogs = Blog::latest()->get();
        return view('admin.blogs.all_blogs', compact('all_blogs'));
    } // End method

    public function addBlog(){
        $categories = BlogCategory::orderBy('category_name', 'ASC')->get();
        return view('admin.blogs.add_blog', compact('categories'));
    } // End method

    public function storeBlog(Request $request){
        
    if($request->hasFile('blog_image')){
        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 232224566.png
    
        Image::make($image)->resize(430,327)->save('uploads/blog_images/' . $name_gen);
    
        $image_url = 'uploads/blog_images/'.$name_gen;
    
        Blog::insert([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_tags' => $request->blog_tags,
            'blog_description' => $request->blog_description,
            'blog_image' => $image_url,
            'created_at' => Carbon::now()
        ]);
    
        $notificaton = array(
            'message' => 'Blog Added With Image Successfully!',
            'alert-type' => 'success'
        );
    } else {
        Blog::insert([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_tags' => $request->blog_tags,
            'blog_description' => $request->blog_description,
            'created_at' => Carbon::now()
        ]);
    
        $notificaton = array(
            'message' => 'Blog Added Without Image Successfully!',
            'alert-type' => 'success'
        );
    }
   

    return redirect()->route('all.blogs')->with($notificaton);
} // End method

public function editBlog($id){
    $categories = BlogCategory::orderBy('category_name', 'ASC')->get();
    $blog = Blog::findOrFail($id);
    return view('admin.blogs.edit_blog', compact('blog','categories'));
} // End method

public function updateBlog(Request $request){
    $id = $request->blog_id;
    if($request->hasFile('blog_image')){
        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 232224566.png
    
        Image::make($image)->resize(430,327)->save('uploads/blog_images/' . $name_gen);
    
        $image_url = 'uploads/blog_images/'.$name_gen;
    
        Blog::findOrFail($id)->update([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_tags' => $request->blog_tags,
            'blog_description' => $request->blog_description,
            'blog_image' => $image_url,
            'updated_at' => Carbon::now()
        ]);
    
        $notificaton = array(
            'message' => 'Blog Updated With Image Successfully!',
            'alert-type' => 'success'
        );
    } else {
        Blog::findOrFail($id)->update([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_tags' => $request->blog_tags,
            'blog_description' => $request->blog_description,
            'updated_at' => Carbon::now()
        ]);
    
        $notificaton = array(
            'message' => 'Blog Updated Without Successfully!',
            'alert-type' => 'success'
        );
    }
    return redirect()->route('all.blogs')->with($notificaton);
} // End method

public function deleteBlog($id){

    $blog = Blog::findOrFail($id);
    $image = $blog->blog_image;
    unlink($image);
    Blog::findOrFail($id)->delete();

    $notificaton = array(
        'message' => 'Blog Deleted Successfully!',
        'alert-type' => 'success'
    );

    return redirect()->route('all.blogs')->with($notificaton);

} // End method

public function blogDetails($id){
    $blog = Blog::findOrFail($id);
    $r_blogs = Blog::latest()->limit(5)->get();
    $categories = BlogCategory::orderBy('category_name', 'ASC')->get();
    return view('frontend.blog_details', compact('blog', 'r_blogs', 'categories'));
} // End method

public function categoryDetails($id){
    $category = BlogCategory::findOrFail($id);
    $r_blogs = Blog::latest()->limit(5)->get();
    $c_blogs = Blog::where('blog_category_id', $id)->orderBy('blog_title', 'DESC')->get();
    $categories = BlogCategory::orderBy('id', 'ASC')->get();
    return view('frontend.category_details', compact('category', 'r_blogs', 'categories', 'c_blogs'));
} // End method

public function blogPosts(){
    $all_blogs = Blog::latest()->paginate(2);
    $r_blogs = Blog::latest()->limit(5)->get();
    $categories = BlogCategory::orderBy('category_name', 'ASC')->get();
    return view('frontend.blog_posts', compact('all_blogs', 'categories', 'r_blogs'));
}

}
 