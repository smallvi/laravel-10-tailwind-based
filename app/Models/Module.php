<?php

namespace App\Models;

// use App\Traits\Models\HasStatus;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'modules';

    // Relations
    public function permissions()
    {
        return $this->hasMany(Permission::class, 'module_id', 'id');
    }
}
