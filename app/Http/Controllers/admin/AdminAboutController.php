<?php

namespace App\Http\Controllers\admin;
use App\Http\Requests\about\UpdateAboutRequest;
use App\Http\Requests\about\CreateAboutRequest;
use App\Http\Requests\about\StoreImageAboutRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\media;
use Illuminate\Support\Facades\DB;

class AdminAboutController extends Controller
{
    use media;
    
    public function index() {
        $about_image = DB::table('about')->get()->first();
        $contents = DB::table('about_list')->get();
        return view('admin.about.index', compact('about_image', 'contents'));
    }
    public function create() {
        return view('admin.about.create');
    }

    public function create_check(CreateAboutRequest $request) {
        $data = $request->except('_token', 'image', 'page');
        $photoName = $this->uploadPhoto($request->image,'about');
        $data['image'] = $photoName;
        DB::table('about_list')->insert($data);   
        return redirect()->back()->with('success', 'تمت الاضافة بنجاح');;
    }


    public function update_content($id) {
        $content = DB::table('about_list')->where('id', $id)->get()->first();
        return view('admin.about.update',  compact('content'));
    }
    public function update_check(UpdateAboutRequest $request, $id) {
        $data = $request->except('_method', '_token', 'image', 'page');
        if($request->has('image')) {
            $oldPhoto = DB::table('about_list')->select('image')->where('id',$id)->first()->image;
            $photoPath = public_path('/imgs/about/');
            $this->deletePhoto($photoPath . $oldPhoto);
            $photoName =  $this->uploadPhoto($request->image, 'about');
            $data['image'] = $photoName;
        }   
        DB::table('about_list')->where('id', $id)->update($data);
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    public function update_image($id) {
        $content = DB::table('about')->where('id', $id)->get()->first();
        return view('admin.about.update_image',  compact('content'));
    }

    public function update_image_check(StoreImageAboutRequest $request, $id) {
        $data = $request->except('_method', '_token', 'image', 'page');
        if($request->has('image')) {
            $oldPhoto = DB::table('about')->select('image')->where('id',$id)->first()->image;
            $photoPath = public_path('/imgs/about/');
            $this->deletePhoto($photoPath . $oldPhoto);
            $photoName =  $this->uploadPhoto($request->image, 'about');
            $data['image'] = $photoName;
        }   
        DB::table('about')->where('id', $id)->update($data);
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    public function delete($id) {
        $oldPhoto = DB::table('about_list')->select('image')->where('id',$id)->first()->image;
        $photoPath = public_path('/imgs/about/');
        $this->deletePhoto($photoPath . $oldPhoto);
        DB::table('about_list')->where('id',$id)->delete(); 
        return redirect()->back()->with('success', 'تمت المسح بنجاح');;
    }
    
}
