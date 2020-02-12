<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model {
    protected $table = 'team';

    protected $fillable = ['name'];

    public function students() {
        return $this->hasMany(Student::class);
    }
}