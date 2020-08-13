<div class="box box-success">
        <div class="box-header bg-success">
            <label for="">Supplement <span class="text-white"></label>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    @if ($job->supplement_service<>null &&$job->supplement_service->services()<>null&& count($job->supplement_service->services())>0)
                    
                    @foreach ($job->supplement_service->services() as$key => $service)
                         {{'('.($key+1).')'. $service->name}} &nbsp; 
                    @endforeach
                    @else
                        ~
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                 <label for="">Commodity</label>
                 <input type="text" class="form-control" value="{{$job->shipment<>null?$job->shipment->commodity:"~"}}" readonly>
                </div>
                <div class="col-md-2 form-group">
                    <label for="">PKGS</label>
                    <input type="text" class="form-control" value="{{$job->shipment<>null?$job->shipment->pkgs:"~"}}" readonly>
                </div>
                <div class="col-md-2 form-group">
                    <label for="">KGS</label>
                    <input type="text" class="form-control" value="{{$job->shipment<>null?$job->shipment->kgs:"~"}}" readonly>
                </div>
                <div class="col-md-3 form-group">
                    <label for="">Country</label>
                    <input type="text" class="form-control" value="{{$job->shipment<>null?$job->shipment->pols->country:"~"}}" readonly>
                </div>
                <div class="col-md-2 form-group">
                    <label for="">Date</label>
                    <input type="text" class="form-control" value="{{$job->shipment<>null?$job->shipment->date:"~"}}" readonly>
                </div>
            </div>
        </div>
    </div>