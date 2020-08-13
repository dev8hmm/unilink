@extends("la.layouts.app")

@section("contentheader_title", "Document")
@section("contentheader_description", " Collection")
@section("section", "Document")
@section("sub_section", "Receiving")
@section("htmlheader_title", "Document Collection")
@section("main-content")
@if ($success<>true)
<div class="alert alert-danger" role="alert">
    <label> Cargo receipt(s) are unsuccess in Process 4 (Cargo receipt)</label> 
    <a href="/admin/jobs/process4/{{$job->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit">Edit</i></a>
</div>
@endif
@include('la.jobs.jobprofile')
<div class="box box-success">
    <div class="box-header bg-success">
        <label>Document Collect</label>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Compulsory (Process 1)</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-sm table-striped">
                            <thead class="bg-primary">
                                <tr>
                                    <th>Name </th>
                                    <th width="25%">Original</th>
                                    <th width="25%">Copy</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($job->compulsory<>null)
                                <tr>
                                    <td><label>Letter Head</label></td>
                                    <td>{{$job->compulsory->letterHead<>null?count($job->compulsory->letterHead->files($job->compulsory->letterHead->original)):0}}</td>
                                    <td>{{$job->compulsory->letterHead<>null?count($job->compulsory->letterHead->files($job->compulsory->letterHead->copy)):0}}</td>
                                </tr>
                                
                                <tr>
                                    <td><label>Bill Registration</label></td>
                                    <td>{{$job->compulsory->billRegistration<>null?count($job->compulsory->billRegistration->files($job->compulsory->billRegistration->original)):0}}</td>
                                    <td>{{$job->compulsory->billRegistration<>null?count($job->compulsory->billRegistration->files($job->compulsory->billRegistration->copy)):0}}</td>
                                </tr>
                                
                                <tr>
                                    <td><label>Commericial Invoice</label></td>
                                    <td>{{$job->compulsory->commericialInvoice<>null?count($job->compulsory->commericialInvoice->files($job->compulsory->commericialInvoice->original)):0}}</td>
                                    <td>{{$job->compulsory->commericialInvoice<>null?count($job->compulsory->commericialInvoice->files($job->compulsory->commericialInvoice->copy)):0}}</td>
                                </tr>
                                
                                <tr>
                                    <td><label>Packing List</label></td>
                                    <td>{{$job->compulsory->packingList<>null?count($job->compulsory->packingList->files($job->compulsory->packingList->original)):0}}</td>
                                    <td>{{$job->compulsory->packingList<>null?count($job->compulsory->packingList->files($job->compulsory->packingList->copy)):0}}</td>
                                </tr>
                                
                                <tr>
                                    <td><label>Sale Contract</label></td>
                                    <td>{{$job->compulsory->saleContract<>null?count($job->compulsory->saleContract->files($job->compulsory->saleContract->original)):0}}</td>
                                    <td>{{$job->compulsory->saleContract<>null?count($job->compulsory->saleContract->files($job->compulsory->saleContract->copy)):0}}</td>
                                </tr>
                                <tr>
                                    <td><label>Licence</label></td>
                                    <td>{{$job->compulsory->licence<>null?count($job->compulsory->licence->files($job->compulsory->licence->original)):0}}</td>
                                    <td>{{$job->compulsory->licence<>null?count($job->compulsory->licence->files($job->compulsory->licence->copy)):0}}</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Document Receiving (Process 1)</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-sm table-striped">
                            <thead class="bg-primary">
                                <tr>
                                    <th>Name </th>
                                    <th width="25%">Original</th>
                                    <th width="25%">Copy</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($job->service_details as $service)
                                <tr>
                                    <td><label>{{$service->name}}</label></td>
                                    <td>
                                        {{$service->service_data<>null?count($service->service_data->files($service->service_data->original)):0}}
                                    </td>
                                    <td>
                                        {{$service->service_data<>null?count($service->service_data->files($service->service_data->copy)):0}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Maccs Data (Process 2)</h3>
                    </div>
                    <div class="panel-body">
                            <table class="table table-sm table-striped">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Name </th>
                                            <th width="25%">Original</th>
                                            <th width="25%">Copy</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><label> Receipt Data</label></td>
                                            <td>{{$job->maccs->receipts<>null?count($job->maccs->receipts->files($job->maccs->receipts->original)):0}}</td>
                                            <td>{{$job->maccs->receipts<>null?count($job->maccs->receipts->files($job->maccs->receipts->copy)):0}}</td>
                                        </tr>
                                        <tr>
                                            <td><label> Undertaking letter </label></td>
                                            <td>{{$job->maccs->undertakingLetter<>null?count($job->maccs->undertakingLetter->files($job->maccs->undertakingLetter->original)):0}}</td>
                                            <td>{{$job->maccs->undertakingLetter<>null?count($job->maccs->undertakingLetter->files($job->maccs->undertakingLetter->copy)):0}}</td>
                                        </tr>
                                        <tr>
                                            <td><label> RO Document</label></td>
                                            <td>{{$job->maccs->ros<>null?count($job->maccs->ros->files($job->maccs->ros->original)):0}}</td>
                                            <td>{{$job->maccs->ros<>null?count($job->maccs->ros->files($job->maccs->ros->copy)):0}}</td>
                                        </tr>
                                    </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                    <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">field Operation (Process 3)</h3>
                            </div>
                            <div class="panel-body">
                                    <table class="table table-sm table-striped">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th>Name </th>
                                                    <th width="25%">Original</th>
                                                    <th width="25%">Copy</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($job->fieldoperation as $item)
                                                   @if ($item->type=="file")
                                                    <tr>
                                                        <td><label>{{$item->name}}</label></td>
                                                        <td>{{$item->file<>null?count($item->file->files($item->file->original)):0}}</td>
                                                        <td>{{$item->file<>null?count($item->file->files($item->file->copy)):0}}</td>
                                                    </tr>
                                                   @endif
                                               @endforeach
                                               
                                            </tbody>
                                    </table>
                            </div>
                        </div>

                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Cargo Receipt (Process 4)</h3>
                                </div>
                                <div class="panel-body">
                                        <table class="table table-sm table-striped">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th>Name </th>
                                                        <th width="25%">Original</th>
                                                        <th width="25%">Copy</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                            <td><label> Detail Packing List</label></td>
                                                            <td>{{($job->cargoreceipts<>null && $job->cargoreceipts->packingList)? count($job->cargoreceipts->packingList->files($job->cargoreceipts->packingList->original)):0}}</td>
                                                            <td>{{($job->cargoreceipts<>null && $job->cargoreceipts->packingList)?count($job->cargoreceipts->packingList->files($job->cargoreceipts->packingList->copy)):0}}</td>
                                                        </tr>
                                                        @if ($job->shipment->type<>"IMPORT")
                                                        <tr>
                                                            <td><label> Loading Plan</label></td>
                                                            <td>{{($job->cargoreceipts<>null && $job->cargoreceipts->loadingPlan<>null)? count($job->cargoreceipts->loadingPlan->files($job->cargoreceipts->loadingPlan->original)):0}}</td>
                                                            <td>{{($job->cargoreceipts<>null && $job->cargoreceipts->loadingPlan<>null)?count($job->cargoreceipts->loadingPlan->files($job->cargoreceipts->loadingPlan->copy)):0}}</td>
                                                        </tr>
                                                        @endif
                                                </tbody>
                                        </table>
                                </div>
                            </div>
            </div>
        </div>
        
    </div>
    <div class="box-footer">
        <a href="javascript:history.back()" class="btn btn-warning">Cancel</a>
        {!!Form::open(array('url' => 'admin/jobs/process5/doc_receive/'.$job->id)) !!} 
        <button type="submit" class="btn btn-success pull-right btn-submit">Complete Job</button>
        {!!Form::close()!!}
    </div>
</div>
@endsection
@push('scripts')
    <script>
    $(document).ready(function(){
        $('.btn-submit').click(function(e){
            if(!confirm("Are you sure want to complete this job"))
            {
                e.preventDefault();
            }
        });
    });
    </script>
@endpush