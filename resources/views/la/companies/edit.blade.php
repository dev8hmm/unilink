@extends("la.layouts.app")

@section("contentheader_title")
<a href="{{ url(config('laraadmin.adminRoute') . '/companies') }}">Company</a> :
@endsection
@section("contentheader_description", $company->$view_col)
@section("section", "Companies")
@section("section_url", url(config('laraadmin.adminRoute') . '/companies'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Companies Edit : ".$company->$view_col)

@section("main-content")

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="box">
    <div class="box-header">
        
    </div>
    <div class="box-body">
        {!! Form::model($company, ['route' => [config('laraadmin.adminRoute') . '.companies.update', $company->id ], 'method'=>'PUT', 'id' => 'company-edit-form']) !!}
        <div class="row">
            <div class="col-md-3">@la_input($module, 'name') </div>
            <div class="col-md-2 form-group">
                <label>Registration ID</label>
                <input type="text" name="reg_id" class="form-control" value="{{$module->row->reg_id}}">
            </div>
            <div class="col-md-3">@la_input($module, 'attention')</div>
            <div class="col-md-2">@la_input($module, 'phone')</div>
            <div class="col-md-2">@la_input($module, 'email')</div>
        </div>
        <div class="row">
            <div class="col-md-4 form-group">  
                <label>Address</label>
                <textarea class="form-control" name="address" id="" rows="2">{{$module->row->address}}</textarea>
            </div>
            <div class="col-md-3"> @la_input($module, 'credibility')</div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Registration Original</label>
                    <input type="hidden" name="original" class="form-control" value="{{$module->row->files->original}}">
                    <div class="uploaded_files">
                        @foreach ($module->row->files->files($module->row->files->original) as $org)
                        <a class="uploaded_file2" upload_id="{{$org->id}}">
                            <img src="{{ url('files/'.$org->hash.'/'.$org->name) }}?s=90"  alt="">
                            <i class="fa fa-times" title="Remove File"></i>
                        </a>
                        @endforeach
                    </div>
                    <a class="btn btn-default btn_upload_files" file_type="files" selecter="original" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>    
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Registration Copy</label>
                    <input type="hidden" name="copy" class="form-control" value="{{$module->row->files->copy}}">
                    <div class="uploaded_files">
                        @foreach ($module->row->files->files($module->row->files->copy) as $copy)
                        <a class="uploaded_file2" upload_id="{{$copy->id}}">
                            <img src="{{ url('files/'.$copy->hash.'/'.$copy->name) }}?s=90" alt="">
                            <i class="fa fa-times" title="Remove File"></i>
                        </a>
                        @endforeach
                    </div>
                    <a class="btn btn-default btn_upload_files" file_type="files" selecter="copy" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                    
                </div>
            </div>
            <div class="col-md-2 form-group">
                <label>Expire Date</label>    
                <div class="input-group date">
                    <input type="text" name="expire_date" id="" class="form-control" value="{{$module->row->files->expire_date<>null? date("d/m/Y", strtotime($module->row->files->expire_date)):null}}">
                    <span class="input-group-addon input_dt">
                        <span class="fa fa-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="col-md-2 form-group">
                <label>Receive Date</label>    
                <div class="input-group date">
                    <input type="text" name="receive_date" id="" class="form-control" value="{{$module->row->files->date<>null? date("d/m/Y", strtotime($module->row->files->date)):null}}">
                    <span class="input-group-addon input_dt">
                        <span class="fa fa-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <hr>
        @if ($module->row->ie<>null)
        <div class="row">
            <div class="col-md-4"> @la_input($module, 'remark1')</div>
            <div class="col-md-4">@la_input($module, 'remark2')</div>
            <div class="col-md-4">@la_input($module, 'remark3')  </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">IE Certificate Original</label>
                    <input type="hidden" name="ie_certificate_original" class="form-control" value="{{$module->row->ie->fcertificate->original}}">
                    <div class="uploaded_files">
                        @foreach ($module->row->ie->fcertificate->files($module->row->ie->fcertificate->original) as $org)
                        <a class="uploaded_file2" upload_id="{{$org->id}}">
                            <img src="{{ url('files/'.$org->hash.'/'.$org->name) }}?s=90"  alt="">
                            <i class="fa fa-times" title="Remove File"></i>
                        </a>
                        @endforeach
                    </div>
                    <a class="btn btn-default btn_upload_files" file_type="files" selecter="ie_certificate_original" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>    
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">IE Certificate Copy</label>
                    <input type="hidden" name="ie_certificate_copy" class="form-control" value="{{$module->row->ie->fcertificate->copy}}">
                    <div class="uploaded_files">
                        @foreach ($module->row->ie->fcertificate->files($module->row->ie->fcertificate->copy) as $copy)
                        <a class="uploaded_file2" upload_id="{{$copy->id}}">
                            <img src="{{ url('files/'.$copy->hash.'/'.$copy->name) }}?s=90" alt="">
                            <i class="fa fa-times" title="Remove File"></i>
                        </a>
                        @endforeach
                    </div>
                    <a class="btn btn-default btn_upload_files" file_type="files" selecter="ie_certificate_copy" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="expire_date">Expire Date :</label>
                    <div class="input-group date">
                        <input class="form-control valid" name="ie_certificate_expire_date" type="text" value="{{$module->row->ie->fcertificate->expire_date<>null? date("d/m/Y", strtotime($module->row->ie->fcertificate->expire_date)):null}}">
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="expire_date">Receive Date :</label>
                    <div class="input-group date">
                        <input class="form-control valid" name="ie_certificate_receive_date" type="text" value="{{$module->row->ie->fcertificate->date<>null? date("d/m/Y", strtotime($module->row->ie->fcertificate->date)):null}}">
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">MCC Original</label>
                    <input type="hidden" name="mcc_original" class="form-control" value="{{$module->row->ie->fmcc->original}}">
                    <div class="uploaded_files">
                        @foreach ($module->row->ie->fmcc->files($module->row->ie->fmcc->original) as $org)
                        <a class="uploaded_file2" upload_id="{{$org->id}}">
                            <img src="{{ url('files/'.$org->hash.'/'.$org->name) }}?s=90"  alt="">
                            <i class="fa fa-times" title="Remove File"></i>
                        </a>
                        @endforeach
                    </div>
                    <a class="btn btn-default btn_upload_files" file_type="files" selecter="mcc_original" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>    
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">MCC Copy</label>
                    <input type="hidden" name="mcc_copy" class="form-control" value="{{$module->row->ie->fmcc->copy}}">
                    <div class="uploaded_files">
                        @foreach ($module->row->ie->fmcc->files($module->row->ie->fmcc->copy) as $copy)
                        <a class="uploaded_file2" upload_id="{{$copy->id}}">
                            <img src="{{ url('files/'.$copy->hash.'/'.$copy->name) }}?s=90" alt="">
                            <i class="fa fa-times" title="Remove File"></i>
                        </a>
                        @endforeach
                    </div>
                    <a class="btn btn-default btn_upload_files" file_type="files" selecter="mcc_copy" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="expire_date">Expire Date :</label>
                    <div class="input-group date">
                        <input class="form-control valid" placeholder="Enter Expire Date" data-rule-minlength="0" name="mcc_expire_date" type="text" value="{{$module->row->ie->fmcc->expire_date<>null? date("d/m/Y", strtotime($module->row->ie->fmcc->expire_date)):null}}" aria-invalid="false">
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Receive Date :</label>
                    <div class="input-group date">
                        <input class="form-control valid" name="mcc_receive_date" type="text" value="{{$module->row->ie->fmcc->date<>null? date("d/m/Y", strtotime($module->row->ie->fmcc->date)):null}}">
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">MGMA Original</label>
                    <input type="hidden" name="mgma_original" class="form-control" value="{{$module->row->ie->fmgma->original}}">
                    <div class="uploaded_files">
                        @foreach ($module->row->ie->fmgma->files($module->row->ie->fmgma->original) as $org)
                        <a class="uploaded_file2" upload_id="{{$org->id}}">
                            <img src="{{ url('files/'.$org->hash.'/'.$org->name) }}?s=90"  alt="">
                            <i class="fa fa-times" title="Remove File"></i>
                        </a>
                        @endforeach
                    </div>
                    <a class="btn btn-default btn_upload_files" file_type="files" selecter="mgma_original" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>    
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">MGMA Copy</label>
                    <input type="hidden" name="mgma_copy" class="form-control" value="{{$module->row->ie->fmgma->copy}}">
                    <div class="uploaded_files">
                        @foreach ($module->row->ie->fmgma->files($module->row->ie->fmgma->copy) as $copy)
                        <a class="uploaded_file2" upload_id="{{$copy->id}}">
                            <img src="{{ url('files/'.$copy->hash.'/'.$copy->name) }}?s=90" alt="">
                            <i class="fa fa-times" title="Remove File"></i>
                        </a>
                        @endforeach
                    </div>
                    <a class="btn btn-default btn_upload_files" file_type="files" selecter="mgma_copy" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="expire_date">Expire Date :</label>
                    <div class="input-group date">
                        <input class="form-control valid" placeholder="Enter Expire Date" data-rule-minlength="0" name="mgma_expire_date" type="text" value="{{$module->row->ie->fmgma->expire_date<>null? date("d/m/Y", strtotime($module->row->ie->fmgma->expire_date)):null}}">
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="expire_date">Receive Date :</label>
                    <div class="input-group date">
                        <input class="form-control valid" name="mgma_receive_date" type="text" value="{{ date("d/m/Y", strtotime($module->row->ie->fmgma->date))}}" aria-invalid="false">
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">MIA Original</label>
                    <input type="hidden" name="mia_original" class="form-control" value="{{$module->row->ie->fmia->original}}">
                    <div class="uploaded_files">
                        @foreach ($module->row->ie->fmia->files($module->row->ie->fmia->original) as $org)
                        <a class="uploaded_file2" upload_id="{{$org->id}}">
                            <img src="{{ url('files/'.$org->hash.'/'.$org->name) }}?s=90"  alt="">
                            <i class="fa fa-times" title="Remove File"></i>
                        </a>
                        @endforeach
                    </div>
                    <a class="btn btn-default btn_upload_files" file_type="files" selecter="mia_original" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>    
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">MIA Copy</label>
                    <input type="hidden" name="mia_copy" class="form-control" value="{{$module->row->ie->fmia->copy}}">
                    <div class="uploaded_files">
                        @foreach ($module->row->ie->fmia->files($module->row->ie->fmia->copy) as $copy)
                        <a class="uploaded_file2" upload_id="{{$copy->id}}">
                            <img src="{{ url('files/'.$copy->hash.'/'.$copy->name) }}?s=90" alt="">
                            <i class="fa fa-times" title="Remove File"></i>
                        </a>
                        @endforeach
                    </div>
                    <a class="btn btn-default btn_upload_files" file_type="files" selecter="mia_copy" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="expire_date">Expire Date :</label>
                    <div class="input-group date">
                        <input class="form-control valid"  name="mia_expire_date" type="text" value="{{ date("d/m/Y", strtotime($module->row->ie->fmia->expire_date))}}" aria-invalid="false">
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="expire_date">Receive Date :</label>
                    <div class="input-group date">
                        <input class="form-control valid"  name="mia_receive_date" type="text" value="{{ date("d/m/Y", strtotime($module->row->ie->fmia->date))}}" aria-invalid="false">
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">UMFCCI Original</label>
                    <input type="hidden" name="umfcci_original" class="form-control" value="{{$module->row->ie->fumfcci->original}}">
                    <div class="uploaded_files">
                        @foreach ($module->row->ie->fumfcci->files($module->row->ie->fumfcci->original) as $org)
                        <a class="uploaded_file2" upload_id="{{$org->id}}">
                            <img src="{{ url('files/'.$org->hash.'/'.$org->name) }}?s=90"  alt="">
                            <i class="fa fa-times" title="Remove File"></i>
                        </a>
                        @endforeach
                    </div>
                    <a class="btn btn-default btn_upload_files" file_type="files" selecter="umfcci_original" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>    
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">UMFCCI Copy</label>
                    <input type="hidden" name="umfcci_copy" class="form-control" value="{{$module->row->ie->fumfcci->copy}}">
                    <div class="uploaded_files">
                        @foreach ($module->row->ie->fumfcci->files($module->row->ie->fumfcci->copy) as $copy)
                        <a class="uploaded_file2" upload_id="{{$copy->id}}">
                            <img src="{{ url('files/'.$copy->hash.'/'.$copy->name) }}?s=90" alt="">
                            <i class="fa fa-times" title="Remove File"></i>
                        </a>
                        @endforeach
                    </div>
                    <a class="btn btn-default btn_upload_files" file_type="files" selecter="umfcci_copy" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="expire_date">Expire Date :</label>
                    <div class="input-group date">
                        <input class="form-control valid"  name="omfcci_expire_date" type="text" value="{{ date("d/m/Y", strtotime($module->row->ie->fumfcci->expire_date))}}" aria-invalid="false">
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="expire_date">Receive Date :</label>
                    <div class="input-group date">
                        <input class="form-control valid"  name="omfcci_receive_date" type="text" value="{{ date("d/m/Y", strtotime($module->row->ie->fumfcci->date))}}" aria-invalid="false">
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        @endif
    </div>
<div class="box-footer">
    <div class="form-group">
        <a href="{{ url(config('laraadmin.adminRoute') . '/companies') }}" class="btn btn-default ">Cancel</a>
        {!! Form::submit( 'Update', ['class'=>'btn btn-success pull-right']) !!} 
    </div>
    {!! Form::close() !!}
</div>
</div>  
</div>

@endsection

@push('scripts')
<script>
    $(function () {
        $("#company-edit-form").validate({
            
        });
    });
</script>
@endpush
