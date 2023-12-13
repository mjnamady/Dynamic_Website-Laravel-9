<?php

namespace App\Http\Controllers\Home;

use Carbon\Carbon;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    public function allPortfolios(){
        $all_portfolios = Portfolio::latest()->get();
        return view('admin.portfolio_section.all_portfolio_view', compact('all_portfolios'));
    } // End method

    public function addPortfolio(){
        return view('admin.portfolio_section.add_portfolio');
    } // End method

    public function storePortfolio(Request $request){
            $request->validate([
                'p_name' => 'required',
                'p_title' => 'required'
            ],
        [
            'p_name.required' => 'Please fill in the portfolio name field!',
            'p_title.required' => 'Please fill in the portfolio title field!',
        ]);

        $image = $request->file('p_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 232224566.png

        Image::make($image)->resize(1020,519)->save('uploads/portfolio_images/' . $name_gen);

        $image_url = 'uploads/portfolio_images/'.$name_gen;

        Portfolio::insert([
            'p_name' => $request->p_name,
            'p_title' => $request->p_title,
            'p_description' => $request->p_description,
            'p_image' => $image_url,
            'created_at' => Carbon::now()
        ]);

        $notificaton = array(
            'message' => 'Portfolio Added Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.portfolios')->with($notificaton);
    } // End method

    public function editPortfolio($id){
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio_section.edit_portfolio', compact('portfolio'));
    } // End method

    public function updatePortfolio(Request $request){

        $p_id = $request->id;

        if($request->hasFile('p_image')){
        $image = $request->file('p_image');

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 232224566.png

        Image::make($image)->resize(1020,519)->save('uploads/portfolio_images/' . $name_gen);

        $image_url = 'uploads/portfolio_images/'.$name_gen;

        unlink(Portfolio::findOrFail($p_id)->p_image);

        Portfolio::findOrFail($p_id)->update([
            'p_name' => $request->p_name,
            'p_title' => $request->p_title,
            'p_description' => $request->p_description,
            'p_image' => $image_url,
            'updated_at' => Carbon::now()
        ]);

        $notificaton = array(
            'message' => 'Portfolio Updated With Image Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.portfolios')->with($notificaton);
    } else {

        Portfolio::findOrFail($p_id)->update([
            'p_name' => $request->p_name,
            'p_title' => $request->p_title,
            'p_description' => $request->p_description,
            'updated_at' => Carbon::now()
        ]);

        $notificaton = array(
            'message' => 'Portfolio Updated Without Image Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.portfolios')->with($notificaton);
    }

    } // End method

    public function deletePortfolio($id){
        $activePortfolio = Portfolio::findOrFail($id);

        @unlink(public_path('uploads/portfolio_images/'.$activePortfolio->p_image));

        $activePortfolio->delete();

        $notificaton = array(
            'message' => 'Portfolio Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.portfolios')->with($notificaton);
    } // End method

    public function portfolioDetails($id){
        $portfolio = Portfolio::findOrFail($id);
        return view('frontend.portfolio_detail', compact('portfolio'));
    } // End method

    public function portfolioPage(){
        $portfolioAll = Portfolio::latest()->get();
        return view('frontend.portfolio_all', compact('portfolioAll'));
    } // End method

}
