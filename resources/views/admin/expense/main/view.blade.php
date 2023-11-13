@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
          <div class="card-header">
            <div class="row">
                <div class="col-md-8 card_title_part">
                    <i class="fab fa-gg-circle"></i>View Expense Information
                 </div>  
                <div class="col-md-4 card_button_part">
                    <a href="{{url('dashboard/expense')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Expense</a>
                </div>  
            </div>
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="table table-bordered table-striped table-hover custom_view_table">
                      <tr>
                        <td>Title</td>  
                        <td>:</td>  
                        <td>{{$data->expense_title}}</td>  
                      </tr>
                      <tr>
                        <td>Category</td>  
                        <td>:</td>  
                        <td>{{$data->categoryInfo->expcate_name}}</td>  
                      </tr>  
                      <tr>
                        <td>Amount</td>  
                        <td>:</td>  
                        <td>{{number_format($data->expense_amount,2)}}</td>  
                      </tr> 
                       <tr>
                        <td>Date</td>  
                        <td>:</td>  
                        <td>{{$data->expense_date}}</td>  
                      </tr>
                       <tr>
                        <td>Creator</td>  
                        <td>:</td>  
                        <td>{{$data->creatorInfo->name}}</td>  
                      </tr>
                      <tr>
                        <td>Created Time</td>  
                        <td>:</td>  
                        <td>
                          {{$data->created_at->format('d-M-Y  |  h:i:s A')}}<br>
                          {{$data->created_at->diffForHumans()}}
                        </td>   
                      </tr>
                      @if($data->expense_editor!='')
                       <tr>
                        <td>Editor</td>  
                        <td>:</td>  
                        <td>{{$data->editorInfo->name}}</td>  
                      </tr>

                          <tr> 
                        <td>Update Time</td>  
                        <td>:</td>  
                        <td>
                          {{$data->updated_at->format('d-M-Y  |  h:i:s A')}}<br>
                          {{$data->updated_at->diffForHumans()}}
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