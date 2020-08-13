<div class="box box-success">
        <input type="hidden" name="job_id" value="1">         
        <div class="box-header bg-success">
            <label for="">Job Profile</label>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Job Code.</label>
                        <input type="text" class="form-control" value="{{$job->job_no}}" readonly>
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
                            <input type="text" class="form-control" value="Self" readonly>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Customer</label>
                        <input type="text" class="form-control" value="{{$job->customer<>null?$job->customer->name:"~"}}" readonly>
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
        </div>
    </div>