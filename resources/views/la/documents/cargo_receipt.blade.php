@extends("la.layouts.app")

@section("contentheader_title", "Cargo Receipt (P-4)")
@section("contentheader_description", "Cargo Receipt")
@section("section", "Cargo ")
@section("sub_section", "Receiving")
@section("htmlheader_title", "Cargo Receipt")
@section("main-content")
@if ($success<>true)
    <div class="alert alert-danger">
        <label>Unsuccessful files in Field Operation (Process-3)</label>
    </div>
@endif
@include('la.jobs.jobprofile')
<div class="box box-success">
        {!!Form::open(['url' => 'admin/jobs/process4/doc_receive/'.$job->id,'enctype'=>'multipart/form-data']) !!} 
    <div class="box-header bg-success">
        <label>Cargo Receipt</label>
    </div>
    <div class="box-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Detail Packing List</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="">Original</label>
                            {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="packing_list_original" type="hidden" value="[]">
                            <div class='uploaded_files'></div>
                            <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter="packing_list_original"  style='margin-top:5px;'>Upload <i class='fa fa-cloud-upload'></i></a>    
                            --}}
                            <div class="file-loading">
                                <input  type="file" name="packing_list_original[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                            </div>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="">Copy</label>
                            {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="packing_list_copy" type="hidden" value="[]">
                            <div class='uploaded_files'></div>
                            <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter="packing_list_copy"  style='margin-top:5px;'>Upload <i class='fa fa-cloud-upload'></i></a>     --}}
                            <div class="file-loading">
                                <input  type="file" name="packing_list_copy[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                            </div>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="">Expire Date</label>
                            <div class="input-group date">
                                <input type="text" name="packing_list_expire_date" id="" class="form-control">
                                <span class="input-group-addon input_dt">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="">Receive Date</label>
                            <div class="input-group date">
                                <input type="text" name="packing_list_receive_date" id="" class="form-control">
                                <span class="input-group-addon input_dt">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @if ($job->shipment->type=="EXPORT")
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Loading Plan</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="">Original</label>
                        {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="loading_plan_original" type="hidden" value="[]">
                        <div class='uploaded_files'></div>
                        <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter="loading_plan_original"  style='margin-top:5px;'>Upload <i class='fa fa-cloud-upload'></i></a>     --}}
                        <div class="file-loading">
                            <input  type="file" name="loading_plan_original[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                        </div>
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="">Copy</label>
                        {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="loading_plan_copy" type="hidden" value="[]">
                        <div class='uploaded_files'></div>
                        <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter="loading_plan_copy"  style='margin-top:5px;'>Upload <i class='fa fa-cloud-upload'></i></a>     --}}
                        <div class="file-loading">
                            <input  type="file" name="loading_plan_copy[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                        </div>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="">Expire Date</label>
                        <div class="input-group date">
                            <input type="text" name="loading_plan_expire_date" id="" class="form-control">
                            <span class="input-group-addon input_dt">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="">Receive Date</label>
                        <div class="input-group date">
                            <input type="text" name="loading_plan_receive_date" id="" class="form-control">
                            <span class="input-group-addon input_dt">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="box-footer">
        <a href="javascript:history.back()" class="btn btn-warning">Cancel</a>
        <button type="submit" class="btn btn-success pull-right">Submit</button>
        <div  class="pull-right" style="display:inline; padding-right:20px;">  
            <label>Assign To <span class="text-danger">*</span></label>
            <select name="assign" style="width:150px; height:30px; border-radius:4px;" required>
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection