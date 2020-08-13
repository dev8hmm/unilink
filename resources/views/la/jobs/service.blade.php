
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                      <label for="">Custom Clearance</label>
                      <select name="custom_clearance" id="custom_clearance" class="form-control select2" rel="select2">
                          <option value="0">None</option>
                          @foreach ($ccs as $cc)
                              <option value="{{$cc->id}}">{{$cc->name}}</option>
                          @endforeach
                      </select>
                      <input style="margin-top:20px;width:100%;" type="text" name="other" id="other" hidden>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <label for="">Trucking</label>
                     <select name="trucking" id="trucking" class="form-control select2" rel="select2">
                         <option value="0">None</option>
                         @foreach ($tcks as $tck)
                            <option value="{{$tck->id}}">{{$tck->name}}</option>                             
                         @endforeach
                     </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Supplement</label><br>
                     {{-- <select name="supplement" id="supplement" class="form-control select2" rel="select2">
                         <option value="0">None</option>
                         @foreach ($supls as $supl)
                             <option value="{{$supl->id}}">{{$supl->name}}</option>
                         @endforeach
                     </select> --}}
                     @foreach ($supls as$key=> $supl)
                     @if ($key<>0&&$key%2==0)
                         <br>
                     @endif
                        <input type="checkbox" name="supplement[]" value="{{$supl->id}}">{{$supl->name}} &emsp;
                    @endforeach
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                      <label for="">Job Type</label>
                      <select name="job_service_type" id="job_service_type" class="form-control">
                          <option value="self">Self Service</option>
                          <option value="outsource">Outsource</option>
                      </select>
                    </div>
                </div>
            </div>