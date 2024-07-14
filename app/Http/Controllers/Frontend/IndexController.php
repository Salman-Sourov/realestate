<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\MultiImage;
use App\Models\Property;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function PropertyDetails($id, $slug)
    {

        $property = Property::findOrFail($id);
        $multiImage = MultiImage::where('property_id', $id)->get();
        return view('frontend.property.property_details',compact('property','multiImage'));

    } // End Method
}
