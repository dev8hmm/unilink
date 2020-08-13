@extends("la.layouts.app")

@section("contentheader_title")
    <a href="{{ url(config('laraadmin.adminRoute') . '/airlines') }}">AirLine</a> :
@endsection
@section("contentheader_description", $airline->$view_col)
@section("section", "AirLines")
@section("section_url", url(config('laraadmin.adminRoute') . '/airlines'))
@section("sub_section", "Edit")

@section("htmlheader_title", "AirLines Edit : ".$airline->$view_col)

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
                {!! Form::model($airline, ['route' => [config('laraadmin.adminRoute') . '.airlines.update', $airline->id ], 'method'=>'PUT', 'id' => 'airline-edit-form']) !!}
                    @la_form($module)
                    
                    {{--
                    @la_input($module, 'name')
					@la_input($module, 'code')
					@la_input($module, 'country')
                    --}}
                    <br>
                    <div class="form-group">
                        {!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <a href="{{ url(config('laraadmin.adminRoute') . '/airlines') }}" class="btn btn-default pull-right">Cancel</a>
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
    $("#airline-edit-form").validate({
        
    });
});
</script>
@endpush
