@extends('la.layouts.app')
@section("contentheader_title", "Job Center")
@section("contentheader_description", "Job Center listing")
@section("section", "Job Center")
@section("sub_section", "Listing")
@section("htmlheader_title", "Job Center Listing")
@section('htmlheader_title')
Job Center
@endsection
@section("headerElems")
<a href="/admin/jobcenters" class="btn btn-sm btn-danger">All</a>
<a href="/admin/jobcenters?type=complete" class="btn btn-sm btn-danger">Completed</a>
<button id="btn-filter" class="btn btn-sm btn-warning">Filter</button>
<form action="/admin/jobcenters/search_job"  method="post" style="display:inline-block">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <label>Search Job : </label>
    <input type="text" name="job_no"  style="width:150px;height:30px;color:black;">
    <button type="submit" class="btn btn-sm btn-success">Search</button>
</form>
@endsection
@section('main-content')
<div class="box box-warning" id="filter-form" hidden>
    <form action="/admin/jobcenters/filter_search" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="box-header bg-warning">
            <label>Filter Job </label>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-2 form-group">
                    <label>Priority Job</label>
                    <select name="priority" class="form-control select2" rel="select2">
                        @if ($request<>null)
                        @if ($request["priority"]=="any")
                        <option value="any">Any</option>
                        @endif
                        @if ($request["priority"]=="urgent")
                        <option value="urgent">Urgent</option>
                        @endif
                        @if ($request["priority"]=="normal")
                        <option value="normal">Normal</option>
                        @endif
                        @endif
                        <option value="any">Any</option>
                        <option value="urgent">Urgent</option>
                        <option value="normal">Normal</option>
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <label> Status Job</label>
                    <select name="job_status" class="select2" rel="select2">
                        
                        @if ($request<>null)
                        @if ($request["job_status"]=="any")
                        <option value="any">Any</option>
                        @endif
                        @if ($request["job_status"]=="finish")
                        <option value="finish">Finished</option>
                        @endif
                        @if ($request["job_status"]=="close")
                        <option value="close">Closed</option>
                        @endif
                        @if ($request["job_status"]=="terminate")
                        <option value="terminate">Terminated</option>
                        @endif
                        @endif
                        
                        <option value="any">Any</option>
                        <option value="finish">Finished</option>
                        <option value="close">Closed</option>
                        <option value="terminate">Terminated</option>
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <label>Process</label>
                    <select name="process" class="form-control select2" rel="select2">
                        @if ($request<>null)
                        @if ($request['process']==1)
                        <option value="1">&lt; =P1</option>
                        @elseif($request['process']==2)
                        <option value="2">&lt; =P2</option>
                        @elseif($request['process']==3)
                        <option value="3">&lt; =P3</option>
                        @elseif($request['process']==4)
                        <option value="4">&lt; =P4</option>
                        @elseif($request['process']==5)
                        <option value="5">&lt; =P5</option>
                        @else
                        <option value="any">Any</option>
                        @endif
                        
                        @endif
                        <option value="any">Any</option>
                        <option value="1">&lt; =P1</option>
                        <option value="2">&lt; =P2</option>
                        <option value="3">&lt; =P3</option>
                        <option value="4">&lt; =P4</option>
                        <option value="5">&lt; =P5</option>
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <label>Actual Date</label>
                    <select name="actual_receive_date" class="select2" rel="select2" >
                        @if ($request<>null)
                        @if ($request["actual_receive_date"]=="yes")
                        <option value="yes">Exist</option>
                        @elseif($request["actual_receive_date"]=="no")
                        <option value="no">Empty</option>
                        @else
                        <option value="any">Any</option>
                        @endif
                        @endif
                        <option value="any">Any</option>
                        <option value="yes">Exist</option>
                        <option value="no">Empty</option>
                    </select>
                </div>
                
                <div class="col-md-2 form-group">
                    <label>Order By Job No.</label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-success active">
                            <input type="radio" name="orderByJob" value="asc" id="option1" autocomplete="off" checked> ASC
                        </label>
                        <label class="btn btn-success">
                            <input type="radio" name="orderByJob" value="desc" id="option2" autocomplete="off"> DESC
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <a id="btn-close-filter" class="btn btn-sm btn-warning">Close</a>
            <button type="submit" class="btn btn-sm btn-success pull-right">Search</button>
        </div>
    </form>
</div>
<div class="box box-success">
    <div class="box-header bg-success">
        <label for="">Job Center</label>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover ">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Job No.</th>
                    <th {{$p['p12']}}>Process 1</th>
                    <th  {{$p['p12']}}>Process 2</th>
                    <th {{$p['p3']}}>Process 3</th>
                    <th {{$p['p4']}}>Process 4</th>
                    <th {{$p['p5']}}>Process 5</th>
                    <th>Status </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $key=>$job)
                @php
                $from = new DateTime($job->date);
                $to = new DateTime($job->shipment->eta);
                $diff = $to->diff($from)->format("%a");
                @endphp
                <tr>
                    <td>{{$key+1}}</td>
                    @if($diff<=5)
                    <td><b class="text-danger">{{$job->job_no}}</b></td>
                    @else
                    <td>{{$job->job_no}}</td>
                    @endif
                    <td {{$p['p12']}}>
                        @if ($job->process<>null && $job->process>=1)
                        <a href="/admin/jobs/process1/{{$job->id}}/show" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                        @if ($job->process<5)
                        <a href="/admin/jobs/process1/{{$job->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                        @endif
                        @else
                        <a href="/admin/jobs/process1/{{$job->id}}" class="btn btn-sm btn-primary">Add Data</a>
                        @endif
                    </td>
                    <td {{$p['p12']}}>  
                        @if ($job->process<>null && $job->process>=2)
                        <a  href="/admin/jobs/process2/{{$job->id}}/show" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                        @if ($job->process<5)
                        <a href="/admin/jobs/process2/{{$job->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                        @endif
                        @else
                        @if ($job->process+1<2)
                        <a class="btn btn-sm btn-primary" disabled="true">Add Data</a>     
                        @else
                        <a href="/admin/jobs/process2/{{$job->id}}" class="btn btn-sm btn-primary" >Add Data</a>
                        @endif
                        @endif
                    </td>
                    @php
                    $actual=$job->fieldoperation()->where('short','actual_date')->first();
                    @endphp
                    <td {{$p['p3']}}>
                        @if ($job->process<>null && $job->process>=3)
                        <a href="/admin/jobs/process3/{{$job->id}}/show" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                        @if ($job->process<5)
                        <a href="/admin/jobs/process3/{{$job->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                        @endif
                        @else
                        @if ($job->process+1<3)
                        <a class="btn btn-sm btn-primary" disabled="true">Add Data</a></td>      
                        @else
                        <a href="/admin/jobs/process3/{{$job->id}}" class="btn btn-sm btn-primary" >Add Data</a></td>
                        @endif
                        @endif
                        @if ($actual<>null && $actual->value=="")
                        <span class="text-danger">*</span>
                        @endif
                    </td>
                    <td {{$p['p4']}}>
                        @if ($job->process<>null && $job->process>=4)
                        <a href="/admin/jobs/process4/{{$job->id}}/show" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                        @if ($job->process<5)
                        <a href="/admin/jobs/process4/{{$job->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                        @endif
                        {{-- <a href="/admin/jobs/export_process4/{{$job->id}}" class="btn btn-success btn-sm"><i class="fa fa-download"></i></a> --}}
                        @else
                        @if ($job->process+1<4)
                        <a class="btn btn-sm btn-primary" disabled="true">Add Data</a></td>      
                        @else
                        <a href="/admin/jobs/process4/{{$job->id}}" class="btn btn-sm btn-primary" >Add Data</a></td>
                        @endif
                        @endif
                    </td>
                    <td {{$p['p5']}}>
                        @if ($job->process<>null && $job->process>=5)
                        <a href="/admin/jobs/document_collect/{{$job->id}}" class="btn btn-success btn-sm"><i class="fa fa-download"></i></a>
                        @else
                        @if ($job->process+1<5)
                        <a class="btn btn-sm btn-primary" disabled="true">Add Data</a></td>      
                        @else
                        <a href="/admin/jobs/process5/{{$job->id}}" class="btn btn-sm btn-primary" >Add Data</a></td>
                        @endif
                        @endif
                    </td>
                    <td>
                        @if ($job->process<>null && $job->process>=5)
                        <label class="text-success" style="font-weight:bold;">Completed</label>
                        @else
                        <label class="" style="font-weight:bold;">Ongoing</label>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $("#btn-close-filter").click(function(){
            $('#filter-form').hide(500); 
        });
        $('#btn-filter').click(function(){
            $('#filter-form').show(500); 
        });
    });
</script>
@endpush