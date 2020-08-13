<?php

use Dwij\Laraadmin\Helpers\LAHelper;

/* ================== Homepage ================== */
// Route::get('/', 'HomeController@index');
Route::get('/',function(){
return redirect('/admin');
});
Route::get('/home', 'HomeController@index');
Route::auth();
/* ================== Access Uploaded Files ================== */
Route::get('files/{hash}/{name}', 'LA\UploadsController@get_file');

/*
|--------------------------------------------------------------------------
| Admin Application Routes
|--------------------------------------------------------------------------
*/

$as = "";
if(LAHelper::laravel_ver() == 5.3 || LAHelper::laravel_ver() == 5.4) {
	$as = config('laraadmin.adminRoute').'.';
	
	// Routes for Laravel 5.3
	Route::get('/logout', 'Auth\LoginController@logout');
}

Route::group(['as' => $as, 'middleware' => ['auth', 'permission:ADMIN_PANEL']], function () {
	
	/* ================== Dashboard ================== */
	
	Route::get(config('laraadmin.adminRoute'), 'LA\DashboardController@index');
	Route::get(config('laraadmin.adminRoute'). '/dashboard', 'LA\DashboardController@index');
	Route::get(config('laraadmin.adminRoute').'/getjobs','LA\DashboardController@getJobCount');
	
	/* ================== Users ================== */
	Route::resource(config('laraadmin.adminRoute') . '/users', 'LA\UsersController');
	Route::get(config('laraadmin.adminRoute') . '/user_dt_ajax', 'LA\UsersController@dtajax');
	
	/* ================== Uploads ================== */
	Route::resource(config('laraadmin.adminRoute') . '/uploads', 'LA\UploadsController');
	Route::post(config('laraadmin.adminRoute') . '/upload_files', 'LA\UploadsController@upload_files');
	Route::get(config('laraadmin.adminRoute') . '/uploaded_files', 'LA\UploadsController@uploaded_files');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_caption', 'LA\UploadsController@update_caption');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_filename', 'LA\UploadsController@update_filename');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_public', 'LA\UploadsController@update_public');
	Route::post(config('laraadmin.adminRoute') . '/uploads_delete_file', 'LA\UploadsController@delete_file');
	
	/* ================== Roles ================== */
	Route::resource(config('laraadmin.adminRoute') . '/roles', 'LA\RolesController');
	Route::get(config('laraadmin.adminRoute') . '/role_dt_ajax', 'LA\RolesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_module_role_permissions/{id}', 'LA\RolesController@save_module_role_permissions');
	
	/* ================== Permissions ================== */
	Route::resource(config('laraadmin.adminRoute') . '/permissions', 'LA\PermissionsController');
	Route::get(config('laraadmin.adminRoute') . '/permission_dt_ajax', 'LA\PermissionsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_permissions/{id}', 'LA\PermissionsController@save_permissions');
	
	/* ================== Departments ================== */
	Route::resource(config('laraadmin.adminRoute') . '/departments', 'LA\DepartmentsController');
	Route::get(config('laraadmin.adminRoute') . '/department_dt_ajax', 'LA\DepartmentsController@dtajax');
	
	/* ================== Employees ================== */
	Route::resource(config('laraadmin.adminRoute') . '/employees', 'LA\EmployeesController');
	Route::get(config('laraadmin.adminRoute') . '/employee_dt_ajax', 'LA\EmployeesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/change_password/{id}', 'LA\EmployeesController@change_password');
	
	/* ================== Organizations ================== */
	Route::resource(config('laraadmin.adminRoute') . '/organizations', 'LA\OrganizationsController');
	Route::get(config('laraadmin.adminRoute') . '/organization_dt_ajax', 'LA\OrganizationsController@dtajax');

	/* ================== Backups ================== */
	Route::resource(config('laraadmin.adminRoute') . '/backups', 'LA\BackupsController');
	Route::get(config('laraadmin.adminRoute') . '/backup_dt_ajax', 'LA\BackupsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/create_backup_ajax', 'LA\BackupsController@create_backup_ajax');
	Route::get(config('laraadmin.adminRoute') . '/downloadBackup/{id}', 'LA\BackupsController@downloadBackup');

    /* ================== Files ================== */
    Route::resource(config('laraadmin.adminRoute') . '/files', 'LA\FilesController');
    Route::get(config('laraadmin.adminRoute') . '/file_dt_ajax', 'LA\FilesController@dtajax');

    /* ================== Companies ================== */
    Route::resource(config('laraadmin.adminRoute') . '/companies', 'LA\CompaniesController');
	Route::get(config('laraadmin.adminRoute') . '/company_dt_ajax', 'LA\CompaniesController@dtajax');
	Route::get(config('laraadmin.adminRoute').'/customers','LA\CompaniesController@index');
	Route::get(config('laraadmin.adminRoute').'/imp_exp','LA\CompaniesController@imp_exp');
	Route::get(config('laraadmin.adminRoute').'/company/getCompany/{id}','LA\CompaniesController@getcompany');
	Route::get(config('laraadmin.adminRoute').'/checkRegId/{regId}','LA\CompaniesController@checkRegId');
	Route::post(config('laraadmin.adminRoute').'/companies/search_company','LA\CompaniesController@searchCompany');
	Route::get(config('laraadmin.adminRoute').'/companies/ie/{id}','LA\CompaniesController@toIE');
	Route::post(config('laraadmin.adminRoute').'/companies/{id}/toIE','LA\CompaniesController@storeIE');
	
	Route::get(config('laraadmin.adminRoute').'/getAllCustomers','LA\CompaniesController@getAllCustomers');
	Route::get(config('laraadmin.adminRoute').'/getAllIEs','LA\CompaniesController@getAllIEs');

    /* ================== IE_Infos ================== */
    Route::resource(config('laraadmin.adminRoute') . '/ie_infos', 'LA\IE_InfosController');
    Route::get(config('laraadmin.adminRoute') . '/ie_info_dt_ajax', 'LA\IE_InfosController@dtajax');

    /* ================== PortNames ================== */
    Route::resource(config('laraadmin.adminRoute') . '/portnames', 'LA\PortNamesController');
    Route::get(config('laraadmin.adminRoute') . '/portname_dt_ajax', 'LA\PortNamesController@dtajax');

    /* ================== Services ================== */
    Route::resource(config('laraadmin.adminRoute') . '/services', 'LA\ServicesController');
    Route::get(config('laraadmin.adminRoute') . '/service_dt_ajax', 'LA\ServicesController@dtajax');

    /* ================== Jobs ================== */
    Route::resource(config('laraadmin.adminRoute') . '/jobs', 'LA\JobsController');
	Route::get(config('laraadmin.adminRoute') . '/job_dt_ajax', 'LA\JobsController@dtajax');
	Route::get(config('laraadmin.adminRoute').'/documents/receive/{id}','LA\JobsController@document_receive');
	Route::get(config('laraadmin.adminRoute').'/jobs/process1/{id}','LA\JobsController@process1');
	Route::get(config('laraadmin.adminRoute').'/jobs/process2/{id}','LA\JobsController@process2');
	Route::get(config('laraadmin.adminRoute').'/jobs/process3/{id}','LA\JobsController@porcess3');
	Route::get(config('laraadmin.adminRoute').'/jobs/process4/{id}','LA\JobsController@porcess4');
	Route::get(config('laraadmin.adminRoute').'/jobs/process5/{id}','LA\JobsController@process5');
	Route::get(config('laraadmin.adminRoute').'/search_jobs','LA\JobsController@search_job');
	Route::get(config('laraadmin.adminRoute').'/jobs/export_profile/{id}','LA\JobsController@export_profile');
	Route::get(config('laraadmin.adminRoute').'/jobs/export_process4/{id}','LA\JobsController@export_process4');
	Route::get(config('laraadmin.adminRoute').'/jobs/document_collect/{id}','LA\JobsController@document_collect');
	Route::get(config('laraadmin.adminRoute').'/download/urgent_job_list','LA\JobsController@export_urgent_jobs');

    /* ================== Shipments ================== */
    Route::resource(config('laraadmin.adminRoute') . '/shipments', 'LA\ShipmentsController');
	Route::get(config('laraadmin.adminRoute') . '/shipment_dt_ajax', 'LA\ShipmentsController@dtajax');
	Route::get(config('laraadmin.adminRoute').'/getShippingLines','LA\JobsController@getShippingLines');
	Route::get(config('laraadmin.adminRoute').'/getAirLines','LA\JobsController@getAirLines');
	Route::get(config('laraadmin.adminRoute').'/getCode/{id}/{type}','LA\JobsController@getCode');
	
	 /* ================== Processes ================== */
	Route::get(config('laraadmin.adminRoute').'/jobs/process1/{id}/show','LA\ProcessesController@process1_show');
	Route::get(config('laraadmin.adminRoute').'/jobs/process1/{id}/edit','LA\ProcessesController@process1_edit');
	Route::post(config('laraadmin.adminRoute').'/jobs/process1/{id}/update','LA\ProcessesController@process1_update');

	Route::get(config('laraadmin.adminRoute').'/jobs/process2/{id}/show','LA\ProcessesController@process2_show');
	Route::get(config('laraadmin.adminRoute').'/jobs/process2/{id}/edit','LA\ProcessesController@process2_edit');
	Route::post(config('laraadmin.adminRoute').'/jobs/process2/{id}/update','LA\ProcessesController@process2_update');

	Route::get(config('laraadmin.adminRoute').'/jobs/process3/{id}/show','LA\ProcessesController@process3_show');
	Route::get(config('laraadmin.adminRoute').'/jobs/process3/{id}/edit','LA\ProcessesController@process3_edit');
	Route::post(config('laraadmin.adminRoute').'/jobs/process3/{id}/update','LA\ProcessesController@process3_update');

	Route::get(config('laraadmin.adminRoute').'/jobs/process4/{id}/show','LA\ProcessesController@process4_show');
	Route::get(config('laraadmin.adminRoute').'/jobs/process4/{id}/edit','LA\ProcessesController@process4_edit');
	Route::post(config('laraadmin.adminRoute').'/jobs/process4/{id}/update','LA\ProcessesController@process4_update');

	Route::post(config('laraadmin.adminRoute').'/jobs/process1/doc_receive/{id}','LA\ProcessesController@process1_receive');
	Route::post(config('laraadmin.adminRoute').'/jobs/process2/doc_receive/{id}','LA\ProcessesController@process2_receive');
	Route::post(config('laraadmin.adminRoute').'/jobs/process3/doc_receive/{id}','LA\ProcessesController@process3_receive');
	Route::post(config('laraadmin.adminRoute').'/jobs/process4/doc_receive/{id}','LA\ProcessesController@process4_receive');
	Route::post(config('laraadmin.adminRoute').'/jobs/process5/doc_receive/{id}','LA\ProcessesController@process5_receive');
	 
	/* ================== Job Center ================== */
	Route::get(config('laraadmin.adminRoute').'/jobcenters','LA\JobCenterController@index');
	Route::post(config('laraadmin.adminRoute').'/jobcenters/search_job','LA\JobCenterController@search_job');
	Route::post(config('laraadmin.adminRoute').'/jobcenters/filter_search','LA\JobCenterController@filter_search');
	

    /* ================== AirLines ================== */
    Route::resource(config('laraadmin.adminRoute') . '/airlines', 'LA\AirLinesController');
    Route::get(config('laraadmin.adminRoute') . '/airline_dt_ajax', 'LA\AirLinesController@dtajax');

    /* ================== ShippingLines ================== */
    Route::resource(config('laraadmin.adminRoute') . '/shippinglines', 'LA\ShippingLinesController');
    Route::get(config('laraadmin.adminRoute') . '/shippingline_dt_ajax', 'LA\ShippingLinesController@dtajax');

    /* ================== Logs ================== */
    Route::resource(config('laraadmin.adminRoute') . '/logs', 'LA\LogsController');
	Route::get(config('laraadmin.adminRoute') . '/log_dt_ajax', 'LA\LogsController@dtajax');
	

	// File Download for each module /admin/company/{{$module->row->id}}/files/download/registration/original
	Route::get(config('laraadmin.adminRoute').'/company/{id}/files/download/{file}','LA\FilesController@file_download');
	Route::get(config('laraadmin.adminRoute').'/processes1/job/{job}/files/download','LA\FilesController@process1_download');
	Route::get(config('laraadmin.adminRoute').'/processes2/job/{job}/files/download','LA\FilesController@process2_download');
	Route::get(config('laraadmin.adminRoute').'/processes3/job/{job}/files/download','LA\FilesController@process3_download');
	Route::get(config('laraadmin.adminRoute').'/processes4/job/{job}/files/download','LA\FilesController@process4_download');
});
