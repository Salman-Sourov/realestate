<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\Property;
use App\Models\propertyType;
use App\Models\User;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function AllProperty(){

        $property = Property::latest()->get();
        return view('backend.property.all_property',compact('property'));
    }

    public function AddProperty(){
        $propertytype = propertyType::latest()->get();
        $amenities = Amenities::latest()->get();
        $activeAgent = User::where('role','agent')->where('status','active')->latest()->get();
        return view('backend.property.add_property',compact('propertytype','amenities','activeAgent'));
    }


}
