<?php

namespace App\Http\Controllers\admin\guarantee;
use App\Http\Requests\guarantee\UpdateGuaranteeRequest;
use App\Http\Requests\guarantee\UpdateYoutubeGuranteeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\media;
use Illuminate\Support\Facades\DB;

class GuaranteeController extends Controller
{
    use media;

    public function index() {
        $guarantee = DB::table('guarantee')->get()->first();
        $guarantees = DB::table('guarantees')->get();
        return view('admin.guarantee.index', compact('guarantee', 'guarantees'));
    }

    public function update($id) {
        $guarantee = DB::table('guarantees')->where('id', '=', $id)->first();
        return view('admin.guarantee.update', compact('guarantee'));
    }


    public function update_check(UpdateGuaranteeRequest $request, $id) {
        $data = $request->except('_method', '_token', 'image', 'page');
        if($request->has('image')) {
            $oldPhoto = DB::table('guarantees')->select('image')->where('id',$id)->first()->image;
            $photoPath = public_path('/imgs/guarantee/');
            $this->deletePhoto($photoPath . $oldPhoto);
            $photoName =  $this->uploadPhoto($request->image, 'guarantee');
            $data['image'] = $photoName;
        }
        DB::table('guarantees')->where('id', $id)->update($data);
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    public function update_link($id) {
        $guarantee = DB::table('guarantee')->where('id', '=', $id)->first();
        return view('admin.guarantee.update_link', compact('guarantee'));
    }


    public function update_link_check(UpdateYoutubeGuranteeRequest $request, $id) {
        $data = $request->except('_method', '_token', 'image', 'page');
        if($request->has('image')) {
            $oldPhoto = DB::table('guarantee')->select('image')->where('id',$id)->first()->image;
            $photoPath = public_path('/imgs/guarantee/');
            $this->deletePhoto($photoPath . $oldPhoto);
            $photoName =  $this->uploadPhoto($request->image, 'guarantee');
            $data['image'] = $photoName;
        }
        DB::table('guarantee')->where('id', $id)->update($data);
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }
}
