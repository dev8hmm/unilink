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
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;

use App\Models\Shipment;

class ShipmentsController extends Controller
{
    public $show_action = true;
    
    /**
     * Display a listing of the Shipments.
     *
     * @return mixed
     */
    public function index()
    {
        $module = Module::get('Shipments');
        
        if(Module::hasAccess($module->id)) {
            return View('la.shipments.index', [
                'show_actions' => $this->show_action,
                'listing_cols' => Module::getListingColumns('Shipments'),
                'module' => $module
            ]);
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Show the form for creating a new shipment.
     *
     * @return mixed
     */
    public function create()
    {
        //
    }
    
    /**
     * Store a newly created shipment in database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if(Module::hasAccess("Shipments", "create")) {
            
            $rules = Module::validateRules("Shipments", $request);
            
            $validator = Validator::make($request->all(), $rules);
            
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            
            $insert_id = Module::insert("Shipments", $request);
            
            return redirect()->route(config('laraadmin.adminRoute') . '.shipments.index');
            
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Display the specified shipment.
     *
     * @param int $id shipment ID
     * @return mixed
     */
    public function show($id)
    {
        if(Module::hasAccess("Shipments", "view")) {
            
            $shipment = Shipment::find($id);
            if(isset($shipment->id)) {
                $module = Module::get('Shipments');
                $module->row = $shipment;
                
                return view('la.shipments.show', [
                    'module' => $module,
                    'view_col' => $module->view_col,
                    'no_header' => true,
                    'no_padding' => "no-padding"
                ])->with('shipment', $shipment);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("shipment"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Show the form for editing the specified shipment.
     *
     * @param int $id shipment ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        if(Module::hasAccess("Shipments", "edit")) {
            $shipment = Shipment::find($id);
            if(isset($shipment->id)) {
                $module = Module::get('Shipments');
                
                $module->row = $shipment;
                
                return view('la.shipments.edit', [
                    'module' => $module,
                    'view_col' => $module->view_col,
                ])->with('shipment', $shipment);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("shipment"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Update the specified shipment in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id shipment ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if(Module::hasAccess("Shipments", "edit")) {
            
            $rules = Module::validateRules("Shipments", $request, true);
            
            $validator = Validator::make($request->all(), $rules);
            
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();;
            }
            
            $insert_id = Module::updateRow("Shipments", $request, $id);
            
            return redirect()->route(config('laraadmin.adminRoute') . '.shipments.index');
            
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Remove the specified shipment from storage.
     *
     * @param int $id shipment ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if(Module::hasAccess("Shipments", "delete")) {
            Shipment::find($id)->delete();
            
            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.shipments.index');
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
        $module = Module::get('Shipments');
        $listing_cols = Module::getListingColumns('Shipments');
        
        $values = DB::table('shipments')->select($listing_cols)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();
        
        $fields_popup = ModuleFields::getModuleFields('Shipments');
        
        for($i = 0; $i < count($data->data); $i++) {
            for($j = 0; $j < count($listing_cols); $j++) {
                $col = $listing_cols[$j];
                if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if($col == $module->view_col) {
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/shipments/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }
            
            if($this->show_action) {
                $output = '';
                if(Module::hasAccess("Shipments", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/shipments/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }
                
                if(Module::hasAccess("Shipments", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.shipments.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
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
