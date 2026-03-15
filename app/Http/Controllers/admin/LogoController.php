<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\media;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\logo\UpdateLogoRequest; 


class LogoController extends Controller
{
  use media;
  public function update(){
    $logo = DB::table('logo_button')->get()->first();
    return view('admin.logo.update', compact('logo'));
  }

  public function update_check(UpdateLogoRequest $request,  $id){
    $data = $request->except('_method', '_token', 'image', 'page');
    DB::table('logo_button')->where('id', $id)->update($data);
    return redirect()->back()->with('success', 'تم التعديل بنجاح');
  }
}
