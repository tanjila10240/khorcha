@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <form method="POST" action="{{url('dashboard/manage/basic/update')}}" enctype="multipart/form-data">
          @csrf
            <div class="card mb-3">
              <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>Basic Information
                    </div>  
                    <div class="col-md-4 card_button_part">
                        <a href="{{url('dashboard/manage/contact')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>Contact Information</a>
                    </div>  
                </div>
              </div>
              <div class="card-body">
                <!-- success sms code start -->
                       <div class="row">
                       <div class="col-md-3"></div>
                       <div class="col-md-4">
                      @if(Session::has('success'))
                    <div class="alert alert-success text-center alert_success" role="alert">
                      <strong>Success!</strong>{{Session::get('success')}}
                     </div>
                     @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger alert_error" role="alert">
                      <strong>Opps!</strong>{{Session::get('error')}}
                     </div>
                       @endif
                       </div>
                       <div class="col-md-2"></div>
                     </div> 
                <!-- success sms code end -->
                  <div class="row mb-3 {{ $errors->has('company') ? 'has-error' : ''}}">
                    <label class="col-sm-3 col-form-label col_form_label">Company<span class="req_star">*</span>:</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control form_control" id="" name="company" value="{{$data->basic_company}}">
                      @if($errors->has('company'))
                        <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('company')}}</strong>
                      </span>
                     @endif
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Company title:</label>
                    <div class="col-sm-4">
                      <input type="title" class="form-control form_control" id="" name="title" value="{{$data->basic_company}}">
                        <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('title')}}</strong>
                      </span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">logo:</label>
                    <div class="col-sm-4">
                      <input type="file" class="form-control form_control" id="" name="logo">
                    </div>
                    <div class="col-md-2">
                      @if($data->basic_logo!='')
                      <img height="100" src="{{asset('uploads/basic/'.$data->basic_logo)}}" alt="Logo"/>
                      @else
                       <img height="100" src="{{asset('contents/admin')}}/images/avatar.png" alt="avatar"/>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Favicon:</label>
                      <div class="col-sm-4">
                      <input type="file" class="form-control form_control" id="" name="favicon">
                    </div>
                    <div class="col-md-2">
                      @if($data->basic_favicon!='')
                      <img height="100" src="{{asset('uploads/basic/'.$data->basic_favicon)}}" alt="Favicon"/>
                      @else
                       <img height="100" src="{{asset('contents/admin')}}/images/avatar.png" alt="avatar"/>
                      @endif
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Footer Logo:</label>
                      <div class="col-sm-4">
                      <input type="file" class="form-control form_control" id="" name="flogo">
                    </div>
                    <div class="col-md-2">
                      @if($data->basic_flogo!='')
                      <img height="100" src="{{asset('uploads/basic/'.$data->basic_flogo)}}" alt="Flogo"/>
                      @else
                       <img height="100" src="{{asset('contents/admin')}}/images/avatar.png" alt="avatar"/>
                      @endif
                    </div>
                  </div>
              </div>
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-sm btn-dark">UPDATE</button>
              </div>  
            </div>
        </form>
    </div>
</div>
@endsection
             