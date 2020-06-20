<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
		'id',
		'loan',
		'emp_id ',
		'created_at',
		'updated_at',
	];
}
