<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    protected $table = 'questions';
    protected $dates = ['deleted_at'];
    protected $fillable = [
		'question',
		'is_active'
	];
}
