<div class="box box-success repeater">
        <div class="box-body" data-repeater-list="group"> 
            <div class="box-body" data-repeater-list="group" style="background-color:#f2e3ee;" >
                <input data-repeater-create type="button"  value="Add" class="btn btn-primary pull-right addNew"/>
                <div data-repeater-item style="border-bottom: 3px double white;">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Enter File Name</label>
                                <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Original file upload</label>
                                <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="ie_original" type="hidden" value="[]">
                                <div class='uploaded_files' ></div>
                                <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='ie_original' style='margin-top:5px;'>Original <i class='fa fa-cloud-upload'></i></a>    
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">  
                                <label for="">Copy file upload</label> 
                                <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="ie_copy" type="hidden" value="[]">
                                <div class='uploaded_files' ></div>
                                <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='ie_copy' style='margin-top:5px;'>Copy <i class='fa fa-cloud-upload'></i></a>    
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Receive Date <span class="text-danger">*</span></label>
                                <div class="input-group date">
                                    <input class="form-control" placeholder="Enter Date" data-rule-minlength="0" name="ie_receive_date" type="text" required>
                                    <span class="input-group-addon input_dt">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Expire Date <span class="text-danger">*</span></label>
                                <div class="input-group date">
                                    <input class="form-control" placeholder="Enter Date" data-rule-minlength="0" name="ie_certificate_expire_date" type="text" required>
                                    <span class="input-group-addon input_dt">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input data-repeater-delete type="button" value="Remove" class="btn btn-danger btn-sm pull-right"/>
                </div>
            </div>
        </div>
    </div>