<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\propertyType;

class Property extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function type(){
        // get property type name from property type table using belongs to
        return $this->belongsTo(propertyType::class,'ptype_id','id'); // (getting data model::class,'column of where data need to be replace','getting data model id')
        //type will be return to all_property.blade.php view page
    }

    
}
