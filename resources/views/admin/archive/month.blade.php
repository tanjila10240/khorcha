@extends('layouts.admin')
@section('content')
@php

  $now=Carbon\Carbon::now()->toDateTimeString(); 
  $year=date('Y',strtotime($now));
  $month=date('m',strtotime($now));
  $date=date('d',strtotime($now));
  $monthName=date('F',strtotime($now));

  $allIncome=App\Models\Income::where('income_status',1)->whereYear('income_date','=',$year)->whereMonth('income_date','=',$month)->get();
  $allExpense=App\Models\Expense::where('expense_status',1)->whereYear('expense_date','=',$year)->whereMonth('expense_date','=',$month)->get();
  $total_income=App\Models\Income::where('income_status',1)->whereYear('income_date','=',$year)->whereMonth('income_date','=',$month)->sum('income_amount');
  $total_expense=App\Models\Expense::where('expense_status',1)->whereYear('expense_date','=',$year)->whereMonth('expense_date','=',$month)->sum('expense_amount');
  $total_savings=($total_income - $total_expense);
@endphp
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
          <div class="card-header no_print"> 
            <div class="row">
                <div class="col-md-8 card_title_part no_print">
                    <i class="fab fa-gg-circle"></i>{{$monthName}} :: Income Expense statment
                </div>  
                <div class="col-md-4 card_button_part no_print">
                    <a href="{{url('dashboard/income')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Income</a>
                    <a href="{{url('dashboard/expense')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Expense</a>
                </div>  
            </div>
          </div>
          <div class="card-body">
             <!-- alert sms code start  -->
            <div class="row">
             <div class="col-md-12">
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
            <!-- alert sms code end      -->
            <table id="myTable" class="table table-bordered table-striped table-hover custom_table">
              <thead class="table-dark">
                <tr>
                  <th>Date</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Income</th>
                  <th>Expense</th>
                </tr>
              </thead>
              <tbody>
                @foreach($allIncome as $income)
                <tr>
                  <td>{{date('d-m-Y',strtotime($income->income_date))}}</td>
                  <td>{{$income->income_title}}</td>
                  <td>{{$income->categoryInfo->incate_name}}</td>
                  <td>{{number_format($income->income_amount,2)}}</td>  
                  <td></td> 
                </tr>
                @endforeach
                @foreach($allExpense as $expense)
                <tr>
                  <td>{{date('d-m-Y',strtotime($expense->expense_date))}}</td>
                  <td>{{$expense->expense_title}}</td>
                  <td>{{$expense->categoryInfo->expcate_name}}</td>               
                  <td></td>
                  <td>{{number_format($expense->expense_amount,2)}}</td>   
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="3" class="fs-6 text-end bg-info bg-opacity-10 text-dark">Total :</th>
                  <th class="fs-6 bg-success bg-opacity-10 text-success">{{number_format($total_income,2) }}</th>
                  <th class="fs-6 bg-danger bg-opacity-10 text-danger">{{number_format($total_expense,2) }}</th>
                </tr>
             <tr>
                  @if($total_savings >= 0)    
                  <th colspan="3" class="fs-6 bg-success bg-opacity-25 text-end text-success">Savings :</th>
                  @else
                  <th colspan="3" class="fs-6 bg-danger bg-opacity-25 text-end text-danger">Over Expense :</th>
                  @endif
                  @if($total_savings >= 0)            
                  <th colspan="2" class="fs-6 bg-success bg-opacity-25 text-success">{{number_format($total_savings,2)}}</th>
                  @else
                  <th colspan="2" class="fs-6 bg-danger bg-opacity-25 text-danger">{{number_format($total_savings,2)}}</th>
                  @endif
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="card-footer no_print">
            <div class="btn-group" role="group" aria-label="Button group">
              <button onclick="window.print()" class="btn btn-sm btn-dark">Print</button>
              <a href="{{url('dashboard/income/pdf')}}" class="btn btn-sm btn-secondary">PDF</a>
              <a href="{{url('dashboard/income/excel')}}"class="btn btn-sm btn-dark">Excel</a>
            </div>
          </div>  
        </div>
    </div>
</div>


<!-- delete modal code-->

<div class="modal fade" id="softDeleteModal" tabindex="-1" aria-labelledby="softDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <form method="POST" action="{{url('dashboard/income/softdelete')}}">
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
