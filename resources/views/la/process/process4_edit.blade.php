@extends('la.layouts.app')
@section("contentheader_title", "Cargo Receipt")
@section("section", "Process 4 ")
@section("sub_section", "Show")
@section("htmlheader_title", "Job Center Show")
@section('htmlheader_title')
Process-4 (Cargo Receipt) View
@endsection
@section('main-content')
@if ($success<>true)
<div class="alert alert-danger">
    <label>Unsuccessful files in Field Operation (Process-3)</label>
</div>
@endif
@include('la.jobs.jobprofile')
<div class="box box-success">
    <form action="/admin/jobs/process4/{{$job->id}}/update" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="box-header bg-success">
            <label>Cargo Receipt</label>
        </div>
        <div class="box-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Detail Packing List</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label>Original </label>
                            <input class="form-control" name="packing_list_original" type="hidden" value="{{$job->cargoreceipts->packingList->original}}">
                            <div class="uploaded_files">
                                @foreach ($job->cargoreceipts->packingList->files($job->cargoreceipts->packingList->original) as $img)
                                <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                                    <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                                    <i title="Remove File" class="fa fa-times"></i>
                                </a>
                                @endforeach
                            </div>
                            <a class="btn btn-default btn_upload_files" file_type="files" selecter="packing_list_original" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Copy </label>
                            <input class="form-control" name="packing_list_copy" type="hidden" value="{{$job->cargoreceipts->packingList->copy}}">
                            <div class="uploaded_files">
                                @foreach ($job->cargoreceipts->packingList->files($job->cargoreceipts->packingList->copy) as $img)
                                <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                                    <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                                    <i title="Remove File" class="fa fa-times"></i>
                                </a>
                                @endforeach
                            </div>
                            <a class="btn btn-default btn_upload_files" file_type="files" selecter="packing_list_copy" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Expire Date</label>
                            <div class="input-group date">
                                <input type="text" name="packing_list_expire_date" class="form-control" value="{{$job->cargoreceipts->packingList->expire_date<>null ? date("d/m/Y", strtotime($job->cargoreceipts->packingList->expire_date)):null}}">
                                <span class="input-group-addon input_dt">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Receive Date</label>
                            <div class="input-group date">
                                <input type="text" name="packing_list_receive_date" class="form-control" value="{{$job->cargoreceipts->packingList->date<>null ? date("d/m/Y", strtotime($job->cargoreceipts->packingList->date)):null}}">
                                <span class="input-group-addon input_dt">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($job->cargoreceipts->loadingPlan<>null)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Loading Plan</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            {{-- <a class="btn btn-primary">Original <span class="badge">{{$job->cargoreceipts->loadingPlan<>null ? count($job->cargoreceipts->loadingPlan->files($job->cargoreceipts->loadingPlan->original)):0}}</span></a> --}}
                            <label>Original </label>
                            <input class="form-control" name="loading_plan_original" type="hidden" value="{{$job->cargoreceipts->packingList->original}}">
                            <div class="uploaded_files">
                                @foreach ($job->cargoreceipts->loadingPlan->files($job->cargoreceipts->loadingPlan->original) as $img)
                                <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                                    <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                                    <i title="Remove File" class="fa fa-times"></i>
                                </a>
                                @endforeach
                            </div>
                            <a class="btn btn-default btn_upload_files" file_type="files" selecter="loading_plan_original" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                        
                        </div>
                        <div class="col-md-3">
                            {{-- <a class="btn btn-primary">Copy <span class="badge">{{$job->cargoreceipts->loadingPlan <> null ? count($job->cargoreceipts->loadingPlan->files($job->cargoreceipts->loadingPlan->copy)) : 0}}</span></a> --}}
                            <label>Copy </label>
                            <input class="form-control" name="loading_plan_copy" type="hidden" value="{{$job->cargoreceipts->packingList->copy}}">
                            <div class="uploaded_files">
                                @foreach ($job->cargoreceipts->loadingPlan->files($job->cargoreceipts->loadingPlan->copy) as $img)
                                <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                                    <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                                    <i title="Remove File" class="fa fa-times"></i>
                                </a>
                                @endforeach
                            </div>
                            <a class="btn btn-default btn_upload_files" file_type="files" selecter="loading_plan_copy" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                        
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
            <button type="submit" class="btn btn-success pull-right">Update</button> 
        </div>
    </form>
</div>


@endsection