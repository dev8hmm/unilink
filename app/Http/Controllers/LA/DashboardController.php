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
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Analytics;
use DateTime;
use Spatie\Analytics\Period;
use App\Models\Job;
/**
 * Class DashboardController
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
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
    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $urgent=array();
     $p=$this->role_permission();
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

      $p1=Job::where('process',1)->get();
      $p2=Job::where('process',2)->get();
      $p3=Job::where('process',3)->get();
      $p4=Job::where('process',4)->get();
      $p5=Job::where('process',5)->get();
      $arr=null;
        return view('la.dashboard')
               ->with('ga',json_encode($arr))
               ->with('p1',$p1)
               ->with('p2',$p2)
               ->with('p3',$p3)
               ->with('p4',$p4)
               ->with('p5',$p5)
               ->with('urgent',$urgent)
               ->with('p',$p);
    }
    public function getJobCount()
    {
        $p1=Job::where('process',1)->get();
        $p2=Job::where('process',2)->get();
        $p3=Job::where('process',3)->get();
        $p4=Job::where('process',4)->get();
        $p5=Job::where('process',5)->get();
        $data[]=$p1;
        $data[]=$p2;
        $data[]=$p3;
        $data[]=$p4;
        $data[]=$p5;
        return response()->json($data);
    }

    
}