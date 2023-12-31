<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivePackage extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function package(){
        return $this->belongsTo(Package::class);
    }
    
    public function office(){
        return $this->belongsTo(Office::class);
    }
}
