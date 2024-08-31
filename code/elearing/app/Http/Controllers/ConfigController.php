<?php

namespace App\Http\Controllers;

use App\Models\ConfigModel;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(){
        $about = ConfigModel::where('slug','about-us')->first();
        $contact = ConfigModel::where('slug','contact-us')->first();
        $data = [
            'about' => $about,
            'contact' => $contact
        ];
        return view('admin.config.index',$data);
    }

    public function update(Request $request,$slug){
        $validatedData = $request->validate([
            'content' => 'required',
        ]);
        $config = ConfigModel::where('slug',$slug)->first();
        $config->value = $request->input('content');
        $config->update();
        return back()->with('success','Update success');
    }
}
