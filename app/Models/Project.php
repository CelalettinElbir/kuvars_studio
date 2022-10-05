<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function project_photos()
    {
        return $this->hasMany(project_photos::class);
    }

    public function plan_photos()
    {
        return $this->hasMany(planPhotos::class);
    }


    public function deneme()
    {
        return "merhaba";
    }



}
