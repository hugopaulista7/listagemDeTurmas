<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Student;
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


    public function student() {
        return $this->hasOne(Student::class, 'id', 'id');
    }
}