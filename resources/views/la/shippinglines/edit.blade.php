@extends("la.layouts.app")

@section("contentheader_title")
    <a href="{{ url(config('laraadmin.adminRoute') . '/shippinglines') }}">ShippingLine</a> :
@endsection
@section("contentheader_description", $shippingline->$view_col)
@section("section", "ShippingLines")
@section("section_url", url(config('laraadmin.adminRoute') . '/shippinglines'))
@section("sub_section", "Edit")

@section("htmlheader_title", "ShippingLines Edit : ".$shippingline->$view_col)

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
                {!! Form::model($shippingline, ['route' => [config('laraadmin.adminRoute') . '.shippinglines.update', $shippingline->id ], 'method'=>'PUT', 'id' => 'shippingline-edit-form']) !!}
                    @la_form($module)
                    
                    {{--
                    @la_input($module, 'name')
					@la_input($module, 'code')
                    --}}
                    <br>
                    <div class="form-group">
                        {!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <a href="{{ url(config('laraadmin.adminRoute') . '/shippinglines') }}" class="btn btn-default pull-right">Cancel</a>
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
    $("#shippingline-edit-form").validate({
        
    });
});
</script>
@endpush
