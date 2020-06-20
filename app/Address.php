<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 16 Apr 2018 08:41:08 +0000.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


 
class Address extends Model
{
	protected $table = 'address';
	protected $primaryKey = 'id';
	public $timestamps = false;

	
	protected $fillable = [
		'id',
		'adress',
		'emp_id',
		'created_at ',
		'updated_at',
	];

}
