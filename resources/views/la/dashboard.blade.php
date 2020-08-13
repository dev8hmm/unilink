@extends('la.layouts.app')

@section('htmlheader_title') Dashboard @endsection
@section('contentheader_title') Dashboard @endsection
@section('contentheader_description') Organization Overview @endsection

@section('main-content')
<!-- Main content -->
        <section>
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-lg-2 col-xs-6" style="padding-right:2px;"  {{$p["p12"]}}>
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3 style="font-size:18px">Process 1</h3>
                  <p>Number of Job : <label>{{count($p1)}}</label></p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                <a href="/admin/jobs" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-2 col-xs-6" style="padding-right:2px;"  {{$p["p12"]}}>
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                    <h3 style="font-size:18px">Process 2</h3>
                    <p>Number of Job : <label>{{count($p2)}}</label></p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/admin/jobs" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-2 col-xs-6" style="padding-right:2px;"  {{$p["p3"]}}>
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                    <h3 style="font-size:18px">Process 3</h3>
                    <p>Number of Job : <label>{{count($p3)}}</label></p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                <a href="/admin/jobs" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-2 col-xs-6" style="padding-right:2px;"  {{$p["p4"]}}>
              <div class="small-box bg-red">
                <div class="inner">
                    <h3 style="font-size:18px">Process 4</h3>
                    <p>Number of Job : <label>{{count($p4)}}</label></p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                <a href="/admin/jobs" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-2 col-xs-6" style="padding-right:2px;"  {{$p["p5"]}}>
              <div class="small-box bg-primary">
                <div class="inner">
                    <h3 style="font-size:18px">Process 5</h3>
                    <p>Number of Job : <label>{{count($p5)}}</label></p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                <a href="/admin/jobs" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
         
        </section>
        <div class="row">
          <div class="col-md-7">
              @include('la.chart')
          </div>
          <div class="col-md-5 border-left">
            <table class="table table-sm table-bordered">
                <caption>
                  <label> Urgent Job List  : <span class="text-danger">{{count($urgent)}}</span></label>
                 <span class="pull-right">
                   Download Urgent Jobs
                    <a href="/admin/download/urgent_job_list" class="btn btn-sm btn-warning"><i class="fa fa-download"></i></a>
                </span> 
                </caption>
              <thead class="bg-danger">
                <tr>
                  <th width="5%">No.</th>
                  <th>Job No.</th>
                  <th>Job Date</th>
                  <th>ETA</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($urgent as $key => $job)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$job->job_no}}</td>
                      <td>{{$job->date}}</td>
                      <td>{{$job->shipment->eta}}</td>
                      <td>
                        <a href="/admin/jobcenters" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                      </td>
                    </tr>
                @endforeach
              </tbody>
              {{-- <tfoot>
                <tr>
                  <td colspan="5">
                    {{$urgent->links()}}
                  </td>
                </tr>
              </tfoot> --}}
            </table>
          </div>
        </div>
        
@endsection

@push('styles')
<style>
  .icon>i{
    font-size:60px;
  }
  .inner>p>label{
    font-size: 20px;
    font-weight: bold;
  }
</style>
<!-- Morris chart -->
<link rel="stylesheet" href="{{ asset('la-assets/plugins/morris/morris.css') }}">
<!-- jvectormap -->
<link rel="stylesheet" href="{{ asset('la-assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
<!-- Date Picker -->
<link rel="stylesheet" href="{{ asset('la-assets/plugins/datepicker/datepicker3.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('la-assets/plugins/daterangepicker/daterangepicker-bs3.css') }}">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="{{ asset('la-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
@endpush


@push('scripts')
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Morris.js charts -->
{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>  --}}
<script src="{{ asset('la-assets/plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('la-assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('la-assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('la-assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('la-assets/plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>  --}}
<script src="{{ asset('la-assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('la-assets/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('la-assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('la-assets/plugins/fastclick/fastclick.js') }}"></script>
<!-- dashboard -->
<script src="{{ asset('la-assets/js/pages/dashboard.js') }}"></script>
<script>
   var data = JSON.parse('<?php echo $ga;?>');
  //console.log(data);
  var area = new Morris.Area({
    element: 'revenue-chart',
    resize: true,
    data: data,
    xkey: 'date',
    ykeys: ['visitors', 'pageViews'],
    xLabelFormat: function(date) {
          return date.getDate()+'/'+(date.getMonth()+1)+'/'+date.getFullYear(); 
          },
    labels: ['Visitors', 'PageViews'],
    lineColors: ['#a0d0e0', '#3c8dbc'],
    hideHover: 'auto',
    dateFormat: function(date) {
          d = new Date(date);
          return d.getDate()+'/'+(d.getMonth()+1)+'/'+d.getFullYear(); 
          },
  });
</script>
@endpush
