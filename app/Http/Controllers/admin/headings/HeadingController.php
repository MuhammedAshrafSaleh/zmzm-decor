<?php

namespace App\Http\Controllers\admin\headings;
use App\Http\Requests\headings\UpdateHeadingRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\media;
use Illuminate\Support\Facades\DB;

class HeadingController extends Controller
{
    use media;
    public function index() {
        $headings = DB::table('headings')->get();
        return view('admin.headings.index', compact('headings'));
    }

    public function update($id) {
        $head = DB::table('headings')->where('id', $id)->get()->first();
        return view('admin.headings.update', compact('head'));
    }
    public function update_check(UpdateHeadingRequest $request, $id) {
        $data = $request->except('_method', '_token', 'page');
        DB::table('headings')->where('id', $id)->update($data);
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }
}
