<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\current_works\UpdateCurrentWorksRequest;
use App\Http\Requests\current_works\CreateCurrentWorksRequest;
use Illuminate\Http\Request;
use App\Http\Traits\media;
use Illuminate\Support\Facades\DB;

class CurrentWorkController extends Controller
{
    use media;
    public function index() {
        $currentWorks = DB::table('current_works')->get();
        return view('admin.current_works.index', compact('currentWorks'));
    }

    public function create() {
        return view('admin.current_works.create');
    }

    public function create_check(CreateCurrentWorksRequest $request) {
        $data = $request->except('_token', 'image', 'page');
        $photoName = $this->uploadPhoto($request->image,'current_works');
        $data['image'] = $photoName;
        DB::table('current_works')->insert($data);   
        return redirect()->back()->with('success', 'تمت الاضافة بنجاح');;
    }


    public function update($id) {
        $currentWork = DB::table('current_works')->where('id', '=', $id)->first();
        return view('admin.current_works.update', compact('currentWork'));
    }

    public function update_check(UpdateCurrentWorksRequest $request, $id) {
        $data = $request->except('_method', '_token', 'image', 'page');
        if($request->has('image')) {
            $oldPhoto = DB::table('current_works')->select('image')->where('id',$id)->first()->image;
            $photoPath = public_path('/imgs/current_works/');
            $this->deletePhoto($photoPath . $oldPhoto);
            $photoName =  $this->uploadPhoto($request->image, 'current_works');
            $data['image'] = $photoName;
        }   
        DB::table('current_works')->where('id', $id)->update($data);
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }


    public function delete($id) {
        $oldPhoto = DB::table('current_works')->select('image')->where('id',$id)->first()->image;
        $photoPath = public_path('/imgs/current_works/');
        $this->deletePhoto($photoPath . $oldPhoto);
        DB::table('current_works')->where('id',$id)->delete(); 
        return redirect()->back()->with('success', 'تمت المسح بنجاح');
    }
}
