@extends('la.layouts.app')

@section('htmlheader_title')
    Process1 View
@endsection
@section("contentheader_title", "Process 1")
@section("download_button")
  <span style="font-size: 16px;"> Download for process1 files : </span><a href="/admin/processes1/job/{{$job->id}}/files/download" class="btn btn-sm btn-warning"><i class="fa fa-download"></i></a>
@endsection
@section('main-content')
<div class="box box-success">
    <div class="box-header bg-success">
        <label for="">Job Profile</label>
    </div>
    <div class="box-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Job Code.</label>
                        <input type="text"  class="form-control" value="{{$job->job_no}}" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Contact Person</label>
                        <input type="text" class="form-control" value="{{$job->contact_person}}" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="text" class="form-control" value="{{$job->date}}" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Service Type</label>
                        @if ($job->job_service_type<>"self")
                        <input type="text" class="form-control" value="Outsource" readonly>
                        @else
                        <input type="text" class="form-control" value="Self Service" readonly>
                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Customer</label>
                        <input type="text" class="form-control" value="{{$job->customer<>null?$job->customer->name:'~'}}" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Importer/Exporter</label>
                        <input type="text" class="form-control" value="{{$job->impexp<>null?$job->impexp->name:"~"}}" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Type</label>
                      
                        <input type="text" class="form-control" value="{{$job->shipment<>null?$job->shipment->type:"~"}}" readonly>
                       
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Transport Mode</label>
                        <input type="text" class="form-control" value="{{$job->shipment<>null?$job->shipment->transport:"~"}}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="">Customer Clearance</label>
                    @if ($job->custom_clearance<>0)
                        <input type="text" class="form-control" value="{{$job->custom_clearance_service<>null?$job->custom_clearance_service->name:"~"}}" readonly>
                    @else
                        <input type="text" class="form-control" value="None" readonly>
                    @endif
                </div>
                <div class="col-md-3 form-group">
                    <label for="">Trucking</label>
                    @if ($job->trucking<>0)
                        <input type="text" class="form-control" value="{{$job->trucking_service<>null?$job->trucking_service->name:"~"}}" readonly>
                    @else
                        <input type="text" class="form-control" value="None" readonly>
                    @endif
                </div>
                {{-- <div class="col-md-3 form-group">
                    <label for="">Supplement</label>
                    @if ($job->supplement<>0)
                        <input type="text" class="form-control" value="{{$job->supplement_service->name}}" readonly>
                    @else
                        <input type="text" class="form-control" value="None" readonly>
                    @endif
                </div> --}}
            </div>
        </div>
</div>
@if ($job->custom_clearance<>0 || $job->supplement<>0)  
    @include('la.process.compulsory')
@endif
@endsection