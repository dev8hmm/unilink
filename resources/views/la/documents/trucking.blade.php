<div class="box box-success">
        <div class="box-header bg-success">
            <label for="">Trucking</label>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-2">
                    <label for="">Name</label>
                    <input type="text" name="" id="" class="form-control" value="Cargo Receipt" readonly>
                </div>
                <div class="col-md-3 form-group">
                    <label for="">Original File</label>
                        {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="original_cargo_receipt" type="hidden" value="[]">
                        <div class='uploaded_files'></div>
                        <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='original_cargo_receipt' style='margin-top:5px;'>Original <i class='fa fa-cloud-upload'></i></a>     --}}
                        <div class="file-loading">
                            <input  type="file" name="original_cargo_receipt[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                        </div>
                </div>
                <div class="col-md-3 form-group">
                    <label for="">Copy File</label>
                        {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="copy_cargo_receipt" type="hidden" value="[]">
                        <div class='uploaded_files'></div>
                        <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='copy_cargo_receipt' style='margin-top:5px;'>Copy <i class='fa fa-cloud-upload'></i></a>     --}}
                        <div class="file-loading">
                            <input  type="file" name="copy_cargo_receipt[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                        </div>
                </div>
                {{-- <div class="col-md-2 form-group ">
                        <label for="">Expire Date</label>
                        <div class="input-group date">
                        <input type="text" name="cargo_receipt_expire_date" id="" class="form-control">
                        <span class="input-group-addon input_dt">
                                <span class="fa fa-calendar"></span>
                        </span>
                        </div>
                </div> --}}
                <div class="col-md-2 form-group">
                    <label for="">Receive Date</label>
                    <div class="input-group date">
                    <input type="text" name="cargo_receipt_recieve_date" id="" class="form-control">
                    <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                    </span>
                </div>
               
            </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="">Commodity</label>
                    <input type="text"  class="form-control" value="{{$job->shipment<>null?$job->shipment->commodity:'~'}}"  readonly>
                </div>
                <div class="col-md-4 form-group">
                    <label for="">PKGS</label>
                    <input type="text"  class="form-control" value="{{$job->shipment<>null?$job->shipment->pkgs:'~'}}" readonly>
                </div>
                <div class="col-md-4 form-group">
                    <label for="">KGS</label>
                    <input type="text"  class="form-control" value="{{$job->shipment<>null?$job->shipment->kgs:"~"}}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="">Shipper</label>
                    <input type="text" name="shipper" id="" class="form-control">
                </div>
                <div class="col-md-3 form-group ">
                        <label for="">Delivery</label>
                        <div class="input-group date">
                            <input type="text" name="delivery_date" id="" class="form-control">
                            <span class="input-group-addon input_dt">
                                    <span class="fa fa-calendar"></span>
                            </span>
                        </div>
                </div>
                <div class="col-md-3 form-group">
                    <label for="">Sender</label>
                    <input type="text" name="sender" id="" class="form-control">
                </div>
                <div class="col-md-3 form-group">
                    <label for="">Receiver</label>
                    <input type="text" name="receiver" id="" class="form-control">
                </div>
            </div>
        
        </div>
    </div>