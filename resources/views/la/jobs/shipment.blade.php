
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
          <label for="">Shipment Type <span class="text-danger">*</span></label>
          <select name="impexp" id="impexp" class="form-control">
              <option value="IMPORT">IMPORT</option>
              <option value="EXPORT">EXPORT</option>
          </select>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
          <label for="">Tranport Mode <span class="text-danger">*</span></label>
         <select name="transport_mode" id="transport_mode" class="form-control" required>
             <option value="SEA">SEA</option>
             <option value="AIR">AIR</option>
             <option value="BORDER">BORDER</option>
             <option value="OTHER">OTHER</option>
         </select>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
          <label for="">VOL</label>
          <input type="text" name="vol" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
          <label for="">POL <span class="text-danger">*</span></label>
          <select name="pol" id="pol" class="form-control select2" rel="select2" required>
                @foreach ($portnames as $pn)
                    <option value="{{$pn->id}}">{{$pn->name}}({{$pn->country}})</option>
                @endforeach
            
        </select>
        </div>
    </div>
    <div class="col-md-3">
             
        <div class="form-group">
            <label for="">ETD <span class="text-danger">*</span></label>
            <div class="input-group date">
                <input class="form-control" placeholder="Select Date" data-rule-minlength="0" name="etd" id="etd" type="text" required>
                <span class="input-group-addon input_dt">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
    </div>
    </div>
</div>
<div class="row">
        <div class="col-md-2">
                <div class="form-group">
                  <label for="">Commodity <span class="text-danger">*</span></label>
                  <input type="text" name="commodity" id="commodity" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
            </div>
        <div class="col-md-2">
            <div class="form-group">
              <label for="pkgs">PKGS</label>
              <input type="number" name="pkgs" id="pkgs" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
              <label for="kgs">KGS</label>
              <input type="number" name="kgs" id="kgs" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
        </div>
        
    <div class="col-md-3">
            <div class="form-group">
              <label for="">POD <span class="text-danger">*</span></label>
              <select name="pod" id="pod" class="form-control select2" rel="select2" required>
                @foreach ($portnames as $pn)
                    <option value="{{$pn->id}}">{{$pn->name}}({{$pn->country}})</option>
                @endforeach
            </select>
            </div>
        </div>
    
    <div class="col-md-3">
        <div class="form-group">
            <label for="">ETA <span class="text-danger">*</span></label>
            <div class="input-group date">
                <input class="form-control" placeholder="Select Date" data-rule-minlength="0" name="eta" id="eta" type="text" required>
                <span class="input-group-addon input_dt">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
    </div>    
    </div>
</div>
<div class="row">
   <div class="col-md-2">
       <div class="form-group">
         <label for="">Air/Shipping Line</label>
         {{-- <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId" required> --}}
         <select name="line" id="line" class="form-control">
             <option value="">-Select</option>
             @foreach ($shippinglines as $line)
                 <option value="{{$line->id}}">{{$line->name}}</option>
             @endforeach
         </select>
       </div>
   </div>
   <div class="col-md-2">
       <div class="form-group">
         <label for="">Code</label>
         <input type="text" name="code" id="code" class="form-control" placeholder="" aria-describedby="helpId" required>
       </div>
   </div>
    <div class="col-md-2">
        <div class="form-group">
          <label for="">Flight/Vessel No. <span class="text-danger">*</span></label>
          <input type="text" name="vessel_no" id="vessel_no" class="form-control" placeholder="" aria-describedby="helpId" required>
        </div>
    </div>
    <div class="col-md-3">
            <div class="form-group">
                    <label for="">Date <span class="text-danger">*</span></label>
                    <div class="input-group date">
                        <input class="form-control" placeholder="Enter Date" data-rule-minlength="0" name="shipment_date" id="shipment_date" type="text" required>
                        <span class="input-group-addon input_dt">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>
            </div>   
    </div>
</div>

@push('scripts')
    <script>
    $(document).ready(function(){
        $('#transport_mode').change(function(){
            
            $('#line').html("<option value=''>-Select</option>");
            if($(this).val()=="SEA")
            {
                $.ajax({
                    type:'get',
                    url:'/admin/getShippingLines',
                    success:function(data)
                            {
                                console.log(data);
                               $.each(data,function(key,value)
                               {
                                    $('#line').append("<option value='"+value.id+"'>"+value.name+"</option>");
                               });
                            }
                });
            }
            else if($(this).val()=="AIR")
            {
                $.ajax({
                    type:'get',
                    url:'/admin/getAirLines',
                    success:function(data)
                            {
                                console.log(data);
                               $.each(data,function(key,value)
                               {
                                    $('#line').append("<option value='"+value.id+"'>"+value.name+"</option>");
                               });
                            }
                });
            }
        });
        $('#line').change(function(){
            $('#code').val("");
            if($(this).val()=="")
            return;
            var id=$(this).val();
            var type= $('#transport_mode').val();
            $.ajax({
                type:'get',
                url:'/admin/getCode/'+id+'/'+type,
                success:function(data)
                {
                    $('#code').val(data.code);
                }
            });
        });
    });
    </script>
@endpush