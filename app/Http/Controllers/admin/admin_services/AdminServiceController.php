<?php

namespace App\Http\Controllers\admin\admin_services;
use App\Http\Requests\admin_services\CreateServiceRequest;
use App\Http\Requests\admin_services\UpdateServiceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\media;
use Illuminate\Support\Facades\DB;

class AdminServiceController extends Controller
{
    use media;

    public function index() {
        $services = DB::table('services')->get();
        return view('admin.services.home_services.index', compact('services'));
    }

    public function service_projects($id) {
        $projects = DB::table('services_projects')->where('service_id', $id)->get();
        $services = DB::table('services')->get();
        return view('admin.services.services_projects.service_projects', compact('projects', 'services'));
    }

    public function create() {
        return view('admin.services.home_services.create');
    }

    public function create_check(CreateServiceRequest $request) {
        $data = $request->except('_token', 'image', 'page');
        $photoName = $this->uploadPhoto($request->image,'services');
        $data['image'] = $photoName;
        DB::table('services')->insert($data);   
        return redirect()->back()->with('success', 'تمت الاضافة بنجاح');;
    }


    public function update($id) {
        $service = DB::table('services')->where('id', '=', $id)->first();
        return view('admin.services.home_services.update', compact('service'));
    }
    

    public function update_check(UpdateServiceRequest $request, $id) {
        $data = $request->except('_method', '_token', 'image', 'page');
        if($request->has('image')) {
            $oldPhoto = DB::table('services')->select('image')->where('id',$id)->first()->image;
            $photoPath = public_path('/imgs/services/');
            $this->deletePhoto($photoPath . $oldPhoto);
            $photoName =  $this->uploadPhoto($request->image, 'services');
            $data['image'] = $photoName;
        }   
        DB::table('services')->where('id', $id)->update($data);
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }
    public function delete($id) {
        $oldPhoto = DB::table('services')->select('image')->where('id',$id)->first()->image;
        $photoPath = public_path('/imgs/services/');
        $this->deletePhoto($photoPath . $oldPhoto);
        
        // 1. get all projects realated to this service
        // 2. get all images realated to each project 
        // 3. Loop over it and delete them
        $all_projects = DB::table("services_projects")->where('service_id', $id)->get();
        foreach($all_projects as $project) {
            $all_images = DB::table("services_images")->where('service_project_id', $project->id)->get();
            foreach($all_images as $image) {
                $oldPhoto = DB::table('services_images')->select('image')->where('id', $image->id)->first()->image;
                $photoPath = public_path('/imgs/services_images/');
                $this->deletePhoto($photoPath . $oldPhoto);
                // Delete Image
                DB::table('services_images')->where('id', $image->id)->delete(); 
            }
            // Delete Project
            DB::table('services_projects')->where('id',$project->id)->delete(); 
        }
        // Delete Service
        DB::table('services')->where('id',$id)->delete(); 
        return redirect()->back()->with('success', 'تمت المسح بنجاح');
    }
}