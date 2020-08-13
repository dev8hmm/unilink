@extends("la.layouts.app")

@section("contentheader_title", "Field Operation")
@section("contentheader_description", "Field Operation")
@section("section", "Jobs")
@section("sub_section", "Receiving")
@section("htmlheader_title", "Field Operation")
@section("main-content")
@if ($success<>"true")
<div class="alert alert-danger" role="alert">
    <label> Maccs document(s) are unsuccess in Process 2 (Maccs Document)</label> 
    <a href="/admin/jobs/process2/{{$job->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit">Edit</i></a>
</div>
@endif
@include('la.jobs.jobprofile')
<div class="box box-success">
    {!!Form::open(['url' => 'admin/jobs/process3/doc_receive/'.$job->id,'enctype'=>'multipart/form-data']) !!} 
    <div class="box-header bg-success">
        <label for="">Field Operation (Process 3)</label>
    </div>
    <div class="box-body">
        @foreach ($data as $key => $data)
        <input type="hidden" value="{{($data)}}" name="data_value[{{$key}}]">
        <div class="row">
            <div class="col-md-2 form-group">
                <label for="">Name</label>
                <input type="text" name="{{json_decode($data)->short}}" class="form-control" value="{{json_decode($data)->name}}">
            </div>
            @if (json_decode($data)->type=="file")
            <div class="col-md-3 form-group">
                <label for="">Original</label>
                {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="{{json_decode($data)->short}}_original" type="hidden" value="[]">
                <div class='uploaded_files'></div>
                <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter="{{json_decode($data)->short}}_original"  style='margin-top:5px;'>Original <i class='fa fa-cloud-upload'></i></a>     --}}
                <div class="file-loading">
                    <input  type="file" name="{{json_decode($data)->short}}_original[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                </div>
            </div>
            <div class="col-md-3 form-group">
                <label for="">Copy</label>
                {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="{{json_decode($data)->short}}_copy" type="hidden" value="[]">
                <div class='uploaded_files'></div>
                <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter="{{json_decode($data)->short}}_copy"  style='margin-top:5px;'>Copy <i class='fa fa-cloud-upload'></i></a>     --}}
                <div class="file-loading">
                    <input  type="file" name="{{json_decode($data)->short}}_copy[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                </div>
            </div>
            <div class="col-md-2 form-group">
                <label for="">Expire Date</label>
                <div class="input-group date">
                    <input type="text" name="{{json_decode($data)->short}}_expire_date" id="" class="form-control">
                    <span class="input-group-addon input_dt">
                        <span class="fa fa-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="col-md-2 form-group">
                <label for="">Receive Date</label>
                <div class="input-group date">
                    <input type="text" name="{{json_decode($data)->short}}_receive_date" id="" class="form-control">
                    <span class="input-group-addon input_dt">
                        <span class="fa fa-calendar"></span>
                    </span>
                </div>
            </div>
            @elseif(json_decode($data)->type=="text")
            <div class="col-md-3 form-group">
                <label for="">Enter</label>
                <input type="text" name="{{json_decode($data)->short}}_text" id="" class="form-control">
            </div>
            @else 
            <div class="col-md-2 form-group">
                <label for="">Select Date</label>
                <div class="input-group date">
                    <input type="text" name="{{json_decode($data)->short}}_date" id="" class="form-control">
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
        <a href="/admin/jobs" class="btn btn-warning">Cancel</a>
        <button type="submit" class="btn btn-success pull-right">Submit</button>
           @if ($users<>null)
            <div  class="pull-right" style="display:inline; padding-right:20px;">  
                <label>Assign To <span class="text-danger">*</span></label>
                <select name="assign" style="width:150px; height:30px; border-radius:4px;" required>
                    @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            @endif
    </div>
    {!! Form::close()!!}
</div>
@endsection