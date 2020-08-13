@extends('la.layouts.app')
@section('htmlheader_title')
Process2 View
@endsection
@section("contentheader_title", "MACCS (Process 2) ")
@section('main-content')

@include('la.jobs.jobprofile')

<div class="box box-success">
    <form action="/admin/jobs/process2/{{$job->id}}/update" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="box-header bg-success">
        <label for=""> Maccs Data (Process 2) </label>
    </div>
    <div class="box-body">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title"><label>Receipt</label> </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-2">Receipt</div>
                    @if ($job->maccs<>null && $job->maccs->receipts<>null )
                    <input type="hidden" name="receipt_id" value="{{$job->maccs->receipts->id}}">
                    <div class="col-md-3 form-group">
                        <label for="copy" style="display:block;">Original :</label>
                        <input class="form-control" name="receipt_original" type="hidden" value="{{$job->maccs->receipts->original}}">
                        <div class="uploaded_files">
                            @foreach ($job->maccs->receipts->files($job->maccs->receipts->original) as $img)
                            <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                                <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                                <i title="Remove File" class="fa fa-times"></i>
                            </a>
                            @endforeach
                        </div>
                        <a class="btn btn-default btn_upload_files" file_type="files" selecter="receipt_original" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                    </div>
                    <div class="col-md-3 form-group">
                            <label for="copy" style="display:block;">Copy :</label>
                            <input class="form-control" name="receipt_copy" type="hidden" value="{{$job->maccs->receipts->copy}}">
                            <div class="uploaded_files">
                                @foreach ($job->maccs->receipts->files($job->maccs->receipts->copy) as $img)
                                <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                                    <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                                    <i title="Remove File" class="fa fa-times"></i>
                                </a>
                                @endforeach
                            </div>
                            <a class="btn btn-default btn_upload_files" file_type="files" selecter="receipt_copy" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                       </div>
                    {{-- <div class="col-md-2 form-group">
                        <label for="">Expire Date</label>
                        <div class="input-group date">
                                <input type="text" name="receipt_expire_date" id="" class="form-control" value="{{$job->maccs->receipts->expire_date<>null ? date("d/m/Y", strtotime($job->maccs->receipts->expire_date)):null}}">
                                <span class="input-group-addon input_dt">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                    </div> --}}
                    <div class="col-md-2 form-group">
                        <label for="">Receive Date</label>
                        <div class="input-group date">
                                <input type="text" name="receipt_receive_date" id="" class="form-control" value="{{$job->maccs->receipts->date<>null ? date("d/m/Y", strtotime($job->maccs->receipts->date)):null}}">
                                <span class="input-group-addon input_dt">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>Attach Document</label>
                        <input type="text" name="attach_document" class="form-control"value="{{$job->maccs->attach_document}}">
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
                    <div class="col-md-2">
                        <label for="">Undertaking Letter</label>
                    </div>
                    @if ($job->maccs<>null && $job->maccs->undertakingLetter<>null)
                    <input type="hidden" name="undertakingLetter_id" value="{{$job->maccs->undertakingLetter->id}}">
                    <div class="col-md-3 form-group">
                        <label for="copy" style="display:block;">Original :</label>
                        <input class="form-control" name="undertaking_original" type="hidden" value="{{$job->maccs->undertakingLetter->original}}">
                        <div class="uploaded_files">
                            @foreach ($job->maccs->receipts->files($job->maccs->undertakingLetter->original) as $img)
                            <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                                <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                                <i title="Remove File" class="fa fa-times"></i>
                            </a>
                            @endforeach
                        </div>
                        <a class="btn btn-default btn_upload_files" file_type="files" selecter="undertaking_original" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                   
                    </div>
                    <div class="col-md-3 form-group">
                        <label for="copy" style="display:block;">Copy :</label>
                        <input class="form-control" name="undertaking_copy" type="hidden" value="{{$job->maccs->undertakingLetter->copy}}">
                        <div class="uploaded_files">
                            @foreach ($job->maccs->receipts->files($job->maccs->undertakingLetter->copy) as $img)
                            <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                                <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                                <i title="Remove File" class="fa fa-times"></i>
                            </a>
                            @endforeach
                        </div>
                        <a class="btn btn-default btn_upload_files" file_type="files" selecter="undertaking_copy" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                   
                    </div>
                    
                    <div class="col-md-2 form-group">
                        <label for="">Expire Date</label>
                        <div class="input-group date">
                                <input type="text" name="undertaking_expire_date" id="" class="form-control" value="{{$job->maccs->undertakingLetter->expire_date<>null ? date("d/m/Y", strtotime($job->maccs->undertakingLetter->expire_date)):null}}">
                                <span class="input-group-addon input_dt">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="">Receive Date</label>
                        <div class="input-group date">
                                <input type="text" name="undertaking_receive_date" id="" class="form-control" value="{{ $job->maccs->undertakingLetter->date<>null ? date("d/m/Y", strtotime($job->maccs->undertakingLetter->date)):null}}">
                                <span class="input-group-addon input_dt">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @if ($job->shipment->type<>"IMPORT" )
        <div class="panel panel-default" hidden>
            @else
            <div class="panel panel-default">
                @endif
                    <div class="panel-heading">
                        <div class="panel-title"> 
                            <label for="" style="margin-right:20px;"> Channel </label>
                            @if ($job->shipment->type<>"IMPORT" )
                                <select name="channel" style="width:200px;height:30px;" >
                            @else
                                <select name="channel" style="width:200px;height:30px;" required>
                            @endif
                                @if ($job->maccs->channel=="channel1")
                                    <option value="channel1">Channel-1</option>
                                @elseif($job->maccs->channel=="channel2")
                                    <option value="channel2">Channel-2</option>
                                @elseif($job->maccs->channel=="channel3")
                                    <option value="channel3">Channel-3</option>
                                @else 
                                    <option value="">-Select </option>
                                @endif
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
                                <div class="panel-heading">
                                    <div class="panel-title"> 
                                        <label for="">RO Data</label>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="">RO</label>
                                        </div>
                                        @if ($job->maccs->ros<>null)
                                        <input type="hidden" name="ro_id" value="{{$job->maccs->ros->id}}">
                                        <div class="col-md-3 form-group">
                                            <label style="display:block;">Original :</label>
                                            <input class="form-control" name="ro_original" type="hidden" value="{{$job->maccs->ros->original}}">
                                            <div class="uploaded_files">
                                                @foreach ($job->maccs->receipts->files($job->maccs->ros->original) as $img)
                                                <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                                                    <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                                                    <i title="Remove File" class="fa fa-times"></i>
                                                </a>
                                                @endforeach
                                            </div>
                                            <a class="btn btn-default btn_upload_files" file_type="files" selecter="ro_original" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                           
                                        </div>
                                        <div class="col-md-3 form-group">
                                                <label style="display:block;">Copy :</label>
                                                <input class="form-control" name="ro_copy" type="hidden" value="{{$job->maccs->ros->copy}}">
                                                <div class="uploaded_files">
                                                    @foreach ($job->maccs->receipts->files($job->maccs->ros->copy) as $img)
                                                    <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                                                        <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                                                        <i title="Remove File" class="fa fa-times"></i>
                                                    </a>
                                                    @endforeach
                                                </div>
                                                <a class="btn btn-default btn_upload_files" file_type="files" selecter="ro_copy" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                                        </div>
                                        
                                        <div class="col-md-2 form-group">
                                            <label for="">Expire Date</label>
                                            <div class="input-group date">
                                                <input type="text" name="ro_expire_date" id="" class="form-control" value="{{$job->maccs->ros->expire_date<>null ? date("d/m/Y", strtotime($job->maccs->ros->expire_date)):null}}">
                                                <span class="input-group-addon input_dt">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label for="">Receive Date</label>
                                            <div class="input-group date">
                                                <input type="text" name="ro_receive_date" id="" class="form-control" value="{{$job->maccs->ros->date<>null ? date("d/m/Y", strtotime($job->maccs->ros->date)):null}}">
                                                <span class="input-group-addon input_dt">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                            </div>
                                        </div>
                                        @endif
                                    </div>               
                                </div>
                            </div>
                            @if ($job->shipment->type<>"IMPORT" )
                            <div class="row" >
                                <div class="col-md-4 form-group">
                                    <label for="">Planned Checkin Date</label>
                                    <input type="text" class="form-control" value="{{$job->maccs->planned_checkin}}">
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="box-footer">
                                <a href="javascript:history.back()" class="btn btn-warning">Cancel</a>
                                <button type="submit" class="btn btn-success pull-right">Update</button>
                        </div>
                </form>
                    </div>
                </div>
                @endsection