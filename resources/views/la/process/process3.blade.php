@extends('la.layouts.app')
@section("contentheader_title", "Field Operation")
@section("htmlheader_title", "Job Center Listing")
@section("download_button")
  <span style="font-size: 16px;"> Download for process3 files : </span><a href="/admin/processes3/job/{{$job->id}}/files/download" class="btn btn-sm btn-warning"><i class="fa fa-download"></i></a>
@endsection
@section('main-content')

@include('la.jobs.jobprofile')

<div class="box box-success">
    <div class="box-header bg-success">
        <label for="">Process 3 (Field Operation)</label>
    </div>
    <div class="box-body">
    @foreach ($job->fieldoperation as $fo)
        <div class="row">
            <div class="col-md-3 form-group pr-0">
                <label>Name</label>
                <input type="text" value="{{$fo->name}}" class="form-control" readonly>
            </div>
            @if ($fo->type=="file")
                <div class="col-md-2 form-group">
                    <br>
                    <span class="btn btn-primary btn-sm">Original 
                        <span class="badge">{{count($fo->file->files($fo->file->original))}}</span>
                    </span>
                </div>
                <div class="col-md-2 form-group">
                    <br>
                    <span class="btn btn-primary btn-sm">Copy 
                        <span class="badge">{{count($fo->file->files($fo->file->copy))}}</span>
                    </span>
                </div>
                <div class="col-md-2 form-group">
                    <label>Expire Date</label>
                    <input type="text" class="form-control " value="{{$fo->file->expire_date}}" readonly>
                </div>
                <div class="col-md-2 form-group">
                    <label>Receive Date</label>
                    <input type="text" class="form-control" value="{{$fo->file->date}}" readonly>
                </div>
            @else
                <div class="col-md-2 form-group">
                    <label> Value </label>
                    <input type="text" class="form-control" value="{{$fo->value}}" readonly>
                </div>
            @endif
        </div>
    @endforeach
    </div>
    <div class="box-footer">
        <a href="javascript:history.back()" class="btn btn-sm btn-warning">Back</a>
        <a href="/admin/jobs/process3/{{$job->id}}/edit" class="btn btn-sm btn-success pull-right">Edit</a>
    </div>
</div>

@endsection