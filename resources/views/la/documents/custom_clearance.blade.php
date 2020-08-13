<div class="box box-success">
        <div class="box-header bg-success">
            <label for="">
                Custom Clearance 
                <span class="text-white"> >> </span>
                {{$job->custom_clearance_service->name}}
            </label>
        </div>
        <div class="box-body">
           @foreach ($service_detail as $i=> $service)
               
               <div class="row">
                   <div class="col-md-2 form-group">
                       <label for="">Doc Name</label>
                       <input type="text" value="{{$service}}" name="service[{{$i}}]" id=""  class="form-control">
                   </div>
                   <div class="col-md-3 form-group">
                        <label for="">Original File</label>
                            {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="service_original{{$i}}" type="hidden" value="[]">
                            <div class='uploaded_files'></div>
                            <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='service_original{{$i}}' style='margin-top:5px;'>Original <i class='fa fa-cloud-upload'></i></a>     --}}
                            <div class="file-loading">
                                <input  type="file" name="service_original{{$i}}[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                            </div>
                    </div>
                  
                    <div class="col-md-3 form-group">
                        <label for="">Copy File</label>
                            {{-- <input class="" data-rule-minlength="0" data-rule-maxlength="0" name="service_copy{{$i}}" type="hidden" value="[]">
                            <div class='uploaded_files'></div>
                            <a class='btn btn-default btn_upload_files btn-sm' file_type='files' selecter='service_copy{{$i}}' style='margin-top:5px;'>Copy <i class='fa fa-cloud-upload'></i></a>     --}}
                            <div class="file-loading">
                                <input  type="file" name="service_copy{{$i}}" multiple class="file" data-overwrite-initial="false" data-min-file-count="4">
                            </div>
                    </div>
                    
                    <div class="col-md-2 form-group">
                            <label for="">Expire Date</label>
                            <div class="input-group date">
                            <input type="text" name="expire_date[{{$i}}]" id="" class="form-control">
                            <span class="input-group-addon input_dt">
                                    <span class="fa fa-calendar"></span>
                            </span>
                            </div>
                        </div>
                        <div class="col-md-2 form-group">
                                <label for="">Receive Date</label>
                                <div class="input-group date">
                                    <input type="text" name="receive_date[{{$i}}]" id="" class="form-control">
                                    <span class="input-group-addon input_dt">
                                            <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                            </div>
               </div>
               @endforeach
            <br>
           
        </div>
       
    </div>