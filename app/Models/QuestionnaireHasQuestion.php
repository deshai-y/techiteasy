<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionnaireHasQuestion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questionnaire_has_question';

    /**
     * Disable the table timestamps
     */
    public $timestamps = false;
}
