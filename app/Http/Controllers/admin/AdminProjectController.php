<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\projects\CreateProjectRequest;
use App\Http\Requests\projects\UpdateProjectRequest;
use App\Http\Requests\projects\CreateImageProjectRequest;
use App\Http\Requests\projects\UpdateImageRequest;
use Illuminate\Http\Request;
use App\Http\Traits\media;
use Illuminate\Support\Facades\DB;
class AdminProjectController extends Controller
{
    use media;

    public function index() {
        $projects = DB::table('works')->get();
        $project_images = DB::table('works_images')->get();
        $categories = DB::table('categories')->get();
        return view('admin.projects.index', compact('projects', 'categories', 'project_images'));
    }

    public function create() {
        $categories = DB::table('categories')->get();
        return view('admin.projects.create', compact('categories'));
    }

    public function create_check(CreateProjectRequest $request) {
        $data = $request->except('_token', 'image', 'page');
        DB::table('works')->insert($data);
        return redirect()->back()->with('success', 'تمت الاضافة بنجاح');;
    }


    public function update($id) {
        $project = DB::table('works')->where('id', $id)->get()->first();
        $categories = DB::table('categories')->get();
        return view('admin.projects.update', compact('project', 'categories'));
    }

    public function update_check(UpdateProjectRequest $request, $id) {
        $data = $request->except('_method', '_token', 'image', 'page');
        DB::table('works')->where('id', $id)->update($data);
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }
    // Delete Project With All Its Images
    public function delete($id) {
        $all_images = DB::table('works_images')->where('work_id', $id)->get();
        foreach($all_images as $image) {
            $oldPhoto = DB::table('works_images')->select('image')->where('id', $image->id)->first()->image;
            $photoPath = public_path('/imgs/works_images/');
            $this->deletePhoto($photoPath . $oldPhoto);
            DB::table('works_images')->where('id', $image->id)->delete();
        }
        DB::table('works')->where('id',$id)->delete();
        return redirect()->back()->with('success', 'تمت المسح بنجاح');
    }


    // Get All Images Of All Projects
    public function all_images() {
        $projects = DB::table('works')->get();
        $project_images = DB::table('works_images')->get();
        $images_categories = DB::table('images_categories')->get();
        return view('admin.projects.all_images', compact('projects', 'project_images', 'images_categories'));
    }

     // Get All Images Of A Specific Project
    public function index_images($id) {
        $project = DB::table('works')->where('id', $id)->get()->first();
        $project_images = DB::table('works_images')->where('work_id', $id)->get();
        $images_categories = DB::table('images_categories')->get();
        $works = DB::table('works')->get();
        return view('admin.projects.images', compact('project', 'project_images', 'images_categories', 'works'));
    }


    // Add Image To A Specific Project
    public function create_image(Request $request) {
        $data = $request->except('_token', 'image', 'page');
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $photoName = $this->uploadPhoto($image,'works_images');
                $data['image'] = $photoName;
                DB::table('works_images')->insert($data);
            }
        }
        return response()->json([
            'status' => 200,
        ]);
    }
    public function create_specific_image_project($id) {
        $categories = DB::table('images_categories')->get();
        $project = DB::table('works')->where('id', $id)->get()->first();
        return view('admin.projects.create_specific_image_project', compact( 'project','categories'));
    }

    // Make Request To Add Image
    public function create_image_check(CreateImageProjectRequest $request) {
        // dd($request->all());
        $data = $request->except('_token', 'image', 'page');
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $photoName = $this->uploadPhoto($image,'works_images');
                $data['image'] = $photoName;
                DB::table('works_images')->insert($data);
            }
        }
        return redirect()->back()->with('success', 'تمت الاضافة بنجاح');
    }

    // handle edit an ajax request
    public function edit_image(Request $request)
    {
        $id = $request->id;
        $image = DB::table('works_images')->where('id', $id)->get()->first();
        return response()->json($image);
    }
    public function update_image(Request $request)
    {
        $id = $request->id;
        // $image = DB::table('works_images')->where('id', $id)->get()->first();
        $data = $request->except('_method', '_token', 'image', 'page');
        if($request->has('image')) {
            $oldPhoto = DB::table('works_images')->select('image')->where('id',$id)->first()->image;
            $photoPath = public_path('/imgs/works_images/');
            $this->deletePhoto($photoPath . $oldPhoto);
            $photoName =  $this->uploadPhoto($request->image, 'works_images');
            $data['image'] = $photoName;
        }
        DB::table('works_images')->where('id', $id)->update($data);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function update_image_check(UpdateImageRequest $request, $id) {
        $data = $request->except('_method', '_token', 'image', 'page');
        if($request->has('image')) {
            $oldPhoto = DB::table('works_images')->select('image')->where('id',$id)->first()->image;
            $photoPath = public_path('/imgs/works_images/');
            $this->deletePhoto($photoPath . $oldPhoto);
            $photoName =  $this->uploadPhoto($request->image, 'works_images');
            $data['image'] = $photoName;
        }
        DB::table('works_images')->where('id', $id)->update($data);
        return redirect()->back()->with('success','');
    }
    // TODO:
    public function delete_image(Request $request) {
        $id = $request->id;
        $oldPhoto = DB::table('works_images')->select('image')->where('id',$id)->first()->image;
        $photoPath = public_path('/imgs/works_images/');
        $this->deletePhoto($photoPath . $oldPhoto);
        DB::table('works_images')->where('id',$id)->delete();
        // return redirect()->back()->with('success', 'تمت المسح بنجاح');
    }
}
