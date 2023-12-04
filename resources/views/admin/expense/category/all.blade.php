@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
          <div class="card-header">
            <div class="row">
                <div class="col-md-8 card_title_part">
                    <i class="fab fa-gg-circle"></i>All Expence Category Information
                </div>  
                <div class="col-md-4 card_button_part">
                    <a href="{{url('dashboard/expense/category/add')}}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Category</a>
                </div>  
            </div>
          </div>
          <div class="card-body">
            <table id="myTable" class="table table-bordered table-striped table-hover custom_table">
              <thead class="table-dark">
                <tr>
                  <th>Name</th>
                  <th>Remarks</th>
                  <th>Transction</th>
                  <th>Amount</th>
                  <th>Manage</th>
                </tr>
              </thead>
              <tbody>
                @foreach($all as $data)
                @php
                     $cateID=$data->expcate_id;
                     $total_expense=App\Models\Expense::where('expense_status',1)->where('expcate_id',$cateID)->sum('expense_amount');
                     $expense_count=App\Models\Expense::where('expense_status',1)->where('expcate_id',$cateID)->count();
                  @endphp
                <tr>
                  <td>{{$data->expcate_name}}</td>
                  <td>{{Str::words($data->expcate_remarks,3)}}</td>
                  <td>
                     @if($expense_count<=9)
                       0{{$expense_count}}
                     @else
                       {{$expense_count}}
                     @endif
                   </td>
                   <td>{{number_format($total_expense,2)}}</td>
                  <td>
                      <div class="btn-group btn_group_manage" role="group">
                        <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                        <ul class="dropdown-menu">

                          <li><a class="dropdown-item" href="{{url('/dashboard/expense/category/view/'.$data->expcate_slug)}}">View</a></li>
                          <li><a class="dropdown-item" href="{{url('/dashboard/expense/category/edit/'.$data->expcate_slug)}}">Edit</a></li>
                         @if($expense_count=='0') 
                         <li><a class="dropdown-item" href="#" id="softDelete"data-bs-toggle="modal" data-bs-target="#softDeleteModal" data-id="{{$data->expcate_id}}">Delete</a>
                          @endif
                        </ul>
                      </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
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
<!-- delete modal code-->
<!-- Modal -->
<div class="modal fade" id="softDeleteModal" tabindex="-1" aria-labelledby="softDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <form method="POST" action="{{url('dashboard/expense/category/softdelete')}}">
     @csrf
    <div class="modal-content modal_content">
      <div class="modal-header modal_header">
        <h1 class="modal-title modal_title fs-6" id="softDeleteModalLabel"><i class="fab fa-gg-circle"></i>Confirm message</h1>
      </div>
      <div class="modal-body modal_body">
        Are you want to sure delete data?
        <input type="hidden" name="modal_id" id="modal_id"/>
      </div>
      <div class="modal-footer modal_footer">
        <button type="submit" class="btn btn-success">Confirm</button> 
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
     </div>
    </form>
  </div>
</div>
 @endsection
