@extends('la.layouts.app')
@section('htmlheader_title')
Process2 View
@endsection
@section("contentheader_title", "MACCS (Process 2) ")
@section("download_button")
  <span style="font-size: 16px;"> Download for process2 files : </span><a href="/admin/processes2/job/{{$job->id}}/files/download" class="btn btn-sm btn-warning"><i class="fa fa-download"></i></a>
@endsection
@section('main-content')

@include('la.jobs.jobprofile')

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
                    <div class="col-md-2">Receipt</div>
                    @if ($job->maccs<>null && $job->maccs->receipts<>null)
                    <div class="col-md-3 form-group">
                        <a class="btn btn-primary">Original 
                            <span class="badge">
                                @if ($job->maccs->receipts<>null)
                                {{count($job->maccs->receipts->files($job->maccs->receipts->original))}}
                                @else
                                0
                                @endif
                                
                            </span>
                        </a>
                    </div>
                    <div class="col-md-3 form-group">
                        <a class="btn btn-primary">Copy 
                            <span class="badge">
                                @if ($job->maccs->receipts<>null)
                                {{count($job->maccs->receipts->files($job->maccs->receipts->copy))}}
                                @else
                                0
                                @endif
                            </span>
                        </a>
                    </div>
                    {{-- <div class="col-md-2 form-group">
                        <label for="">Expire Date</label>
                        <input type="text"  class="form-control" value="{{$job->maccs->receipts->expire_date}}">
                    </div> --}}
                    <div class="col-md-2 form-group">
                        <label for="">Receive Date</label>
                        <input type="text" class="form-control" value="{{$job->maccs->receipts->date}}">
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>Attach Document</label>
                        <input type="text" class="form-control"value="{{$job->maccs<>null ? $job->maccs->attach_document  : '0'}}">
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
                    
                    <div class="col-md-3 form-group">
                        <a class="btn btn-primary" for=""> Original <span class="badge">{{count($job->maccs->undertakingLetter->files($job->maccs->undertakingLetter->original))}}</span></a>
                    </div>
                    <div class="col-md-3 form-group">
                        <a class="btn btn-primary"> Copy <span class="badge">{{count($job->maccs->undertakingLetter->files($job->maccs->undertakingLetter->copy))}}</span></a>
                    </div>
                    
                    <div class="col-md-2 form-group">
                        <label for="">Expire Date</label>
                        <input type="text" class="form-control" value="{{$job->maccs->undertakingLetter->expire_date}}">
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="">Receive Date</label>
                        <input type="text" class="form-control" value="{{$job->maccs->undertakingLetter->date}}">
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
                {{-- <div class="panel panel-default"> --}}
                    <div class="panel-heading">
                        <div class="panel-title"> 
                            <label for="" style="margin-right:20px;"> Channel </label>
                            @if ($job->shipment->type<>"IMPORT" )
                                <select style="width:200px;height:30px;" >
                            @else
                                <select style="width:200px;height:30px;" required>
                            @endif
                                @if ($job->maccs<>null && $job->maccs->channel=="channel1" )
                                    <option value="channel1">Channel-1</option>
                                @elseif($job->maccs<>null && $job->maccs->channel=="channel2")
                                    <option value="channel2">Channel-2</option>
                                @elseif($job->maccs<>null && $job->maccs->channel=="channel3")
                                    <option value="channel3">Channel-3</option>
                                @else 
                                    <option value="">-Select </option>
                                @endif
                                </select>
                            </div>
                        </div>
                        {{-- <div class="panel-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">Custom Data</label>
                                </div>
                                @if ($job->maccs<>null && $job->maccs->customData<>null)
                                <div class="col-md-3 form-group">
                                    <a class="btn btn-primary">Original 
                                        <span class="badge">
                                            @if ($job->maccs->customData<>null)
                                            {{count($job->maccs->customData->files($job->maccs->customData->original))}}
                                            @else
                                            0
                                            @endif
                                        </span>
                                    </a>
                                </div>
                                <div class="col-md-3 form-group">
                                    <a class="btn btn-primary">Copy 
                                        <span class="badge">
                                            @if ($job->maccs <>null && $job->maccs->customData<>null)
                                            {{count($job->maccs->customData->files($job->maccs->customData->copy))}}
                                            @else
                                            0
                                            @endif
                                            
                                        </span>
                                    </a>
                                </div>
                                
                                <div class="col-md-2 form-group">
                                    <label for="">Expire Date</label>
                                    <input type="text" class="form-control" value="{{$job->maccs->customData->expire_date}}">
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="">Receive Date</label>
                                    <input type="text" class="form-control" value="{{$job->maccs->customData->date}}">
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="">Physical Letter </label>
                                </div>
                                @if ($job->maccs<>null && $job->maccs->physicalLetter<>null)
                                
                                <div class="col-md-3 form-group">
                                    <a class="btn btn-primary">Original <span class="badge">{{count($job->maccs->physicalLetter->files($job->maccs->physicalLetter->original))}}</span></a>
                                </div>
                                <div class="col-md-3 form-group">
                                    <a class="btn btn-primary">Copy <span class="badge">{{count($job->maccs->physicalLetter->files($job->maccs->physicalLetter->copy))}}</span></a>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="">Expire Date</label>
                                    <input type="text" class="form-control" value="{{$job->maccs->physicalLetter->expire_date}}">
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="">Receive Date</label>
                                    <input type="text" class="form-control" value="{{$job->maccs->physicalLetter->date}}">
                                </div>
                                
                                @endif
                            </div>
                        </div> --}}
                    </div>
                    @if ($job->shipment->type<>"IMPORT" )
                    <div class="panel panel-default" hidden>
                        @else
                        <div class="panel panel-default">
                            @endif
                            {{-- <div class="panel panel-default"> --}}
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
                                        @if ($job->maccs<>null && $job->maccs->ros<>null)
                                        
                                        <div class="col-md-3 form-group">
                                            <a class="btn btn-primary">Original <span class="badge">{{count($job->maccs->ros->files($job->maccs->ros->original))}}</span></a>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <a class="btn btn-primary">Copy <span class="badge">{{count($job->maccs->ros->files($job->maccs->ros->copy))}}</span></a>
                                        </div>
                                        
                                        <div class="col-md-2 form-group">
                                            <label for="">Expire Date</label>
                                            <input type="text" class="form-control" value="{{$job->maccs->ros->expire_date}}">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label for="">Receive Date</label>
                                            <input type="text" class="form-control" value="{{$job->maccs->ros->date}}">
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
                    </div>
                    <div class="box-footer">
                        <a href="javascript:history.back();" class="btn btn-warning">Close</a>
                        <a href="/admin/jobs/process2/{{$job->id}}/edit" class="btn btn-primary pull-right">Edit</a>
                    </div>
                </div>
                @endsection