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
                       <div class="col-md-7">
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
                  <div class="row mb-3 {{ $errors->has('name') ? 'has-error' : ''}}">
                    <label class="col-sm-3 col-form-label col_form_label">Company<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="name" value="{{old('name')}}">
                      @if($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('name')}}</strong>
                      </span>
                     @endif
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Company title:</label>
                    <div class="col-sm-7">
                      <input type="title" class="form-control form_control" id="" name="title" value="{{old('title')}}">
                        <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('title')}}</strong>
                      </span>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">logo:</label>
                    <div class="col-sm-7">
                      <input type="file" class="form-control form_control" id="" name="logo">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Favicon:</label>
                      <div class="col-sm-7">
                      <input type="file" class="form-control form_control" id="" name="favicon">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Footer Logo:</label>
                      <div class="col-sm-7">
                      <input type="file" class="form-control form_control" id="" name="flogo">
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
             