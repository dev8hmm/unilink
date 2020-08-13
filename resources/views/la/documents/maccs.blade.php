@extends("la.layouts.app")

@section("contentheader_title", "Maccs Data")
@section("contentheader_description", "Maccs")
@section("section", "Jobs")
@section("sub_section", "Receiving")
@section("htmlheader_title", "Maccs Data Receiving")
@section("main-content")
@if ($success<>"true")
<div class="alert alert-danger" role="alert">
  <label> Receiving document(s) are unsuccess in Process 1 (Receiving Document)</label> 
  <a href="/admin/jobs/process1/{{$job->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit">Edit</i></a>
  </div>
@endif

@include('la.jobs.jobprofile')
{{ Form::open(['url' => 'admin/jobs/process2/doc_receive/'.$job->id,'enctype'=>'multipart/form-data']) }} 
<div class="box box-success">
    <div class="box-header bg-success">
        <label for=""> Maccs Data (Process 2) </label>
    </div>
    <div class="box-body">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title"><label for="">Receipt</label> </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="">Original</label>
                        {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="receipt_original" type="hidden" value="[]">
                        <div class='uploaded_files'></div>
                        <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='receipt_original'  style='margin-top:5px;'>Original <i class='fa fa-cloud-upload'></i></a>     --}}
                        <div class="file-loading">
                            <input  type="file" name="receipt_original[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">Copy</label>
                        {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="receipt_copy" type="hidden" value="[]">
                        <div class='uploaded_files'></div>
                        <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='receipt_copy' style='margin-top:5px;'>Copy <i class='fa fa-cloud-upload'></i></a>     --}}
                        <div class="file-loading">
                            <input  type="file" name="receipt_copy[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                        </div>
                    </div>
                    {{-- <div class="col-md-2 form-group">
                        <label for="">Expire Date</label>
                        <div class="input-group date">
                            <input type="text" name="receipt_expire_date" id="" class="form-control">
                            <span class="input-group-addon input_dt">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    </div> --}}
                    <div class="col-md-2 form-group">
                            <label for="">Receive Date</label>
                            <div class="input-group date">
                                <input type="text" name="receipt_receive_date" id="" class="form-control">
                                <span class="input-group-addon input_dt">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>Attach Document</label>
                        <input type="text" class="form-control" name="attach_document">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                   <label for=""> Undertaking Letter</label>
                </div>
            </div>
            <div class="panel-body">
                    <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="">Undertaking Letter Original</label>
                                {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="undertaking_original" type="hidden" value="[]">
                                <div class='uploaded_files'></div>
                                <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='undertaking_original'  style='margin-top:5px;'>Original <i class='fa fa-cloud-upload'></i></a>     --}}
                                <div class="file-loading">
                                    <input  type="file" name="undertaking_original[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">Undertaking Letter Copy</label>
                                {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="undertaking_copy" type="hidden" value="[]">
                                <div class='uploaded_files'></div>
                                <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='undertaking_copy'  style='margin-top:5px;'>Copy <i class='fa fa-cloud-upload'></i></a>     --}}
                                <div class="file-loading">
                                    <input  type="file" name="undertaking_copy[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                                </div>
                            </div>
                           
                            <div class="col-md-2 form-group">
                                <label for="">Expire Date</label>
                                <div class="input-group date">
                                    <input type="text" name="undertaking_expire_date" id="" class="form-control">
                                    <span class="input-group-addon input_dt">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-2 form-group">
                                    <label for="">Receive Date</label>
                                    <div class="input-group date">
                                        <input type="text" name="undertaking_receive_date" id="" class="form-control">
                                        <span class="input-group-addon input_dt">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                        </div>
            </div>
        </div>
        @if ($job->shipment->type<>"IMPORT" )
        <div class="panel panel-default" hidden>
            @else
            <div class="panel panel-default">
                @endif
        {{-- <div class="panel panel-default"> --}}
                    <div class="panel-heading">
                    <div class="panel-title"> 
                        <label for="" style="margin-right:20px;"> Channel </label>
                        @if ($job->shipment->type<>"IMPORT" )
                        <select name="channel" id="channel" class="" style="width:200px;height:30px;" >
                        @else
                        <select name="channel" id="channel" class="" style="width:200px;height:30px;" required>
                        @endif
                            <option value="">-Select Channel</option>
                            <option value="channel1">Channel-1</option>
                            <option value="channel2">Channel-2</option>
                            <option value="channel3">Channel-3</option>
                        </select>
                    </div>
                </div>
            </div>
            @if ($job->shipment->type<>"IMPORT" )
            <div class="panel panel-default" hidden>
                @else
                <div class="panel panel-default">
                    @endif
                    {{-- <div class="panel panel-default"> --}}
                    <div class="panel-heading">
                        <div class="panel-title"> 
                            <label for="">RO </label>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label for="">RO Original</label>
                                {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="ro_original" type="hidden" value="[]">
                                <div class='uploaded_files'></div>
                                <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='ro_original'  style='margin-top:5px;'>Original <i class='fa fa-cloud-upload'></i></a>     --}}
                                <div class="file-loading">
                                    <input  type="file" name="ro_original[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="">RO Copy</label>
                                {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="ro_copy" type="hidden" value="[]">
                                <div class='uploaded_files'></div>
                                <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='ro_copy'  style='margin-top:5px;'>Copy <i class='fa fa-cloud-upload'></i></a>     --}}
                                <div class="file-loading">
                                    <input  type="file" name="ro_copy[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                                </div>
                            </div>
                            
                            <div class="col-md-2 form-group">
                                <label for="">Expire Date</label>
                                <div class="input-group date">
                                    <input type="text" name="ro_expire_date" id="" class="form-control">
                                    <span class="input-group-addon input_dt">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-2 form-group">
                                    <label for="">Receive Date</label>
                                    <div class="input-group date">
                                        <input type="text" name="ro_receive_date" id="" class="form-control">
                                        <span class="input-group-addon input_dt">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                        </div>               
                    </div>
                </div>
                @if ($job->shipment->type<>"IMPORT" )
                    <div class="row" >
                        <div class="col-md-4 form-group">
                            <label for="">Planned Checkin Date</label>
                            <div class="input-group date">
                                <input type="text" name="planned_checkin_date" id="" class="form-control" style="font-weight:bold;" required>
                                <span class="input-group-addon input_dt">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                @endif
               
            </div>
            <div class="box-footer bg-default">
                <a href="/admin/jobs" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-success pull-right">Submit</button>
                <div  class="pull-right" style="display:inline; padding-right:20px;">  
                        <label>Assign To <span class="text-danger">*</span></label>
                    <select name="assign" style="width:150px; height:30px; border-radius:4px;" required>
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
        @endsection