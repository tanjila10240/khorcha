<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\str;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Image;
use Auth;


class userController extends Controller{ 
  public function __construct(){
    $this ->middleware('auth');
    $this ->middleware('superadmin');
  }

  public function index(){
   $all=User::where('status',1)->orderBy('id','DESC')->get();
   return view('admin.user.all',compact('all'));
  }
  

  public function add(){
   return view('admin.user.add');
  }

  public function edit($slug){
   $data=User::where('status',1)->where('slug',$slug)->firstOrFail();  
    return view('admin.user.edit',compact('data'));
  }

  public function view($slug){
    $data=User::where('status',1)->where('slug',$slug)->firstOrFail();  
    return view('admin.user.view',compact('data'));
  }

 public function insert(Request $request){
      $this->validate($request,[
        'name'=>'required|max:50',  
        'email'=>'required|email|max:50|unique:users',  
        'password'=>'required|min:8',  
        'confirm_password'=>'required_with:password|same:password',  
        'username'=>'required',  
        'role'=>'required',  
        ],[
            'name.required'=>'Please enter your name.',
            'email.required'=>'Please enter your email address.',
            'password.required'=>'Please enter minimam 8 cerecter letter .',
            'confirm_password.required'=>'Please enter your confirm_password.',
            'username.required'=>'Please enter your username.',
            'role.required'=>'Please select your user role.',
        ]); 

      $slug='U'.uniqid('20');

    $insert=User::insertGetId([
      'name'=>$request['name'],
      'phone'=>$request['phone'],
      'email'=>$request['email'],
      'username'=>$request['username'],
      'password'=>Hash::make($request['password']),
      'role'=>$request['role'],
      'slug'=>$slug,
      'created_at'=>Carbon::now()->toDateTimeString(),
    ]);

    if($request->hasFile('pic')){
      $image=$request->file('pic');
      $imageName='user_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
      Image::make($image)->resize(250,250)->save('uploads/users/'.$imageName);


      User::where('id',$insert)->update([
         'photo'=>$imageName,
         'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);
    }



       if($insert){
        Session::flash('success','Successfully completed user registration.');
        return redirect('dashboard/user/add');
       }else{
        Session::flash('error','Opps! operation failed.');
        return redirect('dashboard/user/add');
       }    
 }





public function update(Request $request){
       $id=$request['id'];

       $this->validate($request,[
        'name'=>'required|max:50', 
        'email'=>'required|email|max:50|unique:users,email,'.$id.',id',  
        'role'=>'required',  
        ],[
            'name.required'=>'Please enter your name.',
            'email.required'=>'Please enter your email address.',
            'role.required'=>'Please select your user role.',
        ]); 

      $slug=$request['slug'];

    $update=User::where('status',1)->where('id',$id)->update([
      'name'=>$request['name'],
      'phone'=>$request['phone'],
      'email'=>$request['email'],
      'role'=>$request['role'],
      'updated_at'=>Carbon::now()->toDateTimeString(),
    ]);

    if($request->hasFile('pic')){
      $image=$request->file('pic');

      $imageName='user_'.$id.'_'.time().'.'.$image->getClientOriginalExtension();
      Image::make($image)->resize(250,250)->save('uploads/users/'.$imageName);


      User::where('id',$id)->update([
         'photo'=>$imageName,
         'updated_at'=>Carbon::now()->toDateTimeString(),
      ]);
    }

       if($update){
        Session::flash('success','Successfully update user information.');
        return redirect('dashboard/user/view/'.$slug);
       }else{
        Session::flash('error','Opps! operation failed.');
        return redirect('dashboard/user/edit/'.$sLug);
       }  
}

public function softdelete(){

}

public function restore(){
    
}
}

