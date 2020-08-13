@extends("la.layouts.app")

@section("contentheader_title")
    <a href="{{ url(config('laraadmin.adminRoute') . '/shipments') }}">Shipment</a> :
@endsection
@section("contentheader_description", $shipment->$view_col)
@section("section", "Shipments")
@section("section_url", url(config('laraadmin.adminRoute') . '/shipments'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Shipments Edit : ".$shipment->$view_col)

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
                {!! Form::model($shipment, ['route' => [config('laraadmin.adminRoute') . '.shipments.update', $shipment->id ], 'method'=>'PUT', 'id' => 'shipment-edit-form']) !!}
                    @la_form($module)
                    
                    {{--
                    @la_input($module, 'type')
					@la_input($module, 'transport')
					@la_input($module, 'commodity')
					@la_input($module, 'pkgs')
					@la_input($module, 'kgs')
					@la_input($module, 'pol')
					@la_input($module, 'pod')
					@la_input($module, 'eta')
					@la_input($module, 'etd')
					@la_input($module, 'date')
					@la_input($module, 'machine_no')
                    --}}
                    <br>
                    <div class="form-group">
                        {!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <a href="{{ url(config('laraadmin.adminRoute') . '/shipments') }}" class="btn btn-default pull-right">Cancel</a>
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
    $("#shipment-edit-form").validate({
        
    });
});
</script>
@endpush
