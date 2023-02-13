<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleLog extends Model
{
    use HasFactory;
    protected $table = 'module_logs';

    protected $fillable = [
        'status',
        'viewed',
        'info',
        'module_id'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }




}