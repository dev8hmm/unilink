<?php
/**
* Controller generated using LaraAdmin
* Help: http://laraadmin.com
* LaraAdmin is open-sourced software licensed under the MIT license.
* Developed by: Dwij IT Solutions
* Developer Website: http://dwijitsolutions.com
*/

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use DateTime;
use PDF;
use Excel;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;

use App\Role;
use App\Models\Job;
use App\Models\Company;
use App\Models\Service;
use App\Models\File;
use App\Models\Shipment;
use App\Models\PortName;
use App\Models\Compulsory;
use App\Models\ServiceDetail;
use App\Models\ShippingLine;
use App\Models\AirLine;
use App\Models\Assign;
use App\Models\Log;
use App\Models\Supplement;

class JobsController extends Controller
{
    public $show_action = true;
    public function role_permission()
    {
        $p12='hidden';
        $p3='hidden';
        $p4='hidden';
        $p5='hidden';
        $role=auth()->user()->role_users()->first();
    if ($role<>null ) {
        $p12=$role->name<>"PROCESS-12" && $role->name<>"SUPER_ADMIN"?'hidden':'';
        $p3=$role->name<>"PROCESS-3" && $role->name<>"SUPER_ADMIN"?'hidden':'';
        $p4=$role->name<>"PROCESS-4" && $role->name<>"SUPER_ADMIN"?'hidden':'';
        $p5=$role->name<>"PROCESS-5" && $role->name<>"SUPER_ADMIN"?'hidden':'';
    }
        $p['p12']=$p12;
        $p['p3']=$p3;
        $p['p4']=$p4;
        $p['p5']=$p5;
        return $this->p=$p;
    }
    public function store_log($module,$title,$action)
    {
        $dt = new DateTime();
        $role=auth()->user()->role_users()->first();
        $log=new Log();
        $log->module_name=$module;
        $log->title=$title;
        $log->action=$action;
        $log->user=auth()->user()->name;
        $log->role=$role<>null?$role->name:"~";
        $log->time= $dt->format('Y-m-d H:i:s');
        $log->save();
    }
    public function index(Request $request)
    { 

        $this->store_log("Job",'List','Retrive');
        $p=$this->role_permission();
        if (isset($request)&&$request->type=="complete") {
            $jobs=Job::with('compulsory.Licence')->where('process','>',4)->paginate(15); 
        } else {
            $jobs=Job::with('compulsory.Licence')->where('process','<',5)->paginate(15); 
        }
        $customers=Company::orderBy('name','asc')->get();
        $module = Module::get('Jobs');
        if(Module::hasAccess($module->id)) {
            return View('la.jobs.index', [
                'show_actions' => $this->show_action,
                'listing_cols' => Module::getListingColumns('Jobs'),
                'module' => $module,
                'customers'=>$customers,
                'jobs'=>$jobs,
                'p'=>$p
                ]);
            } else {
                return redirect(config('laraadmin.adminRoute') . "/");
            }
        }
        
        public function search_job(Request $request)
        {
            $p=$this->role_permission();
            $from =  $request->from_date<>null ? DateTime::createFromFormat('d/m/Y', $request->from_date)->format('Y-m-d'):null;
            $to =  $request->to_date<>null ? DateTime::createFromFormat('d/m/Y', $request->to_date)->format('Y-m-d'):null;
            $id=$request->company_id<>null ?$request->company_id :0 ;
            if($id<>0)//company id
            {
                if($request->cust_ie<>null && $request->cust_ie=="ie")
                {
                    $jobs=Job::whereHas('impexp',function($query)use($id){
                        $ie=$query->where('id',$id);
                        return $ie;
                    });
                }
                if($request->cust_ie<>null && $request->cust_ie=="customer")
                {
                    $jobs=Job::whereHas('customer',function($query)use($id){
                        $ie=$query->where('id',$id);
                        return $ie;
                    });
                }
            }
            else{
                $jobs=new Job();
            }
            if($from<>null && $to<>null)
            {
                $jobs=$jobs->whereBetween('date', [$from, $to]);
            }
            elseif($from<>null && $to==null)
            {
                $jobs=$jobs->where("date",">=",$from);
            }
            elseif($from==null && $to<>null)
            {
                $jobs=$jobs->where("date","<=",$to);
            }
            $jobs=$jobs->orderBy('id',$request->orderJob)->paginate(15);
            return view('la.jobs.index')->with('jobs',$jobs)->with('p',$p);
        }
        
        public function getShippingLines()
        {
            $lines=ShippingLine::all();
            return response()->json($lines);
        }
        public function getAirLines()
        {
            $lines=AirLine::all();
            return response()->json($lines);
        }
        public function getCode($id,$type)
        {
            if($type<>'AIR')
            {
                $line=ShippingLine::find($id);
            }
            else{
                $line=AirLine::find($id);
            }
            return response()->json($line);
        }
        
        public function create()
        {
            $maxId=Job::max('id')+1;
            $job_no=sprintf("%04s", $maxId);
            $companies=Company::all();
            $ccs=Service::where("type","Custom Clearance")->get();
            $tcks=Service::where('type','Trucking')->get();
            $supls=Service::where('type','Supplement')->get();
            $portnames=PortName::all();
            $shippinglines=ShippingLine::all();
            $users=Role::where('name','PROCESS-12')->first()->role_users;
            $this->store_log("Job",'New Job','Create');
            return view('la.jobs.create')->with('job_no','JOB-'.$job_no)
            ->with('companies',$companies)
            ->with('ccs',$ccs)
            ->with('tcks',$tcks)
            ->with('supls',$supls)
            ->with('portnames',$portnames)
            ->with('shippinglines',$shippinglines)
            ->with('users',$users);
            
        }
        public function document_receive($id)
        {
            $job=Job::find($id);
            return view('la.documents.compulsory')->with('job',$job);
        }
        public function process1($id)
        {
            // dd($id);
            $job=Job::find($id);
            // dd($job);
            $this->store_log("Process","Create P-1 for ".$job->job_no,'Create');
            $service_detail=array();
            
            
            $cc=strtolower($job->custom_clearance_service<>null?$job->custom_clearance_service->name:null);
          
            switch($cc)
            {
                case 'co examination':if(strtolower($job->shipment->type)=="import" || strtolower($job->shipment->type)=="export")
                {
                    array_push($service_detail,
                    "A Form",
                    "D Form", 
                    "E Form");
                }
                break;
                case 'mic examination':if(strtolower($job->shipment->type)=="import" || strtolower($job->shipment->type)=="export")
                {
                    array_push($service_detail,
                    "MIC Certificate", 
                    "MIC Recommendation Letter", 
                    "MIC Test Exam Letter",
                    "MOPF Test Exam Letter",
                    "2% Exam Letter");
                    if(strtolower($job->shipment->type)<>"import" )
                    {
                        array_push($service_detail,
                        "import Docs");
                    }
                    
                }
                break;
                case 'pepair and return' : if(strtolower($job->shipment->type)=="import" || strtolower($job->shipment->type)=="export")
                {
                    array_push($service_detail,
                    "Export License", 
                    "ED", 
                    "Other");
                    if(strtolower($job->shipment->type)<>"import" )
                    {
                        array_push($service_detail,
                        "import Docs");
                    }
                }
                break;
                case 'temp: admission' : if(strtolower($job->shipment->type)=="import" || strtolower($job->shipment->type)=="export")
                {
                    array_push($service_detail,
                    "OGL license", 
                    "Approval letter from orgination", 
                    "Others");
                    if(strtolower($job->shipment->type)<>"import" )
                    {
                        array_push($service_detail,
                        "import Docs");
                    }
                }
                break;
                case 'special order' :if(strtolower($job->shipment->type)=="import" || strtolower($job->shipment->type)=="export")
                {                            array_push($service_detail,
                    "Application Form",  
                    "Others");
                }
                break;
                case 'drawback' : if(strtolower($job->shipment->type)=="import" || strtolower($job->shipment->type)=="export")
                {
                    array_push($service_detail,
                    "Drawback License",  
                    "Drawback Sale Contract",
                    "Others");
                    if(strtolower($job->shipment->type)<>"import" )
                    {
                        array_push($service_detail,
                        "import Docs");
                    }
                }
                break;
                case 'appoint airport directory' :if(strtolower($job->shipment->type)=="import" || strtolower($job->shipment->type)=="export")
                {
                    array_push($service_detail,
                    "Application Letter",  
                    "Others");
                }
                break;
                case 'sez' : if(strtolower($job->shipment->type)=="import" || strtolower($job->shipment->type)=="export")
                {
                    array_push($service_detail,
                    "Application Letter", 
                    "material List", 
                    "Others");
                }
                break;
                case 'personal effect' : if(strtolower($job->shipment->type)=="import" || strtolower($job->shipment->type)=="export")
                {
                    array_push($service_detail,
                    "Passport Copy", 
                    "Air Ticket", 
                    "Commercial Invoice",
                    "Packing List");
                }
                break;
            }
            $users=Role::where('name','PROCESS-3')->first()->role_users;
            return view('la.documents.receiving')->with('job',$job)
            ->with("service_detail",$service_detail);
            
        }
        
        public function process2($id)
        {
            $job=Job::find($id);
            $this->store_log("Process","Create P-2 for ".$job->job_no,'Create');
            $users=Role::where('name','PROCESS-3')->first()->role_users;
            $success=false;
            $comp=$job->compulsory;
            if($comp->commericialInvoice->original<>"[]" &&
            $comp->billRegistration->original<>"[]" && 
            $comp->packingList->original<>"[]" &&
            $comp->saleContract->original<>"[]")
            {
                $success=true;
            }
            return view('la.documents.maccs')->with('job',$job)
            ->with('success',$success)
            ->with('users',$users);
        }
        public function porcess3($id)
        {
            $users=Role::where('name','PROCESS-4')->first();
            $users=$users<>null?$users->role_users:null;
            $job=Job::find($id);
            $this->store_log("Process","Create P-3 for ".$job->job_no,'Create');
            $success=false;
            if($job->maccs->receipts->original<>"[]" &&
            $job->maccs->ros<>"[]"&&
            $job->maccs->undertakingLetter<>"[]")
            {
                $success=true;
            }
            $data=array();
            switch($job->shipment->type)
            {
                case "IMPORT" : if($job->shipment->transport<>"SEA")
                {
                    array_push($data,json_encode(["short"=>"actual_date","name"=>"Actual Arrival Date","type"=>"date"]));
                    array_push($data,json_encode(["short"=>"airway_bill","name"=>"Collect Airway Bill","type"=>"file"]));
                    array_push($data,json_encode(["short"=>"examination_date","name"=>"Examination Date","type"=>"date"]));
                    array_push($data,json_encode(["short"=>"cargo_delivery_date","name"=>"Cargo Delivery Date","type"=>"date"]));
                }
                else{
                    array_push($data,json_encode(["short"=>"actual_date","name"=>"Actual Arrival Date","type"=>"date"]));
                    array_push($data,json_encode(["short"=>"issued_do_date","name"=>"Issued DO Date","type"=>"date"]));
                    array_push($data,json_encode(["short"=>"examination_date","name"=>"Examination Date","type"=>"date"]));
                    array_push($data,json_encode(["short"=>"cargo_delivery_date","name"=>"Cargo Delivery Date","type"=>"date"]));
                }
                break;
                case "EXPORT" : if($job->shipment->transport<>"SEA")
                {
                    array_push($data,json_encode(["short"=>"actual_date","name"=>"Actual Arrival Date","type"=>"date"]));
                    array_push($data,json_encode(["short"=>"received_date","name"=>"Checkin Date","type"=>"date"]));
                    array_push($data,json_encode(["short"=>"cargo_pickup","name"=>"Cargo Pickup","type"=>"date"]));
                    array_push($data,json_encode(["short"=>"examination_date","name"=>"Examination Date","type"=>"date"]));
                    array_push($data,json_encode(["short"=>"allow_shipment","name"=>"Allow Shipment","type"=>"date"]));
                    array_push($data,json_encode(["short"=>"remark","name"=>"Remarks",'type'=>"text"]));
                }
                else{
                    array_push($data,json_encode(["short"=>"actual_date","name"=>"Actual Departure Date","type"=>"date"]));
                    array_push($data,json_encode(["short"=>"collect_booking","name"=>"Collect Booking","type"=>"file"]));
                    array_push($data,json_encode(["short"=>"received_date","name"=>"Checkin Date","type"=>"date"]));
                    array_push($data,json_encode(["short"=>"to_warehouse_date","name"=>"Delivery to Warehouse Date","type"=>"date"]));
                    array_push($data,json_encode(["short"=>"to_port","name"=>" Warehouse to Port Date","type"=>"date"]));
                    array_push($data,json_encode(["short"=>"examination_date","name"=>" Cargo Examination ","type"=>"date"]));
                    array_push($data,json_encode(["short"=>"to_customer","name"=>"File send to Customer","type"=>"date"]));
                }
                break;
            }
            
            return view('la.documents.field_operation')->with('job',$job)
            ->with('data',$data)
            ->with('success', $success)
            ->with('users',$users);
        }
        public function porcess4($id)
        {
            $job=Job::find($id);
            $this->store_log("Process","Create P-4 for ".$job->job_no,'Create');
            $users=Role::where('name','PROCESS-5')->first()->role_users;
            $success=true;
            foreach($job->fieldoperation as $fop )
            {
                if($fop->type=="file")
                {
                    $file=File::find($fop->value);
                    if($file->original==null)
                    {
                        $success=false;
                    }
                }
                else if($fop->value==null)
                {
                    $success=false;
                }
            }
            return view('la.documents.cargo_receipt')->with('job',$job)
            ->with('success',$success)
            ->with('users', $users);;
        }
        
        public function process5($id)
        {
            $job=Job::find($id);
            $this->store_log("Process","Create P-5 for ".$job->job_no,'Create');
            $success=true;
            if($job->cargoreceipts->packingList<>null && $job->cargoreceipts->packingList->original=="[]")
            {
                $success=false;
            }
            if ($job->shipment->type=="EXPORT")
            {
                if($job->cargoreceipts->loadingPlan<>null && $job->cargoreceipts->loadingPlan->original=="[]")
                {
                    $success=false;
                }
            }
            return view('la.documents.doc_collect')->with('job',$job)->with('success',$success);
        }
        
        public function store(Request $request)
        {
            // dd($request->all());
            $supplement=new Supplement();
            $supplement->service=json_encode($request->supplement);
            $supplement->save();
            
            $shipment=new Shipment();
            $shipment->type=$request->impexp;
            $shipment->transport=$request->transport_mode;
            $shipment->commodity=$request->commodity;
            $shipment->pkgs=$request->pkgs;
            $shipment->kgs=$request->kgs;
            $shipment->pol=$request->pol;
            $shipment->pod=$request->pod;
            $shipment->vol=$request->vol;
            $shipment->eta= $request->eta<>null ? DateTime::createFromFormat('d/m/Y', $request->eta)->format('Y-m-d'):null;
            $shipment->etd=$request->etd <> null ? DateTime::createFromFormat('d/m/Y', $request->etd)->format('Y-m-d'):null;
            $shipment->date=$request->shipment_date<>null ? DateTime::createFromFormat('d/m/Y', $request->shipment_date)->format('Y-m-d'):null;
            $shipment->vessel_no=$request->vessel_no;
            $shipment->line=$request->line;
            $shipment->save();
            
            $job=new Job();
            $job->job_no=$request->job_no;
            $job->customer_id=$request->customer_id;
            if($request->is_ie=="on" && isset($request->is_ie))
            {
                $job->imp_exp_id=$request->customer_id;
            }
            else{
                $job->imp_exp_id=$request->ie_id;
            }
            $job->shipment_id=$shipment->id;
            $job->date=$request->job_date<>null ? DateTime::createFromFormat('d/m/Y',$request->job_date)->format('Y-m-d'):null;
            $job->contact_person=$request->contact_person;
            $job->job_service_type=$request->job_service_type;
            $job->custom_clearance=$request->custom_clearance;
            $job->trucking=$request->trucking;
            // $job->supplement=$request->supplement;
            $job->supplement=$supplement->id;
            $job->save();
            $this->store_log("Job","New Job - ".$job->job_no,'Store');
            
            $assign = Assign::updateOrCreate(
                ['job_id' => $job->id],
                ['p12' => $request->assign]
            );
            
            return redirect('/admin/jobs');
        }
        
        public function show($id)
        {
            if(Module::hasAccess("Jobs", "view")) {
                $job = Job::find($id);
                $this->store_log("Job",$job->job_no,'Retrive');
                if(isset($job->id)) {
                    $module = Module::get('Jobs');
                    $module->row = $job;
                    
                    return view('la.jobs.show', [
                        'module' => $module,
                        'view_col' => $module->view_col,
                        'no_header' => true,
                        'no_padding' => "no-padding"
                        ])->with('job', $job);
                    } else {
                        return view('errors.404', [
                            'record_id' => $id,
                            'record_name' => ucfirst("job"),
                            ]);
                        }
                    } else {
                        return redirect(config('laraadmin.adminRoute') . "/");
                    }
                }
                
                public function edit($id)
                {
                    if(Module::hasAccess("Jobs", "edit")) {
                        $job = Job::find($id);
                        $this->store_log("Job","Edit for ".$job->job_no,'Retrive');
                        $companies=Company::all();
                        if(isset($job->id)) {
                            $module = Module::get('Jobs');
                            
                            $module->row = $job;
                            
                            return view('la.jobs.edit', [
                                'module' => $module,
                                'view_col' => $module->view_col,
                                ])->with('job', $job)->with('companies',$companies);
                            } else {
                                return view('errors.404', [
                                    'record_id' => $id,
                                    'record_name' => ucfirst("job"),
                                    ]);
                                }
                            } else {
                                return redirect(config('laraadmin.adminRoute') . "/");
                            }
                        }
                        
                        public function update(Request $request, $id)
                        {
                            $job=Job::find($id);
                            $this->store_log("Job",$job->job_no,'Updated');
                            if(Module::hasAccess("Jobs", "edit")) {
                                
                                $rules = Module::validateRules("Jobs", $request, true);
                                
                                $validator = Validator::make($request->all(), $rules);
                                
                                if($validator->fails()) {
                                    return redirect()->back()->withErrors($validator)->withInput();;
                                }
                                
                                $insert_id = Module::updateRow("Jobs", $request, $id);
                                
                                return redirect()->route(config('laraadmin.adminRoute') . '.jobs.index');
                                
                            } else {
                                return redirect(config('laraadmin.adminRoute') . "/");
                            }
                        }
                        
                        public function destroy($id)
                        {
                            $job=Job::find($id);
                            $this->store_log("Job",$job->job_no,'Deleted');
                            if($job<>null)
                            {
                                if($job->shipment<>null)
                                {
                                    $job->shipment()->delete();
                                }
                                if($job->compulsory<>null)
                                {
                                    $job->compulsory()->delete();
                                }
                                if($job->maccs<>null)
                                {
                                    $job->maccs()->delete();
                                }
                                if($job->fieldoperation<>null)
                                {
                                    $job->fieldoperation()->delete();
                                }
                                $job->delete();
                                return response()->json(["status"=>"success"]);
                            }
                            else
                            {
                                return response()->json(["status"=>"unsuccess"]);
                            }
                        }
                        
                        public function dtajax(Request $request)
                        {
                            $module = Module::get('Jobs');
                            $listing_cols = Module::getListingColumns('Jobs');
                            
                            $values = DB::table('jobs')->select($listing_cols)->whereNull('deleted_at');
                            $out = Datatables::of($values)->make();
                            $data = $out->getData();
                            $fields_popup = ModuleFields::getModuleFields('Jobs');
                            
                            for($i = 0; $i < count($data->data); $i++) {
                                for($j = 0; $j < count($listing_cols); $j++) {
                                    $col = $listing_cols[$j];
                                    if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                                        $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                                    }
                                    if($col == $module->view_col) {
                                        $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/jobs/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                                    }
                                }
                                
                                if($this->show_action) {
                                    $output = '';
                                    if(Module::hasAccess("Jobs", "edit")) {
                                        $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/jobs/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                                    }
                                    
                                    if(Module::hasAccess("Jobs", "delete")) {
                                        $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.jobs.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
                                        $output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
                                        $output .= Form::close();
                                    }
                                    $data->data[$i][] = (string)$output;
                                }
                            }
                            $out->setData($data);
                            return $out;
                        }
                        public function export_profile($id)
                        {
                            
                            $job =Job::find($id);
                            $data['job']=$job;
                            $pdf = PDF::loadView('la.pdf.job_profile', $data);
                            return $pdf->stream('PROFILE.pdf'); 
                            
                        }
                        public function export_process4($id)
                        {
                            
                        }
                        public function document_collect($id)
                        {
                            $job=Job::find($id);
                            $data=array();
                            $comReg['name']='Company Registration';
                            $comReg['original']=$job->customer<>null?($job->customer->files($job->customer->original))->count():'0';
                            $comReg['copy']=$job->customer<>null?($job->customer->files($job->customer->copy))->count():'0';
                            $comReg['date']=$job->customer->files->date;
                            array_push($data,$comReg);
                            if($job->compulsory<>null)
                            {
                               
                            $letterHead['name']='Letter Head';
                            $letterHead["original"]=$job->compulsory->letterHead<>null?count($job->compulsory->letterHead->files($job->compulsory->letterHead->original)):'0';
                            $letterHead["copy"]=$job->compulsory->letterHead<>null?count($job->compulsory->letterHead->files($job->compulsory->letterHead->copy)):'0';
                            $letterHead['date']=$job->compulsory->letterHead->date;
                            array_push($data,$letterHead);
                            
                            if ($job->shipment->transport<>"SEA") {
                                $airway['name']=$job->shipment->type<>"EXPORT"?"MAWB":"HAWB";
                            } else {
                                $airway['name']= $job->shipment->type<>"EXPORT"?"MBL":"HBL";
                            }
                            $airway['original']=$job->compulsory->billRegistration<>null?count($job->compulsory->billRegistration->files($job->compulsory->billRegistration->original)):'0';
                            $airway['copy']=$job->compulsory->billRegistration<>null?count($job->compulsory->billRegistration->files($job->compulsory->billRegistration->copy)):'0';
                            $airway['date']=$job->compulsory->billRegistration<>null?$job->compulsory->billRegistration->date:'~';
                            array_push($data,$airway);
                            
                            $commercial['name']="Commercial Invoice";
                            $commercial['original']=$job->compulsory->commericialInvoice<>null?count($job->compulsory->commericialInvoice->files($job->compulsory->commericialInvoice->original)):0;
                            $commercial['copy']=$job->compulsory->commericialInvoice<>null?count($job->compulsory->commericialInvoice->files($job->compulsory->commericialInvoice->copy)):0;
                            $commercial['date']=$job->compulsory->commericialInvoice<>null&&$job->compulsory->commericialInvoice->date<>null?$job->compulsory->commericialInvoice->date:'~';
                            array_push($data,$commercial);
                            
                            $packing['name']="Packing List";
                            $packing['original']=$job->compulsory->packingList<>null?count($job->compulsory->packingList->files($job->compulsory->packingList->original)):0;
                            $packing['copy']=$job->compulsory->packingList<>null?count($job->compulsory->packingList->files($job->compulsory->packingList->copy)):0;
                            $packing['date']=$job->compulsory->packingList<>null && $job->compulsory->packingList->date<>null?$job->compulsory->packingList->date:'~';
                            array_push($data,$packing);
                            
                            $sale['name']="Sale Contract/Licence";
                            $sale["original"]=$job->compulsory->saleContract<>null?count($job->compulsory->saleContract->files($job->compulsory->saleContract->original)):0;
                            $sale["copy"]=$job->compulsory->saleContract<>null?count($job->compulsory->saleContract->files($job->compulsory->saleContract->copy)):0;
                            $sale['date']=$job->compulsory->saleContract<>null&&$job->compulsory->saleContract->date<>null?$job->compulsory->saleContract->date:'~';
                            array_push($data,$sale);
                             
                        }
                            $fops=$job->fieldoperation()->where('type','file')->get();
                            foreach ($fops as $key => $value) {
                                $fop=array();
                                $fop['name']=$value->name;
                                $fop['original']=$value->file<>null?count($value->file->files($value->file->original)):0;
                                $fop['copy']=$value->file<>null?count($value->file->files($value->file->copy)):0;
                                $fop['date']=$value->file<>null&&$value->file->date<>null?$value->file->date:'~';
                                array_push($data,$fop);
                            }
                            if($job->macc<>null)
                            {
                                
                            $receipt["name"]="Receipt";
                            $receipt["original"]=$job->maccs->receipts<>null?count($job->maccs->receipts->files($job->maccs->receipts->original)):0;
                            $receipt["copy"]=$job->maccs->receipts<>null?count($job->maccs->receipts->files($job->maccs->receipts->copy)):0;
                            $receipt['date']=$job->maccs->receipts<>null&&$job->maccs->receipts->date<>null?$job->maccs->receipts->date:'~';
                            array_push($data,$receipt);
                           
                            $ro['name']='RO Document';
                            $ro["original"]=$job->maccs->ros<>null?count($job->maccs->ros->files($job->maccs->ros->original)):0;
                            $ro["copy"]=$job->maccs->ros<>null?count($job->maccs->ros->files($job->maccs->ros->copy)):0;
                            $ro['date']=$job->maccs->ros<>null&& $job->maccs->ros->date<>null ?$job->maccs->ros->date:'~';
                            array_push($data,$ro);
                             
                        }
                        if($job->cargoreceipts<>null)
                        {
                            
                            $detail['name']='Detail Packing List';
                            $detail["original"]=$job->cargoreceipts->packingList<>null?count($job->cargoreceipts->packingList->files($job->cargoreceipts->packingList->original)):0;
                            $detail["copy"]=$job->cargoreceipts->packingList<>null?count($job->cargoreceipts->packingList->files($job->cargoreceipts->packingList->copy)):0;
                            $detail['date']=$job->cargoreceipts->packingList&&$job->cargoreceipts->packingList->date<>null?$job->cargoreceipts->packingList->date:'~';
                            array_push($data,$detail);
                            
                        }
                            // $data['data']=$data;
                            
                            // $pdf = PDF::loadView('la.pdf.document_collect', $data);
                            // return $pdf->stream("DOCUMENT_COLLECT_{{$job->id}}.pdf"); 
                            $exc=Excel::create('Document List', function($excel) use($data) {
                                $excel->sheet("test", function($sheet) use($data) {
                                    $sheet->loadView('la.excel.doc_collect')->with('data',$data);
                                });
                            })->download('xlsx');
                            // dd($exc->download('xlsx'));
                        }
                        public function export_urgent_jobs()
                        {
                            $urgent=array();
                            $jobs=Job::where('process','<>',5)->get();
                            foreach($jobs as $job)
                            {
                                $from = new DateTime($job->date);
                                $to =$job->shipment->eta<>null? new DateTime($job->shipment->eta):date();
                                $diff = $to->diff($from)->format("%a");
                                if($diff<=5)
                                {
                                    $urgent[]=$job;
                                }
                            }
                            $data=$urgent;
                            $exc=Excel::create('Urgent List', function($excel) use($data) {
                                $excel->sheet("test", function($sheet) use($data) {
                                    $sheet->loadView('la.excel.urgent')->with('data',$data);
                                });
                            })->download('xlsx');
                        }
                    }
                    