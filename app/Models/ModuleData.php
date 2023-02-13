<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleData extends Model
{
    use HasFactory;
    protected $table = 'modules_data';
    protected $fillable = [
        'module_id', 'data'
    ];
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
