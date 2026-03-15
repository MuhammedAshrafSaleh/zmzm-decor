<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParentController extends Controller
{

    public function parent() {
        $navList = DB::table('navlist')->get();
        $navHeader = DB::table('navbar')->get()->toArray()[0];
        return view('website.layouts.parent');
    }

}
