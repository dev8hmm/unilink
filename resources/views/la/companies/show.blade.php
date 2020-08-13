@extends('la.layouts.app')

@section('htmlheader_title')
Company View
@endsection


@section('main-content')
<div id="page-content" class="profile2">
    
    
    <ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
        <li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/companies') }}" data-toggle="tooltip" data-placement="right" title="Back to Companies"><i class="fa fa-chevron-left"></i></a></li>
        <li class="active"><a role="tab" data-toggle="tab" class="active" href="#tab-general-info" data-target="#tab-info"><i class="fa fa-bars"></i> General Info</a></li>
    </ul>
    
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active fade in" id="tab-info">
            <div class="panel infolist">
                <div class="panel-default panel-heading text-dark">
                    <h4 style="display: inline;">General Info</h4>
                    <span class="pull-right">
                        Download All Files : <a href="/admin/company/{{$module->row->id}}/files/download/registration" class="btn btn-sm btn-warning"><i class="fa fa-download"></i></a>
                    </span>
                   
                </div>
                <div class="row">
                    @if ($module->row->ie<>null)
                    <div class="col-md-6">
                    @else
                    <div class="col-md-12">
                    @endif
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-5"><label>Name </label></div>
                                <div class="col-md-7">: {{$module->row->name}}</div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5"><label for="">Attention </label></div>
                                <div class="col-md-7">: {{$module->row->attention}}</div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5"> <label for="">Address </label></div>
                                <div class="col-md-7">: {{$module->row->address}}</div>
                            </div>
                             <div class="form-group">
                                 <div class="col-md-5"><label for="">Phone</label></div>
                                 <div class="col-md-7">: {{$module->row->phone}}</div>
                             </div>
                              <div class="form-group">
                                  <div class="col-md-5"><label for="">Email</label></div>
                                  <div class="col-md-7">: {{$module->row->email}}</div>
                              </div>
                              <div class="form-group">
                                  <div class="col-md-5"><label for="">Credibility</label></div>
                                  <div class="col-md-7">: {{$module->row->credibility}}</div>
                              </div>
                              <div class="form-group">
                                <div class="col-md-5"><label for=""> Registration</label></div>
                                <div class="col-md-7">
                                    <span class="btn btn-sm btn-primary">
                                       Original <span class="badge">{{count($module->row->files->files($module->row->files->original))}}</span>
                                    </span>
                                    <span class="btn btn-sm btn-primary">
                                       Copy <span class="badge">{{count($module->row->files->files($module->row->files->copy))}}</span>
                                    </span>
                                   
                                </div>
                              </div>
                             <div class="form-group">
                                 <div class="col-md-5"><label for="">Expire Date </label></div>
                                 <div class="col-md-7">
                                     {{$module->row->expire_date}}
                                </div>
                             </div>
                            
                        </div>
                    </div>
                    @if ($module->row->ie<>null)
                    <div class="col-md-6">
                            <div class="panel-body">
                            @la_display($module, 'remark1')
                            @la_display($module, 'remark2')
                            @la_display($module, 'remark3')
                            <div class="form-group">
                                <div class="col-md-4"><label for=""> IE Certificate</label></div>
                                <div class="col-md-8">
                                    <span class="btn btn-sm btn-primary"> Original 
                                        <span class="badge">
                                            {{$module->row->ie->fcertificate<>null?count($module->row->ie->fcertificate->files($module->row->ie->fcertificate->original)):"0"}}
                                        </span>    
                                    </span> 
                                    <span class="btn btn-sm btn-primary"> Copy 
                                        <span class="badge">
                                            {{$module->row->ie->fcertificate<>null?count($module->row->ie->fcertificate->files($module->row->ie->fcertificate->copy)):"0"}}
                                        </span>    
                                    </span> 
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4"><label for="">MCC</label></div>
                                <div class="col-md-8">
                                    <span class="btn btn-sm btn-primary"> Original 
                                        <span class="badge">
                                            {{$module->row->ie->fmcc<>null?count($module->row->ie->fmcc->files($module->row->ie->fmcc->original)):"0"}}
                                        </span>    
                                    </span> 
                                    <span class="btn btn-sm btn-primary"> Copy 
                                        <span class="badge">
                                            {{$module->row->ie->fmcc<>null?count($module->row->ie->fmcc->files($module->row->ie->fmcc->copy)):"0"}}
                                        </span>    
                                    </span> 
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-4"><label for="">MGMA</label></div>
                                <div class="col-md-8">
                                    <span class="btn btn-sm btn-primary"> Original 
                                        <span class="badge">
                                            {{$module->row->ie->fmgma<>null?count($module->row->ie->fmgma->files($module->row->ie->fmgma->original)):"0"}}
                                        </span>    
                                    </span> 
                                    <span class="btn btn-sm btn-primary"> Copy 
                                        <span class="badge">
                                            {{$module->row->ie->fmgma<>null?count($module->row->ie->fmgma->files($module->row->ie->fmgma->copy)):"0"}}
                                        </span>    
                                    </span> 
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4"><label for="">MIA</label></div>
                                <div class="col-md-8">
                                    <span class="btn btn-sm btn-primary"> Original 
                                        <span class="badge">
                                            {{$module->row->ie->fmia<>null?count($module->row->ie->fmia->files($module->row->ie->fmia->original)):"0"}}
                                        </span>    
                                    </span> 
                                    <span class="btn btn-sm btn-primary"> Copy 
                                        <span class="badge">
                                            {{$module->row->ie->fmia<>null?count($module->row->ie->fmia->files($module->row->ie->fmia->copy)):"0"}}
                                        </span>    
                                    </span> 
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4"><label for="">UMFCCI</label></div>
                                <div class="col-md-8">
                                    <span class="btn btn-sm btn-primary"> Original 
                                        <span class="badge">
                                            {{$module->row->ie->fumfcci<>null?count($module->row->ie->fumfcci->files($module->row->ie->fumfcci->original)):"0"}}
                                        </span>    
                                    </span> 
                                    <span class="btn btn-sm btn-primary"> Copy 
                                        <span class="badge">
                                            {{$module->row->ie->fumfcci<>null?count($module->row->ie->fumfcci->files($module->row->ie->fumfcci->copy)):"0"}}
                                        </span>    
                                    </span> 
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4"><label for="">Other File</label></div>
                                <div class="col-md-8">
                                    <span class="btn btn-sm btn-primary"> Original 
                                        <span class="badge">
                                            {{$module->row->ie->fother<>null?count($module->row->ie->fother->files($module->row->ie->fother->original)):'0'}}
                                        </span>    
                                    </span> 
                                    <span class="btn btn-sm btn-primary"> Copy 
                                        <span class="badge">
                                            {{$module->row->ie->fother<>null?count($module->row->ie->fother->files($module->row->ie->fother->copy)):'0'}}
                                        </span>    
                                    </span> 
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>   
                <div class="row">
                    <div class="col-md-12 text-right " style="padding-right:30px;">
                        <a href="/admin/companies" class="btn btn-warning">Back</a>
                    </div>
                </div>      
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
