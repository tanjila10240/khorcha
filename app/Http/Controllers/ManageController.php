<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageController extends Controller{
   
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return redirect('dashboard');
    }


    public function basic(){
      return view('admin.manage.basic');
    }


    public function basic_update(){

    }

    public function social(){
     return view('admin.manage.social');
    }


    public function social_update(){

    }


     public function contact(){
     return view('admin.manage.contact');
    }


    public function contact_update(){

    }




}
