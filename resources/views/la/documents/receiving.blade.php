@extends("la.layouts.app")

@section("contentheader_title", "Document Receive")
@section("contentheader_description", "Document")
@section("section", "Jobs")
@section("sub_section", "Receiving")
@section("htmlheader_title", "Document Receiving")
@section("main-content")
@include('la.jobs.jobprofile')
{{ Form::open(['url' => 'admin/jobs/process1/doc_receive/'.$job->id,'enctype'=>'multipart/form-data']) }} 

    @if ($job->custom_clearance<>0 || $job->supplement<>0)
        @include('la.documents.compulsory')
    @endif
    @if ($job->custom_clearance<>0)
        @include('la.documents.custom_clearance')
    @endif

    {{-- Trucking Process --}}
   @if ($job->trucking<>0)
       @include('la.documents.trucking')
   @endif
    {{-- Supplement Data --}}
   @if ($job->supplement<>0)
       @include('la.documents.supplement')
   @endif
   
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/jobs" class="btn btn-warning">Cancel</a>
            <button id="btn-submit" class="btn btn-success pull-right">Submit</button>
            
        </div>
    </div>
    {{Form::close()}}
@endsection
@push('scripts')
<script src="{{asset('js/jquery.repeater.js')}}"></script>
    <script>
      $(document).ready(function () {
        $('#btn-submit').click(function(e){
            var allow=false;
            // $('.required').each(function(i, requiredField){
            //         if($(requiredField).val()=='' || $(requiredField).val()=="[]")
            //         {
            //            allow=false;
            //         }
            //         else{
            //            allow=true;
            //         }
            //     });
            //     if(allow==true)
            //     {
                    $(this).submit();
                // }
                // else{
                //     alert("Not allow null\n Please input all data");
                //     e.preventDefault();
                // }
            });
    });
    </script>
@endpush