<?php

namespace App\Http\Controllers\admin\admin_services;
use App\Http\Requests\admin_services\CreateImageServiceRequest;
use App\Http\Requests\admin_services\UpdateImageServiceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\media;
use Illuminate\Support\Facades\DB;

class ServiceImageController extends Controller
{
    use media;

    public function index() {
        $projects = DB::table('services_projects')->get();
        $images = DB::table('services_images')->get();
        return view('admin.services.services_images.index', compact('projects','images'));
    }

    public function service_images($id) {
        $images = DB::table('services_images')->where('service_project_id', $id)->get();
        $projects = DB::table('services_projects')->get();
        return view('admin.services.services_images.images', compact('projects', 'images'));
    }

    public function create() {
        $projects = DB::table('services_projects')->get();
        return view('admin.services.services_images.create', compact('projects'));
    }

    public function create_image_with_id($id) {
        $project = DB::table('services_projects')->where('id', $id)->first();
        return view('admin.services.services_images.create_image_with_id', compact('project'));
    }

    public function create_check(CreateImageServiceRequest $request) {
        $data = $request->except('_token', 'image', 'page');
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $photoName = $this->uploadPhoto($image,'services_images');
                $data['image'] = $photoName;
                DB::table('services_images')->insert($data);  
            } 
        }
        return redirect()->back()->with('success', 'تمت الاضافة بنجاح');
    }

    
    public function update($id) {
        $image = DB::table('services_images')->where('id', $id)->get()->first();
        $projects = DB::table('services_projects')->get();
        return view('admin.services.services_images.update', compact('projects', 'image'));
    }
    
    public function update_check(UpdateImageServiceRequest $request, $id) {
        $data = $request->except('_method', '_token', 'image', 'page');
        if($request->has('image')) {
            $oldPhoto = DB::table('services_images')->select('image')->where('id',$id)->first()->image;
            $photoPath = public_path('/imgs/services_images/');
            $this->deletePhoto($photoPath . $oldPhoto);
            $photoName =  $this->uploadPhoto($request->image, 'services_images');
            $data['image'] = $photoName;
        }
        DB::table('services_images')->where('id', $id)->update($data);
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    public function delete($id) {
        $oldPhoto = DB::table('services_images')->select('image')->where('id',$id)->first()->image;
        $photoPath = public_path('/imgs/services_images/');
        $this->deletePhoto($photoPath . $oldPhoto);
        DB::table('services_images')->where('id',$id)->delete(); 
        return redirect()->back()->with('success', 'تمت المسح بنجاح');
    }
}
