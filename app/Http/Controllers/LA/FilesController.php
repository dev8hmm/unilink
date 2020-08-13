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
use File as MoveFile;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;

use App\Models\File;
use App\Models\Upload;
use App\Models\Company;
use App\Models\IE_Info;
use App\Models\Job;

class FilesController extends Controller
{
    public $show_action = true;
    
    /**
     * Display a listing of the Files.
     *
     * @return mixed
     */
    public function index()
    {
        $module = Module::get('Files');
        
        if(Module::hasAccess($module->id)) {
            return View('la.files.index', [
                'show_actions' => $this->show_action,
                'listing_cols' => Module::getListingColumns('Files'),
                'module' => $module
            ]);
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Show the form for creating a new file.
     *
     * @return mixed
     */
    public function create()
    {
        //
    }
    
    /**
     * Store a newly created file in database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
       $date= DateTime::createFromFormat('d/m/Y',$request->date)->format('Y-m-d');//$request->date;
       $expire_date= DateTime::createFromFormat('d/m/Y',$request->expire_date)->format('Y-m-d');//$request->date;
       
        //$request->date);
       $file=new File();
       $file->original=$request->original;
       $file->copy=$request->copy;
       $file->date=$date;
       $file->expire_date=$expire_date;
       $file->status=$request->status; 
       $file->save();
       return redirect('/admin/files');
        // if(Module::hasAccess("Files", "create")) {
            
        //     $rules = Module::validateRules("Files", $request);
            
        //     $validator = Validator::make($request->all(), $rules);
            
        //     if($validator->fails()) {
        //         return redirect()->back()->withErrors($validator)->withInput();
        //     }
            
        //     $insert_id = Module::insert("Files", $request);
            
        //     return redirect()->route(config('laraadmin.adminRoute') . '.files.index');
            
        // } else {
        //     return redirect(config('laraadmin.adminRoute') . "/");
        // }
    }
    
    /**
     * Display the specified file.
     *
     * @param int $id file ID
     * @return mixed
     */
    public function show($id)
    {
        if(Module::hasAccess("Files", "view")) {
            
            $file = File::find($id);
            if(isset($file->id)) {
                $module = Module::get('Files');
                $module->row = $file;
                
                return view('la.files.show', [
                    'module' => $module,
                    'view_col' => $module->view_col,
                    'no_header' => true,
                    'no_padding' => "no-padding"
                ])->with('file', $file);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("file"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Show the form for editing the specified file.
     *
     * @param int $id file ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        if(Module::hasAccess("Files", "edit")) {
            $file = File::find($id);
            if(isset($file->id)) {
                $module = Module::get('Files');
                
                $module->row = $file;
                
                return view('la.files.edit', [
                    'module' => $module,
                    'view_col' => $module->view_col,
                ])->with('file', $file);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("file"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Update the specified file in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id file ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if(Module::hasAccess("Files", "edit")) {
            
            $rules = Module::validateRules("Files", $request, true);
            
            $validator = Validator::make($request->all(), $rules);
            
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();;
            }
            
            $insert_id = Module::updateRow("Files", $request, $id);
            
            return redirect()->route(config('laraadmin.adminRoute') . '.files.index');
            
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Remove the specified file from storage.
     *
     * @param int $id file ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if(Module::hasAccess("Files", "delete")) {
            File::find($id)->delete();
            
            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.files.index');
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
        $module = Module::get('Files');
        $listing_cols = Module::getListingColumns('Files');
        
        $values = DB::table('files')->select($listing_cols)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();
        
        $fields_popup = ModuleFields::getModuleFields('Files');
        
        for($i = 0; $i < count($data->data); $i++) {
            for($j = 0; $j < count($listing_cols); $j++) {
                $col = $listing_cols[$j];
                if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if($col == $module->view_col) {
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/files/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }
            
            if($this->show_action) {
                $output = '';
                if(Module::hasAccess("Files", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/files/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }
                
                if(Module::hasAccess("Files", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.files.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
                    $output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
                    $output .= Form::close();
                }
                $data->data[$i][] = (string)$output;
            }
        }
        $out->setData($data);
        return $out;
    }


    public function zipAllFileDownload($uploads,$file_name)
    {
        // Initializing PHP class
        $zip = new \ZipArchive();
        $zip->open($file_name, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
        foreach ($uploads as $key => $upload) {
            if($upload<>null && $upload->path && File::exists($upload->path)) {
                $zip->addFile($upload->path, $upload->name);
            }
        }
        $zip->close();
        if(MoveFile::exists($file_name))
        {
            MoveFile::move($file_name,'ZipFiles/'.$file_name);
            return true;
        }
       return false;
    }
    public function file_download($id,$file)
    {
        $company=Company::find($id);
        $uploads=$company->files->files($company->files->original);
        $uploads=array_merge($uploads,$company->files->files($company->files->copy));
        // IE Files
        if($company->ie<>null)
        {
            if($company->ie->fcertificate<>null)
            {
                $uploads=array_merge($uploads,$company->ie->fcertificate->files($company->ie->fcertificate->original));
                $uploads=array_merge($uploads,$company->ie->fcertificate->files($company->ie->fcertificate->copy));
            }
            if($company->ie->fmcc<>null)
            {
                $uploads=array_merge($uploads,$company->ie->fmcc->files($company->ie->fmcc->original));
                $uploads=array_merge($uploads,$company->ie->fmcc->files($company->ie->fmcc->copy));
            }
            if($company->ie->fmgma<>null)
            {
                $uploads=array_merge($uploads,$company->ie->fmgma->files($company->ie->fmgma->original));
                $uploads=array_merge($uploads,$company->ie->fmgma->files($company->ie->fmgma->copy));
            }
            if($company->ie->fmia<>null)
            {
                $uploads=array_merge($uploads,$company->ie->fmia->files($company->ie->fmia->original));
                $uploads=array_merge($uploads,$company->ie->fmia->files($company->ie->fmia->copy));
            }
            if($company->ie->fumfcci<>null)
            {
                $uploads=array_merge($uploads,$company->ie->fumfcci->files($company->ie->fumfcci->original));
                $uploads=array_merge($uploads,$company->ie->fumfcci->files($company->ie->fumfcci->copy));
            }
            if($company->ie->fother<>null)
            {
                $uploads=array_merge($uploads,$company->ie->fother->files($company->ie->fother->original));
                $uploads=array_merge($uploads,$company->ie->fother->files($company->ie->fother->copy));
            }
           
        }
        if(count($uploads)>0){
            $name=str_limit($company->name,15,'_');
            $file_name = str_replace([' ','&'],'_',$name).'_profile.zip';
            if($this->zipAllFileDownload($uploads,$file_name))
            return response()->download(base_path('ZipFiles/'.$file_name));
            else return redirect()->back();
        }
        else return redirect()->back();
    }
    
    public function process1_download(Job $job)
    {
        $uploads=array();
        if ($job->customer<>null && $job->customer->files<>null)
        {
            $uploads=array_merge($uploads,$job->customer->files->files($job->customer->files->original));
            $uploads=array_merge($uploads,$job->customer->files->files($job->customer->files->copy));
        }
        if ($job->impexp<>null && $job->impexp->files){
            $uploads=array_merge($uploads,$job->impexp->files->files($job->impexp->files->original));
            $uploads=array_merge($uploads,$job->impexp->files->files($job->impexp->files->copy));
        }
        if ($job->compulsory<>null && $job->compulsory->letterHead){
            $uploads=array_merge($uploads,$job->compulsory->letterHead->files($job->compulsory->letterHead->original));
            $uploads=array_merge($uploads,$job->compulsory->letterHead->files($job->compulsory->letterHead->copy));
        }
        if ($job->compulsory<>null && $job->compulsory->billRegistration<>null){
           $uploads=array_merge($uploads,$job->compulsory->billRegistration->files($job->compulsory->billRegistration->original)); 
           $uploads=array_merge($uploads,$job->compulsory->billRegistration->files($job->compulsory->billRegistration->copy)); 
        }
        if ($job->compulsory<>null && $job->compulsory->commericialInvoice<>null){
            $uploads=array_merge($uploads,$job->compulsory->commericialInvoice->files($job->compulsory->commericialInvoice->original));
            $uploads=array_merge($uploads,$job->compulsory->commericialInvoice->files($job->compulsory->commericialInvoice->copy));
        }
        if ($job->compulsory<>null && $job->compulsory->packingList<>null){
            $uploads=array_merge($uploads,$job->compulsory->packingList->files($job->compulsory->packingList->original));
            $uploads=array_merge($uploads,$job->compulsory->packingList->files($job->compulsory->packingList->copy));
        }
        if ($job->compulsory<>null && $job->compulsory->saleContract<>null){
            $uploads=array_merge($uploads,$job->compulsory->saleContract->files($job->compulsory->saleContract->original));
            $uploads=array_merge($uploads,$job->compulsory->saleContract->files($job->compulsory->saleContract->copy));
        }
        if ($job->compulsory<>null && $job->compulsory->licence<>null){
            $uploads=array_merge($uploads,$job->compulsory->licence->files($job->compulsory->licence->original));
            $uploads=array_merge($uploads,$job->compulsory->licence->files($job->compulsory->licence->copy));
        }
        if(count($uploads)>0){
            $file_name = str_replace(' ','_',$job->job_no).'_process1.zip'; // Name of our archive to download
            if($this->zipAllFileDownload($uploads,$file_name))
            return response()->download(public_path('ZipFiles/'.$file_name));
            else return redirect()->back();
        }
        else return redirect()->back();
        
    }
    public function process2_download(Job $job)
    {
        $uploads=array();
        if ($job->maccs<>null && $job->maccs->receipts<>null){
            $uploads=array_merge($uploads,$job->maccs->receipts->files($job->maccs->receipts->original));
            $uploads=array_merge($uploads,$job->maccs->receipts->files($job->maccs->receipts->copy));
        }
        if ($job->maccs<>null && $job->maccs->undertakingLetter<>null){
            $uploads=array_merge($uploads,$job->maccs->undertakingLetter->files($job->maccs->undertakingLetter->original));
            $uploads=array_merge($uploads,$job->maccs->undertakingLetter->files($job->maccs->undertakingLetter->copy));
        }
        if ($job->maccs<>null && $job->maccs->ros<>null){
            $uploads=array_merge($uploads,$job->maccs->ros->files($job->maccs->ros->original));
            $uploads=array_merge($uploads,$job->maccs->ros->files($job->maccs->ros->copy));
        }
        if(count($uploads)>0){
            $file_name = str_replace(' ','_',$job->job_no).'_process2.zip'; // Name of our archive to download
            if($this->zipAllFileDownload($uploads,$file_name))
            return response()->download(base_path('ZipFiles/'.$file_name));
            else return redirect()->back();
        }
        else return redirect()->back();
    }
    public function process3_download(Job $job)
    {
        $uploads=array();
        foreach ($job->fieldoperation as $fo){
            if ($fo->type=="file")
            {
                $uploads=array_merge($uploads,$fo->file->files($fo->file->original));
                $uploads=array_merge($uploads,$fo->file->files($fo->file->copy));
            }
        }
        if(count($uploads)>0){
            $file_name = str_replace(' ','_',$job->job_no).'_process3.zip'; // Name of our archive to download
            if($this->zipAllFileDownload($uploads,$file_name))
            return response()->download(base_path('ZipFiles/'.$file_name));
            else return redirect()->back();
        }
        else return redirect()->back();
    }
    public function process4_download(Job $job)
    {
       $uploads=array();
       if ($job->cargoreceipts<>null && $job->cargoreceipts->packingList<>null)
       {
        $uploads=array_merge($uploads,$job->cargoreceipts->packingList->files($job->cargoreceipts->packingList->original));
        $uploads=array_merge($uploads,$job->cargoreceipts->packingList->files($job->cargoreceipts->packingList->copy));
       }
       if ($job->cargoreceipts<>null && $job->cargoreceipts->loadingPlan<>null){
        $uploads=array_merge($uploads,$job->cargoreceipts->loadingPlan->files($job->cargoreceipts->loadingPlan->original));
        $uploads=array_merge($uploads,$job->cargoreceipts->loadingPlan->files($job->cargoreceipts->loadingPlan->copy));
       }
       if(count($uploads)>0){
        $file_name = str_replace(' ','_',$job->job_no).'_process4.zip'; // Name of our archive to download
        if($this->zipAllFileDownload($uploads,$file_name))
        return response()->download(base_path('ZipFiles/'.$file_name));
        else return redirect()->back();
    }
    else return redirect()->back();
    }
}
