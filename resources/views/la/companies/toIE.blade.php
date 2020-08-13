@extends('la.layouts.app')
@section('htmlheader_title')
Customer to IE
@endsection
@section('main-content')
<div class="row">
    <div class="col-md-3 form-group">
        <label>Name</label>
        <input type="text" class="form-control" value="{{$company->name}}" readonly>
    </div>
    <div class="col-md-2 form-group">
        <label>Customer ID</label>
        <input type="text" class="form-control" value="{{$company->reg_id}}" readonly>
    </div>
    <div class="col-md-3 form-group">
        <label>Attention</label>
        <input type="text" class="form-control" value="{{$company->attention}}" readonly>
    </div>
    <div class="col-md-2 form-group">
        <label>Phone </label>
        <input type="text" class="form-control" value="{{$company->phone}}" readonly>
    </div>
    <div class="col-md-2 form-group">
        <label>Email</label>
        <input type="text" class="form-control" value="{{$company->email}}" readonly>
    </div>
</div>
    <form action="/admin/companies/{{$company->id}}/toIE" method="post" enctype='multipart/form-data'>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
         @include('la.companies.add_ie_include')
         <hr>
    <a href="javascript:history.back()" class="btn btn-warning">Back</a>
    <button type="submit" class="btn btn-success pull-right">Submit</button>
    </form>
@endsection