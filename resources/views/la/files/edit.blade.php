@extends("la.layouts.app")

@section("contentheader_title")
    <a href="{{ url(config('laraadmin.adminRoute') . '/files') }}">File</a> :
@endsection
@section("contentheader_description", $file->$view_col)
@section("section", "Files")
@section("section_url", url(config('laraadmin.adminRoute') . '/files'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Files Edit : ".$file->$view_col)

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
                {!! Form::model($file, ['route' => [config('laraadmin.adminRoute') . '.files.update', $file->id ], 'method'=>'PUT', 'id' => 'file-edit-form']) !!}
                    @la_form($module)
                    
                    {{--
                    @la_input($module, 'original')
					@la_input($module, 'copy')
					@la_input($module, 'date')
					@la_input($module, 'expire_date')
					@la_input($module, 'status')
                    --}}
                    <br>
                    <div class="form-group">
                        {!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <a href="{{ url(config('laraadmin.adminRoute') . '/files') }}" class="btn btn-default pull-right">Cancel</a>
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
    $("#file-edit-form").validate({
        
    });
});
</script>
@endpush
