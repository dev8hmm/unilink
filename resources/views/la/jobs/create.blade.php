@extends("la.layouts.app")

@section("contentheader_title", "Jobs")
@section("contentheader_description", "Jobs listing")
@section("section", "Jobs")
@section("sub_section", "Listing")
@section("htmlheader_title", "Jobs Listing")
@section("headerElems")


{{--  {!! Form::open(['action' => 'LA\JobsController@store', 'id' => 'job-add-form']) !!}
<label for="" class="">JOB NO. <span class="text-danger">*</span></label>
<input type="text" name="job_no" id="job_no" value="UNK-00{{$jobNo+1}}" class="" style="color:black;font-size:16px;font-weight:bold;">  --}}
@endsection
@section("main-content")
{!! Form::open(['action' => 'LA\JobsController@store', 'id' => 'job-add-form']) !!}
<div class="box box-success">
    <div class="box-header bg-success">
        <label for="">Job Code</label>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Job No.</label>
                    <input type="text" name="job_no" id="" class="form-control" value="{{$job_no}}">
                </div>
            </div>
            <div class="col-md-4">
                <label for="">Date <span class="text-danger">*</span></label>
                <div class="input-group date">
                    <input class="form-control" placeholder="Enter Date" data-rule-minlength="0" name="job_date" id="job_date" type="text" required>
                    <span class="input-group-addon input_dt">
                        <span class="fa fa-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Contact Person</label>
                    <input type="text" name="contact_person" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
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
                    <input type="text" id="customer_text_id" class="form-control">
                    {{-- <select id="customer_select_id" class="form-control select2" data-placeholder="Enter Type" rel="select2" name="type" tabindex="-1" aria-hidden="true">
                        @foreach ($companies as $customer)
                        <option value="{{$customer->id}}">{{$customer->id}}</option> 
                        @endforeach
                    </select> --}}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="attention_name">Attention Name </label>
                    <input type="text" name="attention_name" id="attention_name" class="form-control" placeholder="Address" aria-describedby="helpId">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone number" aria-describedby="helpId">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" aria-describedby="helpId">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="address">Address </label>
                    <textarea name="address" id="address" class="form-control" rows="2"  placeholder="Address" aria-describedby="helpId"></textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Credibility</label>
                    <input type="text" name="credibility" id="credibility" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="attention_name">Company Registration </label><br>
                    <span class="btn btn-primary btn-sm">Origianl <span class="badge com_reg_original">0</span></span> 
                    <span class="btn btn-primary btn-sm">Copy <span class="badge com_reg_copy">0</span></span>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="">Expire Date</label>
                    <input type="text" name="com_expire_date" id="" class="form-control com_expire_date" placeholder="" aria-describedby="helpId" readonly>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="">Receive Date</label>
                    <input type="text" name="com_expire_date" id="" class="form-control com_expire_date" placeholder="" aria-describedby="helpId">
                </div>
            </div>
            <div class="col-md-2">
                <label for="">Importer/Exporter</label><br>
                <input type="checkbox" name="is_ie" class="cb-isIE" data-toggle="toggle" data-on="Yes" data-off="No">
            </div>
        </div>
        <div class="is-ie-form" hidden>
            @include('la.jobs.is_ie')
        </div>
    </div>
</div>

<div class="box box-success add-ie-form">
    <div class="box-header bg-success">
        <div class="row">
            <div class="col-md-4 form-group">
                <label for="">Importer/Exporter</label>
                <select name="ie_id" id="ie_id" class="select2 select2-hidden-accessible" rel="select2" style="width:200px;height:30px;font-size:14px;margin-left:20px;" required>
                    <option value="">-Select</option>
                    @foreach ($companies as $ie)
                    @if ($ie->ie<>null)
                    <option value="{{$ie->id}}">{{$ie->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="box-body">
        @include('la.jobs.is_ie')
    </div>
</div>
<div class="box box-success">
    <div class="box-header bg-success">
        <label for="">Shipment Detail</label>
    </div>
    <div class="box-body">
        @include('la.jobs.shipment')
    </div>
</div>
<div class="box box-success">
    <div class="box-header bg-success">
        <label for="">Service</label>
    </div>
    <div class="box-body">
        @include('la.jobs.service')
    </div>
    <div class="box-footer">
        <a href="/admin/jobs" class="btn btn-warning">Cancel</a>
        <button type="submit" id="job_submit" class="btn btn-success pull-right">Submit</button>
        <div  class="pull-right" style="display:inline; padding-right:20px;">  
            <label>Assign To <span class="text-danger">*</span></label>
            <select name="assign" style="width:150px; height:30px; border-radius:4px;" required>
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
</div>
{!!Form::close()!!}


@endsection
@push('scripts')
<script>
    var certificate_original=0;
    var certificate_copy=0;
    var mcc_original=0;
    var mcc_copy=0;
    var mgma_original=0;
    var mgma_copy=0;
    var mia_original=0;
    var mia_copy=0;
    var umfcci_original=0;
    var umfcci_copy=0;
    
    var rmk1="",rmk2="",rmk3="";
    var certificate_expire="",mgma_expire="",mcc_expire="",mia_expire="",umfcci_expire="";
    
    $(document).ready(function(){

        $('.cb-isIE').click(function(){
            if ($('.cb-isIE').prop('checked'))
            {
                $('#ie_id').removeAttr('required');
                $('.is-ie-form').show();
                $('.add-ie-form').hide();
            }
            else{
                $('#ie_id').attr('required');
                $('.is-ie-form').hide();
                $('.add-ie-form').show();
            }
            setIECount();
        });
        
        $("#customer_id").change(function(){
            $('.cb-isIE').removeAttr("checked");
            $('.is-ie-form').hide();
            $('.add-ie-form').show();
            if($(this).val()!=null)
            {
                $('#customer_select_id').attr('disable','false');
                fatchComData($(this).val());
            }
            
        });
        $('#customer_select_id').change(function(){
            if($(this).val()!=null)
            {
                fatchComData($(this).val());
            }
        });
        $('#ie_id').change(function(){
            if($(this).val()!=null)
            {
                fatchIEData($(this).val());
            }
            
        });
        $('#job_submit').submit(function(e){

            $('input,textarea,select').attr('required',true).filter(':visible:first').each(function(i, requiredField){
                if($(requiredField).val()=='' || $(requiredField).val()=="[]")
                {
                    alert($(requiredField).attr('name'));
                    e.preventDefault();
                }
                });
        });
    });
    
    function fatchComData(id)
    {
        setIEZero();
        $.ajax({ 
            type:'get',
            dataType:"json",
            url:'/admin/company/getCompany/'+id,
            success:function(data){
                $('#customer_text_id').val(data.company.reg_id);
                $('#attention_name').val(data.company.attention);
                $('#phone').val(data.company.phone);
                $("#email").val(data.company.email);
                $('#address').val(data.company.address);
                $("#credibility").val(data.company.credibility);
                $(".com_reg_original").text(data.company.org.length);
                $(".com_reg_copy").text(data.company.cop.length);
                $(".com_expire_date").val(data.company.expire_date);
                
                rmk1=data.company.remark1;
                rmk2=data.company.remark2;
                rmk3=data.company.remark3;
                
                if(data.ie!=null)
                {
                    $('.cb-isIE').attr("disabled", false);
                    if(data.ie.certificate!=null)
                    {
                        certificate_original=data.ie.certificate.org.length;
                        certificate_copy=data.ie.certificate.cop.length;
                        certificate_expire=data.ie.certificate.expire_date;
                    }
                    if(data.ie.mcc!=null)
                    {
                        mcc_original=data.ie.mcc.org.length;
                        mcc_copy=data.ie.mcc.cop.length;
                        mcc_expire=data.ie.mcc.expire_date;
                    }
                    if(data.ie.mgma!=null)
                    {
                        mgma_original=data.ie.mgma.org.length;
                        mgma_copy=data.ie.mgma.cop.length;
                        mgma_expire=data.ie.mgma.expire_date;
                    }
                    if(data.ie.mia!=null)
                    {
                        mia_original=data.ie.mia.org.length;
                        mia_copy=data.ie.mia.cop.length;
                        mia_expire=data.ie.mia.expire_date;
                    }
                    if(data.ie.umfcci!=null)
                    {
                        umfcci_original=data.ie.umfcci.org.length;
                        umfcci_copy=data.ie.umfcci.cop.length;
                        umfcci_expire=data.ie.umfcci.expire_date;
                    }
                }
                else{
                    $('.cb-isIE').attr("disabled", true);  
                }
            }
        });
    }
    function fatchIEData(id)
    {
        setIEZero();
        $.ajax({ 
            type:'get',
            dataType:"json",
            url:'/admin/company/getCompany/'+id,
            success:function(data){
                
                rmk1=data.company.remark1;
                rmk2=data.company.remark2;
                rmk3=data.company.remark3;
                
                if(data.ie!=null)
                {
                    if(data.ie.certificate!=null)
                    {
                        certificate_original=data.ie.certificate.org.length;
                        certificate_copy=data.ie.certificate.cop.length;
                        certificate_expire=data.ie.certificate.expire_date;
                    }
                    if(data.ie.mcc!=null)
                    {
                        mcc_original=data.ie.mcc.org.length;
                        mcc_copy=data.ie.mcc.cop.length;
                        mcc_expire=data.ie.mcc.expire_date;
                    }
                    if(data.ie.mgma!=null)
                    {
                        mgma_original=data.ie.mgma.org.length;
                        mgma_copy=data.ie.mgma.cop.length;
                        mgma_expire=data.ie.mgma.expire_date;
                    }
                    if(data.ie.mia!=null)
                    {
                        mia_original=data.ie.mia.org.length;
                        mia_copy=data.ie.mia.cop.length;
                        mia_expire=data.ie.mia.expire_date;
                    }
                    if(data.ie.umfcci!=null)
                    {
                        umfcci_original=data.ie.umfcci.org.length;
                        umfcci_copy=data.ie.umfcci.cop.length;
                        umfcci_expire=data.ie.umfcci.expire_date;
                    }
                    setIECount();
                }
            }
        });
        
    }
    function setIEZero()
    {
        certificate_original=0;
        certificate_copy=0;
        mcc_original=0;
        mcc_copy=0;
        mgma_original=0;
        mgma_copy=0;
        mia_original=0;
        mia_copy=0;
        umfcci_original=0;
        umfcci_copy=0;
        rmk1="";
        rmk2="";
        rmk3="";
        certificate_expire="",
        mgma_expire="",
        mcc_expire="",
        mia_expire="",
        umfcci_expire="";
    }
    function setIECount()
    {
        $('.ie_certificate_original').text(certificate_original);
        $('.ie_certificate_copy').text(certificate_copy);
        $('.mcc_original').text(mcc_original);
        $('.mcc_copy').text(mcc_copy);
        $('.mgma_original').text(mgma_original);
        $('.mgma_copy').text(mgma_copy);
        $('.mia_original').text(mia_original);
        $('.mia_copy').text(mia_copy);
        $('.umfcci_original').text(umfcci_original);
        $('.umfcci_copy').text(umfcci_copy);
        
        $('.remark1').val(rmk1);
        $('.remark2').val(rmk2);
        $(".remark3").val(rmk3);
        
        $('.certificate_expire_date').val(certificate_expire);
        $('.mgma_expire_date').val(mgma_expire);
        $('.mia_expire_date').val(mia_expire);
        $('.mcc_expire_date').val(mcc_expire);
        $('.umfcci_expire_date').val(certificate_expire);
    }
</script>
@endpush