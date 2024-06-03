<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\propertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyTypeController extends Controller
{
    public function AllType(){
        $types = propertyType::latest()->get();
        return view('backend.type.all_type',compact('types'));
    }

    public function AddType(){
        return view('backend.type.add_type');
    }

    public function StoreType(Request $request){
        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required'
        ]);

        propertyType::insert([
            'type_name' => $request->type_name, //'database table column name' => ->name of add_type view file form name='type_name'
            'type_icon' => $request->type_icon,
        ]);

        $notification = array(
            'message' => 'Property Type Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);
    }

    public function EditType($id){

        $types = propertyType::findOrFail($id);
        return view('backend.type.edit_type',compact('types'));
    }


    public function UpdateType(Request $request){

        $pid = $request->id;

        propertyType::findOrFail($pid)->update([
            'type_name' => $request->type_name, //'database table column name' => ->name of add_type view file form name='type_name'
            'type_icon' => $request->type_icon,
        ]);

        $notification = array(
            'message' => 'Property Type Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);
    }


    public function DeleteType($id){

        propertyType::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Property Deleted Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }



    //////// Amenities All Method ///////////

    public function AllAmenitie(){
        $amenities = Amenities::latest()->get();
        return view('backend.amenities.all_amenities',compact('amenities'));
    }

    public function AddAmenitie(){
        return view('backend.amenities.add_amenities');
    }

}
