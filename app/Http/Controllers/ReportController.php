<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\str;
use Carbon\Carbon;
use Session;
use Auth;

class ReportController extends Controller{
   public function__construct(){
    $this->middleware('auth');
   }


   public function index(){
    
   }

     public function user(){
    
   }


      public function income(){
    
   }

      public function income_category(){
        return view('admin.recycle.income-category');
    
   }
}
