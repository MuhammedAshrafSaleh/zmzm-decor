<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
   public function home() {
    $home = DB::table('home')->get();
    $about_image = DB::table('about')->get()->toArray()[0];
    $about_list = DB::table('about_list')->get();
    $services = DB::table('services')->get();
    $currentWorks = DB::table('current_works')->where('status', 1)->orderBy('updated_at')->limit('3')->get();
    $projects = DB::table('works')->where('status', '1')->orderBy('work_order')->limit('4')->get();
    $project_images = DB::table('works_images')->where('show_in_front', '1')->get();
    $guarantees = DB::table('guarantees')->get();
    $guarantee = DB::table('guarantee')->get()->first();
    // Heading For Website
    $aboutHeading = DB::table('headings')->where('category_name', 'about')->get()->toArray()[0];
    $guaranteeHeading = DB::table('headings')->where('category_name', 'guarantee')->get()->toArray()[0];
    $servicesHeading = DB::table('headings')->where('category_name', 'home_services')->get()->toArray()[0];
    $worksHeading = DB::table('headings')->where('category_name', 'home_works')->get()->toArray()[0];
    $currentHeading = DB::table('headings')->where('category_name', 'current_works')->get()->toArray()[0];   

    return view('website.index',
    compact(
        'about_image',
        'about_list', 
        'services', 
        'projects', 
        'project_images', 
        'home', 
        'guarantees',
        'guarantee',
        'aboutHeading',
        'servicesHeading',
        'worksHeading',
        'currentHeading',
        'currentWorks',
        'guaranteeHeading',
    ),);
   }

   public function getAllCurrentWorks() {
        $currentWorks = DB::table('current_works')->orderByDesc('created_at')->get();
        $currentHeading = DB::table('headings')->where('category_name', 'current_works')->get()->first();   
        $navlist = DB::table('navlist')->orderBy('nav_order', 'desc')->get();
        $footerContacts = DB::table('footer_contacts')->get();
        $footerSocial = DB::table('footer_social')->get();
        $logo = DB::table('logo_button')->get()->first();
        return view('website.all_current_works', compact('currentWorks', 'currentHeading','navlist','logo', 'footerContacts','footerSocial',));
   }
}
