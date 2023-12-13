<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\AboutSectionController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BannerSectionController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\ServicesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//////////// ADMIN ALL ROUTES /////////////
Route::controller(AdminController::class)->group(function(){
    Route::get('/', 'Home')->name('home');
    Route::get('admin/logout', 'destroy')->name('admin.logout');
    Route::get('admin/profile', 'profile')->name('admin.profile');
    Route::get('admin/profile/edit/{id}', 'profileEdit')->name('admin.profile.edit');
    Route::post('admin/profile/store', 'profileStore')->name('admin.profile.store');
    Route::get('admin/change/password', 'changePassword')->name('admin.change.password');
    Route::post('admin/update/password', 'updatePassword')->name('admin.update.password');
});

//////////// BANNER SECTION ALL ROUTES /////////////
Route::controller(BannerSectionController::class)->group(function(){
    Route::get('banner/content', 'banerSection')->name('banner.content');
    Route::post('banner/update', 'banerUpdate')->name('banner.section.update');
});

//////////// ABOUT SECTION ALL ROUTES /////////////
Route::middleware('auth')->group(function () {
Route::controller(AboutSectionController::class)->group(function(){
    Route::get('about/section', 'AboutSection')->name('about.section.view');
    Route::post('about/section/update', 'AboutUpdate')->name('about.section.update');
    Route::get('about/page', 'AboutPage')->name('about.page');
    Route::get('add/multi/images', 'AddMultiImages')->name('add.multi.image');
    Route::post('store/multi/images', 'StoreMultiImages')->name('store.multi.images');
    Route::get('all/multi/images', 'AllMultiImages')->name('all.multi.image');
    Route::get('multi/image/edit/{id}', 'MultiImagesEdit')->name('multi.image.edit');
    Route::post('update/multi/image', 'updateMultiImage')->name('update.multi.image');
    Route::get('multi/image/delete/{id}', 'deleteMultiImage')->name('multi.image.delete');
});
});

//////////// PORTFOLIO ALL ROUTES /////////////
Route::controller(PortfolioController::class)->group(function(){
    Route::get('all/portfolios', 'allPortfolios')->name('all.portfolios');
    Route::get('add/portfolio', 'addPortfolio')->name('add.portfolio');
    Route::post('store/portfolio', 'storePortfolio')->name('store.portfolio');
    Route::get('edit/portfolio/{id}', 'editPortfolio')->name('edit.portfolio');
    Route::post('update/portfolio', 'updatePortfolio')->name('update.portfolio');
    Route::get('delete/portfolio{id}', 'deletePortfolio')->name('delete.portfolio');
    Route::get('portfolio/details/{id}', 'portfolioDetails')->name('portfolio.details');

    Route::get('portfolio/page', 'portfolioPage')->name('portfolio.page');
});

//////////// BLOG CATEGORIES ALL ROUTES /////////////
Route::middleware('auth')->group(function () {
Route::controller(BlogCategoryController::class)->group(function(){
    Route::get('all/blog/categories', 'allBlogCategories')->name('all.blog.category');
    Route::get('add/blog/category', 'addBlogCategory')->name('add.blog.category');
    Route::post('store/blog/category', 'storeBlogCategory')->name('store.blog.category');
    Route::get('edit/blog/category/{id}', 'editBlogCategory')->name('edit.blog.category');
    Route::post('update/blog/category', 'updateBlogCategory')->name('update.blog.category');
    Route::get('delete/blog/category/{id}', 'deleteBlogCategory')->name('delete.blog.category');
});
});

//////////// BLOG ALL ROUTES /////////////
Route::controller(BlogController::class)->group(function(){
    Route::get('all/blog', 'allBlogs')->name('all.blogs');
    Route::get('add/blog', 'addBlog')->name('add.blog');
    Route::post('store/blog', 'storeBlog')->name('store.blog');
    Route::get('edit/blog/{id}', 'editBlog')->name('edit.blog');
    Route::post('update/blog', 'updateBlog')->name('update.blog');
    Route::get('delete/blog/{id}', 'deleteBlog')->name('delete.blog');

    Route::get('blog/details/{id}', 'blogDetails')->name('blog.details');
    Route::get('category/details/{id}', 'categoryDetails')->name('category.details');
    Route::get('blog/posts', 'blogPosts')->name('blog.posts');

});

//////////// FOOTER ALL ROUTES /////////////
Route::controller(FooterController::class)->group(function(){
    Route::get('footer/setup', 'footerSetup')->name('footer.setup');
    Route::post('update/footer', 'updateFooter')->name('update.footer');

});

//////////// CONTACT-PAGE ALL ROUTES /////////////

Route::controller(ContactController::class)->group(function(){
    Route::get('contact/page', 'contactPage')->name('contact.page');
    Route::post('store/message', 'storeMessage')->name('store.message')->middleware('auth');
    Route::get('contact/messages', 'contactMessages')->name('contact.messages')->middleware('auth');
    Route::get('delete/message/{id}', 'deleteMessage')->name('delete.message')->middleware('auth');
});

//////////// ABOUT-PAGE ALL ROUTES /////////////
Route::controller(ServicesController::class)->group(function(){
    Route::get('services/page', 'servicesPage')->name('services.page');
});


require __DIR__.'/auth.php';
