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
use Input;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;

use App\Models\Company;
use App\Models\File;
use App\Models\IE_Info;
use App\Models\Upload;
use App\Models\Log;

class CompaniesController extends Controller
{
    public $show_action = true;
    public function upload($request,$name)
    {
        $uploadIDs=array();
        $files = $request->file($name);
        $folder = storage_path('uploads');
        if($files<>null)
        foreach($files as $key=> $file){
            $filename = $file->getClientOriginalName();
            
            $date_append = date("Y-m-d-His-");
            $upload_success = $file->move($folder, $date_append.$filename);
                $upload = Upload::create([
                    "name" => $filename,
                    "path" => $folder.DIRECTORY_SEPARATOR.$date_append.$filename,
                    "extension" => pathinfo($filename, PATHINFO_EXTENSION),
                    "caption" => "",
                    "hash" => "",
                    "public" => 0,
                    "user_id" => Auth::user()->id
                    ]);
                    while(true) {
						$hash = strtolower(str_random(20));
						if(!Upload::where("hash", $hash)->count()) {
							$upload->hash = $hash;
							break;
						}
					}
                    $upload->save();
                    $uploadIDs[$key]=$upload->id;
            }
                return '['.implode(',',$uploadIDs).']';
            }
            public function store_log($module,$title,$action)
            {
                $dt = new DateTime();
                
               $log=new Log();
               $log->module_name=$module;
               $log->title=$title;
               $log->action=$action;
               $log->user=auth()->user()->name;
               $log->role=auth()->user()->role<>null?auth()->user()->role->name:"~";
               $log->time= $dt->format('Y-m-d H:i:s');
               $log->save();
            }
    public function index()
    {
        $this->store_log("Company","List",'Retrive');
        $companies=Company::all();
        $module = Module::get('Companies');
        return view('la.companies.index')->with('companies',$companies)
        ->with('module',$module);
        
    }
    public function getAllCustomers()
    {
        $companies=Company::all();
        return response()->json($companies);
    }
    public function getAllIEs()
    {
        $ies=Company::whereHas('ie')->get();
        return response()->json($ies);
    }
    public function searchCompany(Request $request)
    {   
        $this->store_log("Company","Search Company",'Retrive');
        $companies=$request->search_com_id<>null ? Company::where('reg_id','LIKE','%'.$request->search_com_id.'%')->get() 
        :
        Company::where('name','LIKE','%'.$request->search_com_name.'%')->get();
        
        $module = Module::get('Companies');
        return view('la.companies.index')->with('companies',$companies)
        ->with('module',$module);
    }
    public function checkRegId($regId)
    {
        $company=Company::where('reg_id',$regId)->first();
        if($company<>null)
        {
            return response()->json(["status"=>"exist"]);
        }
        else return response()->json(["status"=>"notexist"]);
    }
    
    public function toIE($id)
    {
        $company=Company::find($id);
        return view("la.companies.toIE")->with('company',$company);
    }
    /**
    * Show the form for creating a new company.
    *
    * @return mixed
    */
    public function create()
    {
        $type="customers";
        $module = Module::get('Companies');
        return view('la.companies.create')->with('type',$type)
        ->with('module',$module);
    }
    public function getcompany($id)
    {
        $company=Company::find($id);
        $c_org=$company->files->files($company->files->original);
        $c_copy=$company->files->files($company->files->copy);
        $ie=$company->ie;
        $data["company"]=$company;
        if($c_org<>null) $data["company"]["org"]=$c_org;
        else $data["company"]["org"]=null;
        if($c_copy<>null) $data["company"]["cop"]=$c_copy;
        else $data["company"]["cop"]=null;
        
        if($ie<>null)
        {
            $data["ie"]=$ie->toArray();
            
            if($ie->fcertificate<>null)
            {
                $data["ie"]["certificate"]=$ie->fcertificate;
                $data["ie"]["certificate"]["org"]=$ie->fcertificate->files($ie->fcertificate->original);
                $data["ie"]["certificate"]["cop"]=$ie->fcertificate->files($ie->fcertificate->copy);
            }
            if($ie->fmcc<>null)
            {
                $data["ie"]["mcc"]=$ie->fmcc;
                $data["ie"]["mcc"]["org"]=$ie->fmcc->files($ie->fmcc->original);
                $data["ie"]["mcc"]["cop"]=$ie->fmcc->files($ie->fmcc->copy);
            }
            if($ie->fmgma<>null)
            {
                $data["ie"]["mgma"]=$ie->fmgma;
                $data["ie"]["mgma"]["org"]=$ie->fmgma->files($ie->fmgma->original);
                $data["ie"]["mgma"]["cop"]=$ie->fmgma->files($ie->fmgma->copy);
            }
            if($ie->fmia<>null)
            {
                $data["ie"]["mia"]=$ie->fmia;
                $data["ie"]["mia"]["org"]=$ie->fmia->files($ie->fmia->original);
                $data["ie"]["mia"]["cop"]=$ie->fmia->files($ie->fmia->copy);
            }
            if($ie->fumfcci<>null)
            {
                $data["ie"]["umfcci"]=$ie->fumfcci;
                $data["ie"]["umfcci"]["org"]=$ie->fumfcci->files($ie->fumfcci->original);
                $data["ie"]["umfcci"]["cop"]=$ie->fumfcci->files($ie->fumfcci->copy);
            }
        }
        else $data["ie"]=null;
        return response()->json($data);
    }
    /**
    * Store a newly created company in database.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\RedirectResponse
    */
  
            public function store(Request $request)
            { 
               
        $this->store_log("Company","New Company",'Store');
                $rDate =$request->com_receive_date<>null ? DateTime::createFromFormat('d/m/Y', $request->com_receive_date)->format('Y-m-d'):null;
                $eDate =$request->com_expire_date<>null ? DateTime::createFromFormat('d/m/Y', $request->com_expire_date)->format('Y-m-d') :null;
                $comf=new File();
                $comf->original=$this->upload($request,'original');
                $comf->copy=$this->upload($request,'copy');

                $comf->date=$rDate;
                $comf->expire_date=$eDate;
                $comf->save();
                
                $com=new Company();
                $com->name=$request->name;
                $com->address=$request->address;
                $com->phone=$request->phone;
                $com->email=$request->email;
                $com->attention=$request->attention;
                $com->credibility=$request->credibility;
                $com->registration=$comf->id;
                $com->expire_date=$eDate;
                $com->remark1=$request->remark1;
                $com->remark2=$request->remark2;
                $com->remark3=$request->remark3;
                $com->reg_id=$request->reg_id;
                $com->save();
                
                if (isset($request->ie)&& $request->ie=="on") {
                    $ie=new File();
                    $ie->original=$this->upload($request,'ie_certificate_original');
                    $ie->copy=$this->upload($request,'ie_certificate_copy');
                    $ie->date=$request->ie_certificate_receive_date <>null ? DateTime::createFromFormat('d/m/Y', $request->ie_certificate_receive_date)->format('Y-m-d'):null;
                    $ie->expire_date= $request->ie_certificate_expire_date<>null?DateTime::createFromFormat('d/m/Y', $request->ie_certificate_expire_date)->format('Y-m-d'): null;
                    $ie->save();
                    $mcc=new File();
                    $mcc->original=$this->upload($request,'mcc_original');
                    $mcc->copy=$this->upload($request,'mcc_copy');
                    $mcc->date=$request->mcc_receive_date <> null ? DateTime::createFromFormat('d/m/Y', $request->mcc_receive_date)->format('Y-m-d'): null;
                    $mcc->expire_date=$request->mcc_expire_date<>null? DateTime::createFromFormat('d/m/Y', $request->mcc_expire_date)->format('Y-m-d') :null;
                    $mcc->save();
                    $mgma=new File();
                    $mgma->original=$this->upload($request,'mgma_original');
                    $mgma->copy=$this->upload($request,'mgma_copy');
                    $mgma->date=$request->mgma_receive_date<>null ? DateTime::createFromFormat('d/m/Y', $request->mgma_receive_date)->format('Y-m-d'):null;
                    $mgma->expire_date= $request->mgma_expire_date<>null ? DateTime::createFromFormat('d/m/Y', $request->mgma_expire_date)->format('Y-m-d'):null;
                    $mgma->save();
                    $mia=new File();
                    $mia->original=$this->upload($request,'mia_original');
                    $mia->copy=$this->upload($request,'mia_copy');
                    $mia->date= $request->mia_receive_date<>null ? DateTime::createFromFormat('d/m/Y', $request->mia_receive_date)->format('Y-m-d'):null;
                    $mia->expire_date= $request->mia_expire_date<>null ? DateTime::createFromFormat('d/m/Y', $request->mia_expire_date)->format('Y-m-d'):null;
                    $mia->save();
                    $umfcci=new File();
                    $umfcci->original=$this->upload($request,'umfcci_original');
                    $umfcci->copy=$this->upload($request,'umfcci_copy');
                    $umfcci->date=$request->umfcci_receive_date<>null ? DateTime::createFromFormat('d/m/Y', $request->umfcci_receive_date)->format('Y-m-d'):null;
                    $umfcci->expire_date= $request->umfcci_expire_date<>null ? DateTime::createFromFormat('d/m/Y', $request->umfcci_expire_date)->format('Y-m-d'):null;
                    $umfcci->save();
                    $other=new File();
                    $other->original=$this->upload($request,'other_original');
                    $other->copy=$this->upload($request,'other_copy');
                    $other->date=$request->other_receive_date<>null ? DateTime::createFromFormat('d/m/Y', $request->other_receive_date)->format('Y-m-d'):null;
                    $other->expire_date= $request->other_expire_date<>null ? DateTime::createFromFormat('d/m/Y', $request->other_expire_date)->format('Y-m-d'):null;
                    $other->save();
                    
                    $ieInfo=new IE_Info();
                    $ieInfo->company_id=$com->id;
                    $ieInfo->certificate=$ie->id;
                    $ieInfo->mcc=$mcc->id;
                    $ieInfo->mgma=$mgma->id;
                    $ieInfo->mia=$mia->id;
                    $ieInfo->umfcci=$umfcci->id;
                    $ieInfo->other=$other->id;
                    $ieInfo->save();
                } else {
                    
                }
                return redirect('admin/companies');
                
            }
            public function storeIE($id,Request $request)
            {
               
             $this->store_log("Company","To Importer/Exporter",'Changed');
                $ie=new File();
                $ie->original=$this->upload($request,'ie_certificate_original');
                $ie->copy=$this->upload($request,'ie_certificate_copy');
                $ie->date=$request->ie_certificate_receive_date <>null ? DateTime::createFromFormat('d/m/Y', $request->ie_certificate_receive_date)->format('Y-m-d'):null;
                $ie->expire_date= $request->ie_certificate_expire_date<>null?DateTime::createFromFormat('d/m/Y', $request->ie_certificate_expire_date)->format('Y-m-d'): null;
                $ie->save();
                $mcc=new File();
                // $mcc->original=$request->mcc_original;
                // $mcc->copy=$request->mcc_copy;
                $mcc->original=$this->upload($request,'mcc_original');
                $mcc->copy=$this->upload($request,'mcc_copy');
                $mcc->date=$request->mcc_receive_date <> null ? DateTime::createFromFormat('d/m/Y', $request->mcc_receive_date)->format('Y-m-d'): null;
                $mcc->expire_date=$request->mcc_expire_date<>null? DateTime::createFromFormat('d/m/Y', $request->mcc_expire_date)->format('Y-m-d') :null;
                $mcc->save();
                $mgma=new File();
                // $mgma->original=$request->mgma_original;
                // $mgma->copy=$request->mgma_copy;
                $mgma->original=$this->upload($request,'mgma_original');
                $mgma->copy=$this->upload($request,'mgma_copy');
                $mgma->date=$request->mgma_receive_date<>null ? DateTime::createFromFormat('d/m/Y', $request->mgma_receive_date)->format('Y-m-d'):null;
                $mgma->expire_date= $request->mgma_expire_date<>null ? DateTime::createFromFormat('d/m/Y', $request->mgma_expire_date)->format('Y-m-d'):null;
                $mgma->save();
                $mia=new File();
                // $mia->original=$request->mia_original;
                // $mia->copy=$request->mia_copy;
                $mia->original=$this->upload($request,'mia_original');
                $mia->copy=$this->upload($request,'mia_copy');
                $mia->date= $request->mia_receive_date<>null ? DateTime::createFromFormat('d/m/Y', $request->mia_receive_date)->format('Y-m-d'):null;
                $mia->expire_date= $request->mia_expire_date<>null ? DateTime::createFromFormat('d/m/Y', $request->mia_expire_date)->format('Y-m-d'):null;
                $mia->save();
                $umfcci=new File();
                // $umfcci->original=$request->umfcci_original;
                // $umfcci->copy=$request->umfcci_copy;
                $umfcci->original=$this->upload($request,'umfcci_original');
                $umfcci->copy=$this->upload($request,'umfcci_copy');
                $umfcci->date=$request->umfcci_receive_date<>null ? DateTime::createFromFormat('d/m/Y', $request->umfcci_receive_date)->format('Y-m-d'):null;
                $umfcci->expire_date= $request->umfcci_expire_date<>null ? DateTime::createFromFormat('d/m/Y', $request->umfcci_expire_date)->format('Y-m-d'):null;
                $umfcci->save();
                
                $ieInfo=new IE_Info();
                $ieInfo->company_id=$id;
                $ieInfo->certificate=$ie->id;
                $ieInfo->mcc=$mcc->id;
                $ieInfo->mgma=$mgma->id;
                $ieInfo->mia=$mia->id;
                $ieInfo->umfcci=$umfcci->id;
                $ieInfo->save();
                
                $com=Company::find($id);
                $com->remark1=$request->remark1;
                $com->remark2=$request->remark2;
                $com->remark3=$request->remark3;
                $com->save();
                return redirect('/admin/companies');
                
            }
            
            /**
            * Display the specified company.
            *
            * @param int $id company ID
            * @return mixed
            */
            public function show($id)
            {
                if(Module::hasAccess("Companies", "view")) {
                    
                    $company = Company::find($id);
                    
                    $this->store_log("Company",$company->name,'Retrive');
                    if(isset($company->id)) {
                        $module = Module::get('Companies');
                        $module->row = $company;
                        
                        return view('la.companies.show', [
                            'module' => $module,
                            'view_col' => $module->view_col,
                            'no_header' => true,
                            'no_padding' => "no-padding"
                            ])->with('company', $company);
                        } else {
                            return view('errors.404', [
                                'record_id' => $id,
                                'record_name' => ucfirst("company"),
                                ]);
                            }
                        } else {
                            return redirect(config('laraadmin.adminRoute') . "/");
                        }
                    }
                    
                    /**
                    * Show the form for editing the specified company.
                    *
                    * @param int $id company ID
                    * @return \Illuminate\Http\RedirectResponse
                    */
                    public function edit($id)
                    {
                        if(Module::hasAccess("Companies", "edit")) {
                            $company = Company::find($id);
                            
                        $this->store_log("Company","To edit ".$company->name,'Retrive');
                            if(isset($company->id)) {
                                $module = Module::get('Companies');
                                
                                $module->row = $company;
                                
                                return view('la.companies.edit', [
                                    'module' => $module,
                                    'view_col' => $module->view_col,
                                    ])->with('company', $company);
                                } else {
                                    return view('errors.404', [
                                        'record_id' => $id,
                                        'record_name' => ucfirst("company"),
                                        ]);
                                    }
                                } else {
                                    return redirect(config('laraadmin.adminRoute') . "/");
                                }
                            }
                            
                            /**
                            * Update the specified company in storage.
                            *
                            * @param \Illuminate\Http\Request $request
                            * @param int $id company ID
                            * @return \Illuminate\Http\RedirectResponse
                            */
                            public function update(Request $request, $id)
                            {
                                // if(Module::hasAccess("Companies", "edit")) {
                                    
                                    //     $rules = Module::validateRules("Companies", $request, true);
                                    
                                    //     $validator = Validator::make($request->all(), $rules);
                                    
                                    //     if($validator->fails()) {
                                        //         return redirect()->back()->withErrors($validator)->withInput();;
                                        //     }
                                        
                                        //     $insert_id = Module::updateRow("Companies", $request, $id);
                                        
                                        //     return redirect()->route(config('laraadmin.adminRoute') . '.companies.index');
                                        
                                        // } else {
                                            //     return redirect(config('laraadmin.adminRoute') . "/");
                                            // }
                                            $company=Company::find($id);
                                            $company->name=$request->name;
                                            $company->reg_id=$request->reg_id;
                                            $company->address=$request->address;
                                            $company->phone=$request->phone;
                                            $company->email=$request->email;
                                            $company->attention=$request->attention;
                                            $company->credibility=$request->credibility;
                                            $company->expire_date=$request->expire_date<>null ? DateTime::createFromFormat('d/m/Y', $request->expire_date)->format('Y-m-d'):null;
                                            $company->save();

                                            $file=$company->files;
                                            $file->expire_date=$request->expire_date<>null ? DateTime::createFromFormat('d/m/Y', $request->expire_date)->format('Y-m-d'):null;
                                            $file->date=$request->receive_date<>null ? DateTime::createFromFormat('d/m/Y', $request->receive_date)->format('Y-m-d'):null;
                                            $file->original=$request->original;
                                            $file->copy=$request->copy;
                                            $file->save();
                                            $this->store_log("Company",$company->name,'Updated');
                                            return redirect()->route(config('laraadmin.adminRoute') . '.companies.index');
                                        }
                                        
                                        /**
                                        * Remove the specified company from storage.
                                        *
                                        * @param int $id company ID
                                        * @return \Illuminate\Http\RedirectResponse
                                        */
                                        public function destroy($id)
                                        {
                                            if(Module::hasAccess("Companies", "delete")) {
                                                Company::find($id)->delete();
                                                $this->store_log("Company",$company->name,'Deleted');
                                                // Redirecting to index() method
                                                return redirect()->route(config('laraadmin.adminRoute') . '.companies.index');
                                            } else {
                                                return redirect(config('laraadmin.adminRoute') . "/");
                                            }
                                        }
                                        
                                        /**
                                        * Server side Datatable fetch via Ajax
                                        *
                                        * @param \Illuminate\Http\Request $request
                                        * @return \Illuminate\Http\Response
                                        */
                                        public function dtajax(Request $request)
                                        {
                                            $module = Module::get('Companies');
                                            $listing_cols = Module::getListingColumns('Companies');
                                            
                                            $values = DB::table('companies')->select($listing_cols)->whereNull('deleted_at');
                                            $out = Datatables::of($values)->make();
                                            $data = $out->getData();
                                            
                                            $fields_popup = ModuleFields::getModuleFields('Companies');
                                            
                                            for($i = 0; $i < count($data->data); $i++) {
                                                for($j = 0; $j < count($listing_cols); $j++) {
                                                    $col = $listing_cols[$j];
                                                    if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                                                        $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                                                    }
                                                    if($col == $module->view_col) {
                                                        $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/companies/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                                                    }
                                                }
                                                
                                                if($this->show_action) {
                                                    $output = '';
                                                    if(Module::hasAccess("Companies", "edit")) {
                                                        $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/companies/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                                                    }
                                                    
                                                    if(Module::hasAccess("Companies", "delete")) {
                                                        $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.companies.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
                                                        $output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
                                                        $output .= Form::close();
                                                    }
                                                    $data->data[$i][] = (string)$output;
                                                }
                                            }
                                            $out->setData($data);
                                            return $out;
                                        }
                                    }
                                    