@extends('la.layouts.app')
@section("contentheader_title", "Cargo Receipt")
@section("htmlheader_title", "Job Center Show")
@section('htmlheader_title')
Process-4 (Cargo Receipt) View
@endsection

@section("download_button")
  <span style="font-size: 16px;"> Download for process4 files : </span><a href="/admin/processes4/job/{{$job->id}}/files/download" class="btn btn-sm btn-warning"><i class="fa fa-download"></i></a>
@endsection
@section('main-content')
@if ($success<>true)
    <div class="alert alert-danger">
        <label>Unsuccessful files in Field Operation (Process-3)</label>
    </div>
@endif
@include('la.jobs.jobprofile')
<div class="box box-success">
    <div class="box-header bg-success">
        <label>Cargo Receipt</label>
    </div>
    <div class="box-body">
        @if ($job->cargoreceipts<>null)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Detail Packing List</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <a class="btn btn-primary">Original <span class="badge">{{$job->cargoreceipts->packingList<>null ? count($job->cargoreceipts->packingList->files($job->cargoreceipts->packingList->original)):0}}</span></a>
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-primary">Copy <span class="badge">{{$job->cargoreceipts->packingList <> null ? count($job->cargoreceipts->packingList->files($job->cargoreceipts->packingList->copy)) : 0}}</span></a>
                    </div>
                    <div class="col-md-1">
                        <label>Expire</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" value="{{$job->cargoreceipts->packingList->expire_date}}">
                    </div>
                    <div class="col-md-1">
                        <label>Receive </label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" value="{{$job->cargoreceipts->packingList->date}}">
                    </div>
                </div>
            </div>
        </div>
        @endif
       
        @if ($job->cargoreceipts->loadingPlan<>null)
        <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Loading Plan</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a class="btn btn-primary">Original <span class="badge">{{$job->cargoreceipts->loadingPlan<>null ? count($job->cargoreceipts->loadingPlan->files($job->cargoreceipts->loadingPlan->original)):0}}</span></a>
                        </div>
                        <div class="col-md-3">
                            <a class="btn btn-primary">Copy <span class="badge">{{$job->cargoreceipts->loadingPlan <> null ? count($job->cargoreceipts->loadingPlan->files($job->cargoreceipts->loadingPlan->copy)) : 0}}</span></a>
                        </div>
                        <div class="col-md-1">
                            <label>Expire</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$job->cargoreceipts->loadingPlan->expire_date}}">
                        </div>
                        <div class="col-md-1">
                            <label>Receive </label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$job->cargoreceipts->loadingPlan->date}}">
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="box-footer">
        <a href="javascript:history.back()" class="btn btn-warning">Close</a>
        <a href="/admin/jobs/process4/{{$job->id}}/edit" class="btn btn-success pull-right">Edit</a>
    </div>
</div>


@endsection