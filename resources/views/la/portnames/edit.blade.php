@extends("la.layouts.app")

@section("contentheader_title")
    <a href="{{ url(config('laraadmin.adminRoute') . '/portnames') }}">PortName</a> :
@endsection
@section("contentheader_description", $portname->$view_col)
@section("section", "PortNames")
@section("section_url", url(config('laraadmin.adminRoute') . '/portnames'))
@section("sub_section", "Edit")

@section("htmlheader_title", "PortNames Edit : ".$portname->$view_col)

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
                {!! Form::model($portname, ['route' => [config('laraadmin.adminRoute') . '.portnames.update', $portname->id ], 'method'=>'PUT', 'id' => 'portname-edit-form']) !!}
                    @la_form($module)
                    
                    {{--
                    @la_input($module, 'country')
					@la_input($module, 'name')
					@la_input($module, 'status')
                    --}}
                    <br>
                    <div class="form-group">
                        {!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <a href="{{ url(config('laraadmin.adminRoute') . '/portnames') }}" class="btn btn-default pull-right">Cancel</a>
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
    $("#portname-edit-form").validate({
        
    });
});
</script>
@endpush
