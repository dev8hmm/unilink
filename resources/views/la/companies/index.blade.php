@extends("la.layouts.app")
@section("contentheader_title", "Companies")
@section("section", "Companies")

@section("headerElems")

<form action="/admin/companies/search_company"  method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="text" name="search_com_name" id="" placeholder="Enter Company Name" style="width:170px;height:28px;color:black;margin-right:10px;">
            <input type="text" name="search_com_id" id="" placeholder="Enter Registration ID" style="width:150px;height:28px;color:black;margin-right:10px;">
            <button class="btn btn-success btn-sm" style="margin-right:10px;">Search</button>
            <a href="/admin/companies/create" class="btn btn-success btn-sm pull-right" >Add Company</a>
</form>


@endsection

@section("main-content")

<div class="box box-success">
    <!--<div class="box-header"></div>-->
    <div class="box-body">
        <table id="example1" class="table table-bordered">
        <thead>
        <tr class="success">
           <thead>
               <tr>
                   <th>No.</th>
                   <th>Name </th>
                   <th>Reg ID</th>
                   <th>Attention</th>
                   <th>Address </th>
                   <th>Phone </th>
                   <th>Email </th>
                   <th>Registration </th>
                   <th>Expire Date</th>
                   <th width="20%">Actions</th>
               </tr>
           </thead>
        </tr>
        </thead>
        <tbody>
            @foreach ($companies as $key => $com)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$com->name}}</td>
                        <td>{{$com->reg_id}}</td>
                        <td>{{$com->attention}}</td>
                        <td>{{$com->address}} </td>
                        <td>{{$com->phone}} </td>
                        <td>{{$com->email}}</td>
                        <td>
                            <span class="btn btn-sm btn-primary">Org
                                 <span class="badge">
                                    {{count($com->files->files($com->files->original))}}
                                </span>
                            </span> &emsp;
                            <span class="btn btn-sm btn-primary">Cop
                                 <span class="badge">
                                    {{count($com->files->files($com->files->copy))}}
                                </span>
                            </span>
                        </td>
                        <td>{{$com->expire_date}}</td>
                        <td>
                            <a href="/admin/companies/{{$com->id}}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                            @if ($com->ie==null)
                                <a href="/admin/companies/ie/{{$com->id}}" class="btn btn-sm btn-success">IE</a>
                            @endif
                            <a href="/admin/companies/{{$com->id}}/edit" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                            
                            <a class="btn btn-sm btn-danger btndelete" data-id="{{$com->id}}" data-token="{{csrf_token()}}"  data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                            
                        </td>
                    </tr>
            @endforeach
        </tbody>
        </table>
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
         $('.btndelete').on('click',function(){
                var id=$(this).data('id');
                var token=$(this).data('token');
                if(confirm('Are you sure want to delete this company'))
                {
                    $.ajax({
                        type:"delete",
                        url:"/admin/companies/"+id,
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
    </script>
@endpush
