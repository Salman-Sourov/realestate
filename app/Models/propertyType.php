<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

class PropertyType extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function properties()
    {
        return $this->hasMany(Property::class, 'ptype_id');
    }
}
