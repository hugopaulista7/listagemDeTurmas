<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    protected $table = 'student';
    
    public function person() {
        return $this->belongsTo(Person::class, 'id', 'id');
    }

    public function team() {
        return $this->belongsTo(Team::class);
    }
}