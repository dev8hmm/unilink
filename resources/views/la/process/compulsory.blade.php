{{-- Start Document Receiving --}}
<div class="box box-success">
        <div class="box-header bg-success">
            Compulsory Document Receiving
        </div>
        <div class="box-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Admin Document</h3>
                </div>
                <div class="panel-body">
                    @if ($job->customer<>null && $job->customer->files<>null)
                      
                    <div class="row">
                        <div class="col-md-2 form-group" style="padding-top:20px;">
                            <label for="">Company Registration </label>
                        </div>
                        <div class="col-md-3" style="padding-top:20px;">
                            <a class="btn btn-primary">Original 
                                <span class="badge">{{count($job->customer->files->files($job->customer->files->original))}}</span>
                            </a>
                        </div>
                        <div class="col-md-3" style="padding-top:20px;">
                            <a class="btn btn-primary">Copy 
                                <span class="badge">{{count($job->customer->files->files($job->customer->files->copy))}}</span>
                            </a>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="">Expire</label>
                            <input type="text"  class="form-control" value="{{$job->customer->files->expire_date}}" readonly>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="">Receive</label>
                            <input type="text" class="form-control" value="{{$job->customer->files->date}}" readonly>
                        </div>
                    </div>
                    @endif
                    @if ($job->impexp<>null && $job->impexp->files)
                    <div class="row">
                        <div class="col-md-2" style="padding-top:20px;">
                            <label for="">IE Registration </label>
                        </div>
                        <div class="col-md-3" style="padding-top:20px;">
                            <a class="btn btn-primary">Original 
                                <span class="badge">{{count($job->impexp->files->files($job->impexp->files->original))}}</span>
                            </a>
                        </div>
                        <div class="col-md-3" style="padding-top:20px;">
                            <a class="btn btn-primary">Copy
                                <span class="badge">{{count($job->impexp->files->files($job->impexp->files->copy))}}</span>
                            </a>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="">Expire</label>
                            <input type="text" class="form-control" value="{{$job->impexp->files->expire_date}}" readonly>
                        </div>
                        <div class="col-md-2 from-group">
                            <label for="">Receive</label>
                            <input type="text" class="form-control" value="{{$job->impexp->files->date}}" readonly>
                        </div>
                    </div>
                    <br>
                    @endif
                    @if ($job->compulsory<>null && $job->compulsory->letterHead)
                    <div class="row">
                        <div class="col-md-2">
                            <label for="">Letter Head </label>
                        </div>
                        <div class="col-md-3">
                            <a class="btn btn-primary">Original <span class="badge">{{$job->compulsory->letterHead<>null ? count($job->compulsory->letterHead->files($job->compulsory->letterHead->original)):0}}</span></a>
                        </div>
                        <div class="col-md-3">
                           <a class="btn btn-primary">Copy <span class="badge">{{ $job->compulsory->letterHead<>null ? count($job->compulsory->letterHead->files($job->compulsory->letterHead->copy)):0}}</span></a>
                        </div>
                        {{-- <div class="col-md-2 form-group">
                            <label for="">Expire</label>
                                <input type="text" class="form-control" value="{{$job->compulsory->letterHead->expire_date}}" readonly>
                                
                        </div> --}}
                        <div class="col-md-2 form-group">
                            <label for="">Receive</label>
                            <input type="text" class="form-control" value="{{$job->compulsory->letterHead->date}}" readonly>
                        </div>
                    </div> 
                    @endif
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Cargo Document</h3>
                </div>
                <div class="panel-body">
                    @if ($job->compulsory<>null && $job->compulsory->billRegistration<>null)
                    <div class="row">
                        <div class="col-md-2">
                            @php
                            switch ($job->shipment->type) {
                                case 'IMPORT':
                                if($job->shipment->transport<>"SEA")
                                {
                                    echo '<label>MAWB </label>';
                                }
                                else {
                                    echo '<label>MBL </label>';
                                }
                                break;
                                
                                case 'EXPORT':
                                if($job->shipment->transport<>"SEA")
                                {
                                    echo '<label>HAWB </label>';
                                }
                                else {
                                    echo '<label>HBL </label>';
                                }
                                break;
                                default:
                                # code...
                                break;
                            }
                            @endphp
                            
                        </div>
                        <div class="col-md-3">
                            {{-- <a class="btn btn-primary">Original <span class="badge">1</span></a> --}}
                            <a class="btn btn-primary">Original <span class="badge"> {{count($job->compulsory->billRegistration->files($job->compulsory->billRegistration->original))}} </span> </a>
                        </div>
                        <div class="col-md-3">
                                <a class="btn btn-primary">Copy <span class="badge"> {{count($job->compulsory->billRegistration->files($job->compulsory->billRegistration->copy))}} </span> </a>
                        </div>
                        {{-- <div class="col-md-2 form-group">
                            <label for="">Expire</label>
                            <input type="text" class="form-control" value="{{$job->compulsory->billRegistration->expire_date}}" readonly>
                        </div> --}}
                        <div class="col-md-2 form-group">
                            <label for="">Receive</label>
                            <input type="text" class="form-control" value="{{$job->compulsory->billRegistration->date}}" readonly>
                        </div>
                    </div>
                    @endif
                    <br>
                    <div class="row">
                        <div class="col-md-2"><label for="">Reference Number</label></div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" value="{{$job->compulsory->reference_no}}" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Clearance Document</h3>
                </div>
                <div class="panel-body">
                    @if ($job->shipment->type<>"IMPORT")
                    <div class="row">
                    @else
                    <div class="row" style="display:none;">
                    @endif
                    <div class="col-md-2"><label for="">Credit</label></div>
                    <div class="col-md-3">
                        <input type="text" value="{{$job->compulsory->credit}}" class="form-control" readonly>
                    </div>
                </div>
                @if ($job->compulsory->commericialInvoice<>null)
                    <div class="row">
                        <div class="col-md-2"><br>
                            <label for="">Commericial Invoice </label>
                        </div>
                        <div class="col-md-3"><br>
                           <a class="btn btn-primary"><span class="badeg">Original <span class="badge"> {{count($job->compulsory->commericialInvoice->files($job->compulsory->commericialInvoice->original))}}</span></span></a>
                        </div>
                        <div class="col-md-3"><br>
                            <a class="btn btn-primary"><span class="badeg">Copy <span class="badge">{{count($job->compulsory->commericialInvoice->files($job->compulsory->commericialInvoice->copy))}}</span> </span></a>
                        </div>
                        {{-- <div class="col-md-2 form-group">
                            <label for="">Expire</label>
                            <input type="text" class="form-control" value="{{$job->compulsory->commericialInvoice->expire_date}}" readonly>
                        </div> --}}
                        <div class="col-md-2 form-group">
                            <label for="">Receive</label>
                            <input type="text" class="form-control" value="{{$job->compulsory->commericialInvoice->date}}" readonly>
                        </div>
                    </div>
                    @endif
                    <br>
                    @if ($job->compulsory->packingList<>null)
                        
                    <div class="row">
                        <div class="col-md-2"><br>
                            <label for="">Packing List </label>
                        </div>
                        <div class="col-md-3"><br>
                           <a class="btn btn-primary">Original <span class="badge">{{count($job->compulsory->packingList->files($job->compulsory->packingList->original))}}</span></a>
                        </div>
                        <div class="col-md-3"><br>
                            <a class="btn btn-primary">Copy <span class="badge">{{count($job->compulsory->packingList->files($job->compulsory->packingList->copy))}}</span></a>
                        </div>
                        {{-- <div class="col-md-2 form-group">
                            <label for="">Expire</label>
                            <input type="text" class="form-control" value="{{$job->compulsory->packingList->expire_date}}" readonly>
                        </div> --}}
                        <div class="col-md-2 from-group">
                            <label for="">Receive</label>
                            <input type="text" class="form-control" value="{{$job->compulsory->packingList->date}}" readonly>
                        </div>
                    </div>
                    @endif
                    <br>
                    
                    @if ($job->compulsory->saleContract<>null)
                  
                    <div class="row">
                        <div class="col-md-2"><br>
                            <label for="">Sale Contract </label>
                        </div>
                        <div class="col-md-3"><br>
                            <a class="btn btn-primary">Original <span class="badge">{{count($job->compulsory->saleContract->files($job->compulsory->saleContract->original))}}</span></a>
                        </div>
                        <div class="col-md-3"><br>
                            <a class="btn btn-primary">Copy <span class="badge">{{count($job->compulsory->saleContract->files($job->compulsory->saleContract->copy))}}</span></a>
                        </div>
                        {{-- <div class="col-md-2">
                            <label for="">Expire</label>
                            <input type="text" class="form-control" value="{{$job->compulsory->saleContract->expire_date}}" readonly>
                        </div> --}}
                        <div class="col-md-2 from-group">
                            <label for="">Receive</label>
                            <input type="text" class="form-control" value="{{$job->compulsory->saleContract->date}}" readonly>
                        </div>
                    </div>
                    @endif
                    {{-- {{dd($job->compulsory->Licence->files($job->compulsory->Licence->original))}} --}}
                    @if ($job->compulsory->Licence<>null)
                    
                    <div class="row">
                        <div class="col-md-2"><br>
                            <label for="">Licence </label>
                        </div>
                        <div class="col-md-3"><br>
                            <a class="btn btn-primary">Original <span class="badge">{{count($job->compulsory->Licence->files($job->compulsory->Licence->original))}}</span></a>
                        </div>
                        <div class="col-md-3"><br>
                            <a class="btn btn-primary">Copy <span class="badge">{{count($job->compulsory->Licence->files($job->compulsory->Licence->copy))}}</span></a>
                        </div>
                        {{-- <div class="col-md-2">
                            <label for="">Expire</label>
                            <input type="text" class="form-control" value="{{$job->compulsory->licence->expire_date}}" readonly>
                        </div> --}}
                        <div class="col-md-2 from-group">
                            <label for="">Receive</label>
                            <input type="text" class="form-control" value="{{$job->compulsory->Licence->date}}" readonly>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="box-footer">
            <a href="javascript:history.back()" class="btn btn-warning">Close</a>
            <a href="/admin/jobs/process1/{{$job->id}}/edit" class="btn btn-primary pull-right">Edit</a>
        </div>
    </div>