<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
  public function services($id) {
    $projects = DB::table('services_projects')->where('service_id', $id)->get();
    $service_name = DB::table('services')->select('name')->where('id', $id)->get()->toArray()[0];
    return view('website.services', compact('projects', 'service_name'));
  }
  public function services_project($id) {
    $images = DB::table('services_images')->where('service_project_id', $id)->get();
    $project_name = DB::table('services_projects')->select('name')->where('id', $id)->get()->toArray()[0];
      return view('website.services_project', compact('images','project_name'));
  }
}
