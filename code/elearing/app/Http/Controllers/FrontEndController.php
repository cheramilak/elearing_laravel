<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        $course = course::all();
        $data = [
            'course' => $course
        ];
        return view('home.shedule',$data);
    }

    public function about(){
        $course = course::all();
        $data = [
            'course' => $course
        ];
        return view('home.about',$data);
    }

    public function contact(){
        $course = course::all();
        $data = [
            'course' => $course
        ];
        return view('home.contact',$data);
    }
}
