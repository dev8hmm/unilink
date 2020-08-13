<?php

namespace App\Http\Controllers\LA;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use Auth;

use App\Models\Job;
use App\Models\Company;
use App\Models\Service;
use App\Models\File;
use App\Models\Shipment;
use App\Models\Compulsory;
use App\Models\ServiceDetail;
use App\Models\Maccs;
use App\Models\Trucking;
use App\Models\FieldOperation;
use App\Models\CargoReceipt;
use App\Models\Assign;
use App\Models\Upload;
use App\Models\Log;

class ProcessesController extends Controller
{
    public function upload($request,$name)
    {
        $uploadIDs=array();
        $files = $request->file($name);
        $folder = storage_path('uploads');
        // dd($files);
        if($files<>null)
        {
            
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
            }
                return '['.implode(',',$uploadIDs).']';
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
    public function process1_show($id)
    {
        $job=Job::find($id);
       
        $this->store_log("Process",'Process-1 for '.$job->job_no,'Retrive');
        return view('la.process.process1')->with('job',$job);
    }
    public function process1_edit($id)
    {
        $job=Job::find($id);
        $this->store_log("Process",'Process-1 for '.$job->job_no,'Edit');
        return view('la.process.process1_edit')->with('job',$job);
    }
    public function process1_update($id,Request $request)
    {
    //    dd($request->all());
       $job=Job::find($id);
       $this->store_log("Process",'Process-1 for '.$job->job_no,'Updated');
       $lh=File::find($request->letter_head_id);
       $lh->original=$request->letter_head_original;
       $lh->copy=$request->letter_head_copy;
       $lh->expire_date=$request->letter_head_expire_date<>null ? DateTime::createFromFormat('d/m/Y',$request->letter_head_expire_date)->format('Y-m-d') : null;
       $lh->date=$request->letter_head_receive_date <> null ?DateTime::createFromFormat('d/m/Y',$request->letter_head_receive_date)->format('Y-m-d'):null;
       $lh->save();

       $bg=File::find($request->bill_registration_id);
       $bg->original=$request->bill_registration_original;
       $bg->copy=$request->bill_registration_copy;
       $bg->expire_date=$request->bill_registration_expire_date<>null ? DateTime::createFromFormat('d/m/Y',$request->bill_registration_expire_date)->format('Y-m-d'):null;
       $bg->date=$request->bill_registration_receive_date<> null? DateTime::createFromFormat('d/m/Y',$request->bill_registration_receive_date)->format('Y-m-d'):null;
       $bg->save();

       $ci=File::find($request->commericial_invoice_id);
       $ci->original=$request->commericial_invoice_original;
       $ci->copy=$request->commericial_invoice_copy;
       $ci->expire_date=$request->commericial_invoice_expire_date<>null? DateTime::createFromFormat('d/m/Y',$request->commericial_invoice_expire_date)->format('Y-m-d'):null;
       $ci->date=$request->commericial_invoice_receive_date<>null ? DateTime::createFromFormat('d/m/Y',$request->commericial_invoice_receive_date)->format('Y-m-d'):null;
       $ci->save();

       $pl=File::find($request->packing_list_id);
       $pl->original=$request->packing_list_original;
       $pl->copy=$request->packing_list_copy;
       $pl->expire_date=$request->packing_list_expire_date <> null? DateTime::createFromFormat('d/m/Y',$request->packing_list_expire_date)->format('Y-m-d'):null;
       $pl->date=$request->packing_list_receive_date<>null? DateTime::createFromFormat('d/m/Y',$request->packing_list_receive_date)->format('Y-m-d'):null;
       $pl->save();

       $sc=File::find($request->sale_contract_id);
       $sc->original=$request->sale_contract_original;
       $sc->copy=$request->sale_contract_copy;
       $sc->expire_date=$request->sale_contract_expire_date<>null?DateTime::createFromFormat('d/m/Y',$request->sale_contract_expire_date)->format('Y-m-d'):null;
       $sc->date=$request->sale_contract_receive_date<> null ? DateTime::createFromFormat('d/m/Y',$request->sale_contract_receive_date)->format('Y-m-d'):null;
       $sc->save();

       $sc=File::find($request->licence_id);
       $sc->original=$request->licence_original;
       $sc->copy=$request->licence_copy;
       $sc->expire_date=$request->licence_expire_date<>null?DateTime::createFromFormat('d/m/Y',$request->licence_expire_date)->format('Y-m-d'):null;
       $sc->date=$request->licence_receive_date<> null ? DateTime::createFromFormat('d/m/Y',$request->licence_receive_date)->format('Y-m-d'):null;
       $sc->save();

       return redirect('/admin/jobcenters');
    }

// Process 2
    public function process2_show($id)
    {
        $job=Job::find($id);
        $this->store_log("Process",'Process-2 for '.$job->job_no,'Retrive');
        return view('la.process.process2')->with('job',$job);
    }
    public function process2_edit($id)
    {
        $job=Job::find($id);
        $this->store_log("Process",'Process-2 for '.$job->job_no,'Edit');
        return view('la.process.process2_edit')->with('job',$job);
    }
    public function process2_update($id,Request $request)
    {
        $job=Job::find($id);
        $this->store_log("Process",'Process-2 for '.$job->job_no,'Updated');
        $ro_id=0;
        $custom_id=0;
        $physical_id=0;
        
        $receipt=File::find($request->receipt_id);
        $receipt->original=$request->receipt_original;
        $receipt->copy=$request->receipt_copy;
        $receipt->date=$request->receipt_receive_date<>null ? DateTime::createFromFormat('d/m/Y',$request->receipt_receive_date)->format('Y-m-d') : null;
        $receipt->expire_date=$request->receipt_expire_date<>null ? DateTime::createFromFormat('d/m/Y',$request->receipt_expire_date)->format('Y-m-d'): null;
        $receipt->save();

        $undertaking=File::find($request->undertakingLetter_id);
        $undertaking->original=$request->undertaking_original;
        $undertaking->copy=$request->undertaking_copy;
        $undertaking->date=$request->undertaking_receive_date <> null ? DateTime::createFromFormat('d/m/Y',$request->undertaking_receive_date)->format('Y-m-d'):null;
        $undertaking->date=$request->undertaking_expire_date<>null ? DateTime::createFromFormat('d/m/Y',$request->undertaking_expire_date)->format('Y-m-d'):null;
        $undertaking->save();
        if($job->shipment->type<>"EXPORT")
        {
            $ro=File::find($request->ro_id);
            $ro->original=$request->ro_original;
            $ro->copy=$request->ro_copy;
            $ro->date=$request->ro_receive_date<>null ? DateTime::createFromFormat('d/m/Y',$request->ro_receive_date)->format('Y-m-d') : null;
            $ro->expire_date=$request->ro_expire_date? DateTime::createFromFormat('d/m/Y',$request->ro_expire_date)->format('Y-m-d'):null;
            $ro->save();
            $ro_id=$ro->id;
        }
        $maccs=Maccs::find($job->maccs->id);
        $maccs->receipt=$receipt->id;
        $maccs->channel=$request->channel;
        $maccs->ro= $ro_id;
        $maccs->planned_checkin=$request->planned_checkin_date<>null ? DateTime::createFromFormat('d/m/Y',$request->planned_checkin_date)->format('Y-m-d') : null;
        $maccs->custom_data= $custom_id;
        $maccs->attach_document=$request->attach_document;
        $maccs->save();
        return redirect('/admin/jobs');
    }

// Process 3
    public function process3_show($id)
    {
       $job=Job::find($id);
       
       $this->store_log("Process",'Process-3 for '.$job->job_no,'Retrive');
       return view('la.process.process3')->with('job',$job);
    }
    public function process3_edit($id)
    {
        $job=Job::find($id);
        $this->store_log("Process",'Process-3 for '.$job->job_no,'Edit');
        return view('la.process.process3_edit')->with('job',$job);
    }
    public function process3_update($id,Request $request)
    { 
        $job=Job::find($id);
        $this->store_log("Process",'Process-3 for '.$job->job_no,'Updated');
        foreach($job->fieldoperation as $key => $data)
            {
                $value=null;
                if($data->type=="file")
                {
                    $receive_date=$data->short.'_receive_date';
                    $expire_date=$data->short.'_expire_date';
                    $original=$data->short.'_original';
                    $copy=$data->short.'_copy';
                    $file=File::find($data->value);
                    // dd($file);
                    $file->original=$request->$original;
                    $file->copy=$request->$copy;
                    $file->date=$request->$receive_date<>null ? DateTime::createFromFormat('d/m/Y',$request->$receive_date)->format('Y-m-d'):null;
                    $file->expire_date=$request->$expire_date<>null ? DateTime::createFromFormat('d/m/Y',$request->$expire_date)->format('Y-m-d') : null;
                    $file->save();
                    $value=$data->value;
                }
                elseif($data->type=="text")
                {
                    $text=$data->short.'_text';
                    $value=$request->$text;
                }
                elseif($data->type=="date"){
                    $date=$data->short;
                    $value=$request->$date<>null ? DateTime::createFromFormat('d/m/Y',$request->$date)->format('Y-m-d') : null;
                }
                $fo=FieldOperation::find($data->id);
                $fo->value=$value;
                $fo->save();
            }
            return redirect('/admin/jobcenters');
    }

    public function process4_show($id)
    {
        $job=Job::find($id);
        $this->store_log("Process",'Process-4 for '.$job->job_no,'Retrive');
        $success=true;
        foreach($job->fieldoperation as $fop )
        {
            if($fop->type=="file")
            {
                $file=File::find($fop->value);
                if(count($file->files($file->original))<1)
                {
                 $success=false;
                }
            }
            else if($fop->value==null)
            {
             $success=false;
            }
        }

        return view('la.process.process4')->with('job',$job)->with('success',$success);
    }
public function process4_edit($id)
{
    $job=Job::find($id);
    $this->store_log("Process",'Process-4 for '.$job->job_no,'Edit');
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
   return view('la.process.process4_edit')->with('job',$job)->with('success',$success);
}
public function process4_update($id,Request $request)
{
    
//    dd($request->all());
   $job=Job::find($id);
   
   $this->store_log("Process",'Process-4 for '.$job->job_no,'Updated');
      $cargo=$job->cargoreceipts;
      $pck=$cargo->packingList;
      $pck->original=$request->packing_list_original;
      $pck->copy=$request->packing_list_copy;
      $pck->expire_date=$request->packing_list_expire_date<>null ? DateTime::createFromFormat('d/m/Y',$request->packing_list_expire_date)->format('Y-m-d') : null;
      $pck->date=$request->packing_list_receive_date<>null ? DateTime::createFromFormat('d/m/Y',$request->packing_list_receive_date)->format('Y-m-d') : null;
      $pck->save();
      
      $cargo->job_id=$id;
      $cargo->packing_list=$pck->id;

      
      if ($job->shipment->type=="EXPORT")
      {
          $ldp=$cargo->loadingPlan;
          $ldp->original=$request->loading_plan_original;
          $ldp->copy=$request->loading_plan_copy;
          $ldp->expire_date=$request->loading_plan_expire_date<>null ? DateTime::createFromFormat('d/m/Y',$request->loading_plan_expire_date)->format('Y-m-d') : null;
          $ldp->date=$request->loading_plan_receive_date<>null ? DateTime::createFromFormat('d/m/Y',$request->loading_plan_receive_date)->format('Y-m-d') : null;
          $ldp->save();
          $cargo->loading_plan=$ldp->id;
      }
       $cargo->save();
       return redirect('/admin/jobcenters');
}

    public function process1_receive($id,Request $request)
    {
        // dd($request->all());
       $job=Job::find($id);
       $this->store_log("Document",'Process-1 for '.$job->job_no,'Received');
       if($job->custom_clearance<>0 || $job->supplement<>0)
       {
           $letter=new File();
           $letter->original=$this->upload($request,'letterhead_original');
           $letter->copy=$this->upload($request,'letterhead_copy');
           $letter->date=$request->letterhead_receive<>null? DateTime::createFromFormat('d/m/Y',$request->letterhead_receive)->format('Y-m-d'):null;
           $letter->expire_date=$request->letterhead_expire<>null? DateTime::createFromFormat('d/m/Y',$request->letterhead_expire)->format('Y-m-d'):null;
           $letter->save();
            //Bill Registration 
           $bill=new File();
           $bill->original=$this->upload($request,'bill_original');
           $bill->copy=$this->upload($request,'bill_copy');
           $bill->date=$request->bill_receive<>null ? DateTime::createFromFormat('d/m/Y',$request->bill_receive)->format('Y-m-d') : null;
           $bill->expire_date= $request->bill_expire<>null ? DateTime::createFromFormat('d/m/Y',$request->bill_expire)->format('Y-m-d') : null;
           $bill->save();
           // Commericial Invoice
           $commericial=new File();
           $commericial->original=$this->upload($request,'commericial_original');
           $commericial->copy=$this->upload($request,'commericial_copy');
           $commericial->date=$request->commericial_receive<>null ? DateTime::createFromFormat('d/m/Y',$request->commericial_receive)->format('Y-m-d') : null;
           $commericial->expire_date=$request->commericial_expire<>null ? DateTime::createFromFormat('d/m/Y',$request->commericial_expire)->format('Y-m-d') : null;
           $commericial->save();
           // Packing List
           $packing=new File();
           $packing->original=$this->upload($request,'packing_original');
           $packing->copy=$this->upload($request,'packing_copy');
           $packing->date=$request->packing_receive<>null ? DateTime::createFromFormat('d/m/Y',$request->packing_receive)->format('Y-m-d') : null;
           $packing->expire_date=$request->packing_expire<>null ? DateTime::createFromFormat('d/m/Y',$request->packing_expire)->format('Y-m-d') : null;
           $packing->save();

           // Sale Contract
           $sale=new File();
           
           $sale->original=$this->upload($request,'sale_original');//$request->sale_original;
           $sale->copy=$this->upload($request,'sale_copy');//$request->sale_copy;
           $sale->date=$request->sale_receive ? DateTime::createFromFormat('d/m/Y',$request->sale_receive)->format('Y-m-d') : null;
           $sale->expire_date=$request->sale_expire ? DateTime::createFromFormat('d/m/Y',$request->sale_expire)->format('Y-m-d') : null;
            $sale->save();

            // licence
           $licence=new File();
           $licence->original=$this->upload($request,'licence_original');//$request->licence_original;
           $licence->copy=$this->upload($request,'licence_copy');//$request->licence_copy;
           $licence->date=$request->licence_receive ? DateTime::createFromFormat('d/m/Y',$request->licence_receive)->format('Y-m-d') : null;
           $licence->expire_date=$request->licence_expire ? DateTime::createFromFormat('d/m/Y',$request->licence_expire)->format('Y-m-d') : null;
            $licence->save();
            

            $compulsory=new Compulsory();
           
            $compulsory->letter_head=$letter->id;
            $compulsory->bill_registration=$bill->id;
            $compulsory->reference_no=$request->reference_number;
            $compulsory->commericial_invoice=$commericial->id;
            $compulsory->packing_list=$packing->id;
            $compulsory->sale_contract=$sale->id;
            $compulsory->credit=$request->credit;
            $compulsory->job_id=$job->id;
            $compulsory->licence=$licence->id;

            $compulsory->save();
        }

        if($job->trucking<>0)
        {
            $file=new File();
            $file->original=$this->upload($request,'original_cargo_receipt');//$request->original_cargo_receipt;
            $file->copy=$this->upload($request,'copy_cargo_receipt');//$request->copy_cargo_receipt;
            $file->date=$request->cargo_receipt_recieve_date ? DateTime::createFromFormat('d/m/Y',$request->cargo_receipt_recieve_date)->format('Y-m-d') : null;
            $file->expire_date= $request->cargo_receipt_expire_date ? DateTime::createFromFormat('d/m/Y',$request->cargo_receipt_expire_date)->format('Y-m-d') : null;
            $file->save();
            $trucking=new Trucking();
            $trucking->cargo_receipt=$file->id;
            $trucking->shipper=$request->shipper;
            $trucking->sender=$request->sender;
            $trucking->receiver=$request->receiver;
            $trucking->delivery_date=$request->delivery_date ? DateTime::createFromFormat('d/m/Y',$request->delivery_date)->format('Y-m-d') : null;
            $trucking->job_id=$job->id;
            $trucking->save();
        }
        if(isset($request->service))
        {
            foreach($request->service as $key => $s)
            {
                $file=new File();
                $original="service_original".$key;
                $copy="service_copy".$key;
                $file->original=$this->upload($request,$original);//$request->$original;
                $file->copy=$this->upload($request,$copy);//$request->$copy;
                $file->date=$request->receive_date[$key] ? DateTime::createFromFormat('d/m/Y',$request->receive_date[$key])->format('Y-m-d') : null;
                $file->expire_date=$request->expire_date[$key] ? DateTime::createFromFormat('d/m/Y',$request->expire_date[$key])->format('Y-m-d') : null;
                $file->save();

                $sd=new ServiceDetail();
                $sd->name=$s;
                $sd->file=$file->id;
                $sd->job_no=$job->id;
                $sd->save();
            }
        }
        $job->process='1';
        // dd($job);
        $job->save();

        return redirect('/admin/jobs');
    }


    public function process2_receive($id,Request $request)
    {
        $job=Job::find($id);
        $this->store_log("Document",'Process-2 for '.$job->job_no,'Received');
        $ro_id=0;
        $custom_id=0;
        $physical_id=0;
        
        $receipt=new File();
        $receipt->original=$this->upload($request,'receipt_original');//$request->receipt_original;
        $receipt->copy=$this->upload($request,'receipt_copy');//$request->receipt_copy;
        $receipt->date=$request->receipt_receive_date<>null ? DateTime::createFromFormat('d/m/Y',$request->receipt_receive_date)->format('Y-m-d') : null;
        $receipt->expire_date=$request->receipt_expire_date<>null ? DateTime::createFromFormat('d/m/Y',$request->receipt_expire_date)->format('Y-m-d'): null;
        $receipt->save();

        $undertaking=new File();
        $undertaking->original=$this->upload($request,'undertaking_original');//$request->undertaking_original;
        $undertaking->copy=$this->upload($request,'undertaking_copy');//$request->undertaking_copy;
        $undertaking->date=$request->undertaking_receive_date <> null ? DateTime::createFromFormat('d/m/Y',$request->undertaking_receive_date)->format('Y-m-d'):null;
        $undertaking->date=$request->undertaking_expire_date<>null ? DateTime::createFromFormat('d/m/Y',$request->undertaking_expire_date)->format('Y-m-d'):null;
        $undertaking->save();
        if($job->shipment->type<>"EXPORT")
        {
            $ro=new File();
            $ro->original=$this->upload($request,'ro_original');//$request->ro_original;
            $ro->copy=$this->upload($request,'ro_copy');//$request->ro_copy;
            $ro->date=$request->ro_receive_date<>null ? DateTime::createFromFormat('d/m/Y',$request->ro_receive_date)->format('Y-m-d') : null;
            $ro->expire_date=$request->ro_expire_date? DateTime::createFromFormat('d/m/Y',$request->ro_expire_date)->format('Y-m-d'):null;
            $ro->save();
            $ro_id=$ro->id;

            if($request->physical_original<>"[]" && $request->physical_receive_date<>null)
            {
                $physical=new File();
                $physical->original=$this->upload($request,'physical_original');//$request->physical_original;
                $physical->copy=$this->upload($request,'physical_copy');//$request->physical_copy;
                $physical->date=$request->physical_receive_date ? DateTime::createFromFormat('d/m/Y',$request->physical_receive_date)->format('Y-m-d'):null;
                $physical->expire_date=$request->physical_expire_date ? DateTime::createFromFormat('d/m/Y',$request->physical_expire_date)->format('Y-m-d') : null;
                $physical->save();
                $physical_id=$physical->id;
            }
            if($request->custom_data_original<>"[]" && $request->custom_data_expire_date<>null)
            {
                $custom=new File();
                $custom->original=$this->upload($request,'custom_data_original');//$request->custom_data_original;
                $custom->copy=$this->upload($request,'custom_data_copy');//$request->custom_data_copy;
                $custom->date=$request->custom_data_expire_date<> null ? DateTime::createFromFormat('d/m/Y',$request->custom_data_expire_date)->format('Y-m-d') : null;
                $custom->expire_date=$request->custom_data_receive_date <>null ? DateTime::createFromFormat('d/m/Y',$request->custom_data_receive_date)->format('Y-m-d'):null;
                $custom->save();
                $custom_id=$custom->id;
            }
        }
        $maccs=new Maccs();
        $maccs->receipt=$receipt->id;
        $maccs->channel=$request->channel;
        $maccs->ro= $ro_id;
        $maccs->undertaking_letter=$undertaking->id;
        $maccs->physical_letter=$physical_id;
        $maccs->planned_checkin=$request->planned_checkin_date<>null ? DateTime::createFromFormat('d/m/Y',$request->planned_checkin_date)->format('Y-m-d') : null;
        $maccs->custom_data= $custom_id;
        $maccs->attach_document=$request->attach_document;
        $maccs->job_id=$id;
        $maccs->save();
        $job->process=2;
        $job->save();

       
        $assign = Assign::updateOrCreate(
            
            ['job_id' => $job->id],
            ['p3' => $request->assign]
        );
        return redirect('/admin/jobs');
    }
    public function process3_receive($id,Request $request)
    {
            $job=Job::find($id);
            $this->store_log("Document",'Process-3 for '.$job->job_no,'Received');
            foreach($request->data_value as $key => $data)
            {
                $value=null;
                if(json_decode($data)->type=="file")
                {
                    $receive_date=json_decode($data)->short.'_receive_date';
                    $expire_date=json_decode($data)->short.'_expire_date';
                    $original=json_decode($data)->short.'_original';
                    $copy=json_decode($data)->short.'_copy';
                    $file=new File();
                    $file->original=$this->upload($request,$original);//$request->$original;
                    $file->copy=$this->upload($request,$copy);//$request->$copy;
                    $file->date=$request->$receive_date<>null ? DateTime::createFromFormat('d/m/Y',$request->$receive_date)->format('Y-m-d'):null;
                    $file->expire_date=$request->$expire_date<>null ? DateTime::createFromFormat('d/m/Y',$request->$expire_date)->format('Y-m-d') : null;
                    $file->save();
                    $value=$file->id;
                }
                elseif(json_decode($data)->type=="text")
                {
                    $text=json_decode($data)->short.'_text';
                    $value=$request->$text;
                }
                elseif(json_decode($data)->type=="date"){
                    $date=json_decode($data)->short.'_date';
                    $value=$request->$date<>null ? DateTime::createFromFormat('d/m/Y',$request->$date)->format('Y-m-d') : null;
                }
                $fo=new FieldOperation();
                $fo->job_id=$id;
                $fo->name=json_decode($data)->name;
                $fo->short=json_decode($data)->short;
                $fo->type=json_decode($data)->type;
                $fo->value=$value;
                $fo->save();
            }
            $job->process=3;
            $job->save();
            $assign = Assign::updateOrCreate(
                
                ['job_id' => $job->id],
                ['p4' => $request->assign]
            );
            return redirect('/admin/jobs');
    }
    public function process4_receive($id,Request $request)
    {
       $job=Job::find($id);
       $this->store_log("Document",'Process-4 for '.$job->job_no,'Received');
       $cargo=new CargoReceipt();
       $pck=new File();
       $pck->original=$this->upload($request,'packing_list_original');//$request->packing_list_original;
       $pck->copy=$this->upload($request,'packing_list_copy');//$request->packing_list_copy;
       $pck->expire_date=$request->packing_list_expire_date<>null ? DateTime::createFromFormat('d/m/Y',$request->packing_list_expire_date)->format('Y-m-d') : null;
       $pck->date=$request->packing_list_receive_date<>null ? DateTime::createFromFormat('d/m/Y',$request->packing_list_receive_date)->format('Y-m-d') : null;
       $pck->save();
       
       $cargo->job_id=$id;
       $cargo->packing_list=$pck->id;

       
       if ($job->shipment->type=="EXPORT")
       {
           $ldp=new File();
           $ldp->original=$this->upload($request,'loading_plan_original');//$request->loading_plan_original;
           $ldp->copy=$this->upload($request,'loading_plan_copy');//$request->loading_plan_copy;
           $ldp->expire_date=$request->loading_plan_expire_date<>null ? DateTime::createFromFormat('d/m/Y',$request->loading_plan_expire_date)->format('Y-m-d') : null;
           $ldp->date=$request->loading_plan_receive_date<>null ? DateTime::createFromFormat('d/m/Y',$request->loading_plan_receive_date)->format('Y-m-d') : null;
           $ldp->save();
           $cargo->loading_plan=$ldp->id;
       }
        $cargo->save();
        $job->process=4;
        $job->save();
       
        $assign = Assign::updateOrCreate(
            ['job_id' => $job->id],
            ['p5' => $request->assign]
        );
        return redirect('/admin/jobcenters');
    }
    public function process5_receive($id,Request $request)
    {
       $job=Job::find($id);
       $this->store_log("Document",'Process-5 for '.$job->job_no,'Received');
       $job->process=5;
       $job->save();
       return redirect('/admin/jobcenters');
    }
}
