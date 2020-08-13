@extends("la.layouts.app")

@section("contentheader_title")
    <a href="{{ url(config('laraadmin.adminRoute') . '/ie_infos') }}">IE Info</a> :
@endsection
@section("contentheader_description", $ie_info->$view_col)
@section("section", "IE Infos")
@section("section_url", url(config('laraadmin.adminRoute') . '/ie_infos'))
@section("sub_section", "Edit")

@section("htmlheader_title", "IE Infos Edit : ".$ie_info->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
    <div class="box-header">
        
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {!! Form::model($ie_info, ['route' => [config('laraadmin.adminRoute') . '.ie_infos.update', $ie_info->id ], 'method'=>'PUT', 'id' => 'ie_info-edit-form']) !!}
                    @la_form($module)
                    
                    {{--
                    @la_input($module, 'company_id')
					@la_input($module, 'certificate')
					@la_input($module, 'mcc')
					@la_input($module, 'mgma')
					@la_input($module, 'mia')
					@la_input($module, 'omfcc')
                    --}}
                    <br>
                    <div class="form-group">
                        {!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <a href="{{ url(config('laraadmin.adminRoute') . '/ie_infos') }}" class="btn btn-default pull-right">Cancel</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
    $("#ie_info-edit-form").validate({
        
    });
});
</script>
@endpush
