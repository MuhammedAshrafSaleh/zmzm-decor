<?php

namespace App\Http\Controllers\admin\footer;

use App\Http\Requests\footer\UpdateFooterNavRequest;
use App\Http\Requests\footer\UpdateFooterContactRequest; 
use App\Http\Requests\footer\UpdateFooterSocialRequest; 
use App\Http\Requests\footer\CreateSocialRequest; 
use App\Http\Requests\footer\CreateContactRequest; 
use App\Http\Requests\footer\CreateNavRequest; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\media;
use Illuminate\Support\Facades\DB;
class FooterController extends Controller
{
    use media;
    public function index() {
        $navlist = DB::table('navlist')->get();
        $footerContacts = DB::table('footer_contacts')->get();
        $footerSocial = DB::table('footer_social')->get();
        $logo = DB::table('logo_button')->get()->first();
        return view('admin.footer.index', compact('navlist', 'footerContacts', 'footerSocial', 'logo'));
    }

    public function update_contacts($id) {
        $footerContact = DB::table('footer_contacts')->where('id', $id)->get()->first();
        return view('admin.footer.update_contacts', compact('footerContact'));
    }

    public function update_contacts_check(UpdateFooterContactRequest $request,  $id){
        $data = $request->except('_method', '_token', 'image', 'page');
        DB::table('footer_contacts')->where('id', $id)->update($data);
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }


    public function update_social($id) {
        $footerContact = DB::table('footer_social')->where('id', $id)->get()->first();
        return view('admin.footer.update_social', compact('footerContact'));
    }

    public function update_social_check(UpdateFooterSocialRequest $request,  $id){
        $data = $request->except('_method', '_token', 'image', 'page');
        DB::table('footer_social')->where('id', $id)->update($data);
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }


    public function update_navbar($id) {
        $footerContact = DB::table('navlist')->where('id', $id)->get()->first();
        return view('admin.footer.update_navbar', compact('footerContact'));
    }

    public function update_navbar_check(UpdateFooterNavRequest $request,  $id){
        $data = $request->except('_method', '_token', 'image', 'page');
        DB::table('navlist')->where('id', $id)->update($data);
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }


    public function create_social() {
        return view('admin.footer.create_social');
    }
    // Request
    // Media Trait
    // Folder Name
    // Table Name
    public function create_social_check(CreateSocialRequest $request) {
        $data = $request->except('_token', 'image', 'page');
        $photoName = $this->uploadPhoto($request->image,'footer');
        $data['image'] = $photoName;
        DB::table('footer_social')->insert($data);   
        return redirect()->back()->with('success', 'تمت الاضافة بنجاح');;
    }


    public function create_navbar() {
        return view('admin.footer.create_navbar');
    }
    // Request
    // Media Trait
    // Folder Name
    // Table Name
    public function create_navbar_check(CreateNavRequest $request) {
        $data = $request->except('_token', 'page');
        DB::table('navlist')->insert($data);   
        return redirect()->back()->with('success', 'تمت الاضافة بنجاح');;
    }


    public function create_contacts() {
        return view('admin.footer.create_contacts');
    }

    public function create_contacts_check(CreateContactRequest $request) {
        $data = $request->except('_token', 'image', 'page');
        $photoName = $this->uploadPhoto($request->image,'footer');
        $data['image'] = $photoName;
        DB::table('footer_contacts')->insert($data);
        return redirect()->back()->with('success', 'تمت الاضافة بنجاح');;
    }

    public function delete_contact($id) {
        $oldPhoto = DB::table('footer_contacts')->select('image')->where('id',$id)->first()->image;
        $photoPath = public_path('/imgs/footer/');
        $this->deletePhoto($photoPath . $oldPhoto);
        DB::table('footer_contacts')->where('id',$id)->delete(); 
        return redirect()->back()->with('success', 'تمت المسح بنجاح');;
    }
    public function delete_social($id) {
        $oldPhoto = DB::table('footer_social')->select('image')->where('id',$id)->first()->image;
        $photoPath = public_path('/imgs/footer/');
        $this->deletePhoto($photoPath . $oldPhoto);
        DB::table('footer_social')->where('id',$id)->delete(); 
        return redirect()->back()->with('success', 'تمت المسح بنجاح');;
    }
    public function delete_nav($id) {
        DB::table('navlist')->where('id',$id)->delete(); 
        return redirect()->back()->with('success', 'تمت المسح بنجاح');;
    }
}
