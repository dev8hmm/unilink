@extends('la.layouts.app')

@section('htmlheader_title')
Job View
@endsection

@section('main-content')
<div id="page-content" class="profile2">
    
    
    <ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
        <li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/jobs') }}" data-toggle="tooltip" data-placement="right" title="Back to Jobs"><i class="fa fa-chevron-left"></i></a></li>
        <li class="active"><a role="tab" data-toggle="tab" class="active" href="#tab-general-info" data-target="#tab-info"><i class="fa fa-bars"></i> General Info</a></li>
    </ul>
    
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active fade in" id="tab-info">
            <div class="tab-content">
                <div class="panel infolist">
                    <div class="panel-body">
                        @include('la.jobs.jobprofile')
                        
                       <div class="box box-success">
                           <div class="box-header bg-success">
                               <label>Shipment Detail</label>
                           </div>
                           <div class="box-body">
                                <div class="row">
                                    <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Date <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value="{{$job->shipment<>null ? $job->shipment->date:null}}">
                                            </div>   
                                        </div>
                                        <div class="col-md-2"></div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                                <label>VOL</label>
                                                <input type="text" class="form-control" value="{{$job->shipment<>null ? $job->shipment->vol:null}}">
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">POL <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{$job->shipment->pols<>null ? $job->shipment->pols->name:null}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">ETA <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{$job->shipment<>null ? $job->shipment->eta:null}}">
                                        </div>   
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Commodity <span class="text-danger">*</span></label>
                                            <input type="text" name="commodity" id="commodity" class="form-control" value="{{$job->shipment<>null ? $job->shipment->commodity:null}}" aria-describedby="helpId">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="pkgs">PKGS</label>
                                            <input type="number" value="{{$job->shipment<>null ? $job->shipment->pkgs:null}}" class="form-control" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="kgs">KGS</label>
                                            <input type="number"value="{{$job->shipment<>null ? $job->shipment->kgs:null}}" class="form-control" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">POD <span class="text-danger">*</span></label>
                                            <input type="text"  class="form-control" value="{{$job->shipment->pods<>null ? $job->shipment->pods->name:null}}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">ETD <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="{{$job->shipment<>null ? $job->shipment->etd:null}}">
                                        </div>   
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            @if ($job->shipment->transport=="AIR")
                                            <label>Air Line</label>
                                            @else 
                                            <label>Shipping Line</label>
                                            @endif
                                        
                                            <input type="text" class="form-control" value="{{$job->shipment->lines($job->shipment->transport)->first()<>null?$job->shipment->lines($job->shipment->transport)->first()->name:"Empty"}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Code-No.</label>
                                            <input type="text" class="form-control"  value="{{$job->shipment->lines($job->shipment->transport)->first()<>null?$job->shipment->lines($job->shipment->transport)->first()->code:"Empty"}}-{{$job->shipment->vessel_no}}">
                                        </div>
                                    </div>
                                    
                                </div>
                           </div>
                       </div>
                       <div class="box box-success" style="padding-bottom:30px;">
                           <div class="box-header bg-success">
                            <label>Services</label>
                           </div>
                           <div class="box-body">
                               <div class="row">
                                   <div class="col-md-4">
                                       <div class="form-group">
                                         <label for="">Custom Clearance</label>
                                         <input type="text" class="form-control" value="{{$job->custom_clearance_service<>null ? $job->custom_clearance_service->name:"None"}}">
                                       </div>
                                   </div>
                                   <div class="col-md-4">
                                       <div class="form-group">
                                         <label for="">Trucking</label>
                                         <input type="text" class="form-control" value="{{$job->trucking_service<>null ? $job->trucking_service->name:"None"}}">
                                       </div>
                                   </div>
                                   <div class="col-md-4">
                                       <div class="form-group">
                                         <label for="">Supplement</label><br>
                                         @if ($job->supplement_service<>null && $job->supplement_service->services()<>null && count($job->supplement_service->services())>0)
                                         @foreach ($job->supplement_service->services() as $service)
                                             {{$service->name}}, &nbsp; 
                                         @endforeach
                                      @else
                                          ~
                                      @endif
                                         {{-- <input type="text" class="form-control" value="{{$job->supplement_service<>null ? $job->supplement_service->name:"None"}}"> --}}
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="box-footer text-right">
                               <a href="/admin/jobs" class="btn btn-warning">Cancel</a>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
