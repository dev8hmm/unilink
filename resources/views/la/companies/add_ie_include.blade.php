<div class="row">
    <div class="col-md-3 form-group"> 
        <label>Remark 1</label>
        <input type="text" name="remark1" id="" class="form-control">
    </div>
    <div class="col-md-3 form-group">
        <label>Remark 2</label>
        <input type="text" name="remark2" id="" class="form-control">
    </div>
    <div class="col-md-3 form-group">
        <label>Remark 3</label>    
        <input type="text" name="remark3" id="" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="">IE Certificate original file upload</label>
            {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="ie_certificate_original" type="hidden" value="[]">
            <div class='uploaded_files' ></div>
            <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='ie_certificate_original' style='margin-top:5px;'>Original <i class='fa fa-cloud-upload'></i></a>     --}}
            <div class="file-loading">
                <input  type="file" name="ie_certificate_original[]" multiple class="com-file" data-overwrite-initial="false" data-min-file-count="4">
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">  
            <label for="">IE Certificate copy file upload</label> 
            {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="ie_certificate_copy" type="hidden" value="[]">
            <div class='uploaded_files' ></div>
            <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='ie_certificate_copy' style='margin-top:5px;'>Copy <i class='fa fa-cloud-upload'></i></a>     --}}
            <div class="file-loading">
                <input  type="file" name="ie_certificate_copy[]" multiple class="com-file" data-overwrite-initial="false" data-min-file-count="4">
            </div>
        </div>
    </div>
    
    <div class="col-md-2">
        <div class="form-group">
            <label for="">Expire Date <span class="text-danger">*</span></label>
            <div class="input-group date">
                <input class="form-control" placeholder="Enter Date" data-rule-minlength="0" name="ie_certificate_expire_date" type="text">
                <span class="input-group-addon input_dt">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-2">
            <div class="form-group">
                <label for="">Receive Date <span class="text-danger">*</span></label>
                <div class="input-group date">
                    <input class="form-control" placeholder="Enter Date" data-rule-minlength="0" name="ie_certificate_receive_date" type="text">
                    <span class="input-group-addon input_dt">
                        <span class="fa fa-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="">MIC Original</label>
            {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="mcc_original" type="hidden" value="[]">
            <div class='uploaded_files' ></div>
            <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='mcc_original' style='margin-top:5px;'>Original <i class='fa fa-cloud-upload'></i></a>     --}}
            <div class="file-loading">
                <input  type="file" name="mcc_original[]" multiple class="com-file" data-overwrite-initial="false" data-min-file-count="4">
            </div>
        </div>
    </div>   
    <div class="col-md-3">
        <div class="form-group">
            <label for="">MIC Copy  </label>
            {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="mcc_copy" type="hidden" value="[]">
            <div class='uploaded_files' ></div>
            <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='mcc_copy' style='margin-top:5px;'>Copy <i class='fa fa-cloud-upload'></i></a>     --}}
            <div class="file-loading">
                <input  type="file" name="mcc_copy[]" multiple class="com-file" data-overwrite-initial="false" data-min-file-count="4">
            </div>
        </div>
    </div>
    
    <div class="col-md-2">
            <div class="form-group">
                    <label for="">Expire Date <span class="text-danger">*</span></label>
                    <div class="input-group date">
                        <input class="form-control" placeholder="Enter Date" data-rule-minlength="0" name="mcc_expire_date" type="text" >
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
    </div>
    <div class="col-md-2">
            <div class="form-group">
                <label for="">Receive Date <span class="text-danger">*</span></label>
                <div class="input-group date">
                    <input class="form-control" placeholder="Enter Date" data-rule-minlength="0" name="mcc_receive_date" type="text">
                    <span class="input-group-addon input_dt">
                        <span class="fa fa-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="">MGMA Original</label>
            {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="mgma_original" type="hidden" value="[]">
            <div class='uploaded_files' ></div>
            <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='mgma_original' style='margin-top:5px;'>Original <i class='fa fa-cloud-upload'></i></a>     --}}
            <div class="file-loading">
                <input  type="file" name="mgma_original[]" multiple class="com-file" data-overwrite-initial="false" data-min-file-count="4">
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="">MGMA Copy</label>
            {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="mgma_copy" type="hidden" value="[]">
            <div class='uploaded_files' ></div>
            <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='mgma_copy' style='margin-top:5px;'>Copy <i class='fa fa-cloud-upload'></i></a>     --}}
            <div class="file-loading">
                <input  type="file" name="mgma_copy[]" multiple class="com-file" data-overwrite-initial="false" data-min-file-count="4">
            </div>
            
        </div>
    </div>
   
    <div class="col-md-2">
            <div class="form-group">
                    <label for="">Expire Date <span class="text-danger">*</span></label>
                    <div class="input-group date">
                        <input class="form-control" placeholder="Enter Date" data-rule-minlength="0" name="mgma_expire_date" type="text">
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
    </div>
    <div class="col-md-2">
            <div class="form-group">
                    <label for="">Receive Date <span class="text-danger">*</span></label>
                    <div class="input-group date">
                        <input class="form-control" placeholder="Enter Date" data-rule-minlength="0" name="mgma_receive_date" type="text">
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="">MIA Original</label>
            {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="mia_original" type="hidden" value="[]">
            <div class='uploaded_files' ></div>
            <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='mia_original' style='margin-top:5px;'>Original <i class='fa fa-cloud-upload'></i></a>     --}}
            <div class="file-loading">
                <input  type="file" name="mia_original[]" multiple class="com-file" data-overwrite-initial="false" data-min-file-count="4">
            </div>
        </div>
    </div> 
    <div class="col-md-3">
        <div class="form-group"> 
            <label for="">MIA Copy</label>  
            <div class="file-loading">
                <input  type="file" name="mia_copy[]" multiple class="com-file" data-overwrite-initial="false" data-min-file-count="4">
            </div>
        </div>
    </div>
    
    <div class="col-md-2">
            <div class="form-group">
                    <label for="">Expire Date <span class="text-danger">*</span></label>
                    <div class="input-group date">
                        <input class="form-control" placeholder="Enter Date" data-rule-minlength="0" name="mia_expire_date" type="text">
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
    </div>
    <div class="col-md-2">
            <div class="form-group">
                    <label for="">Receive Date <span class="text-danger">*</span></label>
                    <div class="input-group date">
                        <input class="form-control" placeholder="Enter Date" data-rule-minlength="0" name="mia_receive_date" type="text">
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="">UMFCCI Orignal</label>
            {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="umfcci_original" type="hidden" value="[]">
            <div class='uploaded_files' ></div>
            <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='umfcci_original' style='margin-top:5px;'>Original <i class='fa fa-cloud-upload'></i></a>     --}}
            <div class="file-loading">
                <input  type="file" name="umfcci_original[]" multiple class="com-file" data-overwrite-initial="false" data-min-file-count="4">
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group"> 
            <label for="">UMFCCI Copy</label> 
            {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="umfcci_copy" type="hidden" value="[]">
            <div class='uploaded_files' ></div>
            <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='umfcci_copy' style='margin-top:5px;'>Copy <i class='fa fa-cloud-upload'></i></a>          --}}
            <div class="file-loading">
                <input  type="file" name="umfcci_copy[]" multiple class="com-file" data-overwrite-initial="false" data-min-file-count="4">
            </div>
        </div>
    </div>
    
    <div class="col-md-2">
            <div class="form-group">
                    <label for="">Expire Date <span class="text-danger">*</span></label>
                    <div class="input-group date">
                        <input class="form-control" placeholder="Enter Date" data-rule-minlength="0" name="umfcci_expire_date" type="text">
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
    </div>
    <div class="col-md-2">
            <div class="form-group">
                    <label for="">Receive Date <span class="text-danger">*</span></label>
                    <div class="input-group date">
                        <input class="form-control" placeholder="Enter Date" data-rule-minlength="0" name="umfcci_receive_date" type="text">
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Other File Orignal</label><div class="file-loading">
                <input  type="file" name="other_original[]" multiple class="com-file" data-overwrite-initial="false" data-min-file-count="4">
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group"> 
            <label for="">Other File Copy</label> 
            <div class="file-loading">
                <input  type="file" name="other_copy[]" multiple class="com-file" data-overwrite-initial="false" data-min-file-count="4">
            </div>
        </div>
    </div>
    
    <div class="col-md-2">
            <div class="form-group">
                    <label for="">Expire Date </label>
                    <div class="input-group date">
                        <input class="form-control" placeholder="Enter Date" data-rule-minlength="0" name="other_expire_date" type="text">
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
    </div>
    <div class="col-md-2">
            <div class="form-group">
                    <label for="">Receive Date </label>
                    <div class="input-group date">
                        <input class="form-control" placeholder="Enter Date" data-rule-minlength="0" name="other_receive_date" type="text">
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
                </div>
    </div>
</div>