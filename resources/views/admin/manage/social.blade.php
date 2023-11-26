@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <form method="POST" action="{{url('dashboard/manage/social/update')}}" enctype="multipart/form-data">
          @csrf
            <div class="card mb-3">
              <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>Social Media Information
                    </div>  
                    <div class="col-md-4 card_button_part">
                        <a href="{{url('dashboard/manage/basic')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>Basic Information</a>
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
                <div class="row">
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                     <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                        <input type="text" class="form-control" name="" value=""/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                     <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                        <input type="text" class="form-control" name="" value=""/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                     <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                        <input type="text" class="form-control" name="" value=""/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                     <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                        <input type="text" class="form-control" name="" value=""/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                     <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                        <input type="text" class="form-control" name="" value=""/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                     <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                        <input type="text" class="form-control" name="" value=""/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                     <span class="input-group-text"><i class="fab fa-github"></i></span>
                        <input type="text" class="form-control" name="" value=""/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                     <span class="input-group-text"><i class="fab fa-pinterest"></i></span>
                        <input type="text" class="form-control" name="" value=""/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                     <span class="input-group-text"><i class="fab fa-behance-square"></i></span>
                        <input type="text" class="form-control" name="" value=""/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                     <span class="input-group-text"><i class="fab fa-telegram"></i></span>
                        <input type="text" class="form-control" name="" value=""/>
                    </div>
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
             