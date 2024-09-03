<?php

namespace App\Http\Controllers;

use App\Models\StudentTutorial;
use Illuminate\Http\Request;

class AdminStudentFomrController extends Controller
{
    public function index(){
        $form = StudentTutorial::all();
        $data = [
            'form' => $form
        ];
        return view('admin.form.index',$data);
    }

    public function detail($id){
        $form = StudentTutorial::find($id);
        $data = [
            'data' => $form
        ];
        return view('admin.form.detail',$data);
    }
}
