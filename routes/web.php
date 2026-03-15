<?php
use App\Http\Controllers\website\HomeController;
use App\Http\Controllers\website\ServiceController;
use App\Http\Controllers\website\ProjectController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CurrentWorkController;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\guarantee\GuaranteeController;
use App\Http\Controllers\admin\headings\HeadingController;
use App\Http\Controllers\admin\admin_services\AdminServiceController;
use App\Http\Controllers\admin\admin_services\ServiceImageController;
use App\Http\Controllers\admin\admin_services\ServiceProjectController;
use App\Http\Controllers\admin\AdminAboutController;
use App\Http\Controllers\admin\AdminProjectController;
use App\Http\Controllers\admin\footer\FooterController;
use App\Http\Controllers\admin\LogoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class, 'home'])->name('home');


Route::group([ 'prefix' => '/'], function () {

    Route::get('all_current_works',[HomeController::class, 'getAllCurrentWorks'])->name('all_current_works');
    Route::get('services/{id}',[ServiceController::class, 'services'])->name('services');
    Route::get('services_project/{id}',[ServiceController::class, 'services_project'])->name('services_project');
    Route::get('categories',[ProjectController::class, 'getCategories'])->name('categories');
    Route::get('projects/{id}',[ProjectController::class, 'getProjects'])->name('projects');
    Route::get('project_details/{id}',[ProjectController::class, 'project_details'])->name('project_details');


    Route::group([ 'prefix' => '/admin' , 'middleware' => 'verified'], function () {

        Route::get('/',[DashboardController::class, 'index'])->name('dashboard');

        // Current Works
        Route::group(['prefix' => '/current-works', 'as'=>'current-works.'], function(){
            Route::get('/',[CurrentWorkController::class,'index'])->name('index');
            Route::get('/create',[CurrentWorkController::class,'create'])->name('create');
            Route::post('/create_check',[CurrentWorkController::class,'create_check'])->name('create_check');
            Route::get('/update/{id}',[CurrentWorkController::class,'update'])->name('update');
            Route::put('/update_check/{id}',[ CurrentWorkController::class,'update_check' ])->name('update_check');
            Route::delete('/delete/{id}',[CurrentWorkController::class,'delete'])->name('delete');
        });


        // Home Controller
        Route::group(['prefix' => '/home', 'as'=>'home.'], function(){
            Route::get('/',[AdminHomeController::class,'index'])->name('index');
            Route::get('/create',[AdminHomeController::class,'create'])->name('create');
            Route::post('/create_check',[AdminHomeController::class,'create_check'])->name('create_check');
            Route::get('/update/{id}',[AdminHomeController::class,'update'])->name('update');
            Route::put('/update_check/{id}',[ AdminHomeController::class,'update_check' ])->name('update_check');
            Route::delete('/delete/{id}',[AdminHomeController::class,'delete'])->name('delete');
        });

        // Service Controller
        Route::group(['prefix' => '/services', 'as'=>'services.'], function(){
            Route::get('/',[AdminServiceController::class,'index'])->name('index');
            Route::get('/service_projects/{id}',[AdminServiceController::class,'service_projects'])->name('service_projects');
            Route::get('/create',[AdminServiceController::class,'create'])->name('create');
            Route::post('/create_check',[AdminServiceController::class,'create_check'])->name('create_check');
            Route::get('/update/{id}',[AdminServiceController::class,'update'])->name('update');
            Route::put('/update_check/{id}',[ AdminServiceController::class,'update_check' ])->name('update_check');
            Route::delete('/delete/{id}',[AdminServiceController::class,'delete'])->name('delete');
        });

        // Service Project Controller
        Route::group(['prefix' => '/services-projects', 'as'=>'services_projects.'], function(){
            Route::get('/',[ServiceProjectController::class,'index'])->name('index');
            Route::get('/create',[ServiceProjectController::class,'create'])->name('create');
            Route::post('/create_check',[ServiceProjectController::class,'create_check'])->name('create_check');
            Route::get('/update/{id}',[ServiceProjectController::class,'update'])->name('update');
            Route::put('/update_check/{id}',[ ServiceProjectController::class,'update_check' ])->name('update_check');
            Route::delete('/delete/{id}',[ServiceProjectController::class,'delete'])->name('delete');
        });

        // Service Images Controller
        Route::group(['prefix' => '/services-images', 'as'=>'services_images.'], function(){
            Route::get('/',[ServiceImageController::class,'index'])->name('index');
            Route::get('service_images/{id}',[ServiceImageController::class,'service_images'])->name('service_images');
            Route::get('/create',[ServiceImageController::class,'create'])->name('create');
            Route::get('/create_image_with_id/{id}',[ServiceImageController::class,'create_image_with_id'])->name('create_image_with_id');
            Route::post('/create_check',[ServiceImageController::class,'create_check'])->name('create_check');
            Route::get('/update/{id}',[ServiceImageController::class,'update'])->name('update');
            Route::put('/update_check/{id}',[ ServiceImageController::class,'update_check' ])->name('update_check');
            Route::delete('/delete/{id}',[ServiceImageController::class,'delete'])->name('delete');
        });

        // Project Module
        Route::group(['prefix' => '/projects', 'as'=>'projects.'], function(){

            Route::get('/',[AdminProjectController::class,'index'])->name('index');
            Route::get('/create',[AdminProjectController::class,'create'])->name('create');
            Route::post('/create_check',[AdminProjectController::class,'create_check'])->name('create_check');
            Route::get('/update/{id}',[AdminProjectController::class,'update'])->name('update');
            Route::put('/update_check/{id}',[ AdminProjectController::class,'update_check' ])->name('update_check');
            Route::delete('/delete/{id}',[AdminProjectController::class,'delete'])->name('delete');

            // All Things Specific To Images
            Route::get('/all_images',[AdminProjectController::class,'all_images'])->name('all_images');
            Route::get('/images/{id}',[AdminProjectController::class,'index_images'])->name('images');
            // Route::get('/create_image',[AdminProjectController::class,'create_image'])->name('create_image');
            Route::get('/create_specific_image_project/{id}',[AdminProjectController::class,'create_specific_image_project'])->name('create_specific_image_project');
            Route::post('/create_image_check',[AdminProjectController::class,'create_image_check'])->name('create_image_check');
            Route::get('/update_image/{id}',[AdminProjectController::class,'update_image'])->name('update_image');
            Route::get('/edit_image',[AdminProjectController::class,'edit_image'])->name('edit_image');
            Route::post('/update_image',[AdminProjectController::class,'update_image'])->name('update_image');
            Route::post('/create_image',[AdminProjectController::class,'create_image'])->name('create_image');
            Route::put('/update_image_check/{id}',[AdminProjectController::class,'update_image_check'])->name('update_image_check');
            Route::delete('/delete_image',[AdminProjectController::class,'delete_image'])->name('delete_image');
        });

        // About Controller
        Route::group(['prefix' => '/about', 'as'=>'about.'], function(){
            Route::get('/',[AdminAboutcontroller::class,'index'])->name('index');
            Route::get('/create',[AdminAboutcontroller::class,'create'])->name('create');
            Route::post('/create_check',[AdminAboutcontroller::class,'create_check'])->name('create_check');

            Route::get('/update_content/{id}',[AdminAboutcontroller::class,'update_content'])->name('update_content');
            Route::put('/update_check/{id}',[ AdminAboutcontroller::class,'update_check' ])->name('update_check');

            Route::get('/update_image/{id}',[AdminAboutcontroller::class,'update_image'])->name('update_image');
            Route::put('/update_image_check/{id}',[AdminAboutcontroller::class,'update_image_check'])->name('update_image_check');

            Route::delete('/delete/{id}',[AdminAboutcontroller::class,'delete'])->name('delete');
        });

        // About Footer Controller
        Route::group(['prefix' => '/footer', 'as'=>'footer.'], function(){
            Route::get('/',[FooterController::class,'index'])->name('index');

            Route::get('/create_contacts',[FooterController::class,'create_contacts'])->name('create_contacts');
            Route::get('/create_navbar',[FooterController::class,'create_navbar'])->name('create_navbar');
            Route::get('/create_social',[FooterController::class,'create_social'])->name('create_social');
            Route::post('/create_contacts_check',[FooterController::class,'create_contacts_check'])->name('create_contacts_check');
            Route::post('/create_navbar_check',[FooterController::class,'create_navbar_check'])->name('create_navbar_check');
            Route::post('/create_social_check',[FooterController::class,'create_social_check'])->name('create_social_check');

            Route::get('/update_contacts/{id}',[FooterController::class,'update_contacts'])->name('update_contacts');
            Route::get('/update_navbar/{id}',[FooterController::class,'update_navbar'])->name('update_navbar');
            Route::get('/update_social/{id}',[FooterController::class,'update_social'])->name('update_social');
            Route::put('/update_contacts_check/{id}',[FooterController::class,'update_contacts_check'])->name('update_contacts_check');
            Route::put('/update_navbar_check/{id}',[FooterController::class,'update_navbar_check'])->name('update_navbar_check');
            Route::put('/update_social_check/{id}',[FooterController::class,'update_social_check'])->name('update_social_check');

            Route::delete('/delete_contact/{id}',[FooterController::class,'delete_contact'])->name('delete_contact');
            Route::delete('/delete_nav/{id}',[FooterController::class,'delete_nav'])->name('delete_nav');
            Route::delete('/delete_social/{id}',[FooterController::class,'delete_social'])->name('delete_social');
        });

        // About Logo Controller
        Route::group(['prefix' => '/logo', 'as'=>'logo.'], function(){
            Route::get('/update',[LogoController::class,'update'])->name('update');
            Route::PUT('/update_check/{id}',[LogoController::class,'update_check'])->name('update_check');
        });

        // Headings Controller
        Route::group(['prefix' => '/headings', 'as'=>'headings.'], function(){
            Route::get('/',[HeadingController::class,'index'])->name('index');
            Route::get('/create',[HeadingController::class,'create'])->name('create');
            Route::post('/create_check',[HeadingController::class,'create_check'])->name('create_check');
            Route::get('/update/{id}',[HeadingController::class,'update'])->name('update');
            Route::put('/update_check/{id}',[ HeadingController::class,'update_check' ])->name('update_check');
            Route::delete('/delete/{id}',[HeadingController::class,'delete'])->name('delete');
        });

        // Guarantee Controller
        Route::group(['prefix' => '/guarantee', 'as'=>'guarantee.'], function(){
            Route::get('/',[GuaranteeController::class,'index'])->name('index');

            Route::get('/create',[GuaranteeController::class,'create'])->name('create');
            Route::post('/create_check',[GuaranteeController::class,'create_check'])->name('create_check');

            Route::get('/update/{id}',[GuaranteeController::class,'update'])->name('update');
            Route::put('/update_check/{id}',[ GuaranteeController::class,'update_check' ])->name('update_check');

            Route::get('/update_link/{id}',[GuaranteeController::class,'update_link'])->name('update_link');
            Route::put('/update_link_check/{id}',[ GuaranteeController::class,'update_link_check' ])->name('update_link_check');

            Route::delete('/delete/{id}',[GuaranteeController::class,'delete'])->name('delete');
        });
    });
});



Auth::routes(['verify' => true]);
