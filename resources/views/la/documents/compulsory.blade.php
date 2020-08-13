

{{-- Start Document Receiving --}}
<div class="box box-success">
    <div class="box-header bg-success">
        Compulsory Document Receiving
    </div>
    <div class="box-body">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Admin Document</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-2 form-group" style="padding-top:20px;">
                        <label for="">Company Registration </label>
                    </div>
                    <div class="col-md-3" style="padding-top:20px;">
                        <a class="btn btn-primary">Original 
                            <span class="badge">{{$job->customer<>null?(count($job->customer->files->files($job->customer->files->original))):0}}</span>
                        </a>
                    </div>
                    <div class="col-md-3" style="padding-top:20px;">
                        <a class="btn btn-primary">Copy 
                            <span class="badge">{{$job->customer<>null?(count($job->customer->files->files($job->customer->files->copy))):0}}</span>
                        </a>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="">Expire</label>
                        <input type="text"  class="form-control" value="{{$job->customer<>null?$job->customer->files->expire_date:''}}" readonly>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="">Receive</label>
                        <input type="text" class="form-control" value="{{$job->customer<>null?$job->customer->files->date:''}}" readonly>
                    </div>
                </div>
                @if ($job->impexp<>null)
                   
                <div class="row">
                    <div class="col-md-2" style="padding-top:20px;">
                        <label for="">IE Registration </label>
                    </div>
                    <div class="col-md-3" style="padding-top:20px;">
                        <a class="btn btn-primary">Original 
                            <span class="badge">{{count($job->impexp->files->files($job->impexp->files->original))}}</span>
                        </a>
                    </div>
                    <div class="col-md-3" style="padding-top:20px;">
                        <a class="btn btn-primary">Copy
                            <span class="badge">{{count($job->impexp->files->files($job->impexp->files->copy))}}</span>
                        </a>
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="">Expire</label>
                        <input type="text" class="form-control" value="{{$job->impexp->files->expire_date}}" readonly>
                    </div>
                    <div class="col-md-2 from-group">
                        <label for="">Receive</label>
                        <input type="text" class="form-control" value="{{$job->impexp->files->date}}" readonly>
                    </div>
                </div>
                <br>
                @endif
                <div class="row">
                    <div class="col-md-2">
                        <label for="">Letter Head </label>
                    </div>
                    <div class="col-md-3 form-group">
                        <label>Original</label>
                        {{-- <input class="required" data-rule-minlength="0" data-rule-maxlength="0" name="letterhead_original" type="hidden" value="[]">
                        <div class='uploaded_files'></div>
                        <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='letterhead_original' style='margin-top:5px;'>Original <i class='fa fa-cloud-upload'></i></a>     --}}
                        <div class="file-loading">
                            <input  type="file" name="letterhead_original[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                        </div>
                    </div>
                    <div class="col-md-3 form-group">
                        <label>Copy</label>
                        {{-- <input class="required" data-rule-minlength="0" data-rule-maxlength="0" name="letterhead_copy" type="hidden" value="[]">
                        <div class='uploaded_files'></div>
                        <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='letterhead_copy' style='margin-top:5px;'>Copy <i class='fa fa-cloud-upload'></i></a>     --}}
                        <div class="file-loading">
                            <input  type="file" name="letterhead_copy[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                        </div>
                    </div>
                    {{-- <div class="col-md-2 form-group">
                        <label for="">Expire</label>
                        <div class="input-group date">
                            <input type="text" name="letterhead_expire" id="" class="form-control required">
                            <span class="input-group-addon input_dt">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    </div> --}}
                    <div class="col-md-2 form-group">
                        <label for="">Receive</label>
                        <div class="input-group date">
                            <input type="text" name="letterhead_receive" id="" class="form-control required">
                            <span class="input-group-addon input_dt">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Cargo Document</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-2">
                        @php
                        switch ($job->shipment->type) {
                            case 'IMPORT':
                            if($job->shipment->transport<>"SEA")
                            {
                                echo '<label>MAWB </label>';
                            }
                            else {
                                echo '<label>MBL </label>';
                            }
                            break;
                            
                            case 'EXPORT':
                            if($job->shipment->transport<>"SEA")
                            {
                                echo '<label>HAWB </label>';
                            }
                            else {
                                echo '<label>HBL </label>';
                            }
                            break;
                            default:
                            # code...
                            break;
                        }
                        @endphp
                        
                    </div>
                    <div class="col-md-3">
                        {{-- <input class="required" data-rule-minlength="0" data-rule-maxlength="0" name="bill_original" type="hidden" value="[]">
                        <div class='uploaded_files'></div>
                        <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='bill_original' style='margin-top:5px;'>Original <i class='fa fa-cloud-upload'></i></a>     --}}
                        <div class="file-loading">
                            <input  type="file" name="bill_original[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                        </div>
                    </div>
                    <div class="col-md-3">
                     {{-- <input class="required" data-rule-minlength="0" data-rule-maxlength="0" name="bill_copy" type="hidden" value="[]">
                        <div class='uploaded_files'></div>
                        <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='bill_copy' style='margin-top:5px;'>Copy <i class='fa fa-cloud-upload'></i></a>     --}}
                        <div class="file-loading">
                            <input  type="file" name="bill_copy[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                        </div>
                    </div>
                    {{-- <div class="col-md-2 form-group">
                        <label for="">Expire</label>
                        <div class="input-group date">
                            <input type="text" name="bill_expire" id="" class="form-control required">
                            <span class="input-group-addon input_dt">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    </div> --}}
                    <div class="col-md-2 form-group">
                        <label for="">Receive</label>
                        <div class="input-group date">
                            <input type="text" name="bill_receive" id="" class="form-control required">
                            <span class="input-group-addon input_dt">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2"><label for="">Reference Number</label></div>
                    <div class="col-md-3">
                        <input type="text" name="reference_number" id="" class="form-control required">
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Clearance Document</h3>
            </div>
            <div class="panel-body">
                @if ($job->shipment->type<>"IMPORT")
                <div class="row">
                        <div class="col-md-2"><label for="">Credit No.</label></div>
                        <div class="col-md-3">
                            <input type="text" name="credit" class="form-control required">
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-2"><br>
                        <label for="">Commericial Invoice </label>
                    </div>
                    <div class="col-md-3"><br>
                       {{-- <input class="required" data-rule-minlength="0" data-rule-maxlength="0" name="commericial_original" type="hidden" value="[]">
                        <div class='uploaded_files'></div>
                        <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='commericial_original' style='margin-top:5px;'>Original <i class='fa fa-cloud-upload'></i></a>     --}}
                        <div class="file-loading">
                            <input  type="file" name="commericial_original[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                        </div>
                    </div>
                    <div class="col-md-3"><br>
                        {{-- <input class="required" data-rule-minlength="0" data-rule-maxlength="0" name="commericial_copy" type="hidden" value="[]">
                        <div class='uploaded_files'></div>
                        <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='commericial_copy' style='margin-top:5px;'>Copy <i class='fa fa-cloud-upload'></i></a>     --}}
                        <div class="file-loading">
                            <input  type="file" name="commericial_copy[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                        </div>

                    </div>
                    {{-- <div class="col-md-2 form-group">
                        <label for="">Expire</label>
                        <div class="input-group date">
                            <input type="text" name="commericial_expire" id="" class="form-control required">
                            <span class="input-group-addon input_dt">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    </div> --}}
                    <div class="col-md-2 form-group">
                        <label for="">Receive</label>
                        <div class="input-group date">
                            <input type="text" name="commericial_receive" id="" class="form-control required">
                            <span class="input-group-addon input_dt">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2"><br>
                        <label for="">Packing List </label>
                    </div>
                    <div class="col-md-3">
                         {{-- <input class="required" data-rule-minlength="0" data-rule-maxlength="0" name="packing_original" type="hidden" value="[]">
                        <div class='uploaded_files'></div>
                        <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='packing_original' style='margin-top:5px;'>Original <i class='fa fa-cloud-upload'></i></a>     --}}
                        <div class="file-loading">
                            <input  type="file" name="packing_original[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                        </div>
                    </div>
                    <div class="col-md-3">
                       {{-- <input class="required" data-rule-minlength="0" data-rule-maxlength="0" name="packing_copy" type="hidden" value="[]">
                        <div class='uploaded_files'></div>
                        <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='packing_copy' style='margin-top:5px;'>Copy <i class='fa fa-cloud-upload'></i></a>     --}}
                        <div class="file-loading">
                            <input  type="file" name="packing_copy[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                        </div>
                    </div>
                    {{-- <div class="col-md-2 form-group">
                        <label for="">Expire</label>
                        <div class="input-group date">
                            <input type="text" name="packing_expire" id="" class="form-control required">
                            <span class="input-group-addon input_dt">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    </div> --}}
                    <div class="col-md-2 from-group">
                        <label for="">Receive</label>
                        <div class="input-group date">
                            <input type="text" name="packing_receive" id="" class="form-control required" >
                            <span class="input-group-addon input_dt">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2"><br>
                        <label for="">Sale Contract </label>
                    </div>
                    <div class="col-md-3">
                        {{-- <input class="required" data-rule-minlength="0" data-rule-maxlength="0" name="sale_original" type="hidden" value="[]">
                        <div class='uploaded_files'></div>
                        <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='sale_original' style='margin-top:5px;'>Original <i class='fa fa-cloud-upload'></i></a>     --}}
                        <div class="file-loading">
                            <input  type="file" name="sale_original[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                        </div>
                    </div>
                    <div class="col-md-3">
                        {{-- <input class="required" data-rule-minlength="0" data-rule-maxlength="0" name="sale_copy" type="hidden" value="[]">
                        <div class='uploaded_files'></div>
                        <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='sale_copy' style='margin-top:5px;'>Copy <i class='fa fa-cloud-upload'></i></a>     --}}
                        <div class="file-loading">
                            <input  type="file" name="sale_copy[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                        </div>
                    </div>
                    {{-- <div class="col-md-2">
                        <label for="">Expire</label>
                        <div class="input-group date">
                            <input type="text" name="sale_expire" id="" class="form-control required">
                            <span class="input-group-addon input_dt">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    </div> --}}
                    <div class="col-md-2 from-group">
                        <label for="">Receive</label>
                        <div class="input-group date">
                            <input type="text" name="sale_receive" id="" class="form-control required">
                            <span class="input-group-addon input_dt">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
  
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2"><br>
                        <label for="">Licence </label>
                    </div>
                    <div class="col-md-3">
                        {{-- <input class="required" data-rule-minlength="0" data-rule-maxlength="0" name="sale_original" type="hidden" value="[]">
                        <div class='uploaded_files'></div>
                        <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='sale_original' style='margin-top:5px;'>Original <i class='fa fa-cloud-upload'></i></a>     --}}
                        <div class="file-loading">
                            <input  type="file" name="licence_original[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                        </div>
                    </div>
                    <div class="col-md-3">
                        {{-- <input class="required" data-rule-minlength="0" data-rule-maxlength="0" name="licence_copy" type="hidden" value="[]">
                        <div class='uploaded_files'></div>
                        <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='licence_copy' style='margin-top:5px;'>Copy <i class='fa fa-cloud-upload'></i></a>     --}}
                        <div class="file-loading">
                            <input  type="file" name="licence_copy[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                        </div>
                    </div>
                    {{-- <div class="col-md-2">
                        <label for="">Expire</label>
                        <div class="input-group date">
                            <input type="text" name="licence_expire" id="" class="form-control required">
                            <span class="input-group-addon input_dt">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                    </div> --}}
                    <div class="col-md-2 from-group">
                        <label for="">Receive</label>
                        <div class="input-group date">
                            <input type="text" name="licence_receive" id="" class="form-control required">
                            <span class="input-group-addon input_dt">
                                <span class="fa fa-calendar"></span>
                            </span>
                        </div>
  
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>