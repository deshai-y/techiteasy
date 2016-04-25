<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questionnaire';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'title'];

    /**
     * Disable the table timestamps
     */
    public $timestamps = false;
}
