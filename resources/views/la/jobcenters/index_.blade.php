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
<form action="/admin/jobcenters/search_job"  method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
<label>Search Job : </label>
<input type="text" name="job_no"  style="width:150px;height:30px;color:black;">
<button type="submit" class="btn btn-sm btn-success">Search</button>
</form>
@endsection
@section('main-content')
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
                    <th>Process 1</th>
                    <th>Process 2</th>
                    <th>Process 3</th>
                    <th>Process 4</th>
                    <th>Process 5</th>
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
                    @if($diff<5)
                    <td style="background:#FC9797">{{$job->job_no}}</td>
                    @else
                    <td>{{$job->job_no}}</td>
                    @endif
                    <td>
                        @if ($job->process<>null && $job->process>=1)
                            <a href="/admin/jobs/process1/{{$job->id}}/show" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                            @if ($job->process<5)
                            <a href="/admin/jobs/process1/{{$job->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                            @endif
                        @else
                            <a href="/admin/jobs/process1/{{$job->id}}" class="btn btn-sm btn-primary">Add Data</a>
                        @endif
                    </td>
                    <!-- @if ($job->process>=2 && $job->maccs->receipts<>null)
                        @if ($job->maccs->receipts->original=="[]" || $job->maccs->receipts->date==null)
                            <td style="background:#FFEA8A">
                        @else
                            <td style="background:#99E955">                        
                        @endif
                    @else
                        <td>        
                    @endif -->
                  <td>
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
                        @if ($job->process>=3)
                            @php
                                $actual=$job->fieldoperation()->where('short','actual_date')->first();
                            @endphp
                            @if ($actual<>null && $actual->value=="")
                                <td style="background:#FFEA8A">
                            @else
                                <td style="background:#99E955">                        
                            @endif
                        @else <td>
                        @endif
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
                        </td>
                        <td>
                            @if ($job->process<>null && $job->process>=4)
                                <a href="/admin/jobs/process4/{{$job->id}}/show" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                @if ($job->process<5)
                                    <a href="/admin/jobs/process4/{{$job->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                @endif
                            @else
                            @if ($job->process+1<4)
                                <a class="btn btn-sm btn-primary" disabled="true">Add Data</a></td>      
                                @else
                                    <a href="/admin/jobs/process4/{{$job->id}}" class="btn btn-sm btn-primary" >Add Data</a></td>
                                @endif
                            @endif
                        </td>
                        <td>
                            @if ($job->process<>null && $job->process>=5)
                            <a class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
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
                            <label class="text-success" style="font-weight:bold;">Ongoing</label>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection