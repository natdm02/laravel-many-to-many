<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'description', 'type_id', 'technologies'];

    public function type()

    {

        return $this->belongsTo(Type::class);

    }


    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'project_technology');
    }
}
