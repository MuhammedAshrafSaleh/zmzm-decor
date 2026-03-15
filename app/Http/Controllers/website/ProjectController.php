<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function getCategories(){
        $categories = DB::table('categories')->get();
        return view('website.categories', compact('categories'));
    }

    public function getProjects($id){
        $projects = DB::table('works')->where('category_id', $id)->get();
        $images = DB::table('works_images')->where('show_in_front', '1')->get();
        $category_name = DB::table('categories')->select('name')->where('id', $id)->get()->toArray()[0];
        // dd($projects);
        return view('website.projects', compact('projects', 'images', 'category_name'));
    }
    public function project_details($id){
        $project_details = DB::table('works')->where('id', $id)->get()->first();
        $images = DB::table('works_images')->where('work_id', $id)->get();
        $images_category = DB::table('images_categories')->get();
        // dd($images);
        return view('website.project_details', compact('project_details','images', 'images_category'));
    }
}
