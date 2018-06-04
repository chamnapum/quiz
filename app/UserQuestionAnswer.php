<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserQuestionAnswer extends Model
{
    protected $table = 'user_question_answers';
    protected $dates = ['deleted_at'];
}
