<?php

namespace App\Http\Controllers\admin\admin_services;
use App\Http\Requests\admin_services\CreateServiceProjectRequest;
use App\Http\Requests\admin_services\UpdateServiceProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\media;
use Illuminate\Support\Facades\DB;

class ServiceProjectController extends Controller
{
    use media;

    public function index() {
        $projects = DB::table('services_projects')->get();
        $services = DB::table('services')->get();
        return view('admin.services.services_projects.index', compact('projects', 'services'));
    }
    public function create() {
        $services = DB::table('services')->get();
        return view('admin.services.services_projects.create', compact('services'));
    }
    public function create_check(CreateServiceProjectRequest $request) {
        $data = $request->except('_token', 'image', 'page');
        $photoName = $this->uploadPhoto($request->image,'services_projects');
        $data['image'] = $photoName;
        DB::table('services_projects')->insert($data);   
        return redirect()->back()->with('success', 'تمت الاضافة بنجاح');;
    }

    public function update($id) {
        $project = DB::table('services_projects')->where('id', '=', $id)->first();
        $services = DB::table('services')->get();
        return view('admin.services.services_projects.update', compact('project', 'services'));
    }
    
    public function update_check(UpdateServiceProjectRequest $request, $id) {
        $data = $request->except('_method', '_token', 'image', 'page');
        if($request->has('image')) {
            $oldPhoto = DB::table('services_projects')->select('image')->where('id',$id)->first()->image;
            $photoPath = public_path('/imgs/services_projects/');
            $this->deletePhoto($photoPath . $oldPhoto);
            $photoName =  $this->uploadPhoto($request->image, 'services_projects');
            $data['image'] = $photoName;
        }
        DB::table('services_projects')->where('id', $id)->update($data);
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    public function delete($id) {
        $oldPhoto = DB::table('services_projects')->select('image')->where('id',$id)->first()->image;
        $photoPath = public_path('/imgs/services_projects/');
        $this->deletePhoto($photoPath . $oldPhoto);

        $all_images = DB::table("services_images")->where('service_project_id', $id)->get();
        foreach($all_images as $image) {
            $oldPhoto = DB::table('services_images')->select('image')->where('id', $image->id)->first()->image;
            $photoPath = public_path('/imgs/services_images/');
            $this->deletePhoto($photoPath . $oldPhoto);
            // Delete Image
            DB::table('services_images')->where('id', $image->id)->delete(); 
        }
        // Delete Project
        DB::table('services_projects')->where('id',$id)->delete(); 
        return redirect()->back()->with('success', 'تمت المسح بنجاح');
    }
}
