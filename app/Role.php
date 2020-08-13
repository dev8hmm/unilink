<?php
/**
 * Model generated using LaraAdmin
 * Help: http://laraadmin.com
 * LaraAdmin is open-sourced software licensed under the MIT license.
 * Developed by: Dwij IT Solutions
 * Developer Website: http://dwijitsolutions.com
 */

namespace App;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends EntrustRole
{
    use SoftDeletes;
	
	protected $table = 'roles';
	
	protected $hidden = [
    ];

	protected $guarded = [];

	protected $dates = ['deleted_at'];

	public function users()
	{
		return $this->hasMany('App\User','context_id');
	}
	public function role_users()
	{
		return $this->belongsToMany('App\User')->withPivot('role_id', 'user_id');
	}
}
