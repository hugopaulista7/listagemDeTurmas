<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Person extends Model
{
    protected $table = 'person';

    protected $fillable = [
        'name',
        'gender',
        'birth_date'
    ];

    public function brDate() {
        return (new Carbon)->createFromFormat('Y-m-d', $this->birth_date)->format('d/m/Y');
    }

}