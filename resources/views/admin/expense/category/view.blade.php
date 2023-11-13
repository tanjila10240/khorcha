@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
          <div class="card-header">
            <div class="row">
                <div class="col-md-8 card_title_part">
                    <i class="fab fa-gg-circle"></i>View Expense category Information
                 </div>  
                <div class="col-md-4 card_button_part">
                    <a href="{{url('dashboard/expense/category')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Category</a>
                </div>   
            </div>
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="table table-bordered table-striped table-hover custom_view_table">
                      <tr>
                        <td>Expense Category</td>  
                        <td>:</td>  
                        <td>{{$data->expcate_name}}</td>  
                      </tr>
                      <tr>
                        <td>Remarks</td>  
                        <td>:</td>  
                        <td>{{$data->expcate_remarks}}</td>  
                      </tr>  
                      <tr>
                        <td>Creator Info</td>  
                        <td>:</td>  
                        <td>
                          {{$data->creatorInfo->name}}<br>
                          {{$data->created_at->format('d-M-Y  |  h:i:s A')}} 
                        </td>  
                      </tr> 
                      @if($data->expcate_editor!='')
                       <tr>
                        <td>Editor Info</td>  
                        <td>:</td>  
                        <td>
                          {{$data->editorInfo->name}}<br>
                          {{$data->updated_at->format('d-M-Y  |  h:i:s A')}} 
                        </td>  
                      </tr> 
                      @endif                   
                    </table>
                </div>
                <div class="col-md-2"></div> 
            </div>
          </div>
          <div class="card-footer">
            <div class="btn-group" role="group" aria-label="Button group">
              <button type="button" class="btn btn-sm btn-dark">Print</button>
              <button type="button" class="btn btn-sm btn-secondary">PDF</button>
              <button type="button" class="btn btn-sm btn-dark">Excel</button>
            </div>
          </div>  
        </div>
    </div>
</div>

 @endsection             