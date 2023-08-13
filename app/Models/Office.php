<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    public function users(){
        return $this->hasMany(User::class);
    }
    
    public function active_packages(){
        return $this->hasMany(ActivePackage::class);
    }

    public function withdraws(){
        return $this->hasMany(Withdraw::class);
    }

    
}
