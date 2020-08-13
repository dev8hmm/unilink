@extends("la.layouts.app")

@section("contentheader_title", "Jobs")
@section("contentheader_description", "Jobs listing")
@section("section", "Jobs")
@section("sub_section", "Listing")
@section("htmlheader_title", "Jobs Listing")

@section("headerElems")
@la_access("Jobs", "create")
<label >Total Job : <span class="text-danger" style="font-size:18px;">{{count($jobs)}}</span></label> &emsp;
<a href="/admin/jobs" class="btn btn-sm btn-danger">All</a>
<a href="/admin/jobs?type=complete" class="btn btn-sm btn-danger">Completed</a>
<button class="btn btn-sm btn-warning" id="btn-filter-open">Filter</button> &nbsp;
<a href="/admin/jobs/create" class="btn btn-success btn-sm pull-right">Add Job</a>
@endla_access
@endsection

@section("main-content")

<div class="box box-warning" id="filter-form" hidden>
        <form action="/admin/search_jobs" method="get" style="margin-top:-13px;">
            {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
    <div class="box-header bg-warning">
        <label >Filter Search </label>
    </div>
    <div class="box-body">
            <div class="row">
                <div class="col-md-3 form-group">
                    <label>Select Type</label><br>
                    <div class="btn-group btn-group-toggle " data-toggle="buttons"  id="option_customer" >
                        <label class="btn btn-success active">
                            <input type="radio" name="cust_ie" value="customer" autocomplete="off" checked> Customer
                        </label>
                        <label class="btn btn-success" id="option_ie">
                            <input type="radio" name="cust_ie"  value="ie" autocomplete="off"> Importer/Exporter
                        </label>
                    </div>
                </div>
                <div class="col-md-3 form-group">
                    <label>Select Company</label>
                    <select name="company_id" class="select2 form-control" id="company_id" rel="select2">
                        <option value="">-Select Company</option>
                        @if (isset($customers))
                        @foreach ($customers as $com)
                            <option value="{{$com->id}}">{{$com->name}}</option>                            
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <label>From Date</label>
                    <div class="input-group date">
                            <input class="form-control" placeholder="Enter Date"  name="from_date" type="text" >
                            <span class="input-group-addon input_dt">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                </div>
                <div class="col-md-2 form-group">
                    <label>To Date</label>
                    <div class="input-group date">
                            <input class="form-control" placeholder="Enter Date"  name="to_date" type="text" >
                            <span class="input-group-addon input_dt">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                </div>
                <div class="col-md-2 form-group">
                    <label>Order Job No.</label>
                    <div class="btn-group btn-group-toggle " data-toggle="buttons">
                        <label class="btn btn-success active">
                            <input type="radio" name="orderJob" id="option1" value="asc" autocomplete="off" checked> ASC
                        </label>
                        <label class="btn btn-success">
                            <input type="radio" name="orderJob" id="option2" value="desc" autocomplete="off"> DESC
                        </label>
                    </div>
                </div>
            </div>
    </div>
    <div class="box-footer">
        <a class="btn btn-sm btn-warning" id="btn-filter-close">Close</a>
        <button type="submit" class="btn btn-sm btn-success pull-right">Search</button>
    </div>
</form> 
</div>

<div class="box box-success">
    <div class="box-body">
        <table class="table table-bordered">
            <thead>
                <tr class="success">
                    <th>NO.</th>
                    <th>Job No.</th>
                    <th>Type</th>
                    <th>Contact Person </th>
                    <th>Customer </th>
                    <th>Importer/Exporter </th>
                    <th>Date</th>
                    <th width="19%">Process</th>
                    <th width="14%">Actions</th>
                </tr>
            </thead>
            <tbody>
            @if (count($jobs)>0) 
                @foreach ($jobs as $key => $job)
                <tr >
                    <td>{{$key+1}}</td>
                     <td><a href="/admin/jobs/{{$job->id}}">{{$job->job_no}}</a></td>
                     <td>{{$job->shipment<>null?$job->shipment->type:"~"}}/{{$job->shipment<>null?$job->shipment->transport:"~"}}</td>
                     <td>{{$job->contact_person}}</td>
                    <td><a href="/admin/companies/{{$job->customer_id}}">{{$job->customer<>null?$job->customer->name:"~"}}</a></td>
                    <td><a href="/admin/companies/{{$job->imp_exp_id}}">{{$job->impexp<>null?$job->impexp->name:"~"}}</a></td>
                    <td>{{$job->date}}</td>
                    <td>
                            
                        @if ($job->process>0)
                        @for ($i = 1; $i <= $job->process; $i++)
                             @if ($i==3 && $job->fieldoperation()->where('short','actual_date')->first()->value=="")
                               <span class="d-inline" {{$i<3?$p['p12']:$p['p'.$i]}}> <a href="/admin/jobs/process{{$i}}/{{$job->id}}/show"  class="btn btn-sm btn-warning">P{{$i}}</a> </span>
                             @else 
                             <span class="d-inline" {{$i<3?$p['p12']:$p['p'.$i]}}>  <a href="/admin/jobs/process{{$i}}/{{$job->id}}/show"  class="btn btn-sm btn-default">P{{$i}}</a> </span>
                             @endif
                        @endfor
                        @if ($i<6)
                            @if ($i<3)
                            <span class="d-inline" {{$i<3?$p['p12']:$p['p'.$i]}}> <a href="/admin/jobs/process{{$i}}/{{$job->id}}" class="btn btn-sm btn-success">P{{$i}}</a> </span> 
                            @else
                            <span class="d-inline" {{$i<3?$p['p12']:$p['p'.$i]}}>  <a href="/admin/jobs/process{{$i}}/{{$job->id}}" class="btn btn-sm btn-success">P{{$i}}</a>  </span>
                            @endif
                        @endif
                    @else   
                        <a href="/admin/jobs/process1/{{$job->id}}" class="btn btn-sm btn-success">P1</a>  
                    @endif
                    </td>
                    <td>
                        @if ($job->process<1 || $job->process==null)
                                <a href="/admin/jobs/{{$job->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                        @endif  
                                <a class="btn btn-sm btn-danger btn-job-delete" data-id="{{$job->id}}" data-token="{{csrf_token()}}"  data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                <a href="/admin/jobs/export_profile/{{$job->id}}" class="btn  btn-sm btn-success" target="_blank" data-toggle="tooltip" data-placement="top" title="Profile"><i class="fa fa-download"></i></a>
                                {{-- @if ($job->process>4) --}}
                                    <a href="/admin/jobs/document_collect/{{$job->id}}" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Collect Doc">
                                        <i class="fa fa-download"></i>
                                    </a>
                                {{-- @endif --}}
                    </td>
                </tr>
                @endforeach
                @else
                    <tr>
                        <th colspan="8" ><h4  style="text-align:center;">Data is empty yet!</h4></th>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="box-footer text-right">
        {{ $jobs->appends(request()->query())->links() }}
    </div>
</div>

    @endsection
    
    @push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
    <style>
    hidden{
        display: none !important;
    }
    </style>
    @endpush
    
    @push('scripts')
    <script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
    <script>
        $(function () {
            $('#btn-filter-open').click(function(){
                $('#filter-form').show(500);
            });
            $('#btn-filter-close').click(function(){
                $('#filter-form').hide(500);
            });
            

           $('.btn-job-delete').on('click',function(){
                var id=$(this).data('id');
                var token=$(this).data('token');
                if(confirm('Are you sure want to delete this job'))
                {
                    $.ajax({
                        type:"delete",
                        url:"/admin/jobs/"+id,
                        data:{"_token": token,},
                        success:function(data)
                        {
                            if(data.status=="success")
                            {
                                alert("Delete porcessing is successful!");
                                location.reload();
                            }
                            else{
                                alert("Can not delete this job.");
                            }
                        }
                    });
                }
           });
           
           $('#option_customer').click(function(){
            $.ajax({
                    type:'get',
                    url:'/admin/getAllCustomers',
                    success:function(data)
                    {
                        $("#company_id").empty();
                        $("#company_id").html("<option value=''>-Select Company</option>");
                
                        $.each(data, function (i, item) {
                            $('#company_id').append($('<option>', {
                                    value: item.id,
                                    text: item.name
                                }));
                        });
                    }
                });
            });
            
            $('#option_ie').click(function(){
            $.ajax({
                    type:'get',
                    url:'/admin/getAllIEs',
                    success:function(ies)
                    {
                        $("#company_id").empty();
                        $("#company_id").html("<option value=''>-Select Company</option>");
                
                        $.each(ies, function (i, item) {
                            $('#company_id').append($('<option>', {
                                    value: item.id,
                                    text: item.name
                                }));
                        });
                    }
                });
            });
        });
        function addCompany(data) {
            $("#company_id").empty();
                $("#company_id").html("<option value=''>-Select Company</option>");
                
                        $.each(data, function (i, item) {
                            $('#company_id').append($('<option>', {
                                    value: item.id,
                                    text: item.name
                                }));
                        });
            }
    </script>
    @endpush
    