<?php

namespace App\Models;

use App\Models\ModuleLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;
    protected $fillable = [
        'serial_number', 'info','status'
    ];


    public function data()
    {
        return $this->hasMany(ModuleData::class);
    }

    public function log()
    {
        return $this->hasMany(ModuleLog::class);
    }


}


