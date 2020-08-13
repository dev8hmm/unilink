@extends('la.layouts.app')
@section("contentheader_title", "Field Operation")
@section("section", "Process 3 ")
@section("sub_section", "Field Operation")
@section("htmlheader_title", "Field Operation")
@section('htmlheader_title')
Process3 (Field Operation) View
@endsection
@section('main-content')
@include('la.jobs.jobprofile')
<div class="box box-success">
    <form action="/admin/jobs/process3/{{$job->id}}/update" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="box-header bg-success">
            <label for="">Process 3 (Field Operation)</label>
        </div>
        <div class="box-body">
            @foreach ($job->fieldoperation as $fo)
            <div class="row">
                <div class="col-md-3 form-group" style="padding-right:0px;">
                    <label>Name</label>
                    <input type="text" value="{{$fo->name}}" class="form-control">
                </div>
                @if ($fo->type=="file")
                <div class="col-md-3 form-group">
                    <label>Original </label>
                    <input class="form-control" name="{{$fo->short}}_original" type="hidden" value="{{$fo->file->original}}">
                    <div class="uploaded_files">
                        @foreach ($fo->file->files($fo->file->original) as $img)
                        <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                            <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                            <i title="Remove File" class="fa fa-times"></i>
                        </a>
                        @endforeach
                    </div>
                    <a class="btn btn-default btn_upload_files" file_type="files" selecter="{{$fo->short}}_original" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                </div>
                <div class="col-md-2 form-group">
                    <label>Copy </label>
                    {{-- <span class="badge">{{count($fo->file->files($fo->file->copy))}}</span> --}}
                    <input class="form-control" name="{{$fo->short}}_copy" type="hidden" value="{{$fo->file->copy}}">
                    <div class="uploaded_files">
                        @foreach ($fo->file->files($fo->file->copy) as $img)
                        <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                            <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                            <i title="Remove File" class="fa fa-times"></i>
                        </a>
                        @endforeach
                    </div>
                    <a class="btn btn-default btn_upload_files" file_type="files" selecter="{{$fo->short}}_copy" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                </div>
                <div class="col-md-2 form-group">
                    <label>Expire Date</label>
                    <div class="input-group date">
                        <input type="text" name="{{$fo->short}}_expire_date" class="form-control" value="{{$fo->file->expire_date<>null ? date("d/m/Y", strtotime($fo->file->expire_date)):null}}">
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="col-md-2 form-group">
                    <label>Receive Date</label>
                    <div class="input-group date">
                        <input type="text" name="{{$fo->short}}_receive_date" class="form-control" value="{{$fo->file->date<>null ? date("d/m/Y", strtotime($fo->file->date)):null}}">
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
                @else
                <div class="col-md-2 form-group">
                    <label> Value </label>
                    {{-- <input type="text" class="form-control" value="{{$fo->value}}"> --}}
                    <div class="input-group date">
                        <input type="text" name="{{$fo->short}}" class="form-control" value="{{$fo->value<>null ? date("d/m/Y", strtotime($fo->value)):null}}">
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
                @endif
            </div>
            @endforeach
        </div>
        <div class="box-footer">
            <a href="javascript:history.back()" class="btn btn-sm btn-warning">Back</a>
            <button type="submit" class="btn btn-sm btn-success pull-right">Update</a>
            </div>
        </form>
    </div>
    
    @endsection