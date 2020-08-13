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

use App\Models\ShippingLine;

class ShippingLinesController extends Controller
{
    public $show_action = true;
    
    /**
     * Display a listing of the ShippingLines.
     *
     * @return mixed
     */
    public function index()
    {
        $module = Module::get('ShippingLines');
        
        if(Module::hasAccess($module->id)) {
            return View('la.shippinglines.index', [
                'show_actions' => $this->show_action,
                'listing_cols' => Module::getListingColumns('ShippingLines'),
                'module' => $module
            ]);
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Show the form for creating a new shippingline.
     *
     * @return mixed
     */
    public function create()
    {
        //
    }
    
    /**
     * Store a newly created shippingline in database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if(Module::hasAccess("ShippingLines", "create")) {
            
            $rules = Module::validateRules("ShippingLines", $request);
            
            $validator = Validator::make($request->all(), $rules);
            
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            
            $insert_id = Module::insert("ShippingLines", $request);
            
            return redirect()->route(config('laraadmin.adminRoute') . '.shippinglines.index');
            
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Display the specified shippingline.
     *
     * @param int $id shippingline ID
     * @return mixed
     */
    public function show($id)
    {
        if(Module::hasAccess("ShippingLines", "view")) {
            
            $shippingline = ShippingLine::find($id);
            if(isset($shippingline->id)) {
                $module = Module::get('ShippingLines');
                $module->row = $shippingline;
                
                return view('la.shippinglines.show', [
                    'module' => $module,
                    'view_col' => $module->view_col,
                    'no_header' => true,
                    'no_padding' => "no-padding"
                ])->with('shippingline', $shippingline);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("shippingline"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Show the form for editing the specified shippingline.
     *
     * @param int $id shippingline ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        if(Module::hasAccess("ShippingLines", "edit")) {
            $shippingline = ShippingLine::find($id);
            if(isset($shippingline->id)) {
                $module = Module::get('ShippingLines');
                
                $module->row = $shippingline;
                
                return view('la.shippinglines.edit', [
                    'module' => $module,
                    'view_col' => $module->view_col,
                ])->with('shippingline', $shippingline);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("shippingline"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Update the specified shippingline in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id shippingline ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if(Module::hasAccess("ShippingLines", "edit")) {
            
            $rules = Module::validateRules("ShippingLines", $request, true);
            
            $validator = Validator::make($request->all(), $rules);
            
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();;
            }
            
            $insert_id = Module::updateRow("ShippingLines", $request, $id);
            
            return redirect()->route(config('laraadmin.adminRoute') . '.shippinglines.index');
            
        } else {
            return redirect(config('laraadmin.adminRoute') . "/");
        }
    }
    
    /**
     * Remove the specified shippingline from storage.
     *
     * @param int $id shippingline ID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if(Module::hasAccess("ShippingLines", "delete")) {
            ShippingLine::find($id)->delete();
            
            // Redirecting to index() method
            return redirect()->route(config('laraadmin.adminRoute') . '.shippinglines.index');
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
        $module = Module::get('ShippingLines');
        $listing_cols = Module::getListingColumns('ShippingLines');
        
        $values = DB::table('shippinglines')->select($listing_cols)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();
        
        $fields_popup = ModuleFields::getModuleFields('ShippingLines');
        
        for($i = 0; $i < count($data->data); $i++) {
            for($j = 0; $j < count($listing_cols); $j++) {
                $col = $listing_cols[$j];
                if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if($col == $module->view_col) {
                    $data->data[$i][$j] = '<a href="' . url(config('laraadmin.adminRoute') . '/shippinglines/' . $data->data[$i][0]) . '">' . $data->data[$i][$j] . '</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }
            
            if($this->show_action) {
                $output = '';
                if(Module::hasAccess("ShippingLines", "edit")) {
                    $output .= '<a href="' . url(config('laraadmin.adminRoute') . '/shippinglines/' . $data->data[$i][0] . '/edit') . '" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }
                
                if(Module::hasAccess("ShippingLines", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.shippinglines.destroy', $data->data[$i][0]], 'method' => 'delete', 'style' => 'display:inline']);
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
