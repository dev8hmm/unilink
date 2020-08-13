<?php

namespace App\Http\Controllers\LA;
use DateTime;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Shipment;
use App\Models\File;

class JobCenterController extends Controller
{
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
    public function index(Request $request)
    {
        $p=$this->role_permission();
        if (isset($request)&&$request->type=="complete") {
            $jobs=Job::where('process','>',4)->get();
        }
        else{
            $jobs=Job::where('process','<',5)->get();
        }
        return view('la.jobcenters.index')->with('jobs',$jobs)
                                          ->with('request',null)
                                          ->with('p',$p);

    }
    public function search_job(Request $request)
    {
        $p=$this->role_permission();
        $jobs=Job::where('job_no','LIKE','%'.$request->job_no.'%')->get();
       return view('la.jobcenters.index')->with('jobs',$jobs)
                                         ->with('request',null)
                                         ->with('p',$p);
    }
    public function filter_search(Request $request)
    {
        $p=$this->role_permission();
        $data=array();
        $jobs=Job::where('process','<',5)->orderBy('job_no',$request->orderByJob);
        if($request->actual_receive_date=="yes")
        {
            $jobs=$jobs->whereHas('fieldoperation',function($query)
            {
                return $query->where('fieldoperations.short','actual_date')
                              ->where('fieldoperations.value','<>',null);
            });
        }
        if($request->actual_receive_date=="no")
        {
            $jobs=$jobs->whereHas('fieldoperation',function($query)
            {
                return $query->where('fieldoperations.short','actual_date')
                              ->where('fieldoperations.value',null);
            });
        }

        if($request->priority=="any")
        {
            if($request->job_status=="any")
            {
                $jobs= $jobs->where('process','<=',$request->process)->get();
            }
            else if($request->job_status=="finish")
            {
                    $jobs= $jobs->where('process',5)->get();
            }
            else{
               $jobs= $jobs->get();
            }
            $data=$jobs;
        }
        else {
            $jobs=Job::orderBy('job_no',$request->orderByJob)->get();
            foreach($jobs as $key => $job)
            {
                $job_file=null;
                $from = new DateTime($job->date);
                $to = new DateTime($job->shipment->eta);
                $diff = $to->diff($from)->format("%a");
                
                if($request->priority=="urgent" && $diff<5)
                {
                    $data[]=$job;
                }
                elseif($request->priority=="normal" && $diff>=5)
                {
                    $data[]=$job;
                }
            }
        }
        return view('la.jobcenters.index')->with('jobs',$data)
                                          ->with('request',$request->all())
                                          ->with('p',$p);
    }
}
