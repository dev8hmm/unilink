@extends("la.layouts.app")

@section("contentheader_title", "Companies")
@section("contentheader_description", "Companies listing")
@section("section", "Companies")
@section("sub_section", "Listing")
@section("htmlheader_title", "Companies Listing")

@section("headerElems")
@endsection

@section("main-content")
<div class="container-fluid">
    <div class="box box-success">
        <div class="box-header bg-success">
            <label for="">Add Company</label>
        </div>
        <div class="box-body">
            {!! Form::open(['action' => 'LA\CompaniesController@store','enctype'=>'multipart/form-data', 'id' => 'company-add-form']) !!}
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="">Name : <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="com_name" class="form-control" required>
                </div>
                <div class="col-md-2">
                        <div class="form-group">
                          <label for="">Customer ID <span class="text-danger">*</span></label>
                          <input type="text" name="reg_id" id="reg_id" class="form-control" placeholder="" required>
                        </div>
                    </div>
                <div class="col-md-3 form-group">
                    <label for="">Attention </label>    
                    <input type="text" name="attention" id="attn_name" class="form-control">
                </div>
                <div class="col-md-2 form-group">
                    <label >Phone :</label>    
                    <input type="text" name="phone" id="phone" class="form-control">
                </div>
                <div class="col-md-2 form-group">
                    <label>Email :</label>    
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <div class="col-md-4 form-group">
                    <label for="">Address <span class="text-danger">*</span></label>
                    <textarea name="address" id="" rows="2" class="form-control" required></textarea>
                </div>
                <div class="col-md-3 form-group">
                    <label>Credibility</label>
                    <input type="text" name="credibility" id="credibility" class="form-control">
                </div>
            </div>
            <div class="row">
                    <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Company Registration</label>
                                {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="original" type="hidden" value="[]">
                                <div class='uploaded_files' ></div>
                                <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='original' style='margin-top:5px;'>Original <i class='fa fa-cloud-upload'></i></a>     --}}
                                   <div class="file-loading">
                                        <input  type="file" name="original[]" multiple class="com-file" data-overwrite-initial="false" data-min-file-count="4">
                                    </div>
                            </div>
                        </div>    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Company Registration</label>
                                {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="copy" type="hidden" value="[]">
                                <div class='uploaded_files' ></div>
                                <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='copy' style='margin-top:5px;'>Copy <i class='fa fa-cloud-upload'></i></a>          --}}
                                   <div class="file-loading">
                                        <input  type="file" name="copy[]" multiple class="com-file" data-overwrite-initial="false" data-min-file-count="4">
                                    </div>
                            </div>  
                        </div>
                       
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Receive Date :</label>
                        <div class="input-group date">
                            <input class="form-control" placeholder="Enter Date" data-rule-minlength="0" name="com_receive_date" type="text" >
                            <span class="input-group-addon input_dt">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="">Expire Date :</label>
                        <div class="input-group date">
                            <input class="form-control" placeholder="Enter Date" data-rule-minlength="0" name="com_expire_date" type="text" >
                            <span class="input-group-addon input_dt">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <label for="">Importer/Exporter</label><br>
                    <input type="checkbox" class="checkbox cb-isIE" name="ie" id="cb-isIE">
                </div>
                {{--  Col close  --}}
            </div>
            <hr>
            <div class="row ">
                <div class="col-md-12 add-ie-form" hidden>
                    <h4><label for="">Importer/Exporter Information</label></h4>
                        @include('la.companies.add_ie_include')
                </div>
                {{--  Row close  --}}
            </div> 
            <div class="box-footer">
                <a href="javascript:history.back()" class="btn btn-warning" >Close</a>
                {!! Form::submit( 'Submit', ['class'=>'btn btn-success pull-right']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    @endsection
    @push('scripts')
    <script src="{{asset('la-assets/js/jquery.repeater.js')}}"></script>
    <script>
        $(document).ready(function (){
            $('.cb-isIE').click(function(){
                
                if ($('.cb-isIE').prop('checked'))
                {
                    $(".add-ie-form").show();
                }
                else{
                    $(".add-ie-form").hide();
                }
            });
            $('#reg_id').blur(function(){
                var regId=$(this).val();
                $.ajax({
                    type:'get',
                    url:'/admin/checkRegId/'+regId,
                    success:function(data)
                    {
                        if(data.status=="exist")
                        {
                            alert("This Customer Registration ID is already exist!");
                            $('#com_name').val('');
                            $('#reg_id').val('');
                            $('#attn_name').val('');
                            $('#phone').val('');
                            $('#email').val('');
                            $('#address').val('');
                            $('#credibility').val('');
                        }
                    }
                });
            });
            $('.repeater').repeater({
                defaultValues: {
                    
                },
                hide: function (deleteElement) {
                    if(confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                ready: function (setIndexes) {
                    
                },
                isFirstItemUndeletable: true
            });
        });
       
    </script>
    @endpush