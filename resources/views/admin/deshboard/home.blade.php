@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 welcome_part">
        <p><span>Welcome..</span> {{Auth::user()->name}}</p>
    </div>
</div>
@endsection