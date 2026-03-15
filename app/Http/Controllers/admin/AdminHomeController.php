<?php

namespace App\Http\Controllers\admin;
use App\Http\Requests\home\UpdateHomeRequest;
use App\Http\Requests\home\CreateHomeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\media;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    use media;
    public function index() {
        $slides = DB::table('home')->get();
        return view('admin.home.index', compact('slides'));
    }

    public function create() {
        return view('admin.home.create');
    }
    public function create_check(CreateHomeRequest $request) {
        $data = $request->except('_token', 'image', 'page');
        $photoName = $this->uploadPhoto($request->image,'home');
        $data['image'] = $photoName;
        DB::table('home')->insert($data);
        return redirect()->back()->with('success', 'تمت الاضافة بنجاح');;
    }


    public function update($id) {
        $slide = DB::table('home')->where('id', '=', $id)->first();
        return view('admin.home.update', compact('slide'));
    }


    public function update_check(UpdateHomeRequest $request, $id) {
        $data = $request->except('_method', '_token', 'image', 'page');
        if($request->has('image')) {
            $oldPhoto = DB::table('home')->select('image')->where('id',$id)->first()->image;
            $photoPath = public_path('/imgs/home/');
            $this->deletePhoto($photoPath . $oldPhoto);
            $photoName =  $this->uploadPhoto($request->image, 'home');
            $data['image'] = $photoName;
        }
        DB::table('home')->where('id', $id)->update($data);
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }
    public function delete($id) {
        $oldPhoto = DB::table('home')->select('image')->where('id',$id)->first()->image;
        $photoPath = public_path('/imgs/home/');
        $this->deletePhoto($photoPath . $oldPhoto);
        DB::table('home')->where('id',$id)->delete();
        return redirect()->back()->with('success', 'تمت المسح بنجاح');;
    }
}


