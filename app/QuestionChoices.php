<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionChoices extends Model
{
    protected $table = 'question_choices';
    protected $dates = ['deleted_at'];
}
