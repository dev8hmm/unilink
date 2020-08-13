@extends("la.layouts.app")

@section("contentheader_title")

@section("contentheader_title", "Jobs")
<a href="{{ url(config('laraadmin.adminRoute') . '/jobs') }}">Job</a> :
@endsection
@section("contentheader_description", $job->$view_col)
@section("section", "Jobs")
@section("section_url", url(config('laraadmin.adminRoute') . '/jobs'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Jobs Edit : ".$job->$view_col)
@section("main-content")

{!! Form::model($job, ['route' => [config('laraadmin.adminRoute') . '.jobs.update', $job->id ], 'method'=>'PUT', 'id' => 'job-edit-form']) !!}       
<div class="box box-success">
    <div class="box-header bg-success"><label>Job Profile</label></div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-3 form-group">
                <label>Job No.</label>
                <input type="text" name="job_no" class="form-control" value="{{$job->job_no}}" required>
            </div>
            <div class="col-md-3 form-group">
                <label>Job Date</label>
                <div class="input-group date">
                    <input class="form-control" placeholder="Enter Date" value="{{$job->date<>null ? date("d/m/Y", strtotime($job->date)):null}}" name="job_date" type="text" required>
                    <span class="input-group-addon input_dt">
                        <span class="fa fa-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="col-md-3 form-group">
                <label>Contact Person</label>
                <input type="text" name="contact_person" class="form-control" value="{{$job->contact_person}}">
            </div>
        </div>
    </div>
</div>
<div class="box box-success">
    <div class="box-header bg-success">
        <label for="">Customer Information</label>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Customer Name <span class="text-danger">*</span></label>
                    <select name="customer_id" id="customer_id" class="form-control select2"  rel="select2" required>
                            <option value="{{$job->customer_id}}">{{$job->customer->name}}</option>
                        <option value="">-Select</option>
                        @foreach ($companies as $customer)
                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="">Customer ID</label>
                    <input type="text" id="customer_text_id" name="reg_id" value="{{$job->customer<>null?$job->customer->reg_id:"~"}}" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="attention_name">Attention Name </label>
                    <input type="text" name="attention_name" value="{{$job->customer<>null?$job->customer->attention:"~"}}" class="form-control" placeholder="Address" aria-describedby="helpId">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" value="{{$job->customer<>null?$job->customer->phone:"~"}}" class="form-control" placeholder="Phone number" aria-describedby="helpId">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{$job->customer<>null?$job->customer->email:"~"}}" class="form-control" placeholder="Email" aria-describedby="helpId">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="address">Address </label>
                    <textarea name="address" id="address" class="form-control" rows="2">{{$job->customer<>null?$job->customer->address:"~"}}</textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Credibility</label>
                    <input type="text" name="credibility" id="credibility" class="form-control" value="{{$job->customer<>null?$job->customer->credibility:"~"}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="attention_name">Company Registration </label><br>
                    <span class="btn btn-primary btn-sm">Origianl <span class="badge com_reg_original">{{$job->customer<>null?count($job->customer->files->files($job->customer->files->original)):0}}</span></span> 
                    <span class="btn btn-primary btn-sm">Copy <span class="badge com_reg_copy">{{$job->customer<>null?count($job->customer->files->files($job->customer->files->copy)):0}}</span></span>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="">Expire Date</label>
                    <div class="input-group date">
                            <input class="form-control" placeholder="Enter Date" value="{{$job->customer<>null?($job->customer->files->expire_date<>null ? date("d/m/Y", strtotime($job->customer->files->expire_date)):null):""}}" name="com_expire_date" type="text" required>
                            <span class="input-group-addon input_dt">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="">Receive Date</label>
                    {{-- <input type="text" name="com_expire_date" id="" class="form-control com_expire_date" placeholder="" aria-describedby="helpId"> --}}
                    <div class="input-group date">
                            <input class="form-control" placeholder="Enter Date" value="{{$job->customer<>null?($job->customer->files->date<>null ? date("d/m/Y", strtotime($job->customer->files->date)):null):""}}" name="com_receive_date" type="text" required>
                            <span class="input-group-addon input_dt">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($job->impexp<>null && $job->impexp->ie<>null)
<div class="box box-success">
    <div class="box-header bg-success">
        <div class="row">
            <div class="col-md-3 form-group">
                <label>Importer/Exporter</label>
                <select name="ie_id" id="ie_id" class="form-control select2" rel="select2" required>
                    <option value="{{$job->imp_exp_id}}">{{$job->impexp<>null?$job->impexp->name:"~"}}</option>
                    @foreach ($companies as $com)
                    @if ($com->ie<>null)
                    <option value="{{$com->id}}">{{$com->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-10">
           
           
                <div class="row">
                <div class="col-md-3 text-right">
                    <div class="form-group">
                        <label for=""> IE Certificate</label><br>
                        <span class="btn btn-primary btn-sm">Origianl <span class="badge ie_certificate_original">{{$job->impexp->ie->fcertificate<>null ? count($job->impexp->ie->fcertificate->files($job->impexp->ie->fcertificate->original)):0}}</span></span> 
                        <span class="btn btn-primary btn-sm">Copy <span class="badge ie_certificate_copy">{{$job->impexp->ie->fcertificate<>null ? count($job->impexp->ie->fcertificate->files($job->impexp->ie->fcertificate->copy)):0}}</span></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Expire Date</label>
                        <input type="text" name="certificate_expire_date" id="ie_expire_date" class="form-control certificate_expire_date" readonly value="{{$job->impexp->ie->fcertificate->expire_date}}">
                    </div>
                </div>
                <div class="col-md-3 text-right">
                    <div class="form-group">
                        <label for="">MCC</label><br>
                        <span class="btn btn-primary btn-sm">Origianl <span class="badge mcc_original">{{$job->impexp->ie->fmcc<>null ? count($job->impexp->ie->fmcc->files($job->impexp->ie->fmcc->original)):0}}</span></span> 
                        <span class="btn btn-primary btn-sm">Copy <span class="badge mcc_copy">{{$job->impexp->ie->fmcc<>null ? count($job->impexp->ie->fmcc->files($job->impexp->ie->fmcc->copy)):0}}</span></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Expire Date</label>
                        <input type="text" name="mcc_expire_date" id="mcc_expire_date" class="form-control mcc_expire_date" value="{{$job->impexp->ie->fmcc->expire_date}}" readonly>
                    </div>
                </div>
                
                <div class="col-md-3 text-right">
                    <div class="form-group">
                        <label for="">MGMA</label><br>
                        <span class="btn btn-primary btn-sm">Origianl <span class="badge mgma_original">{{$job->impexp->ie->fmgma<>null ? count($job->impexp->ie->fmgma->files($job->impexp->ie->fmgma->original)):0}}</span></span> 
                        <span class="btn btn-primary btn-sm">Copy <span class="badge mgma_copy">{{$job->impexp->ie->fmcc<>null ? count($job->impexp->ie->fmcc->files($job->impexp->ie->fmcc->copy)):0}}</span></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Expire Date</label>
                        <input type="text" name="mgma_expire_date" id="mgma_expire_date" class="form-control mgma_expire_date" value="{{$job->impexp->ie->fmcc->expire_date}}" readonly>
                    </div>
                </div>
                
                <div class="col-md-3 text-right">
                    <div class="form-group">
                        <label for="">MIA</label><br>
                        <span class="btn btn-primary btn-sm">Origianl <span class="badge mia_original">{{$job->impexp->ie->fmia<>null ? count($job->impexp->ie->fmia->files($job->impexp->ie->fmia->original)):0}}</span></span> 
                        <span class="btn btn-primary btn-sm">Copy <span class="badge mia_copy">{{$job->impexp->ie->fmia<>null ? count($job->impexp->ie->fmia->files($job->impexp->ie->fmia->copy)):0}}</span></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Expire Date</label>
                        <input type="text" name="mia_expire_date" id="mia_expire_date" class="form-control mia_expire_date" value="{{$job->impexp->ie->fmia->expire_date}}" readonly>
                    </div>
                </div>
                
                <div class="col-md-3 text-right">
                    <div class="form-group">
                        <label for="">UMFCCI</label><br>
                        <span class="btn btn-primary btn-sm">Origianl <span class="badge umfcci_original">{{$job->impexp->ie->fumfcci<>null ? count($job->impexp->ie->fumfcci->files($job->impexp->ie->fumfcci->original)):0}}</span></span> 
                        <span class="btn btn-primary btn-sm">Copy <span class="badge umfcci_copy">{{$job->impexp->ie->fumfcci<>null ? count($job->impexp->ie->fumfcci->files($job->impexp->ie->fumfcci->copy)):0}}</span></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Expire Date</label>
                        <input type="text" name="umfcci_expire_date" id="umfcci_expire_date" class="form-control umfcci_expire_date" value="{{$job->impexp->ie->fumfcci->expire_date}}" readonly>
                    </div>
                </div>
            </div>
            
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="remark1">Remark 1</label>
                    <input type="text" name="remark1" id="remark1" class="form-control remark1" value="{{$job->impexp->remark1}}">
                </div>
                <div class="form-group">
                    <label for="remark1">Remark 2</label>
                    <input type="text" name="remark2" id="remark2" class="form-control remark2" value="{{$job->impexp->remark2}}">
                </div>
                <div class="form-group">
                    <label for="remark1">Remark 3</label>
                    <input type="text" name="remark3" id="remark3" class="form-control remark3" value="{{$job->impexp->remark3}}">
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="box-footer">
        <a href="javascript:history.back()" class="btn btn-warning">Back</a>
        <a href="/admin/jobs" class="btn btn-success pull-right">Update</a>
    </div>
</div>
{!! Form::close() !!}

@endsection

@push('scripts')
@endpush
