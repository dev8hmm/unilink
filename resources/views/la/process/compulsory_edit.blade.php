

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
                    @if ($job->customer<>null && $job->customer->files<>null )
                        
                    <div class="row">
                        <div class="col-md-2 form-group" style="padding-top:20px;">
                            <label for="">Company Registration </label>
                        </div>
                        <div class="col-md-3" style="padding-top:20px;">
                            <a class="btn btn-primary">Original 
                                <span class="badge">{{count($job->customer->files->files($job->customer->files->original))}}</span>
                            </a>
                        </div>
                        <div class="col-md-3" style="padding-top:20px;">
                            <a class="btn btn-primary">Copy 
                                <span class="badge">{{count($job->customer->files->files($job->customer->files->copy))}}</span>
                            </a>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="">Expire</label>
                            <input type="text"  class="form-control" value="{{$job->customer->files->expire_date}}">
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="">Receive</label>
                            <input type="text" class="form-control" value="{{$job->customer->files->date}}">
                        </div>
                    </div>
                    @endif
                    
                    @if ($job->impexp<>null && $job->impexp->files<>null)
                        
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
                            <input type="text" class="form-control" value="{{$job->impexp->files->expire_date}}">
                        </div>
                        <div class="col-md-2 from-group">
                            <label for="">Receive</label>
                            <input type="text" class="form-control" value="{{$job->impexp->files->date}}">
                        </div>
                    </div>
                    <br>
                    @endif
                    @if ($job->compulsory<>null && $job->compulsory->letterHead<>null)
                        
                    <div class="row">
                        <div class="col-md-2">
                            <label for="">Letter Head </label>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" name="letter_head_id" value="{{$job->compulsory->letterHead->id}}">
                            {{-- <a class="btn btn-primary">Original <span class="badge">{{count($job->compulsory->letterHead->files($job->compulsory->letterHead->original))}}</span></a> --}}
                            <div class="form-group">
                                <label for="original" style="display:block;">Original :</label>
                                <input class="form-control" placeholder="Enter Original" data-rule-minlength="0" data-rule-maxlength="0" name="letter_head_original" type="hidden" value="{{$job->compulsory->letterHead->original}}">
                                <div class="uploaded_files">
                                    @foreach ($job->compulsory->letterHead->files($job->compulsory->letterHead->original) as $img)
                                    <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                                        <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                                        <i title="Remove File" class="fa fa-times"></i>
                                    </a>
                                    @endforeach
                                    
                                </div>
                                <a class="btn btn-default btn_upload_files" file_type="files" selecter="letter_head_original" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                            </div>
                        </div>
                        <div class="col-md-3">
                           {{-- <a class="btn btn-primary">Copy <span class="badge">{{count($job->compulsory->letterHead->files($job->compulsory->letterHead->copy))}}</span></a> --}}
                           <label for="copy" style="display:block;">Copy :</label>
                                <input class="form-control" placeholder="Enter Original" data-rule-minlength="0" data-rule-maxlength="0" name="letter_head_copy" type="hidden" value="{{$job->compulsory->letterHead->copy}}">
                                <div class="uploaded_files">
                                    @foreach ($job->compulsory->letterHead->files($job->compulsory->letterHead->copy) as $img)
                                    <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                                        <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                                        <i title="Remove File" class="fa fa-times"></i>
                                    </a>
                                    @endforeach
                                </div>
                                <a class="btn btn-default btn_upload_files" file_type="files" selecter="letter_head_copy" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                        
                            </div>
                        {{-- <div class="col-md-2 form-group">
                            <label for="">Expire</label>
                            <div class="input-group date">
                                <input type="text" name="letter_head_expire_date" id="" class="form-control" value="{{$job->compulsory->letterHead->expire_date<>null? date("d/m/Y", strtotime($job->compulsory->letterHead->expire_date)):null}}">
                                <span class="input-group-addon input_dt">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div> --}}
                        <div class="col-md-2 form-group">
                            <label for="">Receive</label>
                            <div class="input-group date">
                                    <input type="text" name="letter_head_receive_date" id="" class="form-control" value="{{$job->compulsory->letterHead->date<>null? date("d/m/Y", strtotime($job->compulsory->letterHead->date)) : null}}">
                                    <span class="input-group-addon input_dt">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Cargo Document</h3>
                </div>
                <div class="panel-body">
                    @if ($job->compulsory->billRegistration<>null)
                     
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
                        <input type="hidden" name="bill_registration_id" value="{{$job->compulsory->billRegistration->id}}">
                        <div class="col-md-3">
                            <label for="copy" style="display:block;">Original :</label>
                            <input class="form-control" placeholder="Enter Original" data-rule-minlength="0" data-rule-maxlength="0" name="bill_registration_original" type="hidden" value="{{$job->compulsory->billRegistration->original}}">
                            <div class="uploaded_files">
                                @foreach ($job->compulsory->billRegistration->files($job->compulsory->billRegistration->original) as $img)
                                <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                                    <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                                    <i title="Remove File" class="fa fa-times"></i>
                                </a>
                                @endforeach
                            </div>
                            <a class="btn btn-default btn_upload_files" file_type="files" selecter="bill_registration_original" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                        </div>
                        <div class="col-md-3">
                            <label for="copy" style="display:block;">Original :</label>
                            <input class="form-control" placeholder="Enter Original" data-rule-minlength="0" data-rule-maxlength="0" name="bill_registration_copy" type="hidden" value="{{$job->compulsory->billRegistration->copy}}">
                            <div class="uploaded_files">
                                @foreach ($job->compulsory->billRegistration->files($job->compulsory->billRegistration->copy) as $img)
                                <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                                    <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                                    <i title="Remove File" class="fa fa-times"></i>
                                </a>
                                @endforeach
                            </div>
                            <a class="btn btn-default btn_upload_files" file_type="files" selecter="bill_registration_copy" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>                       
                        </div>
                        {{-- <div class="col-md-2 form-group">
                            <label for="">Expire</label>
                            {{-- <input type="text" class="form-control" value="{{$job->compulsory->billRegistration->expire_date}}"> --}}
                            {{-- <div class="input-group date">
                                    <input type="text" name="bill_registration_expire_date" id="" class="form-control" value="{{$job->compulsory->billRegistration->expire_date<>null ? date("d/m/Y", strtotime($job->compulsory->billRegistration->expire_date)):null}}">
                                    <span class="input-group-addon input_dt">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                        </div>  --}}
                        <div class="col-md-2 form-group">
                            <label for="">Receive</label>
                            {{-- <input type="text" class="form-control" value="{{$job->compulsory->billRegistration->date}}"> --}}
                            <div class="input-group date">
                                    <input type="text" name="bill_registration_receive_date" id="" class="form-control" value="{{$job->compulsory->billRegistration->date<>null ? date("d/m/Y", strtotime($job->compulsory->billRegistration->date)):null}}">
                                    <span class="input-group-addon input_dt">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                        </div>
                    </div>
                    @endif
                    <br>
                    <div class="row">
                        <div class="col-md-2"><label for="">Reference Number</label></div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" value="{{$job->compulsory->reference_no}}">
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
                    @else
                    <div class="row" style="display:none;">
                    @endif
                    <div class="col-md-2"><label for="">Credit</label></div>
                    <div class="col-md-3">
                        <input type="text" value="{{$job->compulsory->credit}}" class="form-control">
                    </div>
                </div>
                @if ($job->compulsory->commericialInvoice<>null)
                    <div class="row">
                        <div class="col-md-2"><br>
                            <label for="">Commericial Invoice </label>
                        </div>
                        <input type="hidden" name="commericial_invoice_id" value="{{$job->compulsory->commericialInvoice->id}}">
                        <div class="col-md-3"><br>
                           <label for="copy" style="display:block;">Original :</label>
                           <input class="form-control" placeholder="Enter Original" data-rule-minlength="0" data-rule-maxlength="0" name="commericial_invoice_original" type="hidden" value="{{$job->compulsory->letterHead->copy}}">
                           <div class="uploaded_files">
                               @foreach ($job->compulsory->commericialInvoice->files($job->compulsory->commericialInvoice->original) as $img)
                               <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                                   <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                                   <i title="Remove File" class="fa fa-times"></i>
                               </a>
                               @endforeach
                           </div>
                           <a class="btn btn-default btn_upload_files" file_type="files" selecter="commericial_invoice_original" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                   
                        </div>
                        <div class="col-md-3"><br>
                            {{-- <a class="btn btn-primary"><span class="badeg">Copy <span class="badge">{{count($job->compulsory->commericialInvoice->files($job->compulsory->commericialInvoice->copy))}}</span> </span></a> --}}
                            <label for="copy" style="display:block;">Copy :</label>
                           <input class="form-control" placeholder="Enter Original" data-rule-minlength="0" data-rule-maxlength="0" name="commericial_invoice_copy" type="hidden" value="{{$job->compulsory->letterHead->copy}}">
                           <div class="uploaded_files">
                               @foreach ($job->compulsory->commericialInvoice->files($job->compulsory->commericialInvoice->copy) as $img)
                               <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                                   <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                                   <i title="Remove File" class="fa fa-times"></i>
                               </a>
                               @endforeach
                           </div>
                           <a class="btn btn-default btn_upload_files" file_type="files" selecter="commericial_invoice_copy" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                   
                        </div>
                        {{-- <div class="col-md-2 form-group">
                            <label for="">Expire</label>
                            {{-- <input type="text" class="form-control" value="{{$job->compulsory->commericialInvoice->expire_date}}"> --}}
                            <div class="input-group date">
                            <input type="text" name="commericial_invoice_expire_date" id="" value="{{$job->compulsory->commericialInvoice->expire_date<>null ? date("d/m/Y", strtotime($job->compulsory->commericialInvoice->expire_date)):null}}" class="form-control">
                                    <span class="input-group-addon input_dt">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                        </div> --}}
                        <div class="col-md-2 form-group">
                            <label for="">Receive</label>
                            <div class="input-group date">
                                <input type="text" name="commericial_invoice_receive_date" id="" value="{{$job->compulsory->commericialInvoice->date <>null ? date("d/m/Y", strtotime($job->compulsory->commericialInvoice->date)) : null}}" class="form-control">
                                <span class="input-group-addon input_dt">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endif
                    <br>
                    @if ($job->compulsory->packingList<>null)
                    <div class="row">
                        <div class="col-md-2"><br>
                            <label for="">Packing List </label>
                        </div>
                        <input type="hidden" name="packing_list_id" value="{{$job->compulsory->packingList->id}}">
                        <div class="col-md-3"><br>
                           {{-- <a class="btn btn-primary">Original <span class="badge">{{count($job->compulsory->packingList->files($job->compulsory->packingList->original))}}</span></a> --}}
                           <label for="copy" style="display:block;">Original :</label>
                           <input class="form-control" placeholder="Enter Original" data-rule-minlength="0" data-rule-maxlength="0" name="packing_list_original" type="hidden" value="{{$job->compulsory->letterHead->copy}}">
                           <div class="uploaded_files">
                               @foreach ($job->compulsory->packingList->files($job->compulsory->packingList->original) as $img)
                               <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                                   <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                                   <i title="Remove File" class="fa fa-times"></i>
                               </a>
                               @endforeach
                           </div>
                           <a class="btn btn-default btn_upload_files" file_type="files" selecter="packing_list_original" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                        </div>
                        <div class="col-md-3"><br>
                            {{-- <a class="btn btn-primary">Copy <span class="badge">{{count($job->compulsory->packingList->files($job->compulsory->packingList->copy))}}</span></a> --}}
                            <label for="copy" style="display:block;">Copy :</label>
                           <input class="form-control" placeholder="Enter Original" data-rule-minlength="0" data-rule-maxlength="0" name="packing_list_copy" type="hidden" value="{{$job->compulsory->letterHead->copy}}">
                           <div class="uploaded_files">
                               @foreach ($job->compulsory->packingList->files($job->compulsory->packingList->copy) as $img)
                               <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                                   <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                                   <i title="Remove File" class="fa fa-times"></i>
                               </a>
                               @endforeach
                           </div>
                           <a class="btn btn-default btn_upload_files" file_type="files" selecter="packing_list_copy" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                   
                        </div>
                        {{-- <div class="col-md-2 form-group">
                            <label for="">Expire</label>
                            {{-- <input type="text" class="form-control" value="{{$job->compulsory->packingList->expire_date}}"> --}}
                            <div class="input-group date">
                                    <input type="text" name="packing_list_expire_date" id="" class="form-control" value="{{$job->compulsory->packingList->expire_date<>null ? date("d/m/Y", strtotime($job->compulsory->packingList->expire_date)):null}}">
                                    <span class="input-group-addon input_dt">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                        </div> --}}
                        <div class="col-md-2 from-group">
                            <label for="">Receive</label>
                            {{-- <input type="text" class="form-control" value={{$job->compulsory->packingList->date}}> --}}
                            <div class="input-group date">
                                    <input type="text" name="packing_list_receive_date" id="" class="form-control" value="{{$job->compulsory->packingList->date<>null ? date("d/m/Y", strtotime($job->compulsory->packingList->date)):null}}">
                                    <span class="input-group-addon input_dt">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                        </div>
                    </div>
                    @endif
                    <br>
                    @if ($job->compulsory->saleContract<>null)
                        
                    <div class="row">
                        <div class="col-md-2"><br>
                            <label for="">Sale Contract </label>
                        </div>
                        <input type="hidden" name="sale_contract_id" value="{{$job->compulsory->saleContract->id}}">
                        <div class="col-md-3"><br>
                            {{-- <a class="btn btn-primary">Original <span class="badge">{{count($job->compulsory->saleContract->files($job->compulsory->saleContract->original))}}</span></a> --}}
                            <label for="copy" style="display:block;">Original :</label>
                           <input class="form-control" placeholder="Enter Original" data-rule-minlength="0" data-rule-maxlength="0" name="sale_contract_original" type="hidden" value="{{$job->compulsory->letterHead->copy}}">
                           <div class="uploaded_files">
                               @foreach ($job->compulsory->saleContract->files($job->compulsory->saleContract->original) as $img)
                               <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                                   <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                                   <i title="Remove File" class="fa fa-times"></i>
                               </a>
                               @endforeach
                           </div>
                           <a class="btn btn-default btn_upload_files" file_type="files" selecter="sale_contract_original" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                   
                        </div>
                        <div class="col-md-3"><br>
                            {{-- <a class="btn btn-primary">Copy <span class="badge">{{count($job->compulsory->saleContract->files($job->compulsory->saleContract->copy))}}</span></a> --}}
                            <label for="copy" style="display:block;">Copy :</label>
                           <input class="form-control" placeholder="Enter Original" data-rule-minlength="0" data-rule-maxlength="0" name="sale_contract_copy" type="hidden" value="{{$job->compulsory->letterHead->copy}}">
                           <div class="uploaded_files">
                               @foreach ($job->compulsory->saleContract->files($job->compulsory->saleContract->copy) as $img)
                               <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                                   <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                                   <i title="Remove File" class="fa fa-times"></i>
                               </a>
                               @endforeach
                           </div>
                           <a class="btn btn-default btn_upload_files" file_type="files" selecter="sale_contract_copy" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                   
                        </div>
                        {{-- <div class="col-md-2">
                            <label for="">Expire</label>
                            
                            <div class="input-group date">
                                    <input type="text" name="sale_contract_expire_date" id="" class="form-control" value="{{$job->compulsory->saleContract->expire_date<>null ? date("d/m/Y", strtotime($job->compulsory->saleContract->expire_date)):null}}">
                                    <span class="input-group-addon input_dt">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                        </div> --}}
                        <div class="col-md-2 from-group">
                            <label for="">Receive</label>
                            {{-- <input type="text" class="form-control" value="{{$job->compulsory->saleContract->date}}"> --}}
                            <div class="input-group date">
                                    <input type="text" name="sale_contract_receive_date" id="" class="form-control" value="{{$job->compulsory->saleContract->date <>null ? date("d/m/Y", strtotime($job->compulsory->saleContract->date)):null}}">
                                    <span class="input-group-addon input_dt">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                        </div>
                    </div>
                    @endif

                    @if ($job->compulsory->Licence<>null)
                        
                    <div class="row">
                        <div class="col-md-2"><br>
                            <label for="">Licence </label>
                        </div>
                        <input type="hidden" name="sale_contract_id" value="{{$job->compulsory->Licence->id}}">
                        <div class="col-md-3"><br>
                            {{-- <a class="btn btn-primary">Original <span class="badge">{{count($job->compulsory->licence->files($job->compulsory->licence->original))}}</span></a> --}}
                            <label for="copy" style="display:block;">Original :</label>
                           <input class="form-control" placeholder="Enter Original" data-rule-minlength="0" data-rule-maxlength="0" name="sale_contract_original" type="hidden" value="{{$job->compulsory->letterHead->copy}}">
                           <div class="uploaded_files">
                               @foreach ($job->compulsory->Licence->files($job->compulsory->Licence->original) as $img)
                               <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                                   <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                                   <i title="Remove File" class="fa fa-times"></i>
                               </a>
                               @endforeach
                           </div>
                           <a class="btn btn-default btn_upload_files" file_type="files" selecter="sale_contract_original" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                   
                        </div>
                        <div class="col-md-3"><br>
                            {{-- <a class="btn btn-primary">Copy <span class="badge">{{count($job->compulsory->Licence->files($job->compulsory->Licence->copy))}}</span></a> --}}
                            <label for="copy" style="display:block;">Copy :</label>
                           <input class="form-control" placeholder="Enter Original" data-rule-minlength="0" data-rule-maxlength="0" name="sale_contract_copy" type="hidden" value="{{$job->compulsory->letterHead->copy}}">
                           <div class="uploaded_files">
                               @foreach ($job->compulsory->Licence->files($job->compulsory->Licence->copy) as $img)
                               <a class="uploaded_file2" upload_id="2" target="_blank" href="{{ url('files/'.$img->hash.'/'.$img->name) }}">
                                   <img src="{{ url('files/'.$img->hash.'/'.$img->name) }}?s=90">
                                   <i title="Remove File" class="fa fa-times"></i>
                               </a>
                               @endforeach
                           </div>
                           <a class="btn btn-default btn_upload_files" file_type="files" selecter="sale_contract_copy" style="margin-top:5px;">Upload <i class="fa fa-cloud-upload"></i></a>
                   
                        </div>
                        {{-- <div class="col-md-2">
                            <label for="">Expire</label>
                            
                            <div class="input-group date">
                                    <input type="text" name="sale_contract_expire_date" id="" class="form-control" value="{{$job->compulsory->Licence->expire_date<>null ? date("d/m/Y", strtotime($job->compulsory->Licence->expire_date)):null}}">
                                    <span class="input-group-addon input_dt">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                        </div> --}}
                        <div class="col-md-2 from-group">
                            <label for="">Receive</label>
                            {{-- <input type="text" class="form-control" value="{{$job->compulsory->Licence->date}}"> --}}
                            <div class="input-group date">
                                    <input type="text" name="sale_contract_receive_date" id="" class="form-control" value="{{$job->compulsory->Licence->date <>null ? date("d/m/Y", strtotime($job->compulsory->Licence->date)):null}}">
                                    <span class="input-group-addon input_dt">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
        <div class="box-footer">
            <a href="javascript:history.back()" class="btn btn-warning">Back</a>
            <button type="submit" class="btn btn-success pull-right">Update</button>
        </div>
    </div>
    