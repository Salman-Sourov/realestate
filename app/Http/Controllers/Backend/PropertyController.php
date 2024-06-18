<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\Facility;
use App\Models\Property;
use App\Models\propertyType;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;
use App\Models\MultiImage;
use PHPUnit\Framework\Constraint\Count;

use function PHPUnit\Framework\fileExists;

class PropertyController extends Controller
{
    public function AllProperty()
    {

        $property = Property::latest()->get();
        return view('backend.property.all_property', compact('property'));
    }

    public function AddProperty()
    {
        $propertytype = propertyType::latest()->get();
        $amenities = Amenities::latest()->get();
        $activeAgent = User::where('role', 'agent')->where('status', 'active')->latest()->get();
        return view('backend.property.add_property', compact('propertytype', 'amenities', 'activeAgent'));
    }

    public function StoreProperty(Request $request)
    {

        $amen = $request->amenities_id;
        $amenities = implode(",", $amen);
        // dd($amenities);
        $pcode = IdGenerator::generate(['table' => 'properties', 'field' => 'property_code', 'length' => 5, 'prefix' => 'PC']);


        if ($request->file('property_thambnail')) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $request->file('property_thambnail')->getClientOriginalExtension();
            $image = $manager->read($request->file('property_thambnail'));
            $image = $image->resize(370, 250);
            $image->toJpeg(80)->Save(base_path(('public/upload/property/thambnail/' . $name_gen)));
            $save_url = 'upload/property/thambnail/' . $name_gen;
        }

        // $image = $request->file('property_thambnail');
        // $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        // Image::make($image)->resize(370, 250)->save('upload/property/thambnail/' . $name_gen);
        // $save_url = 'upload/property/thambnail/'.$name_gen;

        $property_id = Property::insertGetId([
            'ptype_id' => $request->ptype_id,
            'amenities_id' => $amenities,
            'property_name' => $request->property_name,
            'property_slug' => strtolower(str_replace('', '-', $request->property_name)),
            'property_code' => $pcode,   //variable declare on up
            'property_status' => $request->property_status,
            'lowest_price' => $request->lowest_price,
            'max_price' => $request->max_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garage' => $request->garage,
            'garage_size' => $request->garage_size,


            'property_size' => $request->property_size,
            'property_video' => $request->property_video,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,


            'neighborhood' => $request->neighborhood,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'featured' => $request->featured,
            'hot' => $request->hot,

            'agent_id' => $request->agent_id,
            'status' => 1,
            'property_thambnail' => $save_url, //variable declare on up
            'created_at' => Carbon::now(), //Present date should be inserted
        ]);

        // Multiple Image Upload from here

        $images = $request->file('multi_img');
        foreach ($images as $img) {

            $manager = new ImageManager(new Driver());
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            $image = $manager->read($img);
            $image = $image->resize(370, 250);
            $image->toJpeg(80)->Save(base_path(('public/upload/property/multi-image/' . $make_name)));
            $uploadPath = 'upload/property/multi-image/' . $make_name;

            // $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            // Image::make($img)->resize(770, 520)->save('upload/property/multi_img/' . $make_name);
            // $uploadPath = 'upload/property/multi_img/' . $make_name;

            MultiImage::insert([
                'property_id' => $property_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),

            ]);
        } //end foreach
        // Multiple Image Upload from here

        // Facilities Add From Here
        $facilities = Count($request->facility_name);
        if ($facilities != NULL) {
            for ($i = 0; $i < $facilities; $i++) {
                $fcount = new Facility();       //Another method to declare object
                $fcount->property_id = $property_id;    //variable with database field name = declare $property_id on up
                $fcount->facility_name = $request->facility_name[$i];
                $fcount->distance = $request->distance[$i]; //variable with database field name = name from on add_property page
                $fcount->save();
            }
        }
        // Facilities Ends From Here
        $notification = array(
            'message' => 'Property Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.property')->with($notification);
    }


    public function EditProperty($id)
    {

        $property = Property::findOrFail($id);
        $propertytype = propertyType::latest()->get();
        $amenities = Amenities::latest()->get();
        $activeAgent = User::where('status', 'active')->where('role', 'agent')->latest()->get();

        $type = $property->amenities_id;
        $property_ami = explode(',', $type);

        return view('backend.property.edit_property', compact('property', 'propertytype', 'amenities', 'activeAgent', 'property_ami'));
    }


    public function UpdateProperty(Request $request)
    {

        $amen = $request->amenities_id;
        $amenites = implode(",", $amen);

        $property_id = $request->id;

        Property::findOrFail($property_id)->update([

            'ptype_id' => $request->ptype_id,
            'amenities_id' => $amenites,
            'property_name' => $request->property_name,
            'property_slug' => strtolower(str_replace(' ', '-', $request->property_name)),
            'property_status' => $request->property_status,

            'lowest_price' => $request->lowest_price,
            'max_price' => $request->max_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garage' => $request->garage,
            'garage_size' => $request->garage_size,

            'property_size' => $request->property_size,
            'property_video' => $request->property_video,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,

            'neighborhood' => $request->neighborhood,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'featured' => $request->featured,
            'hot' => $request->hot,
            'agent_id' => $request->agent_id,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Property Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.property')->with($notification);
    }

    public function UpdatePropertyThambnail(Request $request)
    {

        $pro_id = $request->id;
        $oldImage = $request->old_img;

        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()) . '.' . $request->file('property_thambnail')->getClientOriginalExtension();
        $image = $manager->read($request->file('property_thambnail'));
        $image = $image->resize(370, 250);
        $image->toJpeg(80)->Save(base_path(('public/upload/property/thambnail/' . $name_gen)));
        $save_url = 'upload/property/thambnail/' . $name_gen;


        if (fileExists($oldImage)) {
            unlink($oldImage);

            Property::findOrFail($pro_id)->update([

                'property_thambnail' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
        }

        else{

            Property::findOrFail($pro_id)->update([

                'property_thambnail' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

        }

        $notification = array(
            'message' => 'Property Image Thambnail Updated Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
}
