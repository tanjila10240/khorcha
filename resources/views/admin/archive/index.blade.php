@extends('layouts.admin')
@section('content')
@php

  $all_income=App\Models\Income::select(DB::raw('count(*) as tatal'),DB::raw('YEAR(income_date) year, MONTH(income_date) month'))->groupby('year','month')->orderBy('income_date','DESC')->get();

  $total_income=App\Models\Income::select(DB::raw('count(*) as tatal'),DB::raw('YEAR(income_date) year, MONTH(income_date) month'))->sum('income_amount');

  $total_expense=App\Models\Expense::select(DB::raw('count(*) as tatal'),DB::raw('YEAR(expense_date) year, MONTH(expense_date) month'))->sum('expense_amount');

  $allExpense=App\Models\Expense::select(DB::raw('count(*) as tatal'),DB::raw('YEAR(expense_date) year, MONTH(expense_date) month'))->groupby('year','month')->orderBy('expense_date','DESC')->get();

@endphp
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
          <div class="card-header no_print"> 
            <div class="row">
                <div class="col-md-8 card_title_part no_print">
                    <i class="fab fa-gg-circle"></i>Income Expense Archive
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
                  <th>Month</th>
                  <th>Income</th>
                  <th>Expense</th>
                  <th>Savings</th>
                  <th>Manage</th>
                </tr>
              </thead>
              <tbody>
                @foreach($all_income as $income)
                <tr>
                  <td>
                  @php
                   $year_month=$income->year.'-'.$income->month;
                   $month_year=date('F-Y',strtotime($year_month));     
                   echo $month_year;            
                  @endphp
                  </td>
                  <td>{{$total_income}}</td>
                  <td></td>
                  <td></td>  
                  <td></td> 
                </tr>
                @endforeach
              </tbody>
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
